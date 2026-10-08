<?php
/**
 * Quantyx Labs — Services & Engineering Capabilities
 * ---------------------------------------------------
 */
$page_title = 'Services & Engineering Capabilities';
$page_desc = 'Outcome-focused engineering services: Custom enterprise software, systems integration, M-Pesa Daraja payment switches, KRA eTIMS fiscalization, AI automation, and cloud architecture.';
$current_page = 'services';
$canonical_slug = 'services';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Services Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="live-indicator"></span>
        <span>Enterprise Engineering &middot; Production Capabilities</span>
      </div>
      <h1 class="page-hero-title">
        Enterprise Systems Engineered for <br>
        <span class="text-cyan">Permanent Operational Leverage.</span>
      </h1>
      <p class="page-hero-desc">
        We design, engineer, and maintain mission-critical software systems that eliminate manual bottlenecks, guarantee Kenyan statutory compliance, and integrate effortlessly with payment rails and government portals.
      </p>
    </div>
  </div>
</section>

<!-- Services Detailed Grid -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="work-grid">
      <?php foreach ($services as $index => $s): ?>
        <div class="work-card <?= $index % 2 === 1 ? 'reverse' : '' ?> reveal" id="<?= htmlspecialchars($s['id']) ?>">
          <div>
            <div class="work-badge">CAPABILITY 0<?= $index + 1 ?> &middot; <?= htmlspecialchars($s['id']) ?></div>
            <h2 class="work-title"><?= htmlspecialchars($s['title']) ?></h2>
            <p style="font-size: 1.05rem; color: var(--cyan); font-weight: 500; margin-bottom: 16px;">
              <?= htmlspecialchars($s['subtitle']) ?>
            </p>
            <p style="margin-bottom: 24px; font-size: 0.98rem; line-height: 1.68; color: var(--text-secondary);">
              <?= htmlspecialchars($s['desc']) ?>
            </p>

            <h4 style="font-family: var(--font-mono); font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-primary); margin-bottom: 14px;">
              Key Engineering Deliverables:
            </h4>
            <ul class="feature-list">
              <?php foreach ($s['deliverables'] as $del): ?>
                <li class="feature-item">
                  <span class="feature-item-icon"><?= q_icon('check', '', 16) ?></span>
                  <span><?= htmlspecialchars($del) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>

            <div style="display: flex; gap: 14px; flex-wrap: wrap;">
              <a href="<?= url('contact') ?>?service=<?= urlencode($s['title']) ?>" class="btn btn-primary btn-sm">
                Discuss This Capability
                <?= q_icon('arrow-right', '', 14) ?>
              </a>
              <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="btn btn-secondary btn-sm" target="_blank" rel="noopener">
                <?= q_icon('whatsapp', '', 14) ?>
                Technical Inquiry via WhatsApp
              </a>
            </div>
          </div>

          <div class="service-arch-panel">
            <div class="panel-icon-wrap">
              <?= q_icon($s['icon'], '', 26) ?>
            </div>
            <h3>Architecture & Security Standards</h3>
            <p>
              Every module is designed with idempotent transactions, strict parameter validation, role-based access control (RBAC), and comprehensive database query indexing for sub-second execution under peak load.
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
              <span class="tech-tag">Zero Vendor Lock-In</span>
              <span class="tech-tag">Full IP Handover</span>
              <span class="tech-tag">Audited SQL Queries</span>
              <span class="tech-tag">REST &amp; GraphQL Ready</span>
              <span class="tech-tag">Kenya Data Act 2019</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Reusable CTA Banner -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

