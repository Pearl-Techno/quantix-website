<?php
/**
 * Quantyx Labs — Proprietary Product Portfolio
 * ---------------------------------------------
 */
$page_title = 'Proprietary Software Products';
$page_desc = 'Explore proprietary enterprise software engineered by Quantyx Labs: Pearl Pay HRMS, Health Point HMS, QuantyxLS Microfinance, Stock Counter, Digital Sortie, and Quantpay.';
$current_page = 'products';
$canonical_slug = 'products';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/mockups.php';
?>

<!-- Products Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="live-indicator"></span>
        <span>Proprietary Software Systems &middot; Ready for Deployment</span>
      </div>
      <h1 class="page-hero-title">
        Enterprise Products Built for <br>
        <span class="text-cyan">Immediate Operational Value.</span>
      </h1>
      <p class="page-hero-desc">
        These are not conceptual prototypes or templates. Every platform in our suite is an active, production-grade system engineered by Quantyx Labs to solve complex statutory, clinical, financial, and logistics challenges.
      </p>
    </div>
  </div>
</section>

<!-- Detailed Product Sections -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="work-grid">
      <?php $p_idx = 0; foreach ($products as $id => $p): $p_idx++; ?>
        <div class="work-card <?= $p_idx % 2 === 0 ? 'reverse' : '' ?> reveal" id="<?= htmlspecialchars($id) ?>">
          <div>
            <div class="work-badge">
              <?= htmlspecialchars($p['badge']) ?>
            </div>
            <h2 class="work-title"><?= htmlspecialchars($p['title']) ?></h2>
            <div style="font-size: 1.05rem; color: var(--cyan); font-weight: 500; margin-bottom: 18px;">
              <?= htmlspecialchars($p['tagline']) ?>
            </div>
            <p style="margin-bottom: 20px; font-size: 0.98rem; line-height: 1.68; color: var(--text-secondary);">
              <?= htmlspecialchars($p['desc']) ?>
            </p>

            <div class="callout-problem">
              <span class="callout-problem-label">Problem It Eliminates</span>
              <p><?= htmlspecialchars($p['problem']) ?></p>
            </div>

            <h4 style="font-family: var(--font-mono); font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-primary); margin-bottom: 12px;">
              Key Capabilities:
            </h4>
            <ul class="feature-list">
              <?php foreach ($p['features'] as $f): ?>
                <li class="feature-item">
                  <span class="feature-item-icon"><?= q_icon('check', '', 16) ?></span>
                  <span><?= htmlspecialchars($f) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>

            <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 28px;">
              <?php foreach ($p['tech'] as $t): ?>
                <span class="tech-tag"><?= htmlspecialchars($t) ?></span>
              <?php endforeach; ?>
            </div>

            <div style="display: flex; gap: 14px; flex-wrap: wrap;">
              <a href="<?= url('contact') ?>?product=<?= urlencode($p['title']) ?>" class="btn btn-primary btn-sm">
                Request Live Demo &amp; Deployment
                <?= q_icon('arrow-right', '', 14) ?>
              </a>
              <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="btn btn-secondary btn-sm" target="_blank" rel="noopener">
                <?= q_icon('whatsapp', '', 14) ?>
                Technical Inquiry via WhatsApp
              </a>
            </div>
          </div>

          <div>
            <?php render_product_mockup($p['mockup']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Reusable CTA Banner -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

