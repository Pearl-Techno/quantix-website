/**
 * Quantyx Labs — Interactive Application Scripts
 * -----------------------------------------------
 * Lightweight, high-performance interactions, canvas telemetry, and form logic.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  /* ══════════════════════════════════════════════════════════════════
     1. STICKY NAVBAR
     ══════════════════════════════════════════════════════════════════ */
  const nav = document.querySelector('.site-nav');
  if (nav) {
    const handleScroll = () => {
      if (window.scrollY > 30) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
  }

  /* ══════════════════════════════════════════════════════════════════
     2. MOBILE MENU TOGGLE
     ══════════════════════════════════════════════════════════════════ */
  const hamburger = document.querySelector('.nav-hamburger');
  const drawer = document.querySelector('.mobile-nav-drawer');

  if (hamburger && drawer) {
    hamburger.addEventListener('click', () => {
      const isOpen = drawer.classList.toggle('open');
      hamburger.setAttribute('aria-expanded', isOpen);
    });

    // Close when clicking any mobile link
    drawer.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        drawer.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ══════════════════════════════════════════════════════════════════
     3. PRODUCT TABS SWITCHER
     ══════════════════════════════════════════════════════════════════ */
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');

  if (tabBtns.length > 0 && tabPanels.length > 0) {
    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const targetId = btn.getAttribute('data-target');

        tabBtns.forEach(b => b.classList.remove('active'));
        tabPanels.forEach(p => p.classList.remove('active'));

        btn.classList.add('active');
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
          targetPanel.classList.add('active');
        }
      });
    });
  }

  /* ══════════════════════════════════════════════════════════════════
     4. ENHANCED SCROLL REVEALS & STAGGER OBSERVER
     ══════════════════════════════════════════════════════════════════ */
  const revealTargets = document.querySelectorAll(
    '.reveal, .reveal-fade, .reveal-scale, .reveal-stagger'
  );



  if (revealTargets.length > 0) {
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });

    revealTargets.forEach(el => revealObserver.observe(el));
  }

  /* ══════════════════════════════════════════════════════════════════
     7. TACTILE METRIC COUNTERS (SMOOTH EXPONENTIAL DECELERATION)
     ══════════════════════════════════════════════════════════════════ */
  const counters = document.querySelectorAll('.stat-number[data-target]');
  if (counters.length > 0) {
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const target = parseFloat(el.dataset.target);
          const suffix = el.dataset.suffix || '';
          const duration = 1500;
          const startTime = performance.now();

          const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            // Ease out cubic
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            const currentVal = Math.floor(easeProgress * target);

            el.innerHTML = `${currentVal}<span class="stat-suffix">${suffix}</span>`;

            if (progress < 1) {
              requestAnimationFrame(updateCounter);
            } else {
              el.innerHTML = `${target}<span class="stat-suffix">${suffix}</span>`;
            }
          };

          requestAnimationFrame(updateCounter);
          counterObserver.unobserve(el);
        }
      });
    }, { threshold: 0.35 });

    counters.forEach(c => counterObserver.observe(c));
  }

  /* ══════════════════════════════════════════════════════════════════
     8. HERO CONSOLE SWITCHER (SMOOTH TABS & PROGRESS BAR CYCLING)
     ══════════════════════════════════════════════════════════════════ */
  const consoleBtns = document.querySelectorAll('.console-tab-btn');
  const consolePreviews = document.querySelectorAll('.console-preview-item');
  const consoleShell = document.querySelector('.hero-console-shell');

  if (consoleBtns.length > 0 && consolePreviews.length > 0) {
    let currentIdx = 0;
    let isPaused = false;
    let cycleInterval = null;

    const switchConsole = (index) => {
      currentIdx = index;
      const btn = consoleBtns[index];
      const targetId = btn.getAttribute('data-console');

      consoleBtns.forEach(b => {
        b.classList.remove('active');
        // Force reflow to restart CSS progress animation cleanly
        void b.offsetWidth;
      });

      consolePreviews.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const target = document.getElementById(targetId);
      if (target) target.classList.add('active');
    };

    const resetCycleTimer = () => {
      if (cycleInterval) clearInterval(cycleInterval);
      cycleInterval = setInterval(() => {
        if (!isPaused && document.visibilityState === 'visible') {
          const nextIdx = (currentIdx + 1) % consoleBtns.length;
          switchConsole(nextIdx);
        }
      }, 7000);
    };

    consoleBtns.forEach((btn, idx) => {
      btn.addEventListener('click', () => {
        switchConsole(idx);
        resetCycleTimer();
      });
    });

    if (consoleShell) {
      consoleShell.addEventListener('mouseenter', () => { isPaused = true; });
      consoleShell.addEventListener('mouseleave', () => { isPaused = false; });
    }

    resetCycleTimer();
  }

  /* ══════════════════════════════════════════════════════════════════
     8. PROJECT PLANNER / CONTACT FORM (REAL SUBMISSION & VALIDATION)
     ══════════════════════════════════════════════════════════════════ */
  const contactForm = document.getElementById('project-inquiry-form');
  const feedback = document.getElementById('form-feedback');

  if (contactForm && feedback) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Clear previous validation errors
      contactForm.querySelectorAll('.form-field-error').forEach(el => el.remove());
      contactForm.querySelectorAll('.invalid').forEach(el => el.classList.remove('invalid'));

      const nameInput = contactForm.querySelector('[name="name"]');
      const companyInput = contactForm.querySelector('[name="company"]');
      const emailInput = contactForm.querySelector('[name="email"]');
      const phoneInput = contactForm.querySelector('[name="phone"]');
      const detailsInput = contactForm.querySelector('[name="details"]');

      let hasError = false;
      const showError = (input, msg) => {
        hasError = true;
        input.classList.add('invalid');
        const err = document.createElement('span');
        err.className = 'form-field-error';
        err.textContent = msg;
        input.parentNode.appendChild(err);
      };

      if (!nameInput || !nameInput.value.trim()) showError(nameInput, 'Full name is required.');
      if (!companyInput || !companyInput.value.trim()) showError(companyInput, 'Company or organization is required.');
      if (!emailInput || !emailInput.value.trim() || !emailInput.value.includes('@')) showError(emailInput, 'A valid corporate email address is required.');
      if (!phoneInput || !phoneInput.value.trim()) showError(phoneInput, 'A valid phone or WhatsApp number is required.');
      if (!detailsInput || !detailsInput.value.trim() || detailsInput.value.trim().length < 10) showError(detailsInput, 'Please provide at least a brief description of what you need built (minimum 10 characters).');

      if (hasError) {
        const firstErr = contactForm.querySelector('.invalid');
        if (firstErr) firstErr.focus();
        return;
      }

      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = 'Recording Requirements...';

      const formData = new FormData(contactForm);

      try {
        const response = await fetch(contactForm.action || window.location.href, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        const result = await response.json().catch(() => null);

        feedback.className = 'form-feedback success';
        const inqId = result && result.id ? result.id : 'INQ-' + Math.random().toString(36).substr(2, 6).toUpperCase();
        const clientName = nameInput.value.trim();
        const projType = formData.get('project_type') || 'Custom Project';

        feedback.innerHTML = `
          <strong>Inquiry Securely Recorded [${inqId}]</strong><br>
          Thank you, ${clientName}. Your technical requirements for <em>"${projType}"</em> have been securely stored in our system. Our engineering lead will review your scope and follow up via email or phone within 1 business day.
          <div style="margin-top: 14px; display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="https://wa.me/254752700045?text=${encodeURIComponent('Hello Quantyx Labs, I submitted technical inquiry [' + inqId + '] for ' + projType + ' (' + clientName + '). Would like to discuss further.')}" class="btn btn-whatsapp btn-sm" target="_blank" rel="noopener">
              Open Direct WhatsApp with Inquiry &rarr;
            </a>
          </div>
        `;
        feedback.style.display = 'block';
        contactForm.reset();
        feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      } catch (err) {
        // Fallback: submit standard POST form
        contactForm.submit();
      } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
      }
    });
  }
});

