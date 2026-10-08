<?php
/**
 * Quantyx Labs — System Configuration, Helpers & Data Model
 * ------------------------------------------------------------
 * Centralized settings, metadata, routing helpers, inquiry persistence, and CSRF.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Production domain constant
define('PROD_BASE_URL', 'https://quantyx.co.ke/');

// Environment detection
$is_local = in_array($_SERVER['HTTP_HOST'] ?? '', ['localhost', '127.0.0.1', '::1']) || strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost:') === 0;

if ($is_local) {
    $script_dir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    $base_dir = rtrim(str_replace('\\', '/', $script_dir), '/');
    if (strpos($base_dir, '/includes') !== false) {
        $base_dir = str_replace('/includes', '', $base_dir);
    }
    $base_url = 'http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($base_dir ? $base_dir . '/' : '/');
} else {
    $base_url = PROD_BASE_URL;
}

// Company Metadata
$company = [
    'name'        => 'Quantyx Labs',
    'legal_name'  => 'Quantyx Labs Limited',
    'tagline'     => 'Engineering Africa’s Digital Infrastructure',
    'email'       => 'info@quantyx.co.ke',
    'phone'       => '+254 752 700045',
    'phone_clean' => '+254752700045',
    'whatsapp'    => 'https://wa.me/254752700045?text=Hello%20Quantyx%20Labs%2C%20I%20would%20like%20to%20discuss%20a%20project',
    'location'    => 'Nairobi, Kenya',
    'address'     => 'Westlands Commercial Hub, Nairobi, Kenya',
    'year'        => date('Y'),
    'founded'     => '2024',
    'logo'        => 'images/quantyx_final_logo_mark_light.png',
    'logo_og'     => 'images/quantyx_final_og.png',
    'logo_full'   => 'images/quantyx_final_logo_transparent.png',
    'google_tag'  => 'G-21QK3QCJT0',
    'socials'     => [
        'linkedin' => 'https://linkedin.com/company/quantyxlab',
        'github'   => 'https://github.com/quantyxlab',
        'twitter'  => 'https://twitter.com/quantyxlab',
    ]
];

// Navigation Structure
$nav_items = [
    ['slug' => 'services',   'label' => 'Services',   'url' => 'services'],
    ['slug' => 'solutions',  'label' => 'Solutions',  'url' => 'solutions'],
    ['slug' => 'products',   'label' => 'Products',   'url' => 'products'],
    ['slug' => 'industries', 'label' => 'Industries', 'url' => 'industries'],
    ['slug' => 'work',       'label' => 'Work',       'url' => 'work'],
    ['slug' => 'about',      'label' => 'About',      'url' => 'about'],
];

// Helper: environment working URL
function url($path = '') {
    global $base_url;
    $path = ltrim($path, '/');
    return $base_url . ($path !== '' ? $path : '');
}

// Helper: production canonical URL (always https://quantyx.co.ke/)
function canonical_url($path = '') {
    $path = ltrim($path, '/');
    return PROD_BASE_URL . ($path !== '' ? $path : '');
}

// Helper: asset URL (with auto cache-busting query for CSS/JS)
function asset($path) {
    global $base_url;
    $clean_path = ltrim($path, '/');
    $file_path = dirname(__DIR__) . '/' . $clean_path;
    $version = file_exists($file_path) ? filemtime($file_path) : time();
    return $base_url . $clean_path . '?v=' . $version;
}

// Helper: check active page
function is_active($page) {
    $current = basename($_SERVER['PHP_SELF'] ?? '', '.php');
    if ($page === 'home' && ($current === 'index' || empty($current))) return true;
    return $current === $page;
}

// CSRF Generation and Validation
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_validate($token) {
    return !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Real Inquiry Storage Engine
function save_inquiry($data) {
    $file = dirname(__DIR__) . '/data/inquiries.json';
    $existing = [];

    if (file_exists($file)) {
        $content = file_get_contents($file);
        $decoded = json_decode($content, true);
        if (is_array($decoded)) {
            $existing = $decoded;
        }
    }

    $entry = [
        'id'         => 'INQ-' . strtoupper(substr(uniqid(), -6)),
        'created_at' => date('Y-m-d H:i:s'),
        'ip'         => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
        'name'       => strip_tags(trim($data['name'] ?? '')),
        'company'    => strip_tags(trim($data['company'] ?? '')),
        'email'      => filter_var(trim($data['email'] ?? ''), FILTER_SANITIZE_EMAIL),
        'phone'      => strip_tags(trim($data['phone'] ?? '')),
        'industry'   => strip_tags(trim($data['industry'] ?? 'General')),
        'type'       => strip_tags(trim($data['project_type'] ?? 'Custom Project')),
        'timeline'   => strip_tags(trim($data['timeline'] ?? 'Unspecified')),
        'budget'     => strip_tags(trim($data['budget'] ?? 'Unspecified')),
        'details'    => strip_tags(trim($data['details'] ?? ''))
    ];

    $existing[] = $entry;
    $saved = file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    // Also attempt server mail notification (suppressing output if unconfigured)
    $mail_sent = false;
    if (!empty($entry['email'])) {
        $subject = "New Inquiry: {$entry['company']} ({$entry['type']})";
        $headers = "From: web-inquiry@quantyx.co.ke\r\nReply-To: {$entry['email']}\r\nContent-Type: text/plain; charset=UTF-8\r\n";
        $body = "Inquiry ID: {$entry['id']}\nName: {$entry['name']}\nCompany: {$entry['company']}\nEmail: {$entry['email']}\nPhone: {$entry['phone']}\nType: {$entry['type']}\nDetails:\n{$entry['details']}\n";
        $mail_sent = @mail('info@quantyx.co.ke', $subject, $body, $headers);
    }

    return [
        'success'   => $saved !== false,
        'inquiry'   => $entry,
        'mail_sent' => $mail_sent
    ];
}

// Products Data Model
$products = [
    'pearlpay' => [
        'id'          => 'pearlpay',
        'badge'       => 'Enterprise HRMS & Payroll',
        'color'       => '#00D4FF',
        'title'       => 'Pearl Pay HRMS',
        'tagline'     => 'Statutory Payroll & Multi-Company Workforce Management',
        'desc'        => 'An enterprise HR and payroll system engineered to support Kenyan statutory rules (KRA PAYE tax bands, personal reliefs, NSSF Tier I/II, SHA deductions, and Housing Levy), employee self-service, and multi-bank disbursement.',
        'problem'     => 'Manual payroll calculations prone to tax errors, tedious NSSF/SHA tracking, and disconnected attendance logs.',
        'features'    => [
            'PAYE calculation engine calibrated to current KRA tax bands and personal relief',
            'Tiered NSSF (Tier I & Tier II), NHIF / SHA levies, and 1.5% Housing Levy accounting',
            'Employee self-service portal for leave requests, claims, and digital payslips',
            'Multi-bank payroll file export (EFT, Pesalink) and M-Pesa B2C salary batch format',
            'Multi-branch organizational hierarchy with auditable role-based permissions'
        ],
        'tech'        => ['PHP 8.2', 'MySQL / PDO', 'M-Pesa B2C API', 'KRA Statutory Engine', 'RESTful Core'],
        'mockup'      => 'pearlpay'
    ],
    'healthpoint' => [
        'id'          => 'healthpoint',
        'badge'       => 'Hospital Information & EMR',
        'color'       => '#10B981',
        'title'       => 'Health Point HMS',
        'tagline'     => 'Unified Clinical Operations & Electronic Medical Records',
        'desc'        => 'A modular health information system connecting outpatient triage, medical consultations, digital prescription ordering, pharmacy inventory with expiration tracking, and billing under one clinical record.',
        'problem'     => 'Paper-heavy records causing patient triage delays, lost prescription histories, untracked pharmaceutical stock, and billing leakage.',
        'features'    => [
            'Outpatient (OPD) and inpatient (IPD) clinical workflow orchestration',
            'Electronic Medical Records (EMR) with ICD-10 diagnostic indexing and doctor notes',
            'Pharmacy dispensing with real-time stock balance and batch expiration alerts',
            'Laboratory test ordering, specimen tracking, and digital result distribution',
            'Integrated patient billing supporting cash, SHA/NHIF insurance, and M-Pesa STK Express'
        ],
        'tech'        => ['PHP Core', 'MySQL Architecture', 'WhatsApp Cloud API', 'SHA / NHIF Gateways'],
        'mockup'      => 'healthpoint'
    ],
    'healthbot' => [
        'id'          => 'healthbot',
        'badge'       => 'AI Healthcare Logistics',
        'color'       => '#0066FF',
        'title'       => 'Health Point AI Bot',
        'tagline'     => 'Conversational WhatsApp AI for Clinic Triage & Medicine Inquiries',
        'desc'        => 'A conversational medical logistics assistant operating natively inside WhatsApp. Patients locate affiliated clinics, query medicine inventory, and request consultations without installing a separate app.',
        'problem'     => 'Patients traveling between multiple facilities to locate essential medicines, with zero visibility into local stock availability.',
        'features'    => [
            'Natural language symptom guidance directing patients to verified specialists',
            'Real-time medicine query across affiliated community pharmacies in Nairobi',
            'Automated appointment bookings synced directly into hospital EMR calendars',
            'Prescription upload and pharmacist verification workflow'
        ],
        'tech'        => ['Python AI Core', 'WhatsApp Cloud API', 'Webhook Engine', 'Geolocation Dispatch'],
        'mockup'      => 'healthbot'
    ],
    'quantyxls' => [
        'id'          => 'quantyxls',
        'badge'       => 'FinTech & Lending Core',
        'color'       => '#00D4FF',
        'title'       => 'QuantyxLS Microfinance',
        'tagline'     => 'Multi-Tenant SACCO & Digital Lending Platform',
        'desc'        => 'A digital lending platform built for East African SACCOs, microfinance institutions, and credit groups. Integrates M-Pesa STK Push express repayments, automated amortization schedules, group guarantor funds, and portfolio risk telemetry.',
        'problem'     => 'Delayed mobile money repayment reconciliation, manual ledger bookkeeping, and untracked peer guarantor collateral.',
        'features'    => [
            'Direct Daraja 2.0 integration for real-time STK Push repayments & B2C disbursements',
            'Flexible loan products: reducing balance, flat rate, and short-term advance terms',
            'Loan Guarantee Fund (LGF) & peer guarantor pledge management',
            'Automated SMS notifications for payment due dates and arrears recovery',
            'Comprehensive portfolio at risk (PAR 30/60/90) reports and central ledger auditing'
        ],
        'tech'        => ['PHP OOP Architecture', 'Safaricom Daraja API', 'MySQL Transactions', 'SMS Gateway API'],
        'mockup'      => 'quantyxls'
    ],
    'stockcounter' => [
        'id'          => 'stockcounter',
        'badge'       => 'Supply Chain & Inventory',
        'color'       => '#00D4FF',
        'title'       => 'Stock Counter / InventoryOS',
        'tagline'     => 'Multi-Warehouse Inventory Tracking & Replenishment',
        'desc'        => 'Real-time stock control engineered for distributors, retail chains, and warehouses. Features barcode scanning, inter-branch transfers, low-stock threshold triggers, and supplier procurement audit trails.',
        'problem'     => 'Stock shrinkage, stock-outs during peak sales periods, disconnected multi-store counts, and inaccurate valuation reports.',
        'features'    => [
            'Multi-location real-time stock balances and automated inter-warehouse transfer slips',
            'Barcode & QR code handheld scanning integration for rapid receiving and audits',
            'Automated reorder triggers with supplier purchase order generation',
            'Batch tracking, serial number history, and perishable expiry date management',
            'Reconciliation with sales POS terminals and enterprise accounting backends'
        ],
        'tech'        => ['PHP / MySQL', 'Barcode Scanning API', 'WebSocket Sync', 'CSV / Excel Engines'],
        'mockup'      => 'stockcounter'
    ],
    'sortie' => [
        'id'          => 'sortie',
        'badge'       => 'Field Service Operations',
        'color'       => '#0066FF',
        'title'       => 'Digital Sortie',
        'tagline'     => 'Field Service Dispatch & Mobile Operations Platform',
        'desc'        => 'Connects headquarters dispatchers with field engineers, technicians, and delivery fleets. Real-time job milestone updates, digital signatures, route geofencing, and automated SLA compliance logging.',
        'problem'     => 'Lack of visibility into field technician progress, delayed job sign-offs, and disputes regarding arrival timestamps.',
        'features'    => [
            'Intelligent technician dispatch board with live status milestones',
            'Mobile-first field worker web app with offline work order capability',
            'Digital customer sign-off capture (signatures, condition photos, timestamps)',
            'Automatic GPS coordinate logging and SLA escalation monitoring'
        ],
        'tech'        => ['Progressive Web App (PWA)', 'GPS Geolocation', 'REST APIs', 'MySQL Cloud'],
        'mockup'      => 'sortie'
    ],
    'quantpay' => [
        'id'          => 'quantpay',
        'badge'       => 'Payments Infrastructure',
        'color'       => '#00D4FF',
        'title'       => 'Quantpay Daraja & eTIMS Switch',
        'tagline'     => 'Enterprise M-Pesa & KRA Fiscalization Engine',
        'desc'        => 'Production middleware connecting legacy ERPs, ecommerce platforms, and point-of-sale systems directly to Safaricom Daraja M-Pesa (STK Push, C2B, B2C) and KRA eTIMS VSCU electronic fiscal invoicing.',
        'problem'     => 'Dropped webhook notifications during traffic surges, manual bank reconciliations, and complex KRA eTIMS integration mandates.',
        'features'    => [
            'Asynchronous webhook queue with automatic retry logic',
            'Full support for C2B Paybill, Buy Goods Till, STK Push, and automated B2C payouts',
            'KRA eTIMS / TIMS VSCU cryptographic QR invoice signing middleware',
            'Idempotent transaction deduplication guaranteeing zero double-credit errors'
        ],
        'tech'        => ['Daraja API 2.0', 'KRA eTIMS Protocol', 'PHP / Redis Queue', 'AES-256 Encryption'],
        'mockup'      => 'quantpay'
    ]
];

// Core Services Data Model
$services = [
    [
        'id'       => 'custom-software',
        'title'    => 'Custom Software Engineering',
        'subtitle' => 'Mission-critical systems tailored to your exact operational workflows.',
        'desc'     => 'We engineer bespoke web applications, enterprise portals, and distributed software systems from first principles. Designed for high transaction volume, strict data integrity, and longevity — avoiding rigid off-the-shelf templates.',
        'deliverables' => [
            'Full-stack web applications & portals',
            'Scalable relational database architecture with ACID integrity',
            'Role-based access control (RBAC) & immutable audit trails',
            'High-velocity transaction handling & query optimization',
            'Comprehensive technical documentation & IP handover'
        ],
        'icon'     => 'code-bracket'
    ],
    [
        'id'       => 'enterprise-systems',
        'title'    => 'Enterprise Systems & ERP Architecture',
        'subtitle' => 'Integrated platforms that unify inventory, payroll, accounting, and operations.',
        'desc'     => 'We build and implement end-to-end enterprise platforms that eradicate departmental silos. From multi-company payroll engines to core supply chain backbones, we give executive teams real-time visibility.',
        'deliverables' => [
            'Multi-entity ERP & departmental workflow software',
            'Kenyan statutory payroll (PAYE, NSSF, SHA, Housing Levy)',
            'Multi-warehouse inventory & procurement controls',
            'Executive analytics & real-time operational dashboards',
            'Automated compliance reporting & ledger audits'
        ],
        'icon'     => 'building-office'
    ],
    [
        'id'       => 'ai-automation',
        'title'    => 'Artificial Intelligence & Workflow Automation',
        'subtitle' => 'Embed intelligence directly into customer touchpoints and back-office operations.',
        'desc'     => 'We integrate conversational AI, intelligent document parsers, and automated decision engines into existing business processes — turning repetitive manual tasks into verified automated flows.',
        'deliverables' => [
            'WhatsApp Business AI assistants & triage bots',
            'Automated document & invoice data extraction',
            'Predictive inventory replenishment thresholds',
            'Automated credit risk assessment scoring models',
            'Event-driven operational alerts via SMS & Webhooks'
        ],
        'icon'     => 'cpu-chip'
    ],
    [
        'id'       => 'integrations-api',
        'title'    => 'Systems Integration & API Engineering',
        'subtitle' => 'Unifying disconnected legacy platforms, payment rails, and government portals.',
        'desc'     => 'Businesses run on multiple software tools that rarely speak to each other. We design reliable middleware and secure REST APIs that connect your ERP, bank accounts, mobile money, and regulatory services into a unified mesh.',
        'deliverables' => [
            'Safaricom Daraja M-Pesa (C2B, B2C, B2B, STK Push)',
            'KRA eTIMS / TIMS VSCU electronic fiscal invoicing',
            'Core banking switches & Pesalink transaction flows',
            'Tally ERP & accounting software bidirectional sync',
            'Hardware & biometric device API middleware'
        ],
        'icon'     => 'arrows-right-left'
    ],
    [
        'id'       => 'fintech-payments',
        'title'    => 'FinTech & Payment Solutions',
        'subtitle' => 'Resilient payment infrastructure engineered for African commerce.',
        'desc'     => 'From digital microfinance engines to custom disbursement switches, we engineer financial software with zero tolerance for accounting discrepancies, backed by idempotent architecture and instant reconciliation.',
        'deliverables' => [
            'SACCO & micro-lending management engines',
            'Automated payment reconciliation pipelines',
            'Multi-currency wallet & disbursement systems',
            'Group guarantor & loan guarantee fund ledgers',
            'Fraud detection & anomalous transaction telemetry'
        ],
        'icon'     => 'credit-card'
    ],
    [
        'id'       => 'cloud-devops',
        'title'    => 'Cloud Architecture, DevOps & Security',
        'subtitle' => 'High-availability infrastructure engineered to scale under demanding African traffic.',
        'desc'     => 'We configure resilient cloud environments across AWS, DigitalOcean, and dedicated servers. Engineered for uptime, automated daily backups, encrypted secrets management, and rapid disaster recovery.',
        'deliverables' => [
            'Linux, Nginx/Apache & PHP/Node high-performance tuning',
            'MySQL / PostgreSQL clustering & automated failover',
            'Containerized deployments with Docker & CI/CD pipelines',
            'SSL/TLS encryption, firewall & DDoS mitigation',
            'System health telemetry & automated alerting'
        ],
        'icon'     => 'cloud'
    ],
    [
        'id'       => 'mobile-web',
        'title'    => 'Mobile & Web Application Development',
        'subtitle' => 'Intuitive, high-performance apps built for reliable low-latency execution.',
        'desc'     => 'Whether your field staff operate in remote areas with intermittent connectivity or your customers interact on smartphones, we build Flutter and responsive web applications optimized for speed and battery life.',
        'deliverables' => [
            'Cross-platform mobile apps (Android & iOS) via Flutter',
            'Progressive Web Applications (PWA) with offline sync',
            'Field worker dispatch & route tracking apps',
            'Customer self-service mobile portals',
            'App Store & Google Play deployment management'
        ],
        'icon'     => 'device-phone-mobile'
    ],
    [
        'id'       => 'sla-support',
        'title'    => 'Dedicated Maintenance, SLA & Partnership',
        'subtitle' => 'Long-term engineering stewardship so your digital systems never fall behind.',
        'desc'     => 'We provide contractual SLAs covering security patching, statutory updates (such as KRA tax law revisions), speed optimization, and ongoing feature iterations.',
        'deliverables' => [
            'Contractual response-time SLA agreements',
            'Annual statutory tax & regulatory compliance updates',
            'Preventative security auditing & database vacuuming',
            'Continuous feature upgrades & staff onboarding',
            'Senior engineering escalation channel'
        ],
        'icon'     => 'shield-check'
    ]
];

// Industries Data Model
$industries = [
    [
        'id'          => 'healthcare',
        'title'       => 'Healthcare & Pharmaceuticals',
        'headline'    => 'Clinical Operations & Medical Logistics',
        'desc'        => 'Transforming hospitals, clinics, and pharmacies into paperless care centers. We build EMR systems, patient triage workflows, WhatsApp AI medicine locators, and pharmaceutical inventory controls.',
        'systems'     => ['Hospital Management Systems (HMS)', 'Electronic Medical Records (EMR)', 'WhatsApp AI Patient Bots', 'Pharmacy Batch & Expiry Tracking'],
        'icon'        => 'heart'
    ],
    [
        'id'          => 'fintech',
        'title'       => 'Financial Services, SACCOs & Microfinance',
        'headline'    => 'Lending Cores & Payment Switches',
        'desc'        => 'Empowering SACCOs and digital lenders with automated loan application pipelines, credit scoring models, M-Pesa STK push collections, and transparent loan guarantee fund accounting.',
        'systems'     => ['SACCO Loan Engines', 'M-Pesa STK Payment Switches', 'Group Collateral Management', 'Automated Amortization & Arrears'],
        'icon'        => 'banknotes'
    ],
    [
        'id'          => 'retail',
        'title'       => 'Retail, Wholesale & FMCG Distribution',
        'headline'    => 'Multi-Store Inventory & Point-of-Sale Mesh',
        'desc'        => 'Eliminating stock shortages and untracked warehouse transfers. We build multi-branch inventory tracking, barcode replenishment pipelines, and real-time sales auditing.',
        'systems'     => ['Multi-Warehouse Inventory Control', 'Barcode Receiving & Transfer Slips', 'KRA eTIMS POS Invoicing', 'Supplier Procurement Automation'],
        'icon'        => 'shopping-bag'
    ],
    [
        'id'          => 'logistics',
        'title'       => 'Transport, Logistics & Field Operations',
        'headline'    => 'End-to-End Field Dispatch & Proof of Delivery',
        'desc'        => 'Giving operations managers full visibility over mobile fleets, technician appointments, route milestones, and digital sign-offs with GPS-verified proof of delivery.',
        'systems'     => ['Field Technician Dispatch Boards', 'Mobile Job Proof-of-Delivery', 'Fleet Route & Milestone Tracking', 'SLA Escalation Monitoring'],
        'icon'        => 'truck'
    ],
    [
        'id'          => 'agriculture',
        'title'       => 'Agri-Business & Supply Chains',
        'headline'    => 'Farmer Aggregation & Produce Traceability',
        'desc'        => 'Digital platforms for produce collection centers, outgrower weighing scales, automated farmer payout batches via mobile money, and field cooperative audits.',
        'systems'     => ['Weighbridge & Collection Software', 'Mobile Money Farmer Payouts', 'Cooperative Member Ledgers', 'Produce Quality Traceability'],
        'icon'        => 'globe-alt'
    ],
    [
        'id'          => 'enterprise-sme',
        'title'       => 'Corporate Enterprises & Ambitious SMEs',
        'headline'    => 'Digital Transformation & Statutory Compliance',
        'desc'        => 'Modernizing legacy back offices with automated Kenyan statutory payroll, custom approval workflows, role-based departmental portals, and auditable financial data.',
        'systems'     => ['Kenyan Statutory Payroll & HRMS', 'Custom Executive Dashboards', 'Departmental Approval Engines', 'Tally & Accounting API Bridges'],
        'icon'        => 'briefcase'
    ]
];

// Production Case Studies & Systems Breakdown
$case_studies = [
    [
        'slug'        => 'pearl-pay-hrms',
        'client'      => 'Pearl Pay HRMS Platform',
        'industry'    => 'Enterprise HR & Statutory Compliance',
        'challenge'   => 'Kenyan companies face continuous regulatory updates (KRA PAYE brackets, NSSF Tier I/II, new SHA deductions, and the 1.5% Housing Levy). Traditional payroll software was either brittle or imported expensive foreign calculations incompatible with local laws.',
        'solution'    => 'Quantyx Labs engineered Pearl Pay HRMS — an enterprise multi-company payroll platform with native Kenyan statutory formulas, automated monthly returns generation, employee self-service, and multi-bank disbursement exports.',
        'tech_stack'  => ['PHP 8.2', 'MySQL / PDO', 'M-Pesa B2C Gateway', 'PDF Generation Engine', 'RESTful API'],
        'outcome'     => 'Full statutory calculation support across 36 integrated modules; payroll processing time reduced from several days of manual work to a standardized batch cycle.',
        'badge'       => 'Enterprise HRMS'
    ],
    [
        'slug'        => 'healthpoint-hms',
        'client'      => 'Health Point HMS & WhatsApp AI Bot',
        'industry'    => 'Healthcare & Clinical Operations',
        'challenge'   => 'Clinical facilities struggled with lost paper patient files, prescription dispensing errors, unmonitored pharmacy stock depletion, and long patient triage queues.',
        'solution'    => 'Built a unified Hospital Information System unifying electronic medical records, doctor consultation notes, pharmacy dispensing, and laboratory orders — complemented by a WhatsApp AI assistant enabling patients to locate verified medicines and book appointments.',
        'tech_stack'  => ['PHP Core', 'MySQL Architecture', 'WhatsApp Cloud API', 'Python NLP Engine'],
        'outcome'     => 'Designed to eliminate paper folders, enable automated pharmacy batch expiration audits, and provide 24/7 conversational patient intake on WhatsApp.',
        'badge'       => 'HealthTech Platform'
    ],
    [
        'slug'        => 'quantyxls-lending',
        'client'      => 'QuantyxLS Microfinance Core',
        'industry'    => 'FinTech & Microfinance',
        'challenge'   => 'Micro-lenders and SACCO groups faced high default rates due to delayed M-Pesa repayment reconciliation, manual ledger updates, and complex group guarantor tracking.',
        'solution'    => 'Engineered QuantyxLS — a multi-tenant micro-lending operating system with automated Daraja STK Push repayment triggers, instant ledger reconciliation, automated loan amortization, and dynamic Loan Guarantee Fund accounting.',
        'tech_stack'  => ['PHP OOP', 'Safaricom Daraja API 2.0', 'MySQL Transactions', 'SMS Bulk Gateway'],
        'outcome'     => 'Instant STK repayment callbacks, automated reducing-balance amortization schedules, and transparent guarantor pledge ledgers.',
        'badge'       => 'FinTech Core'
    ],
    [
        'slug'        => 'digital-sortie-dispatch',
        'client'      => 'Digital Sortie Operations Platform',
        'industry'    => 'Logistics & Field Services',
        'challenge'   => 'Field technician dispatch was managed via phone calls and messaging threads, resulting in delayed service arrivals, zero SLA tracking, and frequent client disputes over arrival timestamps.',
        'solution'    => 'Deployed Digital Sortie — a centralized web dispatch board paired with a mobile PWA for field workers, complete with real-time job milestone checkpoints, digital customer signatures, and automated GPS audit trails.',
        'tech_stack'  => ['Mobile Web PWA', 'Geolocation APIs', 'PHP / MySQL API', 'Realtime Webhooks'],
        'outcome'     => 'Increased daily work order throughput and verified digital customer sign-offs with GPS timestamps for every completed visit.',
        'badge'       => 'Field Logistics'
    ]
];
