<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• MAIN AREA â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <div class="main-area" id="mainArea">

      <!-- â”€â”€ TOPBAR â”€â”€ -->
      <header class="topbar">
        <!-- Toggle / hamburger -->
        <button class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()" title="Toggle Sidebar">
          <i class="bi bi-arrow-bar-left" id="toggleIcon"></i>
        </button>

        <div class="topbar-spacer"></div>

        <div class="topbar-right">
          <!-- Notifikasi -->
          <button class="topbar-icon-btn" title="Notifikasi">
            <i class="bi bi-bell"></i>
            <span class="notif-dot"></span>
          </button>
          <!-- Full screen -->
          <button class="topbar-icon-btn" id="fsBtn" title="Layar Penuh" onclick="toggleFullscreen()">
            <i class="bi bi-fullscreen" id="fsIcon"></i>
          </button>

          <!-- User menu -->
          <div class="user-menu">
            <button class="user-trigger" id="userTrigger" onclick="toggleUserMenu()" aria-expanded="false">
              <div class="user-avatar">AS</div>
              <div class="user-info">
                <div class="user-name">Admin Sistem</div>
                <div class="user-role">@admin.ppid</div>
              </div>
              <i class="bi bi-chevron-down user-caret"></i>
            </button>
            <div class="user-dropdown" id="userDropdown">
              <a class="dd-item" href="#">
                <i class="bi bi-person-circle"></i> Profil Saya
              </a>
              <a class="dd-item" href="#">
                <i class="bi bi-gear"></i> Pengaturan
              </a>
              <div class="dd-divider"></div>
              <button class="dd-item danger" onclick="openLogoutModal()">
                <i class="bi bi-box-arrow-right"></i> Keluar
              </button>
            </div>
          </div>
        </div>
      </header>
