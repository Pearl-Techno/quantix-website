<?php
/**
 * Quantyx Labs — Case Studies & Production Systems
 * ------------------------------------------------
 */
$page_title = 'Production Case Studies & Systems Portfolio';
$page_desc = 'Explore mission-critical software systems designed, built, and deployed by Quantyx Labs across healthcare, financial services, statutory payroll, and field operations.';
$current_page = 'work';
$canonical_slug = 'work';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/mockups.php';
?>

<!-- Work Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="live-indicator"></span>
        <span>Case Studies &middot; Measured Production Outcomes</span>
      </div>
      <h1 class="page-hero-title">
        We Don't Just Talk About Technology.<br>
        <span class="text-cyan">We Build Real Systems.</span>
      </h1>
      <p class="page-hero-desc">
        Examine the architecture, technical implementations, and real business results delivered across our portfolio of deployed enterprise software.
      </p>
    </div>
  </div>
</section>

<!-- Case Studies List -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="work-grid">
      <?php foreach ($case_studies as $idx => $cs): ?>
        <div class="work-card <?= $idx % 2 === 1 ? 'reverse' : '' ?> reveal" id="<?= htmlspecialchars($cs['slug']) ?>">
          <div>
            <div class="work-badge">
              <?= htmlspecialchars($cs['badge']) ?> &middot; <?= htmlspecialchars($cs['industry']) ?>
            </div>
            <h2 class="work-title"><?= htmlspecialchars($cs['client']) ?></h2>

            <div class="callout-problem">
              <span class="callout-problem-label">The Operational Bottleneck</span>
              <p><?= htmlspecialchars($cs['challenge']) ?></p>
            </div>

            <div class="callout-solution">
              <span class="callout-solution-label">The Quantyx Engineering Solution</span>
              <p><?= htmlspecialchars($cs['solution']) ?></p>
            </div>

            <div style="font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); margin-bottom: 10px;">
              Production Tech Stack:
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 24px;">
              <?php foreach ($cs['tech_stack'] as $tech): ?>
                <span class="tech-tag"><?= htmlspecialchars($tech) ?></span>
              <?php endforeach; ?>
            </div>

            <div style="margin-bottom: 22px; padding: 14px 16px; background: rgba(0, 212, 255, 0.04); border: 1px solid rgba(0, 212, 255, 0.15); border-radius: 8px;">
              <strong style="color: var(--cyan); display: block; margin-bottom: 4px; font-size: 0.825rem; font-family: var(--font-mono); text-transform: uppercase; letter-spacing: 0.05em;">Delivered Capability:</strong>
              <p style="font-size: 0.925rem; color: var(--text-secondary); line-height: 1.6; margin: 0;"><?= htmlspecialchars($cs['outcome']) ?></p>
            </div>

            <?php if (!empty($cs['kpis'])): ?>
              <div class="work-kpis-grid">
                <?php foreach ($cs['kpis'] as $k): ?>
                  <div class="work-kpi-item">
                    <div class="kpi-val"><?= htmlspecialchars($k['value']) ?></div>
                    <div class="kpi-lbl"><?= htmlspecialchars($k['label']) ?></div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div style="margin-top: 28px;">
              <a href="<?= url('contact') ?>?project=<?= urlencode($cs['client']) ?>" class="btn btn-primary btn-sm">
                Discuss Similar Architecture &rarr;
              </a>
            </div>
          </div>

          <div>
            <?php 
              $mockup_map = [
                  'pearl-pay-hrms'          => 'pearlpay',
                  'healthpoint-hms'         => 'healthpoint',
                  'quantyxls-lending'       => 'quantyxls',
                  'digital-sortie-dispatch' => 'sortie'
              ];
              render_product_mockup($mockup_map[$cs['slug']] ?? 'pearlpay');
            ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Reusable CTA Banner -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

