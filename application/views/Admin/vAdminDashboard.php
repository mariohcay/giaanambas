<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <?= $this->session->flashdata('welcome'); ?>
  <?= $this->session->flashdata('message'); ?>

  <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Jemaat</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($jemaat) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
            <a href="<?= base_url('Admin/daftarJemaat') ?>" class="stretched-link"></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Jemaat Laki-laki</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($lakiLaki) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-male fa-2x text-gray-300 mr-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Jemaat Perempuan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($perempuan) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-female fa-2x text-gray-300 mr-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="card shadow mb-4 <?php if (empty($ibadahMingguIni)) {
                                  echo "d-none";
                                } ?>">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ibadah Onsite Minggu Ini</h6>
    </div>
    <div class="card-body mr-4">
      <?php $this->load->model('m_kehadiran');
      foreach ($ibadahMingguIni as $data) : ?>
        <div class="row">
          <div class="col-lg-4">
            <img class="img-fluid mx-3 my-3 shadow" style="width: 25rem;" src="<?= base_url('assets/img/thumbnail/') . $data['image'] ?>" alt="">
          </div>
          <div class="col-lg mx-3 my-3">
            <h5 class="text-dark"><?= $data['namaIbadah'] ?><br>"<?= $data['temaIbadah'] ?>"</h5>
            <h6><?= tgl_indo($data['tanggalIbadah'], true) . " - " . time_indo($data['jamIbadah']) . " WIB" ?></h6>
            <?php
            $terisi = $this->m_kehadiran->cekKuota($data['kodeIbadah']);
            ?>
            <h6>Kuota: <?= $terisi . "/" . $data['kuota'] ?></h6>
            <a href="<?= base_url('Admin/scanQRCodeIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-primary btn-sm p-2 my-1 mr-1">SCAN QR CODE</a>
            <a href="<?= base_url('Admin/jemaatTerdaftar/') . $data['kodeIbadah'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-1">JEMAAT TERDAFTAR</a>
            <a href="<?= base_url('Admin/detailIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-1">DETAIL</a>
            <br>
            <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $data['kodeIbadah'] ?>" class="btn btn-danger btn-sm p-2 my-1 mr-1">TUTUP PENDAFTARAN</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  

  <div class="row">
    <div class="col-md">
      <div class="card shadow mb-4 h-auto">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat</h6>
        </div>
        <div class="card-body">
          <div class="row my-3">
            <div class="col-lg-10">
              <div class="chart-area" style="height: 500px">
                <canvas id="myChart"></canvas>
              </div>
            </div>
            <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiran) ?></div><br>
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT LAKI-LAKI</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgLakiLaki) ?></div><br>
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT PEREMPUAN</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgPerempuan) ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var cData = JSON.parse('<?php echo $kehadiran; ?>');

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: cData.label,
      datasets: [{
          data: cData.data,
          label: "Total",
          lineTension: 0.3,
          backgroundColor: "rgba(90, 92, 105, 0.05)",
          borderColor: "rgba(90, 92, 105, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(90, 92, 105, 1)",
          pointBorderColor: "rgba(90, 92, 105, 1)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(90, 92, 105, 1)",
          pointHoverBorderColor: "rgba(90, 92, 105, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          pointStyle: 'circle',
        },
        {
          data: cData.data2,
          label: "Laki-laki",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          pointStyle: 'circle',
        },
        {
          data: cData.data3,
          label: "Perempuan",
          lineTension: 0.3,
          backgroundColor: "rgba(231, 74, 59, 0.05)",
          borderColor: "rgba(231, 74, 59, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(231, 74, 59, 1)",
          pointBorderColor: "rgba(231, 74, 59, 1)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(231, 74, 59, 1)",
          pointHoverBorderColor: "rgba(231, 74, 59, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          pointStyle: 'circle',
        }
      ]
    },
    options: {
      hover: {
        events: ['mousemove', 'click'],
        onHover: (event, chartElement) => {
          event.target.style.cursor = chartElement[0] ? 'pointer' : 'default';
        }
      },
      onClick: function(e) {
        var activePoints = myChart.getElementsAtEventForMode(e, 'point', myChart.options);
        var firstPoint = activePoints[0];
        var xLabel = myChart.data.labels[firstPoint._index];
        window.location.href = window.location + '/daftarKehadiranOnsite/' + convertTgl(xLabel);
      },
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        autoPadding: true
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            padding: 15,
            maxTicksLimit: 7,
            maxRotation: 90
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 5,
            padding: 15
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: true,
        position: 'bottom',
        labels: {
          usePointStyle: true,
          padding: 25
        },
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
          }
        }
      },
    }
  });

  function convertTgl(tgl) {
    const convert = tgl.split(" ");
    var bulan = "0";
    if (convert[1] == "Januari") {
      bulan = "01";
    } else if (convert[1] == "Februari") {
      bulan = "02";
    } else if (convert[1] == "Maret") {
      bulan = "03";
    } else if (convert[1] == "April") {
      bulan = "04";
    } else if (convert[1] == "Mei") {
      bulan = "05";
    } else if (convert[1] == "Juni") {
      bulan = "06";
    } else if (convert[1] == "Juli") {
      bulan = "07";
    } else if (convert[1] == "Agustus") {
      bulan = "08";
    } else if (convert[1] == "September") {
      bulan = "09";
    } else if (convert[1] == "Oktober") {
      bulan = "10";
    } else if (convert[1] == "November") {
      bulan = "11";
    } else if (convert[1] == "Desember") {
      bulan = "12";
    }
    if (parseInt(convert[0]) < 10) {
      convert[0] = "0" + convert[0];
    }
    return "IB" + convert[0] + bulan + convert[2];
  }
</script>
<script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script>