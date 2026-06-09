/**
 * components.js
 * Loads shared nav.html and footer.html into every page,
 * marks the correct nav link as active, and handles
 * the dark/light mode toggle.
 *
 * Usage: include ONE script tag at the bottom of <body>:
 *   <script src="components.js"></script>
 *
 * The page must have:
 *   - A <div id="nav-placeholder"></div>  where the nav should appear
 *   - A <div id="footer-placeholder"></div> where the footer should appear
 */

(function () {
  /* ── 1. Theme: apply immediately to avoid flash ── */
  const stored = localStorage.getItem('uos-theme');
  const hour = new Date().getHours();
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const isNight = hour >= 20 || hour < 7;
  const theme = stored || (isNight || prefersDark ? 'dark' : 'light');
  document.documentElement.setAttribute('data-theme', theme);

  /* ── 2. Fetch a partial and inject it ── */
  function loadPartial(url, placeholderId, callback) {
    fetch(url)
      .then(function (r) { return r.text(); })
      .then(function (html) {
        const el = document.getElementById(placeholderId);
        if (el) {
          el.outerHTML = html;          // replace placeholder with real markup
          if (callback) callback();
        }
      })
      .catch(function (err) {
        console.warn('components.js: could not load ' + url, err);
      });
  }

  /* ── 3. Mark the active nav link ── */
  function setActiveLink() {
    const page = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-links a').forEach(function (a) {
      const href = a.getAttribute('href');
      if (href === page || (page === '' && href === 'index.html')) {
        a.classList.add('active');
      } else {
        a.classList.remove('active');
      }
    });
  }

  /* ── 4. Wire up the theme toggle button ── */
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

  /* ── 5. Load nav, then footer ── */
  document.addEventListener('DOMContentLoaded', function () {
    loadPartial('nav.html', 'nav-placeholder', function () {
      setActiveLink();
      initThemeToggle();
    });
    loadPartial('footer.html', 'footer-placeholder');
  });
})();
