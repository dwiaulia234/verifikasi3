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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $_SESSION['username']; ?><b class="caret"></b></a>
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
                    <li class="active">
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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Surat Masuk
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
<?php 
    include 'koneksi.php';
    if (isset($_POST['tombol'])) {
        $tipe       = $_POST['tipe'];
        $tgl_surat  = $_POST['tgl_surat'];
        $pengirim   = $_POST['pengirim'];
        $nomor      = $_POST['nomor'];
        $agenda     = $_POST['nomor_agenda'];
        $tgl_terima = $_POST['tgl_terima'];
        $isi        = $_POST['isi'];

        $scan = $_FILES['scan']['name'];
        $x = explode('.', $scan);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['scan']['tmp_name'];
        $file_baru = $tgl_surat."_".rand(1000,100000)."_".$scan;

    $perintah = "INSERT INTO `surat`(`tipe_surat`, `tgl_surat`, `pengirim`, `nmr_surat`, `nmr_agenda`, `tgl_terima`, `isi`, `scan`) VALUES ('$tipe', '$tgl_surat', '$pengirim', '$nomor', '$agenda', '$tgl_terima', '$isi', '$file_baru')";

        mysqli_query($con, $perintah)or die('bajingan w');

        move_uploaded_file($file_tmp, 'files/'.$file_baru);

        echo "<script>
            window.alert('Data Surat Tersimpan');
        </script>";

    }
 ?>

                <div class="row">
                    <div class="col-lg-6">

                        <form action="#" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Tipe Surat</label>
                                <select class="form-control" name="tipe" required>
                                    <option></option>
                                    <option value="masuk">Surat Masuk</option>
                                    <option value="keluar">Surat Keluar</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Tanggal Surat</label>
                                <input type="date" class="form-control" name="tgl_surat" placeholder="Contoh : 26-01-2018" required>
                            </div>

                            <div class="form-group">
                                <label>Pengirim</label>
                                <input type="text" class="form-control" name="pengirim" required>
                            </div>

                            <div class="form-group">
                                <label>Nomor Surat</label>
                                <input type="text" class="form-control" name="nomor" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Nomor Agenda</label>
                                <input type="text" class="form-control" name="nomor_agenda" required>
                            </div> 

                            <div class="form-group">
                                <label>Tanggal Terima</label>
                                <input type="date" class="form-control" name="tgl_terima" placeholder="Contoh : 26-01-2018" required>
                            </div>

                             <div class="form-group">
                                <label>Isi Disposisi</label>
                                <textarea class="form-control" name="isi" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Scan Surat</label>
                                <input type="file" class="form-control" name="scan" required>
                            </div>

                            <input type="submit" class="btn btn-primary" name="tombol" value="Simpan">
                            <button type="reset" class="btn btn-danger">Reset</button>

                        </form>

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
