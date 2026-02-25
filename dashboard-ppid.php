<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard â€” PPID Kota Pekalongan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="asset/css/style.css" />
</head>

<body>

  <?php include 'partials/sidebar.php'; ?>

    <!-- ── FOOTER ── -->
      <?php include 'partials/footer.php'; ?>

    </div><!-- end main-area -->
  </div><!-- end app-shell -->

  <!-- Float Action Button -->
  <button class="fab-top" id="fabTop" onclick="scrollToTop()" title="Kembali ke atas">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="asset/js/script.js"></script>
  <script>
    /* ══════════════════════════════════════════
       COUNTER ANIMATION (widgets)
    ══════════════════════════════════════════ */
    const targets = { wVal1: 248, wVal2: 191, wVal3: 34, wVal4: 23 };
    function animateCount(id, target, duration = 1200) {
      const el = document.getElementById(id);
      let start = null;
      const step = ts => {
        if (!start) start = ts;
        const progress = Math.min((ts - start) / duration, 1);
        const ease = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.round(ease * target);
        if (progress < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    }
    Object.entries(targets).forEach(([id, val]) => animateCount(id, val));

    /* ══════════════════════════════════════════
       CHART BARS
    ══════════════════════════════════════════ */
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'];
    const masuk = [42, 58, 35, 71, 63, 84, 56];
    const selesai = [30, 44, 28, 60, 55, 72, 48];
    const maxVal = Math.max(...masuk);
    const chartEl = document.getElementById('chartBars');

    months.forEach((m, i) => {
      const wrap = document.createElement('div');
      wrap.className = 'chart-bar-wrap';
      wrap.innerHTML = `
      <div style="display:flex;gap:3px;align-items:flex-end;width:100%;">
        <div class="chart-bar" style="height:${(masuk[i] / maxVal) * 80}px;animation-delay:${i * 0.06}s;flex:1;"></div>
        <div class="chart-bar secondary" style="height:${(selesai[i] / maxVal) * 80}px;animation-delay:${i * 0.06 + 0.03}s;flex:1;"></div>
      </div>
      <span class="chart-month">${m}</span>
    `;
      if (chartEl) chartEl.appendChild(wrap);
    });
  </script>
</body>

</html>

