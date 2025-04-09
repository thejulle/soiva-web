document.addEventListener('DOMContentLoaded', function() {
  'use strict';

  /**
   * CSS Variable: --vw (viewport width)
   */

  function updateViewportWidth() {
    let viewportWidth = document.body.clientWidth;
    document.documentElement.style.setProperty('--vw', `${viewportWidth}px`);
  }

  updateViewportWidth();
  window.addEventListener('resize', updateViewportWidth);

  /**
   * Mobile navigation toggle button
   */

  const btnMobileMenuOpen = document.querySelector('#btn-toggle-menu');
  if (btnMobileMenuOpen) {
    btnMobileMenuOpen.addEventListener('click', () => {
      document.body.classList.toggle('menu-open');

      if (btnMobileMenuOpen.getAttribute('aria-expanded') === 'true') {
        btnMobileMenuOpen.setAttribute('aria-expanded', 'false');
      } else {
        btnMobileMenuOpen.setAttribute('aria-expanded', 'true');
      }
    })
  }

});
