<?php
/**
 * Quantyx Labs — Strategic Industries
 * -----------------------------------
 */
$page_title = 'Industries & Sector Solutions';
$page_desc = 'Strategic technology solutions for African industries: Healthcare clinical systems, SACCO microfinance, retail FMCG distribution, transport logistics, and enterprise compliance.';
$current_page = 'industries';
$canonical_slug = 'industries';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Industries Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="code">[ INDUSTRIES ]</span>
        <span class="live-indicator"></span>
        <span>Sector-Specific Digital Systems</span>
      </div>
      <h1 class="page-hero-title">
        Digital Systems Calibrated for <br>
        <span class="text-cyan">African Industry Realities.</span>
      </h1>
      <p class="page-hero-desc">
        Every sector operates under distinct regulatory mandates, transaction velocities, and operational pressures. We build systems customized to the precise mechanics of your industry.
      </p>
    </div>
  </div>
</section>

<!-- Industries Deep Dive -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="industries-grid reveal-stagger">
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
        <div class="sector-visual-card" id="<?= htmlspecialchars($ind['id']) ?>">
          <div class="sector-media-wrap">
            <span class="sector-badge-overlay"><?= htmlspecialchars(explode(' ', $ind['title'])[0]) ?></span>
            <img src="<?= asset($img_src) ?>" alt="<?= htmlspecialchars($ind['title']) ?>" loading="lazy" />
          </div>
          <div class="sector-card-body">
            <h2 class="industry-title" style="font-size: 1.35rem;"><?= htmlspecialchars($ind['title']) ?></h2>
            <div class="industry-headline"><?= htmlspecialchars($ind['headline']) ?></div>
            <p class="industry-desc"><?= htmlspecialchars($ind['desc']) ?></p>

            <h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-primary); margin-bottom: 12px;">
              Systems We Engineer for This Sector:
            </h4>
            <ul class="industry-systems-list">
              <?php foreach ($ind['systems'] as $sys): ?>
                <li class="industry-system-item">
                  <span class="dot"></span>
                  <span><?= htmlspecialchars($sys) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>

            <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
              <a href="<?= url('contact') ?>?industry=<?= urlencode($ind['title']) ?>" class="service-link">
                Inquire for <?= htmlspecialchars(explode(' ', $ind['title'])[0]) ?> &rarr;
              </a>
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

