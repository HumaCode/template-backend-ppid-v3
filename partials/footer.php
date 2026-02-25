<!--  TOPBAR  -->
      <?php include 'partials/topbar.php'; ?>

      <!-- â”€â”€ CONTENT â”€â”€ -->
      <main class="content-area" id="contentArea">

        <!-- Breadcrumb Banner -->
        <div class="breadcrumb-banner">
          <div class="bb-left">
            <div class="bb-page-name">Dashboard</div>
            <div class="bb-desc">Selamat datang kembali, Admin â€” Ini ringkasan sistem hari ini.</div>
          </div>
          <div class="bb-right">
            <div class="bb-crumb-item">
              <i class="bi bi-house-fill"></i> Home
            </div>
            <span class="bb-crumb-sep">/</span>
            <div class="bb-crumb-item active">
              <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </div>
          </div>
        </div>

        <!-- Widgets Row -->
        <div class="widgets-row">
          <!-- Widget 1 -->
          <div class="widget-card">
            <div class="w-icon-wrap w-icon-blue"><i class="bi bi-inbox-fill"></i></div>
            <div class="w-body">
              <div class="w-value" id="wVal1">0</div>
              <div class="w-label">Total Permohonan</div>
              <span class="w-trend trend-up"><i class="bi bi-arrow-up-short"></i>+12%</span>
            </div>
          </div>
          <!-- Widget 2 -->
          <div class="widget-card">
            <div class="w-icon-wrap w-icon-green"><i class="bi bi-check-circle-fill"></i></div>
            <div class="w-body">
              <div class="w-value" id="wVal2">0</div>
              <div class="w-label">Permohonan Selesai</div>
              <span class="w-trend trend-up"><i class="bi bi-arrow-up-short"></i>+8%</span>
            </div>
          </div>
          <!-- Widget 3 -->
          <div class="widget-card">
            <div class="w-icon-wrap w-icon-amber"><i class="bi bi-hourglass-split"></i></div>
            <div class="w-body">
              <div class="w-value" id="wVal3">0</div>
              <div class="w-label">Sedang Diproses</div>
              <span class="w-trend trend-flat"><i class="bi bi-dash"></i>Stabil</span>
            </div>
          </div>
          <!-- Widget 4 -->
          <div class="widget-card">
            <div class="w-icon-wrap w-icon-red"><i class="bi bi-x-circle-fill"></i></div>
            <div class="w-body">
              <div class="w-value" id="wVal4">0</div>
              <div class="w-label">Permohonan Ditolak</div>
              <span class="w-trend trend-down"><i class="bi bi-arrow-down-short"></i>-3%</span>
            </div>
          </div>
        </div>

        <!-- Second Row -->
        <div class="cards-row">

          <!-- Activity -->
          <div class="dash-card">
            <div class="dash-card-header">
              <div class="dash-card-title"><i class="bi bi-activity"></i> Aktivitas Terkini</div>
              <span style="font-size:.72rem;color:var(--text-muted);">Hari ini</span>
            </div>
            <div class="dash-card-body">
              <ul class="activity-list">
                <li class="activity-item">
                  <div class="act-dot" style="background:#10b964;"></div>
                  <div>
                    <div class="act-text">Permohonan <strong>#PMH-2025-0048</strong> diterima dari Budi Santoso</div>
                    <div class="act-time">08:32 Â· Kelinfo DIP</div>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="act-dot" style="background:var(--blue);"></div>
                  <div>
                    <div class="act-text">Admin <strong>Siti Rahma</strong> menambahkan dokumen baru ke Galeri</div>
                    <div class="act-time">09:15 Â· Galeri</div>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="act-dot" style="background:#f59e0b;"></div>
                  <div>
                    <div class="act-text">Permohonan <strong>#PMH-2025-0047</strong> menunggu tindak lanjut</div>
                    <div class="act-time">10:04 Â· Permohonan</div>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="act-dot" style="background:#dc3545;"></div>
                  <div>
                    <div class="act-text">Permohonan <strong>#PMH-2025-0045</strong> ditolak â€” dokumen tidak lengkap
                    </div>
                    <div class="act-time">11:20 Â· Permohonan</div>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="act-dot" style="background:#10b964;"></div>
                  <div>
                    <div class="act-text">Infografis baru diterbitkan oleh Admin <strong>Eko Wahyu</strong></div>
                    <div class="act-time">13:45 Â· Infografis</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <!-- Status Table -->
          <div class="dash-card">
            <div class="dash-card-header">
              <div class="dash-card-title"><i class="bi bi-table"></i> Status Permohonan</div>
              <a href="#" style="font-size:.72rem;color:var(--blue);text-decoration:none;font-weight:600;">Lihat
                semua</a>
            </div>
            <div class="dash-card-body">
              <table class="status-table">
                <thead>
                  <tr>
                    <th>No. Permohonan</th>
                    <th>Pemohon</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><code style="font-size:.72rem;">#PMH-0048</code></td>
                    <td>Budi Santoso</td>
                    <td><span class="status-pill pill-info">Baru</span></td>
                  </tr>
                  <tr>
                    <td><code style="font-size:.72rem;">#PMH-0047</code></td>
                    <td>Dewi Kurnia</td>
                    <td><span class="status-pill pill-warning">Diproses</span></td>
                  </tr>
                  <tr>
                    <td><code style="font-size:.72rem;">#PMH-0046</code></td>
                    <td>Rudi Hartono</td>
                    <td><span class="status-pill pill-success">Selesai</span></td>
                  </tr>
                  <tr>
                    <td><code style="font-size:.72rem;">#PMH-0045</code></td>
                    <td>Anisa Putri</td>
                    <td><span class="status-pill pill-danger">Ditolak</span></td>
                  </tr>
                  <tr>
                    <td><code style="font-size:.72rem;">#PMH-0044</code></td>
                    <td>Hari Wibowo</td>
                    <td><span class="status-pill pill-success">Selesai</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <!-- Full Width Chart Card -->
        <div class="full-card">
          <div class="dash-card-header">
            <div class="dash-card-title"><i class="bi bi-bar-chart-line-fill"></i> Statistik Permohonan Bulanan</div>
            <span style="font-size:.72rem;color:var(--text-muted);">Tahun 2025</span>
          </div>
          <div class="dash-card-body">
            <div style="display:flex;align-items:center;gap:1.2rem;margin-bottom:.8rem;flex-wrap:wrap;">
              <div style="display:flex;align-items:center;gap:.4rem;font-size:.75rem;color:var(--text-muted);">
                <div style="width:12px;height:12px;border-radius:3px;background:var(--blue);"></div> Masuk
              </div>
              <div style="display:flex;align-items:center;gap:.4rem;font-size:.75rem;color:var(--text-muted);">
                <div style="width:12px;height:12px;border-radius:3px;background:rgba(0,114,198,0.3);"></div> Selesai
              </div>
            </div>
            <div class="chart-bars" id="chartBars"></div>
          </div>
        </div>

        <!-- Quick Links Row -->
        <div
          style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:1rem;margin-bottom:1.2rem;position:relative;z-index:1;">
          <div class="widget-card"
            style="flex-direction:column;align-items:center;text-align:center;padding:1.2rem .8rem;gap:.6rem;cursor:pointer;"
            onclick="">
            <div class="w-icon-wrap w-icon-blue" style="width:40px;height:40px;font-size:1rem;border-radius:10px;"><i
                class="bi bi-folder2-open"></i></div>
            <div style="font-size:.78rem;font-weight:600;color:var(--text-main);">Kelinfo DIP</div>
            <div style="font-size:.68rem;color:var(--text-muted);">Daftar Informasi Publik</div>
          </div>
          <div class="widget-card"
            style="flex-direction:column;align-items:center;text-align:center;padding:1.2rem .8rem;gap:.6rem;cursor:pointer;">
            <div class="w-icon-wrap w-icon-green" style="width:40px;height:40px;font-size:1rem;border-radius:10px;"><i
                class="bi bi-images"></i></div>
            <div style="font-size:.78rem;font-weight:600;color:var(--text-main);">Galeri</div>
            <div style="font-size:.68rem;color:var(--text-muted);">Kelola Foto & Media</div>
          </div>
          <div class="widget-card"
            style="flex-direction:column;align-items:center;text-align:center;padding:1.2rem .8rem;gap:.6rem;cursor:pointer;">
            <div class="w-icon-wrap w-icon-amber" style="width:40px;height:40px;font-size:1rem;border-radius:10px;"><i
                class="bi bi-pie-chart-fill"></i></div>
            <div style="font-size:.78rem;font-weight:600;color:var(--text-main);">Infografis</div>
            <div style="font-size:.68rem;color:var(--text-muted);">Data Visual Publik</div>
          </div>
          <div class="widget-card"
            style="flex-direction:column;align-items:center;text-align:center;padding:1.2rem .8rem;gap:.6rem;cursor:pointer;">
            <div class="w-icon-wrap w-icon-red" style="width:40px;height:40px;font-size:1rem;border-radius:10px;"><i
                class="bi bi-bar-chart-fill"></i></div>
            <div style="font-size:.78rem;font-weight:600;color:var(--text-main);">Laporan</div>
            <div style="font-size:.68rem;color:var(--text-muted);">Statistik & Analitik</div>
          </div>
          <div class="widget-card"
            style="flex-direction:column;align-items:center;text-align:center;padding:1.2rem .8rem;gap:.6rem;cursor:pointer;">
            <div class="w-icon-wrap"
              style="width:40px;height:40px;font-size:1rem;border-radius:10px;background:rgba(100,116,139,0.1);color:#64748b;">
              <i class="bi bi-gear-fill"></i></div>
            <div style="font-size:.78rem;font-weight:600;color:var(--text-main);">Pengaturan</div>
            <div style="font-size:.68rem;color:var(--text-muted);">Konfigurasi Sistem</div>
          </div>
        </div>

      </main>

      <!-- â”€â”€ FOOTER â”€â”€ -->
      <footer class="main-footer">
        <div class="footer-left">
          &copy; 2025 <strong>PPID Kota Pekalongan</strong> â€” Sistem Informasi Layanan Publik. All rights reserved.
        </div>
        <div class="footer-right">
          <a class="footer-link" href="#">Bantuan</a>
          <span class="footer-sep">Â·</span>
          <a class="footer-link" href="#">Kebijakan Privasi</a>
          <span class="footer-sep">Â·</span>
          <a class="footer-link" href="#">Kontak</a>
        </div>
      </footer>
