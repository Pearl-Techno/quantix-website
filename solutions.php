<?php
/**
 * Quantyx Labs — Solutions & Digital System Blueprints
 * -----------------------------------------------------
 */
$page_title = 'Enterprise Solutions & System Blueprints';
$page_desc = 'Engineered solution blueprints for African enterprises: Statutory payroll, microfinance lending cores, hospital EMRs, multi-warehouse inventory, and M-Pesa payment rails.';
$current_page = 'solutions';
$canonical_slug = 'solutions';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/mockups.php';

$solution_blueprints = [
    [
        'id'          => 'sol-payroll',
        'badge'       => 'Statutory Payroll & HRMS',
        'title'       => 'Kenyan Statutory Payroll & Multi-Branch HR Automation',
        'tagline'     => 'Eliminate tax calculation errors, KRA penalties, and manual spreadsheet calculations.',
        'problem'     => 'Managing payroll across branches with volatile statutory mandates (KRA PAYE brackets, NSSF Tier I/II, SHA deductions, and the 1.5% Housing Levy) results in calculation errors, delayed bank disbursements, and painful monthly return reconciliations.',
        'solution'    => 'A multi-company payroll operating system with built-in regulatory engines that automatically compute tax deductions, generate employee payslips, export multi-bank EFT/Pesalink files, and trigger M-Pesa B2C salary batches in minutes.',
        'components'  => [
            'Dynamic KRA PAYE tax bracket engine with personal relief adjustments',
            'NSSF Tier I & Tier II statutory deduction calculation & CSV export',
            'Social Health Authority (SHA) and Affordable Housing Levy accounting',
            'Automated KRA P9 tax card and monthly return generator',
            'Employee self-service portal for leave requests and digital payslips'
        ],
        'mockup'      => 'pearlpay'
    ],
    [
        'id'          => 'sol-microfinance',
        'badge'       => 'FinTech & Lending Core',
        'title'       => 'SACCO & Micro-Lending Digital Automation Engine',
        'tagline'     => 'Real-time loan management with M-Pesa STK Express and risk scoring.',
        'problem'     => 'Micro-lenders and credit unions face high default rates from manual book reconciliations, slow M-Pesa callback processing, and untracked peer guarantor collateral.',
        'solution'    => 'A multi-tenant lending engine that automates loan applications, triggers instant M-Pesa STK push repayments, runs automated reducing-balance amortization schedules, and tracks Loan Guarantee Funds (LGF) in real-time.',
        'components'  => [
            'Safaricom Daraja 2.0 STK Push for instant borrower repayment prompts',
            'Automated B2C disbursement upon loan approval',
            'Dynamic loan products: reducing balance, flat interest, and balloon terms',
            'Peer guarantor collateral and Loan Guarantee Fund (LGF) tracking',
            'Automated SMS notifications for payment due dates and arrears recovery'
        ],
        'mockup'      => 'quantyxls'
    ],
    [
        'id'          => 'sol-healthcare',
        'badge'       => 'Clinical HealthTech',
        'title'       => 'Hospital Information System (HMS) & WhatsApp AI Triage',
        'tagline'     => 'Digitize patient records, pharmacy stock, and clinic appointments.',
        'problem'     => 'Paper-based health records lead to lost medical histories, dispensing errors in pharmacies, long patient waiting lines, and untracked revenue leakage.',
        'solution'    => 'An integrated clinical platform connecting outpatient triage, electronic medical records (EMR), laboratory orders, and pharmacy inventory with automated batch tracking — supported by a 24/7 WhatsApp AI patient assistant.',
        'components'  => [
            'Complete Electronic Medical Records (EMR) with ICD-10 diagnostic coding',
            'Pharmacy dispensing with real-time stock balance & expiration date warnings',
            'Outpatient (OPD) and Inpatient (IPD) bed management and billing',
            'Conversational WhatsApp AI bot for patient appointment scheduling',
            'Integrated billing covering cash, SHA/NHIF insurance, and M-Pesa express'
        ],
        'mockup'      => 'healthpoint'
    ],
    [
        'id'          => 'sol-inventory',
        'badge'       => 'Supply Chain & Logistics',
        'title'       => 'Multi-Warehouse Inventory & Replenishment Control',
        'tagline'     => 'Real-time visibility across central warehouses and retail branches.',
        'problem'     => 'Distributors suffer from stockouts, shrinkage during transfers, and inaccurate manual counts between regional depots.',
        'solution'    => 'A centralized inventory tracking system featuring barcode/QR handheld scanning, automated inter-warehouse transfer slips, low-stock reorder thresholds, and FIFO valuation reporting.',
        'components'  => [
            'Real-time multi-location stock balance dashboard',
            'Handheld barcode and QR code receiving and audit workflows',
            'Automated purchase order generation upon reaching minimum safety stock',
            'Batch tracking, serial number history, and perishable expiry management',
            'Seamless API sync with POS terminals and financial accounting ledgers'
        ],
        'mockup'      => 'stockcounter'
    ],
    [
        'id'          => 'sol-dispatch',
        'badge'       => 'Field Service Operations',
        'title'       => 'Field Workforce Dispatch & SLA Milestone Tracking',
        'tagline'     => 'Real-time routing, digital job sign-offs, and SLA auditing.',
        'problem'     => 'Operations teams lack visibility into mobile field engineers, leading to delayed arrivals, customer disputes over job completion, and lost work order records.',
        'solution'    => 'A dispatch operations platform featuring a centralized web dispatch board, mobile PWA for field technicians, GPS route logging, and digital customer signature capture upon job completion.',
        'components'  => [
            'Live dispatch board with real-time technician status milestones',
            'Mobile PWA for technicians with offline work order capability',
            'Digital customer sign-off capture (signatures, condition photos, timestamps)',
            'Automatic GPS coordinate logging and SLA escalation monitoring',
            'Automated work order closure and invoice generation'
        ],
        'mockup'      => 'sortie'
    ],
    [
        'id'          => 'sol-payments',
        'badge'       => 'Payment Infrastructure',
        'title'       => 'Enterprise Daraja 2.0 & KRA eTIMS Fiscal Switch',
        'tagline'     => 'High-throughput payment gateway with automated tax invoicing.',
        'problem'     => 'Businesses lose revenue from dropped payment webhooks and face penalties for non-compliance with KRA eTIMS electronic invoicing requirements.',
        'solution'    => 'A production-grade middleware switch connecting ERPs and sales channels directly to Safaricom Daraja M-Pesa with idempotent deduplication and real-time KRA eTIMS cryptographic QR fiscalization.',
        'components'  => [
            'Asynchronous webhook queue with automatic retry logic (Redis/MySQL)',
            'Full Daraja 2.0 support: C2B Paybill, Buy Goods Till, STK Push, B2C payouts',
            'KRA eTIMS VSCU electronic fiscal invoice signing middleware',
            'Idempotent transaction handling guaranteeing zero double-credit errors',
            'Comprehensive audit logs and real-time latency telemetry'
        ],
        'mockup'      => 'quantpay'
    ]
];
?>

