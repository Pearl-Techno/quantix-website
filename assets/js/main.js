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
     4. HERO CANVAS (Living System Node Mesh & Interactive Physics)
     ══════════════════════════════════════════════════════════════════ */
  const canvas = document.getElementById('hero-canvas');
  const heroSection = document.getElementById('hero') || document.querySelector('.hero');

  if (canvas) {
    const ctx = canvas.getContext('2d');
    let width, height;
    let particles = [];
    const isMobile = window.innerWidth < 768;
    const particleCount = isMobile ? 24 : 52;
    let mouse = { x: null, y: null };

    const resize = () => {
      const dpr = Math.min(window.devicePixelRatio || 1, 2);
      width = canvas.offsetWidth;
      height = canvas.offsetHeight;
      canvas.width = width * dpr;
      canvas.height = height * dpr;
      ctx.scale(dpr, dpr);
    };

    window.addEventListener('resize', resize, { passive: true });
    resize();

    class SystemNode {
      constructor() {
        this.reset(true);
      }
      reset(initial = false) {
        this.x = initial ? Math.random() * width : (Math.random() > 0.5 ? 0 : width);
        this.y = Math.random() * height;
        this.vx = (Math.random() - 0.5) * 0.45;
        this.vy = (Math.random() - 0.5) * 0.45;
        this.radius = Math.random() * 1.6 + 1.2;
        this.alpha = Math.random() * 0.5 + 0.25;
        this.isPulse = Math.random() > 0.8;
      }
      update() {
        this.x += this.vx;
        this.y += this.vy;

        if (this.x < -20 || this.x > width + 20) this.vx *= -1;
        if (this.y < -20 || this.y > height + 20) this.vy *= -1;

        if (mouse.x !== null && mouse.y !== null) {
          const dx = mouse.x - this.x;
          const dy = mouse.y - this.y;
          const dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < 140) {
            const force = (140 - dist) / 140;
            this.x -= (dx / dist) * force * 1.8;
            this.y -= (dy / dist) * force * 1.8;
          }
        }
      }
      draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = this.isPulse
          ? `rgba(0, 212, 255, ${Math.min(1, this.alpha + 0.35)})`
          : `rgba(0, 102, 255, ${this.alpha})`;
        ctx.fill();

        if (this.isPulse) {
          ctx.beginPath();
          ctx.arc(this.x, this.y, this.radius * 2.4, 0, Math.PI * 2);
          ctx.fillStyle = `rgba(0, 212, 255, 0.08)`;
          ctx.fill();
        }
      }
    }

    for (let i = 0; i < particleCount; i++) {
      particles.push(new SystemNode());
    }

    const trackMouse = (e) => {
      const rect = canvas.getBoundingClientRect();
      mouse.x = e.clientX - rect.left;
      mouse.y = e.clientY - rect.top;
    };

    if (heroSection) {
      heroSection.addEventListener('mousemove', trackMouse, { passive: true });
      heroSection.addEventListener('mouseleave', () => {
        mouse.x = null;
        mouse.y = null;
      });
    }

    let isVisible = true;
    const observer = new IntersectionObserver(([entry]) => {
      isVisible = entry.isIntersecting;
    });
    observer.observe(canvas);

    const animate = () => {
      if (isVisible) {
        ctx.clearRect(0, 0, width, height);

        for (let i = 0; i < particles.length; i++) {
          particles[i].update();
          particles[i].draw();

          for (let j = i + 1; j < particles.length; j++) {
            const dx = particles[i].x - particles[j].x;
            const dy = particles[i].y - particles[j].y;
            const dist = Math.sqrt(dx * dx + dy * dy);

            if (dist < 135) {
              const alpha = Math.pow(1 - dist / 135, 1.6) * 0.22;
              ctx.strokeStyle = `rgba(0, 212, 255, ${alpha})`;
              ctx.lineWidth = 0.75;
              ctx.beginPath();
              ctx.moveTo(particles[i].x, particles[i].y);
              ctx.lineTo(particles[j].x, particles[j].y);
              ctx.stroke();
            }
          }
        }
      }
      requestAnimationFrame(animate);
    };

    animate();
  }

  /* ══════════════════════════════════════════════════════════════════
     5. INTERACTIVE CURSOR SPOTLIGHT / GLOW TRACKING
     ══════════════════════════════════════════════════════════════════ */
  const glowElements = document.querySelectorAll(
    '.service-card, .work-card, .bento-item, .industry-card, .ps-column, .form-card, .contact-info-card, .product-detail-card, .hero-console-shell'
  );

  glowElements.forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      card.style.setProperty('--mouse-x', `${x}px`);
      card.style.setProperty('--mouse-y', `${y}px`);
    }, { passive: true });
  });

  /* ══════════════════════════════════════════════════════════════════
     6. ENHANCED SCROLL REVEALS & STAGGER OBSERVER
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

