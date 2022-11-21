<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <link href="<?= base_url() ?>/assets/img/logo-black.png" rel="icon" />

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet" />
  <style>
    .responsive-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      padding-top: 56.25%;
    }

    .responsive-iframe {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
    }

    .hovereffect {
      width: 100%;
      height: 100%;
      float: left;
      overflow: hidden;
      position: relative;
      text-align: center;
      cursor: default;
    }

    .hovereffect .overlay {
      width: 100%;
      height: 100%;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
    }

    .hovereffect img {
      display: flex;
      position: relative;
      -webkit-transition: all 0.4s ease-in;
      transition: all 0.4s ease-in;
    }

    .hovereffect:hover img {
      filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
      filter: grayscale(1) blur(3px);
      -webkit-filter: grayscale(1) blur(3px);
      -webkit-transform: scale(1.2);
      -ms-transform: scale(1.2);
      transform: scale(1.2);
    }

    .hovereffect h2 {
      text-transform: uppercase;
      text-align: center;
      position: relative;
      font-size: 17px;
      padding: 10px;
      background: rgba(0, 0, 0, 0.6);
    }

    .hovereffect a.info {
      display: inline-block;
      text-decoration: none;
      padding: 7px 14px;
      border: 1px solid #fff;
      margin: 50px 0 0 0;
      background-color: transparent;
    }

    .hovereffect a.info:hover {
      box-shadow: 0 0 5px #fff;
    }

    .hovereffect a.info,
    .hovereffect h2 {
      -webkit-transform: scale(0.7);
      -ms-transform: scale(0.7);
      transform: scale(0.7);
      -webkit-transition: all 0.4s ease-in;
      transition: all 0.4s ease-in;
      opacity: 0;
      filter: alpha(opacity=0);
      color: #fff;
      text-transform: uppercase;
    }

    .hovereffect:hover a.info,
    .hovereffect:hover h2 {
      opacity: 1;
      filter: alpha(opacity=100);
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1);
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body id="page-top">
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>node_modules/responsive-toolkit/dist/bootstrap-toolkit.min.js"></script>
  <script>
    (function($, viewport) {
      // Execute only after document has fully loaded
      $(document).ready(function() {
        if (viewport.is('<md')) {
          if (!$("#accordionSidebar").hasClass("toggled")) {
            $("#accordionSidebar").toggleClass("toggled");
          }
        }
        $(window).resize(
          viewport.changed(function() {
            if (viewport.is('<md')) {
              if (!$("#accordionSidebar").hasClass("toggled")) {
                $("#accordionSidebar").toggleClass("toggled");
              }
            } 
          })
        );
      });

    })(jQuery, ResponsiveBootstrapToolkit);
  </script>