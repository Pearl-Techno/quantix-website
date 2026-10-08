<?php
/**
 * Quantyx Labs — Reusable High-Converting CTA Banner
 * ---------------------------------------------------
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';
?>
<section class="section">
  <div class="container">
    <div class="cta-banner-wrapper reveal">
      <img src="<?= asset('images/visual/cta-fiber.jpg') ?>" alt="Quantyx Infrastructure Fiber Optic" class="cta-visual-bg" loading="lazy" />
      <div class="eyebrow" style="background: rgba(0, 212, 255, 0.1); margin-bottom: 20px;">
        <span class="live-indicator"></span>
        Ready to Build Mission-Critical Infrastructure?
      </div>
      <h2 class="cta-banner-title">
        Have a System That Needs to Be <span class="text-cyan">Engineered?</span>
      </h2>
      <p class="cta-banner-desc">
        Whether you are replacing fragmented legacy software, unifying multiple branches under an ERP, or integrating M-Pesa and KRA compliance, we build digital systems that give you permanent operational leverage.
      </p>

      <div class="cta-banner-actions">
        <a href="<?= url('contact') ?>" class="btn btn-primary">
          Start a Project
          <?= q_icon('arrow-right', '', 16) ?>
        </a>
        <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="btn btn-whatsapp" target="_blank" rel="noopener">
          <?= q_icon('whatsapp', '', 18) ?>
          Direct Technical WhatsApp
        </a>
      </div>

      <div class="cta-contact-chips">
        <a href="mailto:<?= htmlspecialchars($company['email']) ?>" class="cta-chip">
          <?= q_icon('mail', '', 14) ?>
          <?= htmlspecialchars($company['email']) ?>
        </a>
        <a href="tel:<?= htmlspecialchars($company['phone_clean']) ?>" class="cta-chip">
          <?= q_icon('phone', '', 14) ?>
          <?= htmlspecialchars($company['phone']) ?>
        </a>
        <span class="cta-chip">
          <?= q_icon('map-pin', '', 14) ?>
          <?= htmlspecialchars($company['location']) ?>
        </span>
      </div>
    </div>
  </div>
</section>

