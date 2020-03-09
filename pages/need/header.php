<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <link href="../css2/bootstrap.min.css" rel="stylesheet">
    <link href="../css2/metisMenu.min.css" rel="stylesheet">
    <link href="../css2/timeline.css" rel="stylesheet">
    <link href="../css2/startmin.css" rel="stylesheet">
    <link href="../css2/morris.css" rel="stylesheet">
    <link href="../css2/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="../css/jubel.css" rel="stylesheet"> -->

    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-left navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Welcome, <?=$nama?> </a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
       

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?=$nama?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li><a href="../proses/logout_proses.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="../admin.php" class="active"><i class="fa fa-folder-open" aria-hidden="true"></i>  Dashboard</a>
                    </li>
                    <li>
                        <a href="produk.php?&halaman=1" class="active"><i class="fa fa-leaf" aria-hidden="true"></i>  Produk</a>
                    </li>
                    <li>
                        <a href="konfirmasi.php" class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Konfirmasi Pembayaran</a>
                    </li>
                    <li>
                        <a href="kategori.php?&halaman=1" class="active"><i class="fa fa-bars" aria-hidden="true"></i>  Kategori Produk</a>
                    </li>
                    <li>
                        <a href="metode_pembayaran.php?halaman=1" class="active"><i class="fa fa-life-ring" aria-hidden="true"></i>  Metode Pembayaran</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid ">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome, <?=$nama?> </h1>
                </div>
            </div>