<!-- Solutions Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="live-indicator"></span>
        <span>Enterprise Solutions &middot; Battle-Tested Blueprints</span>
      </div>
      <h1 class="page-hero-title">
        Pre-Architected Solutions for <br>
        <span class="text-cyan">High-Impact Operations.</span>
      </h1>
      <p class="page-hero-desc">
        Explore battle-tested system blueprints designed to solve the exact operational bottlenecks African enterprises encounter every day — from statutory compliance to real-time mobile money reconciliation.
      </p>
    </div>
  </div>
</section>

<!-- Blueprints Showcase -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="work-grid">
      <?php foreach ($solution_blueprints as $idx => $b): ?>
        <div class="work-card <?= $idx % 2 === 1 ? 'reverse' : '' ?> reveal" id="<?= htmlspecialchars($b['id']) ?>">
          <div>
            <span class="work-badge"><?= htmlspecialchars($b['badge']) ?></span>
            <h2 class="work-title"><?= htmlspecialchars($b['title']) ?></h2>
            <p style="font-size: 1.05rem; color: var(--cyan); font-weight: 500; margin-bottom: 20px;">
              <?= htmlspecialchars($b['tagline']) ?>
            </p>
            
            <div class="callout-problem">
              <span class="callout-problem-label">The Operational Hurdle</span>
              <p><?= htmlspecialchars($b['problem']) ?></p>
            </div>

            <div class="callout-solution">
              <span class="callout-solution-label">The Quantyx Architecture</span>
              <p><?= htmlspecialchars($b['solution']) ?></p>
            </div>

            <h4 style="font-family: var(--font-mono); font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-primary); margin-bottom: 12px;">
              Architecture Components:
            </h4>
            <ul class="feature-list">
              <?php foreach ($b['components'] as $comp): ?>
                <li class="feature-item">
                  <span class="feature-item-icon"><?= q_icon('check', '', 16) ?></span>
                  <span><?= htmlspecialchars($comp) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>

            <div style="display: flex; gap: 14px; flex-wrap: wrap;">
              <a href="<?= url('contact') ?>?solution=<?= urlencode($b['title']) ?>" class="btn btn-primary btn-sm">
                Deploy This Solution
                <?= q_icon('arrow-right', '', 14) ?>
              </a>
              <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="btn btn-secondary btn-sm" target="_blank" rel="noopener">
                <?= q_icon('whatsapp', '', 14) ?>
                Technical Consultation
              </a>
            </div>
          </div>

          <div>
            <?php render_product_mockup($b['mockup']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Reusable CTA Banner -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

