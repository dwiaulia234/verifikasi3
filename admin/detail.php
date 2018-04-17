<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PD.Utama Sultra</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    .tabel td{
        padding: 5px;
    }
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">PD.Utama Sultra</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="setting.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="input.php"><i class="fa fa-fw fa-edit"></i> Input Surat</a>
                    </li>
                    <li>
                        <a href="masuk.php"><i class="fa fa-arrow-circle-o-down"></i> Surat Masuk</a>
                    </li>
                    <li>
                        <a href="keluar.php"><i class="fa fa-arrow-circle-o-up"></i> Surat Keluar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="min-height: 650px;">

            <div class="container-fluid">
<!-- Page Heading -->
<?php 
    include 'koneksi.php';
    $id = $_GET['id'];
    $perintah = "SELECT * FROM surat WHERE id = '$id'";
    $exec = mysqli_query($con, $perintah);
    $data = mysqli_fetch_array($exec);
 ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Detail Surat No : <?php echo "$data[nmr_agenda]"; ?>
                        </h2>
                            <h3 style="float: right; color: #6600FF;">
                                <?php 
                                    if ($data['tipe_surat'] == "masuk") {
                                        echo "Surat Masuk";
                                    }
                                    else{
                                        echo "Surat Keluar";
                                    }
                                 ?>
                            </h3>
                        
                    </div>
                </div>
                               <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table border="0" class="tabel" style="width: 100%;">
                            <tr>
                                <td width="250">Tanggal Surat</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[tgl_surat]"; ?></td>
                            </tr>
                            <tr>
                                <td>Pengirim</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[pengirim]"; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Surat</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[nmr_surat]"; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Agenda</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[nmr_agenda]"; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Terima</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[tgl_terima]"; ?></td>
                            </tr>
                            <tr>
                                <td>Isi</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[isi]"; ?></td>
                            </tr>
                            <tr>
                                <td>Pengirim</td>
                                <td width="3">:</td>
                                <td><?php echo "$data[pengirim]"; ?></td>
                            </tr>
                        </table>
                        <div class="col-md-12" style="text-align: center;">
                            <br>
                            <img src="files/<?php echo "$data[scan]"; ?>" class="img-thumbnail" style="width: 80%">
                        </div>
                    </div>
                </div>
                <!-- /.row -->  
               


               <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
