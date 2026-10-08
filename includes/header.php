<?php
/**
 * Quantyx Labs — Global Header Template
 * --------------------------------------
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';

$meta_title = !empty($page_title) 
    ? $page_title . ' | Quantyx Labs' 
    : 'Quantyx Labs — Enterprise Software, AI & Digital Systems | Nairobi, Kenya';

$meta_desc = !empty($page_desc) 
    ? $page_desc 
    : 'Quantyx Labs designs, builds, and scales intelligent digital systems, Kenyan statutory payroll (Pearl Pay), hospital EMRs (Health Point), microfinance engines (QuantyxLS), and custom enterprise platforms across Africa.';

$current_slug = $current_page ?? basename($_SERVER['PHP_SELF'], '.php');
$canonical_url = canonical_url($canonical_slug ?? ($current_slug === 'index' ? '' : $current_slug));
$og_image_url = canonical_url($company['logo_og']);
$logo_svg_url = asset($company['logo']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <!-- Primary SEO Metadata -->
  <title><?= htmlspecialchars($meta_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>"/>
  <meta name="keywords" content="software development Kenya, enterprise systems Nairobi, custom software Africa, KRA eTIMS integration, M-Pesa Daraja API, Pearl Pay HRMS, Health Point HMS, QuantyxLS SACCO loan system, payroll software Kenya, AI development Africa"/>
  <meta name="author" content="<?= htmlspecialchars($company['name']) ?>"/>
  <meta name="robots" content="index, follow"/>
  <meta name="theme-color" content="#06090F"/>
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>"/>

  <!-- Open Graph / Facebook / LinkedIn -->
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>"/>
  <meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>"/>
  <meta property="og:description" content="<?= htmlspecialchars($meta_desc) ?>"/>
  <meta property="og:image" content="<?= htmlspecialchars($og_image_url) ?>"/>
  <meta property="og:site_name" content="<?= htmlspecialchars($company['name']) ?>"/>
  <meta property="og:locale" content="en_KE"/>

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:url" content="<?= htmlspecialchars($canonical_url) ?>"/>
  <meta name="twitter:title" content="<?= htmlspecialchars($meta_title) ?>"/>
  <meta name="twitter:description" content="<?= htmlspecialchars($meta_desc) ?>"/>
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image_url) ?>"/>
  <meta name="twitter:creator" content="@quantyxlab"/>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= asset('images/favicon.png') ?>"/>
  <link rel="apple-touch-icon" href="<?= asset('images/apple-touch-icon.png') ?>"/>

  <!-- Google Web Fonts Preload -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Space+Grotesk:wght@500;600;700;800&display=swap" rel="stylesheet"/>

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>"/>

  <!-- Google Analytics Tag -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= htmlspecialchars($company['google_tag']) ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= htmlspecialchars($company['google_tag']) ?>');
  </script>

  <!-- Schema.org JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "<?= $company['name'] ?>",
    "legalName": "<?= $company['legal_name'] ?>",
    "url": "<?= url() ?>",
    "logo": "<?= $og_image_url ?>",
    "description": "<?= $meta_desc ?>",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Nairobi",
      "addressCountry": "KE"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "<?= $company['phone'] ?>",
      "contactType": "customer service",
      "email": "<?= $company['email'] ?>",
      "areaServed": ["KE", "UG", "TZ", "RW", "Africa"]
    },
    "sameAs": [
      "<?= $company['socials']['linkedin'] ?>",
      "<?= $company['socials']['github'] ?>",
      "<?= $company['socials']['twitter'] ?>"
    ]
  }
  </script>
</head>
<body>

<!-- Navigation Bar -->
<header class="site-nav" role="banner">
  <div class="container nav-inner">
    <a href="<?= url() ?>" class="brand-link" aria-label="Quantyx Labs Homepage">
      <div class="brand-logo-mark">
        <img src="<?= asset($company['logo']) ?>" alt="Quantyx Labs Logo" width="36" height="36" loading="eager"/>
      </div>
      <div class="brand-text">
        <span class="brand-name">Quantyx</span>
        <span class="brand-suffix">Labs</span>
      </div>
    </a>

    <!-- Desktop Navigation Menu -->
    <nav aria-label="Main Navigation">
      <ul class="nav-menu">
        <?php foreach ($nav_items as $item): ?>
          <li>
            <a href="<?= url($item['url']) ?>" 
               class="nav-link <?= is_active($item['slug']) ? 'active' : '' ?>">
              <?= htmlspecialchars($item['label']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <!-- Navigation Actions -->
    <div class="nav-actions">
      <a href="<?= url('contact') ?>" class="btn btn-primary btn-sm">
        Start a Project
        <?= q_icon('arrow-right', '', 14) ?>
      </a>
      <button class="nav-hamburger" type="button" aria-label="Toggle Navigation Menu" aria-expanded="false">
        <?= q_icon('bars-3', '', 22) ?>
      </button>
    </div>
  </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-nav-drawer" role="dialog" aria-label="Mobile Navigation">
  <ul class="mobile-nav-links">
    <li>
      <a href="<?= url() ?>" class="mobile-nav-link <?= is_active('home') ? 'active' : '' ?>">Home</a>
    </li>
    <?php foreach ($nav_items as $item): ?>
      <li>
        <a href="<?= url($item['url']) ?>" 
           class="mobile-nav-link <?= is_active($item['slug']) ? 'active' : '' ?>">
          <?= htmlspecialchars($item['label']) ?>
        </a>
      </li>
    <?php endforeach; ?>
    <li style="margin-top: 10px;">
      <a href="<?= url('contact') ?>" class="btn btn-primary" style="width: 100%;">
        Start a Project &rarr;
      </a>
    </li>
  </ul>
</div>

