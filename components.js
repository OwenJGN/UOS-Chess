/**
 * components.js
 * Loads shared nav.html and footer.html into every page,
 * marks the correct nav link as active, handles
 * the dark/light mode toggle, and the mobile hamburger menu.
 */

(function () {
  /* ── Theme: apply immediately to avoid flash ── */
  const stored = localStorage.getItem('uos-theme');
  const hour = new Date().getHours();
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const isNight = hour >= 20 || hour < 7;
  const theme = stored || (isNight || prefersDark ? 'dark' : 'light');
  document.documentElement.setAttribute('data-theme', theme);

  /* ── Fetch a partial and inject it ── */
  function loadPartial(url, placeholderId, callback) {
    fetch(url)
      .then(function (r) { return r.text(); })
      .then(function (html) {
        const el = document.getElementById(placeholderId);
        if (el) {
          el.outerHTML = html;
          if (callback) callback();
        }
      })
      .catch(function (err) {
        console.warn('components.js: could not load ' + url, err);
      });
  }

  /* ── Mark the active nav link ── */
  function setActiveLink() {
    const page = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-links a, .nav-drawer a').forEach(function (a) {
      const href = a.getAttribute('href');
      if (href === page || (page === '' && href === 'index.html')) {
        a.classList.add('active');
      } else {
        a.classList.remove('active');
      }
    });
  }

  /* ── Wire up the theme toggle button ── */
  function initThemeToggle() {
    const btn = document.getElementById('themeToggle');
    if (!btn) return;
    function updateBtn() {
      const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
      btn.textContent = isDark ? '☀️' : '🌙';
      btn.title = isDark ? 'Switch to light mode' : 'Switch to dark mode';
    }
    updateBtn();
    btn.addEventListener('click', function () {
      const next = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      document.documentElement.setAttribute('data-theme', next);
      localStorage.setItem('uos-theme', next);
      updateBtn();
    });
  }

  /* ── Wire up the hamburger menu ── */
  function initHamburger() {
    const btn = document.getElementById('navHamburger');
    const drawer = document.getElementById('navDrawer');
    if (!btn || !drawer) return;

    function openDrawer() {
      const scrollY = window.scrollY;
      document.body.style.top = `-${scrollY}px`;
      drawer.classList.add('open');
      btn.classList.add('open');
      btn.setAttribute('aria-expanded', 'true');
      drawer.setAttribute('aria-hidden', 'false');
      document.body.classList.add('nav-open');
    }

    function closeDrawer() {
      const scrollY = Math.abs(parseInt(document.body.style.top || '0'));
      document.body.style.top = '';
      drawer.classList.remove('open');
      btn.classList.remove('open');
      btn.setAttribute('aria-expanded', 'false');
      drawer.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('nav-open');
      window.scrollTo(0, scrollY);
    }

    btn.addEventListener('click', function () {
      drawer.classList.contains('open') ? closeDrawer() : openDrawer();
    });

    // Close when a link is tapped
    drawer.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', closeDrawer);
    });

    // Close on backdrop click
    document.addEventListener('click', function (e) {
      if (drawer.classList.contains('open') && !drawer.contains(e.target) && !btn.contains(e.target)) {
        closeDrawer();
      }
    });
  }

  /* ── Load nav, then footer ── */
  document.addEventListener('DOMContentLoaded', function () {
    loadPartial('nav.html', 'nav-placeholder', function () {
      setActiveLink();
      initThemeToggle();
      initHamburger();
    });
    loadPartial('footer.html', 'footer-placeholder');
  });
})();