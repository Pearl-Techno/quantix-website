<?php
/**
 * Quantyx Labs — Homepage
 * ------------------------
 * Premium African Technology Company Website
 */
$page_title = 'We Engineer the Intelligent Digital Systems Behind Ambitious Enterprises';
$page_desc = 'Quantyx Labs designs, builds, integrates, and scales custom software, Kenyan statutory payroll (Pearl Pay), hospital EMRs (Health Point), microfinance engines (QuantyxLS), and AI-driven systems across Africa.';
$current_page = 'home';
$canonical_slug = '';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/mockups.php';
?>

<!-- ══════════════════════════════════════════════════════════════════
     01 — HERO SECTION (COMMANDING STACKED ENTERPRISE ARCHITECTURE)
     ══════════════════════════════════════════════════════════════════ -->
<section class="hero hero-stacked" id="hero">
  <div class="hero-bg-layer">
    <img src="<?= asset('images/visual/hero-network.jpg') ?>" alt="Quantyx Network Architecture Visual" class="hero-visual-bg" loading="eager" />
    <canvas id="hero-canvas" class="hero-canvas"></canvas>
    <div class="hero-vignette"></div>
    <div class="hero-bg-grid"></div>
    <div class="hero-falloff-glow"></div>
  </div>

  <div class="container hero-container">
    <!-- Top: Value Proposition, Headline & Authoritative CTAs -->
    <div class="hero-header-block">
      <div class="eyebrow hero-eyebrow">
        <span class="eyebrow-prefix">[ NAIROBI · EST. 2024 ]</span>
        <span class="live-indicator"></span>
        <span class="eyebrow-label">Systems engineering for regulated industries</span>
      </div>

      <h1 class="hero-headline">
        Infrastructure for the institutions <br class="hero-br-desktop">Kenya runs on.
      </h1>

      <p class="hero-subhead">
        Statutory payroll, payment switching, and clinical records — engineered to KRA, CBK, and SHA rules from the database up, and supported under contractual SLAs.
      </p>

      <div class="hero-actions">
        <a href="<?= url('contact') ?>" class="btn btn-primary btn-lg">
          Start a Project
          <?= q_icon('arrow-right', '', 16) ?>
        </a>
        <a href="#systems-console" class="btn btn-secondary btn-lg">
          See the Systems
          <?= q_icon('arrow-up-right', '', 16) ?>
        </a>
      </div>

      <div class="hero-trust-row reveal-stagger">
        <div class="hero-trust-item">
          <span class="trust-dot"></span>
          <span><strong>Kenyan Statutory Rules:</strong> Built-in (PAYE, SHA, NSSF Tier I/II, Housing Levy)</span>
        </div>
        <div class="hero-trust-item">
          <span class="trust-dot"></span>
          <span><strong>Safaricom Daraja 2.0:</strong> Idempotent payment switch</span>
        </div>
        <div class="hero-trust-item">
          <span class="trust-dot"></span>
          <span><strong>Enterprise SLA:</strong> Dedicated stewardship & IP ownership</span>
        </div>
      </div>
    </div>

    <!-- Bottom: Wide, Commanding Product Console Frame -->
    <div class="hero-console-stage reveal-scale" id="systems-console">
      <div class="hero-console-shell">
        <div class="console-nav-bar">
          <div class="console-nav-tabs">
            <button class="console-tab-btn active" data-console="c-preview-pearlpay" type="button">
              <span class="tab-code">PP-01</span>
              <span class="tab-name">Statutory HRMS</span>
            </button>
            <button class="console-tab-btn" data-console="c-preview-quantpay" type="button">
              <span class="tab-code">QP-02</span>
              <span class="tab-name">Payment Switch</span>
            </button>
            <button class="console-tab-btn" data-console="c-preview-healthpoint" type="button">
              <span class="tab-code">HP-03</span>
              <span class="tab-name">Clinical EMR</span>
            </button>
          </div>
          <div class="console-telemetry-tag">
            <span class="status-pulse-dot"></span>
            <span>PRODUCTION ACTIVE</span>
          </div>
        </div>

        <div class="hero-console-screens">
          <div class="console-preview-item active" id="c-preview-pearlpay">
            <?php render_product_mockup('pearlpay'); ?>
          </div>
          <div class="console-preview-item" id="c-preview-quantpay">
            <?php render_product_mockup('quantpay'); ?>
          </div>
          <div class="console-preview-item" id="c-preview-healthpoint">
            <?php render_product_mockup('healthpoint'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Telemetry Ticker Directly Under Console -->
  <div class="hero-telemetry-band">
    <div class="telemetry-inner">
      <div class="telemetry-track">
        <span class="telemetry-item"><span class="ticker-dot"></span> PAYE ENGINE · CURRENT KRA BANDS ACTIVE</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> NSSF TIER I/II AUTO-SPLIT</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> SHA 2.75% STATUTORY FORMULA</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> HOUSING LEVY 1.5% EMPLOYER MATCHED</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> DARAJA 2.0 WEBHOOKS IDEMPOTENT</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> KRA eTIMS VSCU CRYPTOGRAPHIC SIGNING</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> PAYE ENGINE · CURRENT KRA BANDS ACTIVE</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> NSSF TIER I/II AUTO-SPLIT</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> SHA 2.75% STATUTORY FORMULA</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> HOUSING LEVY 1.5% EMPLOYER MATCHED</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> DARAJA 2.0 WEBHOOKS IDEMPOTENT</span>
        <span class="telemetry-sep">///</span>
        <span class="telemetry-item"><span class="ticker-dot"></span> KRA eTIMS VSCU CRYPTOGRAPHIC SIGNING</span>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     02 — STATS & REAL CAPABILITIES
     ══════════════════════════════════════════════════════════════════ -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="stats-grid reveal-stagger">
      <div class="stat-card">
        <div class="stat-number" data-target="8" data-suffix="+">8<span class="stat-suffix">+</span></div>
        <div class="stat-title">Proprietary Platforms Built</div>
        <div class="stat-subtitle">From core HRMS to clinical EMR, lending, and inventory</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">KRA & CBK</div>
        <div class="stat-title">Regulatory Alignment</div>
        <div class="stat-subtitle">PAYE, NSSF Tier I/II, SHA, Housing Levy & eTIMS protocols</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">M-Pesa 2.0</div>
        <div class="stat-title">Daraja Integration Switch</div>
        <div class="stat-subtitle">STK Push express, C2B, and automated B2C batch payouts</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">Long-Term</div>
        <div class="stat-title">Engineering Stewardship</div>
        <div class="stat-subtitle">Contractual SLAs, code escrow, and complete IP ownership</div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     03 — THE PROBLEM VS 04 — THE QUANTYX SOLUTION
     ══════════════════════════════════════════════════════════════════ -->
<section class="section">
  <div class="container">
    <div class="section-header center reveal">
      <div class="eyebrow">The Operational Challenge</div>
      <h2 class="section-title">
        Why Off-The-Shelf Software Breaks Down Under <span class="text-cyan">African Realities</span>
      </h2>
      <p class="section-desc">
        Fast-growing businesses outgrow manual spreadsheets quickly, but generic overseas SaaS platforms fail to handle local statutory taxes, intermittent mobile money webhooks, and local operational workflows.
      </p>
    </div>

    <div class="problem-solution-grid reveal-stagger">
      <!-- The Problem Column -->
      <div class="ps-column problem">
        <div class="ps-header">
          <span class="ps-badge">The Reality Without Quantyx</span>
          <h3>Disconnected Operational Chaos</h3>
        </div>
        <div class="ps-items-list">
          <div class="ps-item">
            <div class="ps-item-icon">✕</div>
            <div class="ps-item-text">
              <strong>Statutory Tax Non-Compliance & Heavy Penalties</strong>
              <p>Foreign payroll systems do not account for retroactive KRA tax changes, Tiered NSSF, Housing Levy, or new SHA deductions — risking massive compliance fines.</p>
            </div>
          </div>
          <div class="ps-item">
            <div class="ps-item-icon">✕</div>
            <div class="ps-item-text">
              <strong>Unreconciled M-Pesa & Dropped Payment Callbacks</strong>
              <p>Basic payment plugins drop webhook notifications during peak traffic, leaving finance teams to spend days manually checking bank and Daraja statements.</p>
            </div>
          </div>
          <div class="ps-item">
            <div class="ps-item-icon">✕</div>
            <div class="ps-item-text">
              <strong>Isolated Data Silos & Blind Spots</strong>
              <p>Inventory in one system, sales in another, patient records on paper, and payroll in Excel. Executive management has zero real-time consolidated visibility.</p>
            </div>
          </div>
          <div class="ps-item">
            <div class="ps-item-icon">✕</div>
            <div class="ps-item-text">
              <strong>Ghost Inventory & Field Worker Disconnect</strong>
              <p>Unmonitored multi-location transfers create stock shrinkage, while field engineers operate without verified digital milestones or customer sign-offs.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- The Solution Column -->
      <div class="ps-column solution">
        <div class="ps-header">
          <span class="ps-badge">The Quantyx Engineering Solution</span>
          <h3>Unified, Auditable Digital Architecture</h3>
        </div>
        <div class="ps-items-list">
          <div class="ps-item">
            <div class="ps-item-icon">✓</div>
            <div class="ps-item-text">
              <strong>Kenyan Compliance Baked Into the Database Engine</strong>
              <p>Every calculation adheres to current statutory mandates: KRA PAYE tax bands, personal reliefs, NSSF limits, SHA levies, and eTIMS cryptographic QR signing.</p>
            </div>
          </div>
          <div class="ps-item">
            <div class="ps-item-icon">✓</div>
            <div class="ps-item-text">
              <strong>Idempotent Daraja 2.0 Real-Time Reconciliation</strong>
              <p>Fail-safe webhook architecture with asynchronous queues, automated retry loops, and zero double-crediting — reconciling collections and payouts reliably.</p>
            </div>
          </div>
          <div class="ps-item">
            <div class="ps-item-icon">✓</div>
            <div class="ps-item-text">
              <strong>Unified Operations on a Single-Source Ledger</strong>
              <p>Clinical EMR, multi-warehouse inventory, and microfinance accounting synced live across branches with role-based permissions and complete audit trails.</p>
            </div>
          </div>
          <div class="ps-item">
            <div class="ps-item-icon">✓</div>
            <div class="ps-item-text">
              <strong>Autonomous Mobile & WhatsApp AI Integration</strong>
              <p>Meet customers and staff where they already are — from 24/7 WhatsApp AI triage bots to offline-capable PWAs with GPS and digital sign-off verification.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     04 — SYSTEM ARCHITECTURE FLOW DIAGRAM (VISUAL PROOF OF RIGOR)
     ══════════════════════════════════════════════════════════════════ -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="arch-diagram-wrap reveal">
      <div class="eyebrow">SYSTEM TOPOLOGY</div>
      <h2 style="font-size: 2.1rem; margin-bottom: 12px;">
        How Our Digital Systems <span class="text-cyan">Integrate & Scale</span>
      </h2>
      <p style="color: var(--text-secondary); max-width: 720px; font-size: 1.05rem;">
        Every system engineered by Quantyx follows strict separation of concerns, secure perimeter validation, and resilient asynchronous message brokers.
      </p>

      <div class="topology-visual-card">
        <div class="topology-image-frame">
          <img src="<?= asset('images/visual/topology-stack.jpg') ?>" alt="Quantyx 5-Layer System Topology" loading="lazy" />
        </div>
        <div class="topology-layers-list">
          <div class="topology-layer-row">
            <span class="topology-layer-tag">L01</span>
            <div class="topology-layer-content">
              <strong>Client & Edge Touchpoints</strong>
              <span>Flutter Mobile, Web Portal, WhatsApp Cloud API, Barcode Scanners</span>
            </div>
          </div>
          <div class="topology-layer-row">
            <span class="topology-layer-tag">L02</span>
            <div class="topology-layer-content">
              <strong>Security & Perimeter Gateway</strong>
              <span>TLS 1.3, Rate Limiting, RBAC Authorization, Parameter Sanitization</span>
            </div>
          </div>
          <div class="topology-layer-row">
            <span class="topology-layer-tag">L03</span>
            <div class="topology-layer-content">
              <strong>Core Business Logic Engines</strong>
              <span>KRA Statutory Rules, Clinical EMR Pathways, Loan Amortization</span>
            </div>
          </div>
          <div class="topology-layer-row">
            <span class="topology-layer-tag">L04</span>
            <div class="topology-layer-content">
              <strong>Payment & Fiscal Rails Switch</strong>
              <span>Daraja 2.0 Webhook Queue, KRA eTIMS VSCU, Bank EFT Switches</span>
            </div>
          </div>
          <div class="topology-layer-row">
            <span class="topology-layer-tag">L05</span>
            <div class="topology-layer-content">
              <strong>Data Persistence & Telemetry</strong>
              <span>MySQL ACID Transactions, Redis Cache, Immutable Audit Trails</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     05 — CORE ENGINEERING CAPABILITIES
     ══════════════════════════════════════════════════════════════════ -->
<section class="section" id="capabilities">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">Engineering Capabilities</div>
      <h2 class="section-title">
        Systems Built for <span class="text-cyan">Real Operational Scale</span>
      </h2>
      <p class="section-desc">
        We do not assemble cookie-cutter website templates. We architect resilient software, high-throughput APIs, and intelligent data systems that ambitious organizations rely on every day.
      </p>
    </div>

    <div class="services-grid reveal-stagger">
      <?php foreach (array_slice($services, 0, 6) as $s): ?>
        <div class="service-card">
          <div class="service-icon-wrap">
            <?= q_icon($s['icon'], '', 24) ?>
          </div>
          <h3 class="service-title"><?= htmlspecialchars($s['title']) ?></h3>
          <p class="service-sub"><?= htmlspecialchars($s['desc']) ?></p>
          <ul class="service-items">
            <?php foreach (array_slice($s['deliverables'], 0, 3) as $d): ?>
              <li class="service-item">
                <span class="dot"></span>
                <span><?= htmlspecialchars($d) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?= url('services') ?>#<?= htmlspecialchars($s['id']) ?>" class="service-link">
            Explore Architecture Approach &rarr;
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align: center; margin-top: 48px;" class="reveal">
      <a href="<?= url('services') ?>" class="btn btn-secondary">
        View All 8 Engineering Capabilities & Deliverables
        <?= q_icon('arrow-right', '', 14) ?>
      </a>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     06 — FEATURED PRODUCTS SHOWCASE
     ══════════════════════════════════════════════════════════════════ -->
<section class="section section-alt section-border" id="products">
  <div class="container">
    <div class="section-header center reveal">
      <div class="eyebrow">Proprietary Software Systems</div>
      <h2 class="section-title">
        Platforms <span class="text-gradient">Engineered by Quantyx</span>
      </h2>
      <p class="section-desc">
        We do not just talk about code — we have architected full software platforms across payroll, healthtech, microfinance, and supply chain logistics.
      </p>
    </div>

    <!-- Product Switcher Tabs -->
    <div class="products-tab-nav reveal">
      <button class="tab-btn active" data-target="panel-pearlpay" type="button">
        <span class="tab-dot" style="background: var(--cyan);"></span>
        Pearl Pay HRMS
      </button>
      <button class="tab-btn" data-target="panel-healthpoint" type="button">
        <span class="tab-dot" style="background: var(--emerald);"></span>
        Health Point HMS
      </button>
      <button class="tab-btn" data-target="panel-healthbot" type="button">
        <span class="tab-dot" style="background: var(--electric-blue);"></span>
        Health Point AI Bot
      </button>
      <button class="tab-btn" data-target="panel-quantyxls" type="button">
        <span class="tab-dot" style="background: var(--cyan);"></span>
        QuantyxLS Microfinance
      </button>
      <button class="tab-btn" data-target="panel-stockcounter" type="button">
        <span class="tab-dot" style="background: var(--cyan);"></span>
        Stock Counter / Inventory
      </button>
      <button class="tab-btn" data-target="panel-sortie" type="button">
        <span class="tab-dot" style="background: var(--electric-blue);"></span>
        Digital Sortie
      </button>
      <button class="tab-btn" data-target="panel-quantpay" type="button">
        <span class="tab-dot" style="background: var(--cyan);"></span>
        Quantpay Switch
      </button>
    </div>

    <!-- Tab Panels -->
    <?php foreach ($products as $id => $p): ?>
      <div class="tab-panel <?= $id === 'pearlpay' ? 'active' : '' ?>" id="panel-<?= $id ?>">
        <!-- Left: UI Architecture Mockup -->
        <div>
          <?php render_product_mockup($p['mockup']); ?>
        </div>

        <!-- Right: Technical Breakdown & Capabilities -->
        <div class="product-detail-card">
          <div class="product-pill" style="color: <?= $p['color'] ?>; background: rgba(255,255,255,0.03);">
            <?= htmlspecialchars($p['badge']) ?>
          </div>
          <h3 class="product-title"><?= htmlspecialchars($p['title']) ?></h3>
          <div class="product-tagline"><?= htmlspecialchars($p['tagline']) ?></div>
          <p class="product-desc"><?= htmlspecialchars($p['desc']) ?></p>

          <ul class="product-features-list">
            <?php foreach ($p['features'] as $f): ?>
              <li class="product-feature-item">
                <span class="icon-check"><?= q_icon('check', '', 18) ?></span>
                <span><?= htmlspecialchars($f) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>

          <div class="product-tech-badges">
            <?php foreach ($p['tech'] as $t): ?>
              <span class="tech-tag"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>

          <div style="display: flex; gap: 14px; flex-wrap: wrap;">
            <a href="<?= url('contact') ?>?product=<?= urlencode($p['title']) ?>" class="btn btn-primary btn-sm">
              Request Platform Consultation &rarr;
            </a>
            <a href="<?= url('products') ?>#<?= $id ?>" class="btn btn-secondary btn-sm">
              Explore Full Technical Specs
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     07 — STRATEGIC SECTOR SOLUTIONS
     ══════════════════════════════════════════════════════════════════ -->
<section class="section" id="industries">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">Strategic Focus</div>
      <h2 class="section-title">
        Industries Where We Have <span class="text-cyan">Deep Domain Expertise</span>
      </h2>
      <p class="section-desc">
        We understand healthcare clinical workflows, SACCO loan risk metrics, Kenyan tax law changes, and FMCG supply chain distribution.
      </p>
    </div>

    <div class="industries-grid reveal">
      <?php 
      $sector_img_map = [
        'healthcare' => 'images/visual/sector-healthcare.jpg',
        'fintech'    => 'images/visual/sector-finance.jpg',
        'retail'     => 'images/visual/sector-public.jpg',
        'logistics'  => 'images/visual/sector-agri.jpg',
        'agriculture'=> 'images/visual/sector-agri.jpg',
        'enterprise-sme' => 'images/visual/sector-public.jpg'
      ];
      foreach ($industries as $ind): 
        $img_src = $sector_img_map[$ind['id']] ?? 'images/visual/sector-public.jpg';
      ?>
        <div class="sector-visual-card">
          <div class="sector-media-wrap">
            <span class="sector-badge-overlay"><?= htmlspecialchars(explode(' ', $ind['title'])[0]) ?></span>
            <img src="<?= asset($img_src) ?>" alt="<?= htmlspecialchars($ind['title']) ?>" loading="lazy" />
          </div>
          <div class="sector-card-body">
            <h3 class="industry-title"><?= htmlspecialchars($ind['title']) ?></h3>
            <div class="industry-headline"><?= htmlspecialchars($ind['headline']) ?></div>
            <p class="industry-desc"><?= htmlspecialchars($ind['desc']) ?></p>

            <ul class="industry-systems-list">
              <?php foreach ($ind['systems'] as $sys): ?>
                <li class="industry-system-item">
                  <span class="dot"></span>
                  <span><?= htmlspecialchars($sys) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     08 — HOW WE WORK / 6-STEP ENGINEERING LIFECYCLE
     ══════════════════════════════════════════════════════════════════ -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="section-header center reveal">
      <div class="eyebrow">Our Methodology</div>
      <h2 class="section-title">
        Structured, Predictable <span class="text-gradient">Engineering Delivery</span>
      </h2>
      <p class="section-desc">
        Every system advances through structured architectural gates before touching a production database.
      </p>
    </div>

    <div class="process-grid reveal-stagger">
      <div class="process-card">
        <div class="process-step-num">PHASE 01</div>
        <h3 class="process-title">Domain Discovery & Systems Audit</h3>
        <p class="process-desc">
          We deeply examine your operational friction points, existing spreadsheet models, third-party dependencies, and compliance mandates.
        </p>
      </div>

      <div class="process-card">
        <div class="process-step-num">PHASE 02</div>
        <h3 class="process-title">Architecture & Database Schema</h3>
        <p class="process-desc">
          We model your database relationships, transactional boundaries, API contracts, security layers, and data validation rules from first principles.
        </p>
      </div>

      <div class="process-card">
        <div class="process-step-num">PHASE 03</div>
        <h3 class="process-title">Iterative Engineering Sprints</h3>
        <p class="process-desc">
          Clean, modular code engineered in bi-weekly increments. You test functioning staging environments with real data rather than static wireframes.
        </p>
      </div>

      <div class="process-card">
        <div class="process-step-num">PHASE 04</div>
        <h3 class="process-title">API & Compliance Integration</h3>
        <p class="process-desc">
          Testing M-Pesa Daraja callbacks, KRA eTIMS fiscal signing, bank file generation, and biometric hardware connections with edge-case validation.
        </p>
      </div>

      <div class="process-card">
        <div class="process-step-num">PHASE 05</div>
        <h3 class="process-title">Deployment & Staff Onboarding</h3>
        <p class="process-desc">
          Zero-downtime database migrations, automated backup pipelines, staff workflow training, and production cutover.
        </p>
      </div>

      <div class="process-card">
        <div class="process-step-num">PHASE 06</div>
        <h3 class="process-title">Contractual SLA & Iteration</h3>
        <p class="process-desc">
          Ongoing performance monitoring, rapid escalation support, annual KRA statutory updates, and continuous feature expansion as you scale.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     09 — SELECTED PRODUCTION WORK / CASE STUDIES
     ══════════════════════════════════════════════════════════════════ -->
<section class="section" id="work">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">Production Architectures</div>
      <h2 class="section-title">
        Real Systems. <span class="text-cyan">Tested Business Capabilities.</span>
      </h2>
      <p class="section-desc">
        Explore how our engineered platforms solve statutory compliance, medical logistics, and microfinance challenges across Kenya.
      </p>
    </div>

    <div class="work-grid reveal">
      <?php foreach (array_slice($case_studies, 0, 2) as $index => $cs): ?>
        <div class="work-card <?= $index % 2 === 1 ? 'reverse' : '' ?>">
          <div>
            <span class="work-badge"><?= htmlspecialchars($cs['badge']) ?> &middot; <?= htmlspecialchars($cs['industry']) ?></span>
            <h3 class="work-title"><?= htmlspecialchars($cs['client']) ?></h3>
            
            <div class="work-challenge">
              <strong style="color: #F8FAFC;">Operational Challenge:</strong>
              <p><?= htmlspecialchars($cs['challenge']) ?></p>
            </div>

            <div class="work-solution">
              <strong style="color: var(--cyan);">Quantyx Solution:</strong>
              <p><?= htmlspecialchars($cs['solution']) ?></p>
            </div>

            <div style="margin-top: 20px;">
              <strong style="color: var(--emerald); display: block; margin-bottom: 4px; font-size: 0.95rem;">Delivered Result:</strong>
              <p style="font-size: 0.925rem; color: var(--text-secondary);"><?= htmlspecialchars($cs['outcome']) ?></p>
            </div>
          </div>

          <div>
            <?php 
              $mockup_key = ($cs['slug'] === 'pearl-pay-hrms') ? 'pearlpay' : 'healthpoint';
              render_product_mockup($mockup_key); 
            ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align: center; margin-top: 48px;" class="reveal">
      <a href="<?= url('work') ?>" class="btn btn-secondary">
        View All Case Studies & System Architectures
        <?= q_icon('arrow-right', '', 14) ?>
      </a>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     10 — WHY QUANTYX LABS (DIFFERENTIATORS)
     ══════════════════════════════════════════════════════════════════ -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="section-header center reveal">
      <div class="eyebrow">The Quantyx Differentiator</div>
      <h2 class="section-title">
        Why Forward-Thinking Enterprises <span class="text-gradient">Choose Quantyx</span>
      </h2>
      <p class="section-desc">
        We bridge the gap between high-level architectural craftsmanship and the practical realities of doing business in Africa.
      </p>
    </div>

    <div class="services-grid reveal">
      <div class="service-card">
        <div class="service-icon-wrap" style="color: var(--cyan);">
          <?= q_icon('shield-check', '', 24) ?>
        </div>
        <h3 class="service-title">African Compliance Native</h3>
        <p class="service-sub">
          We don’t bolt on Kenyan statutory tax or Daraja payment logic as an afterthought. Our data architectures are designed around KRA, NSSF, SHA, and CBK regulatory requirements from day one.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap" style="color: var(--emerald);">
          <?= q_icon('server-stack', '', 24) ?>
        </div>
        <h3 class="service-title">Complete IP Ownership</h3>
        <p class="service-sub">
          When we build custom software for your enterprise, you own 100% of the intellectual property, database schemas, and codebase. No artificial vendor lock-in or licensing hostage tactics.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap" style="color: var(--electric-blue);">
          <?= q_icon('cpu-chip', '', 24) ?>
        </div>
        <h3 class="service-title">Pragmatic AI & Automation</h3>
        <p class="service-sub">
          We implement practical artificial intelligence that eliminates real human bottlenecks — such as conversational WhatsApp bots for clinic appointments and automated invoice OCR parsers.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     11 — TECHNOLOGY ECOSYSTEM & INTEGRATIONS
     ══════════════════════════════════════════════════════════════════ -->
<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">Enterprise Stack</div>
      <h2 class="section-title">
        Modern, Battle-Tested <span class="text-cyan">Technology Ecosystem</span>
      </h2>
      <p class="section-desc">
        We choose robust, high-performance technologies with strong security track records, active global maintenance, and low operational overhead.
      </p>
    </div>

    <div class="tech-grid reveal">
      <div class="tech-category-card">
        <div class="tech-cat-title">Backend & Core Logic</div>
        <div class="tech-items-wrap">
          <span class="tech-pill">PHP 8.2 / 8.3</span>
          <span class="tech-pill">Python Core</span>
          <span class="tech-pill">Node.js / Express</span>
          <span class="tech-pill">RESTful APIs</span>
          <span class="tech-pill">GraphQL</span>
        </div>
      </div>

      <div class="tech-category-card">
        <div class="tech-cat-title">Databases & Caching</div>
        <div class="tech-items-wrap">
          <span class="tech-pill">MySQL (InnoDB / PDO)</span>
          <span class="tech-pill">PostgreSQL</span>
          <span class="tech-pill">Redis In-Memory</span>
          <span class="tech-pill">Elasticsearch</span>
          <span class="tech-pill">Automated Backups</span>
        </div>
      </div>

      <div class="tech-category-card">
        <div class="tech-cat-title">Payments & Regulators</div>
        <div class="tech-items-wrap">
          <span class="tech-pill">Safaricom Daraja 2.0</span>
          <span class="tech-pill">KRA eTIMS / VSCU</span>
          <span class="tech-pill">Pesalink Bank Switch</span>
          <span class="tech-pill">WhatsApp Cloud API</span>
          <span class="tech-pill">SHA / NHIF Gateways</span>
        </div>
      </div>

      <div class="tech-category-card">
        <div class="tech-cat-title">Cloud, Mobile & Security</div>
        <div class="tech-items-wrap">
          <span class="tech-pill">Flutter Mobile</span>
          <span class="tech-pill">Progressive Web Apps</span>
          <span class="tech-pill">Docker Containers</span>
          <span class="tech-pill">Linux Hardening</span>
          <span class="tech-pill">AES-256 Encryption</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     12 — HIGH-CONVERTING CTA BANNER
     ══════════════════════════════════════════════════════════════════ -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>