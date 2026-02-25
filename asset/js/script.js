  /* ══════════════════════════════════════════
     SIDEBAR TOGGLE
  ══════════════════════════════════════════ */
  const sidebar    = document.getElementById('sidebar');
  const mainArea   = document.getElementById('mainArea');
  const toggleBtn  = document.getElementById('toggleBtn');
  const toggleIcon = document.getElementById('toggleIcon');
  const overlay    = document.getElementById('sidebarOverlay');

  let isCollapsed  = false;
  let isMobile     = () => window.innerWidth <= 991;

  function toggleSidebar() {
    if (isMobile()) {
      toggleMobileSidebar();
    } else {
      isCollapsed = !isCollapsed;
      sidebar.classList.toggle('collapsed', isCollapsed);
      if(mainArea) mainArea.classList.toggle('collapsed', isCollapsed);
      if(toggleBtn) toggleBtn.classList.toggle('collapsed-state', isCollapsed);
    }
  }

  function toggleMobileSidebar() {
    if(sidebar) sidebar.classList.toggle('mobile-open');
    if(overlay) overlay.classList.toggle('show');
  }

  function closeMobileSidebar() {
    if(sidebar) sidebar.classList.remove('mobile-open');
    if(overlay) overlay.classList.remove('show');
  }

  /* ══════════════════════════════════════════
     USER DROPDOWN
  ══════════════════════════════════════════ */
  const userTrigger  = document.getElementById('userTrigger');
  const userDropdown = document.getElementById('userDropdown');

  function toggleUserMenu() {
    if(!userDropdown || !userTrigger) return;
    const open = userDropdown.classList.toggle('show');
    userTrigger.setAttribute('aria-expanded', open);
  }

  document.addEventListener('click', e => {
    if (userTrigger && userDropdown && !userTrigger.contains(e.target) && !userDropdown.contains(e.target)) {
      userDropdown.classList.remove('show');
      userTrigger.setAttribute('aria-expanded', false);
    }
  });

  /* ══════════════════════════════════════════
     LOGOUT MODAL
  ══════════════════════════════════════════ */
  function openLogoutModal() {
    if(userDropdown) userDropdown.classList.remove('show');
    const modal = document.getElementById('logoutModal');
    if(modal) modal.classList.add('show');
  }
  function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    if(modal) modal.classList.remove('show');
  }
  const modalElem = document.getElementById('logoutModal');
  if(modalElem) {
    modalElem.addEventListener('click', e => {
      if (e.target === modalElem) closeLogoutModal();
    });
  }

  /* ══════════════════════════════════════════
     FULLSCREEN
  ══════════════════════════════════════════ */
  function toggleFullscreen() {
    const icon = document.getElementById('fsIcon');
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen();
      if(icon) icon.className = 'bi bi-fullscreen-exit';
    } else {
      document.exitFullscreen();
      if(icon) icon.className = 'bi bi-fullscreen';
    }
  }

  /* ══════════════════════════════════════════
     FLOAT ACTION BUTTON — scroll to top
  ══════════════════════════════════════════ */
  const fabTop = document.getElementById('fabTop');
  window.addEventListener('scroll', () => {
    if(fabTop) fabTop.classList.toggle('visible', window.scrollY > 300);
  });
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  /* ══════════════════════════════════════════
     ACTIVE NAV LINK
  ══════════════════════════════════════════ */
  document.querySelectorAll('.nav-link-custom').forEach(link => {
    link.addEventListener('click', function(e) {
      // e.preventDefault();
      document.querySelectorAll('.nav-link-custom').forEach(l => l.classList.remove('active'));
      this.classList.add('active');
      if (isMobile()) closeMobileSidebar();
    });
  });
