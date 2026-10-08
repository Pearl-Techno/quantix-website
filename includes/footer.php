<?php
/**
 * Quantyx Labs — Global Footer Template
 * --------------------------------------
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';
?>

<!-- Footer -->
<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-top">
      <!-- Brand & Mission Column -->
      <div class="footer-brand">
        <a href="<?= url() ?>" class="brand-link" aria-label="Quantyx Labs Homepage">
          <div class="brand-logo-mark">
            <img src="<?= asset($company['logo']) ?>" alt="Quantyx Labs Logo" width="32" height="32" loading="lazy"/>
          </div>
          <div class="brand-text">
            <span class="brand-name">Quantyx</span>
            <span class="brand-suffix">Labs</span>
          </div>
        </a>
        <p>
          A serious African technology company designing, engineering, and scaling intelligent digital systems, compliant payroll, healthcare platforms, and financial infrastructure.
        </p>
        <div style="margin-top: 20px;">
          <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="btn btn-whatsapp btn-sm" target="_blank" rel="noopener">
            <?= q_icon('whatsapp', '', 14) ?>
            WhatsApp Direct Chat
          </a>
        </div>
      </div>

      <!-- Solutions Column -->
      <div class="footer-col">
        <h4>Solutions</h4>
        <ul class="footer-links">
          <li><a href="<?= url('solutions') ?>">ERP & Core Operations</a></li>
          <li><a href="<?= url('solutions') ?>">Statutory Kenyan Payroll</a></li>
          <li><a href="<?= url('solutions') ?>">SACCO & Microfinance</a></li>
          <li><a href="<?= url('solutions') ?>">Hospital & Clinic EMR</a></li>
          <li><a href="<?= url('solutions') ?>">Warehouse & Stock Control</a></li>
          <li><a href="<?= url('solutions') ?>">Field Service Dispatch</a></li>
        </ul>
      </div>

      <!-- Products Column -->
      <div class="footer-col">
        <h4>Products</h4>
        <ul class="footer-links">
          <li><a href="<?= url('products') ?>#pearlpay">Pearl Pay HRMS</a></li>
          <li><a href="<?= url('products') ?>#healthpoint">Health Point HMS</a></li>
          <li><a href="<?= url('products') ?>#healthbot">Health Point AI Bot</a></li>
          <li><a href="<?= url('products') ?>#quantyxls">QuantyxLS Microfinance</a></li>
          <li><a href="<?= url('products') ?>#stockcounter">Stock Counter</a></li>
          <li><a href="<?= url('products') ?>#sortie">Digital Sortie</a></li>
          <li><a href="<?= url('products') ?>#quantpay">Quantpay Switch</a></li>
        </ul>
      </div>

      <!-- Capabilities Column -->
      <div class="footer-col">
        <h4>Services</h4>
        <ul class="footer-links">
          <li><a href="<?= url('services') ?>">Custom Software Engineering</a></li>
          <li><a href="<?= url('services') ?>">Enterprise Systems & ERP</a></li>
          <li><a href="<?= url('services') ?>">AI & Workflow Automation</a></li>
          <li><a href="<?= url('services') ?>">Systems Integration & APIs</a></li>
          <li><a href="<?= url('services') ?>">Fintech & Payment Rails</a></li>
          <li><a href="<?= url('services') ?>">Cloud Architecture & SLA</a></li>
        </ul>
      </div>

      <!-- Company & Contact Column -->
      <div class="footer-col">
        <h4>Company</h4>
        <ul class="footer-links">
          <li><a href="<?= url('about') ?>">About Quantyx Labs</a></li>
          <li><a href="<?= url('industries') ?>">Industries Served</a></li>
          <li><a href="<?= url('work') ?>">Production Case Studies</a></li>
          <li><a href="<?= url('contact') ?>">Start a Project</a></li>
          <li><a href="mailto:<?= htmlspecialchars($company['email']) ?>"><?= htmlspecialchars($company['email']) ?></a></li>
          <li><a href="tel:<?= htmlspecialchars($company['phone_clean']) ?>"><?= htmlspecialchars($company['phone']) ?></a></li>
        </ul>
      </div>
    </div>

    <!-- Footer Bottom Row -->
    <div class="footer-bottom">
      <div>
        &copy; <?= date('Y') ?> <?= htmlspecialchars($company['legal_name']) ?>. All rights reserved. &middot; <?= htmlspecialchars($company['location']) ?>
      </div>
      <div class="social-links">
        <a href="<?= htmlspecialchars($company['socials']['linkedin']) ?>" class="social-btn" target="_blank" rel="noopener" aria-label="LinkedIn">
          <span>in</span>
        </a>
        <a href="<?= htmlspecialchars($company['socials']['github']) ?>" class="social-btn" target="_blank" rel="noopener" aria-label="GitHub">
          <span>gh</span>
        </a>
        <a href="<?= htmlspecialchars($company['socials']['twitter']) ?>" class="social-btn" target="_blank" rel="noopener" aria-label="Twitter">
          <span>𝕏</span>
        </a>
        <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="social-btn" target="_blank" rel="noopener" aria-label="WhatsApp">
          <?= q_icon('whatsapp', '', 16) ?>
        </a>
      </div>
    </div>
  </div>
</footer>

<!-- Interactive Scripts -->
<script src="<?= asset('assets/js/main.js') ?>"></script>
</body>
</html>

