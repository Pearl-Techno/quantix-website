<?php
/**
 * Quantyx Labs — Start a Project / Technical Consultation
 * ---------------------------------------------------------
 */
require_once __DIR__ . '/includes/config.php';

// Handle Form Submission (AJAX & Standard POST)
$is_ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
$submission_result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Honeypot check
    if (!empty($_POST['website_url'])) {
        if ($is_ajax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'id' => 'INQ-DISCARDED']);
            exit;
        }
        header('Location: ' . url('contact'));
        exit;
    }

    // 2. CSRF check
    $csrf = $_POST['csrf_token'] ?? '';
    if (!csrf_validate($csrf)) {
        if ($is_ajax) {
            header('Content-Type: application/json; charset=UTF-8', true, 403);
            echo json_encode(['success' => false, 'error' => 'Security token expired. Please refresh the page.']);
            exit;
        }
        $error_msg = 'Security token expired. Please try submitting again.';
    } else {
        // 3. Validation
        $name = trim($_POST['name'] ?? '');
        $company_name = trim($_POST['company'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $details = trim($_POST['details'] ?? '');

        if (!empty($name) && !empty($company_name) && !empty($email) && !empty($phone) && strlen($details) >= 10) {
            $save = save_inquiry($_POST);
            if ($is_ajax) {
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode([
                    'success'   => $save['success'],
                    'id'        => $save['inquiry']['id'],
                    'mail_sent' => $save['mail_sent']
                ]);
                exit;
            }
            $submission_result = $save;
        } else {
            if ($is_ajax) {
                header('Content-Type: application/json; charset=UTF-8', true, 422);
                echo json_encode(['success' => false, 'error' => 'Please fill in all required fields.']);
                exit;
            }
            $error_msg = 'Please complete all required fields (minimum 10 characters for description).';
        }
    }
}

$page_title = 'Start a Project &middot; Technical Consultation';
$page_desc = 'Tell Quantyx Labs about your business challenge, custom system requirements, or digital transformation project. Connect directly with senior software architects in Nairobi, Kenya.';
$current_page = 'contact';
$canonical_slug = 'contact';

require_once __DIR__ . '/includes/header.php';

$prefill_type = $_GET['project'] ?? $_GET['product'] ?? $_GET['service'] ?? $_GET['solution'] ?? '';
$prefill_industry = $_GET['industry'] ?? '';
?>

<!-- Contact Hero -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="page-hero-glow"></div>
    <div class="page-hero-grid"></div>
  </div>
  <div class="container">
    <div class="page-hero-header reveal">
      <div class="page-hero-eyebrow">
        <span class="live-indicator"></span>
        <span>Technical Discovery & Architecture Consultation</span>
      </div>
      <h1 class="page-hero-title">
        Let’s Build Something <br>
        <span class="text-cyan">That Matters.</span>
      </h1>
      <p class="page-hero-desc">
        Tell us about your operational bottleneck, product requirement, or integration project. You will speak directly with experienced software engineers who understand African enterprise digital infrastructure.
      </p>
    </div>
  </div>
</section>

<!-- Contact Layout -->
<section class="section section-alt section-border">
  <div class="container">
    <div class="contact-layout reveal">
      <!-- Left: Company Details & Direct Communication -->
      <div class="contact-info-card">
        <div class="contact-skyline-banner">
          <img src="<?= asset('images/visual/contact-skyline.jpg') ?>" alt="Nairobi Westlands Skyline - Quantyx Labs HQ" loading="eager" />
          <span class="contact-skyline-label">WESTLANDS, NAIROBI · SYSTEM OPERATIONS</span>
        </div>
        <div class="eyebrow" style="margin-bottom: 16px;">DIRECT COMMUNICATION</div>
        <h2 style="font-size: 1.85rem; margin-bottom: 14px;">Direct Technical Channels</h2>
        <p style="font-size: 0.95rem; line-height: 1.65; color: var(--text-secondary); margin-bottom: 24px;">
          Whether you have a formal Request for Proposal (RFP), need assistance with an M-Pesa / KRA integration, or want to schedule a confidential architectural discovery session:
        </p>

        <div class="contact-points">
          <div class="contact-point-item">
            <div class="contact-point-icon">
              <?= q_icon('mail', '', 20) ?>
            </div>
            <div>
              <div class="contact-point-label">Official Corporate Email</div>
              <a href="mailto:<?= htmlspecialchars($company['email']) ?>" class="contact-point-val">
                <?= htmlspecialchars($company['email']) ?>
              </a>
            </div>
          </div>

          <div class="contact-point-item">
            <div class="contact-point-icon">
              <?= q_icon('phone', '', 20) ?>
            </div>
            <div>
              <div class="contact-point-label">Telephone & Technical WhatsApp</div>
              <a href="tel:<?= htmlspecialchars($company['phone_clean']) ?>" class="contact-point-val">
                <?= htmlspecialchars($company['phone']) ?>
              </a>
            </div>
          </div>

          <div class="contact-point-item">
            <div class="contact-point-icon">
              <?= q_icon('map-pin', '', 20) ?>
            </div>
            <div>
              <div class="contact-point-label">Headquarters Location</div>
              <div class="contact-point-val">
                <?= htmlspecialchars($company['address']) ?>
              </div>
            </div>
          </div>
        </div>

        <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--border); display: flex; flex-direction: column; gap: 14px;">
          <div style="display: flex; align-items: center; gap: 10px; font-size: 0.875rem; color: var(--text-secondary);">
            <span style="color: var(--cyan); flex-shrink: 0;"><?= q_icon('shield-check', '', 18) ?></span>
            <span><strong>Confidentiality First:</strong> We treat every project inquiry and shared technical specification with strict confidentiality.</span>
          </div>
          <div style="display: flex; align-items: center; gap: 10px; font-size: 0.875rem; color: var(--text-secondary);">
            <span style="color: var(--cyan); flex-shrink: 0;"><?= q_icon('calendar', '', 18) ?></span>
            <span><strong>Prompt Follow-Up:</strong> A senior technical lead reviews every qualified inquiry within 1 business day.</span>
          </div>
          <div style="display: flex; align-items: center; gap: 10px; font-size: 0.875rem; color: var(--text-secondary);">
            <span style="color: var(--cyan); flex-shrink: 0;"><?= q_icon('code-bracket', '', 18) ?></span>
            <span><strong>Technical Discussions:</strong> Direct conversation with software engineers, not pushy sales representatives.</span>
          </div>
        </div>

        <div style="margin-top: 32px;">
          <a href="<?= htmlspecialchars($company['whatsapp']) ?>" class="btn btn-whatsapp" style="width: 100%;" target="_blank" rel="noopener">
            <?= q_icon('whatsapp', '', 18) ?>
            Open Direct Engineering WhatsApp &rarr;
          </a>
        </div>
      </div>

      <!-- Right: Structured Project Discovery Form -->
      <div class="form-card">
        <h2 style="font-size: 1.65rem; margin-bottom: 8px;">Project Discovery Planner</h2>
        <p style="font-size: 0.925rem; color: var(--text-secondary); margin-bottom: 24px;">
          Share the details below to provide our engineering team with technical context regarding your scope.
        </p>

        <?php if (!empty($submission_result) && $submission_result['success']): ?>
          <div class="form-feedback success" style="display: block; margin-bottom: 24px;">
            <strong>Inquiry Securely Recorded [<?= htmlspecialchars($submission_result['inquiry']['id']) ?>]</strong><br>
            Thank you, <?= htmlspecialchars($submission_result['inquiry']['name']) ?>. Your technical requirements for <em>"<?= htmlspecialchars($submission_result['inquiry']['type']) ?>"</em> have been securely stored in our system. We will review your scope and follow up within 1 business day.
            <div style="margin-top: 14px;">
              <a href="<?= htmlspecialchars($company['whatsapp']) ?>&text=<?= urlencode('Hello Quantyx Labs, I submitted technical inquiry [' . $submission_result['inquiry']['id'] . '] for ' . $submission_result['inquiry']['type'] . ' (' . $submission_result['inquiry']['name'] . ').') ?>" class="btn btn-whatsapp btn-sm" target="_blank" rel="noopener">
                Send Direct WhatsApp Follow-up &rarr;
              </a>
            </div>
          </div>
        <?php elseif (!empty($error_msg)): ?>
          <div class="form-feedback" style="display: block; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #EF4444; margin-bottom: 20px;">
            <?= htmlspecialchars($error_msg) ?>
          </div>
        <?php endif; ?>

        <div id="form-feedback" class="form-feedback"></div>

        <form id="project-inquiry-form" method="POST" action="<?= url('contact') ?>" novalidate>
          <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>" />
          <!-- Honeypot spam field -->
          <input type="text" name="website_url" style="display:none;" tabindex="-1" autocomplete="off" />

          <div class="form-grid">
            <div class="form-group">
              <label class="form-label" for="field-name">Your Full Name *</label>
              <input type="text" id="field-name" name="name" class="form-input" placeholder="e.g. David Mwangi" required />
            </div>

            <div class="form-group">
              <label class="form-label" for="field-company">Company / Organization *</label>
              <input type="text" id="field-company" name="company" class="form-input" placeholder="e.g. Apex Logistics Ltd" required />
            </div>

            <div class="form-group">
              <label class="form-label" for="field-email">Corporate Email *</label>
              <input type="email" id="field-email" name="email" class="form-input" placeholder="david@apex.co.ke" required />
            </div>

            <div class="form-group">
              <label class="form-label" for="field-phone">Phone / WhatsApp Number *</label>
              <input type="tel" id="field-phone" name="phone" class="form-input" placeholder="+254 700 000 000" required />
            </div>

            <div class="form-group">
              <label class="form-label" for="field-industry">Industry Sector</label>
              <select id="field-industry" name="industry" class="form-select">
                <option value="Healthcare" <?= $prefill_industry === 'Healthcare' ? 'selected' : '' ?>>Healthcare & Clinical EMR</option>
                <option value="Finance" <?= $prefill_industry === 'Finance' ? 'selected' : '' ?>>Financial Services, SACCOs & Microfinance</option>
                <option value="Retail" <?= $prefill_industry === 'Retail' ? 'selected' : '' ?>>Retail, Wholesale & FMCG Distribution</option>
                <option value="Logistics" <?= $prefill_industry === 'Logistics' ? 'selected' : '' ?>>Transport, Logistics & Fleet Operations</option>
                <option value="Agri" <?= $prefill_industry === 'Agri' ? 'selected' : '' ?>>Agriculture & Supply Chain</option>
                <option value="Corporate" <?= $prefill_industry === 'Corporate' ? 'selected' : '' ?>>Corporate Enterprise & SMEs</option>
                <option value="Other">Other Sector</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label" for="field-type">Project Type</label>
              <select id="field-type" name="project_type" class="form-select">
                <option value="Custom System" <?= empty($prefill_type) ? 'selected' : '' ?>>Custom Software Engineering</option>
                <option value="Pearl Pay HRMS" <?= stripos($prefill_type, 'pearl') !== false || stripos($prefill_type, 'payroll') !== false ? 'selected' : '' ?>>Kenyan Statutory Payroll (Pearl Pay HRMS)</option>
                <option value="Health Point HMS" <?= stripos($prefill_type, 'health') !== false ? 'selected' : '' ?>>Hospital Information System (Health Point HMS)</option>
                <option value="QuantyxLS Microfinance" <?= stripos($prefill_type, 'quantyxls') !== false || stripos($prefill_type, 'lending') !== false ? 'selected' : '' ?>>SACCO & Micro-Lending Platform (QuantyxLS)</option>
                <option value="Stock Counter" <?= stripos($prefill_type, 'stock') !== false ? 'selected' : '' ?>>Inventory & Multi-Warehouse Tracking</option>
                <option value="Digital Sortie" <?= stripos($prefill_type, 'sortie') !== false ? 'selected' : '' ?>>Field Technician Dispatch (Digital Sortie)</option>
                <option value="Daraja & eTIMS Switch" <?= stripos($prefill_type, 'daraja') !== false || stripos($prefill_type, 'etims') !== false ? 'selected' : '' ?>>M-Pesa Daraja 2.0 & KRA eTIMS Switch</option>
                <option value="AI Workflow" <?= stripos($prefill_type, 'ai') !== false ? 'selected' : '' ?>>WhatsApp AI Bot & Intelligent Automation</option>
                <option value="Cloud SLA" <?= stripos($prefill_type, 'cloud') !== false ? 'selected' : '' ?>>Cloud Architecture & SLA Stewardship</option>
              </select>
            </div>

            <div class="form-group full">
              <label class="form-label" for="field-details">What Are You Trying to Build or Solve? *</label>
              <textarea id="field-details" name="details" class="form-textarea" placeholder="Describe the current operational challenge, volume of users/transactions, existing software being replaced, or technical specifications..." required></textarea>
            </div>

            <div class="form-group">
              <label class="form-label" for="field-timeline">Target Timeline</label>
              <select id="field-timeline" name="timeline" class="form-select">
                <option value="Immediate (< 1 month)">Immediate (< 1 month)</option>
                <option value="1 to 3 months" selected>1 to 3 months</option>
                <option value="3 to 6 months">3 to 6 months</option>
                <option value="Long-term partnership">Long-term engineering partnership</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label" for="field-budget">Estimated Budget Range (Optional)</label>
              <select id="field-budget" name="budget" class="form-select">
                <option value="Under KES 500K">Under KES 500K</option>
                <option value="KES 500K - KES 1.5M" selected>KES 500K – KES 1.5M</option>
                <option value="KES 1.5M - KES 5M">KES 1.5M – KES 5M</option>
                <option value="KES 5M - KES 20M+">KES 5M – KES 20M+</option>
                <option value="Enterprise RFP">Enterprise RFP / Request Quote</option>
              </select>
            </div>

            <div class="form-submit-row">
              <button type="submit" class="btn btn-primary" style="width: 100%;">
                Submit Technical Requirements
                <?= q_icon('arrow-right', '', 16) ?>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Reusable CTA Banner -->
<?php require __DIR__ . '/includes/cta-banner.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
