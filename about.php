<?php
/**
 * Quantyx Labs — About Us & Engineering Culture
 * ----------------------------------------------
 */
$page_title = 'About Quantyx Labs — Engineering Africa’s Digital Infrastructure';
$page_desc = 'Learn about Quantyx Labs: A serious technology company based in Nairobi, Kenya, engineering mission-critical digital systems, compliant payroll, healthcare platforms, and financial software.';
$current_page = 'about';
$canonical_slug = 'about';

require_once __DIR__ . '/includes/header.php';
?>

<!-- About Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="code">[ ABOUT QUANTYX ]</span>
        <span class="live-indicator"></span>
        <span>Systems Engineering &middot; Nairobi, Kenya</span>
      </div>
      <h1 class="page-hero-title">
        Building the Practical Digital Foundations <br>
        <span class="text-cyan">Behind African Commerce.</span>
      </h1>
      <p class="page-hero-desc">
        Quantyx Labs was founded with a clear thesis: African enterprises do not need more superficial templates or fragile overseas SaaS that breaks under local tax laws and payment rails. They need robust, compliant, intelligent digital systems engineered for long-term operational scale.
      </p>
    </div>
  </div>
</section>

<!-- Mission & Vision Cards -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="problem-solution-grid reveal-stagger" style="margin-bottom: 72px;">
      <div class="ps-column solution">
        <div class="eyebrow" style="margin-bottom: 14px;">OUR MISSION</div>
        <h2 style="font-size: 1.85rem; margin-bottom: 16px; color: #FFFFFF; font-weight: 700; letter-spacing: -0.02em;">
          To engineer reliable, intelligent digital systems that give African organizations lasting operational leverage.
        </h2>
        <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-secondary);">
          We eliminate manual spreadsheet chaos, tax compliance risks, and fragmented software tools by building custom enterprise platforms, statutory payroll engines, clinical health systems, and high-velocity payment switches.
        </p>
      </div>

      <div class="ps-column solution">
        <div class="eyebrow" style="margin-bottom: 14px;">OUR VISION</div>
        <h2 style="font-size: 1.85rem; margin-bottom: 16px; color: #FFFFFF; font-weight: 700; letter-spacing: -0.02em;">
          To be Africa’s most trusted engineering partner for mission-critical software and digital infrastructure.
        </h2>
        <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-secondary);">
          We envision a continent where hospitals operate without lost paper folders, businesses disburse payroll with 100% regulatory accuracy, and credit institutions run instantaneous M-Pesa reconciliations.
        </p>
      </div>
    </div>

    <!-- Core Engineering Principles -->
    <div class="section-header reveal">
      <div class="eyebrow">Guiding Values</div>
      <h2 class="section-title">Our Engineering Principles</h2>
      <p class="section-desc">
        How we approach system architecture, client partnerships, and software longevity.
      </p>
    </div>

    <div class="services-grid reveal-stagger">
      <div class="service-card">
        <div class="service-icon-wrap">
          <?= q_icon('code-bracket', '', 24) ?>
        </div>
        <h3 class="service-title">Pragmatic Craftsmanship</h3>
        <p class="service-sub">
          We prioritize clean code, resilient database schemas, and observable system logs over ephemeral tech fads. Systems engineered by Quantyx are built to run reliably for decades.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap">
          <?= q_icon('shield-check', '', 24) ?>
        </div>
        <h3 class="service-title">African Compliance Native</h3>
        <p class="service-sub">
          Kenyan tax laws (PAYE, NSSF, SHA, Housing Levy) and payment rails (Daraja 2.0, eTIMS) are not afterthoughts. They are foundational requirements modeled into the core relational schema.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap">
          <?= q_icon('lock-closed', '', 24) ?>
        </div>
        <h3 class="service-title">Uncompromising Security</h3>
        <p class="service-sub">
          Aligned with the Kenya Data Protection Act 2019, our systems incorporate strict parameter binding, encrypted database columns for PII, role-based permissions, and immutable audit logs.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap">
          <?= q_icon('building-office', '', 24) ?>
        </div>
        <h3 class="service-title">100% Client IP Ownership</h3>
        <p class="service-sub">
          You own your database, application code, and intellectual property. We provide thorough technical documentation and clean architectural diagrams with zero vendor lock-in.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap">
          <?= q_icon('arrows-right-left', '', 24) ?>
        </div>
        <h3 class="service-title">Interoperability by Design</h3>
        <p class="service-sub">
          We build software that communicates seamlessly with existing ERPs, accounting platforms (Tally, QuickBooks), biometric time clocks, and government REST endpoints.
        </p>
      </div>

      <div class="service-card">
        <div class="service-icon-wrap">
          <?= q_icon('server-stack', '', 24) ?>
        </div>
        <h3 class="service-title">Long-Term Stewardship</h3>
        <p class="service-sub">
          We remain your engineering partner long after launch — providing guaranteed response time SLAs, regulatory statutory patch releases, and continuous performance tuning.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Reusable CTA Banner -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

