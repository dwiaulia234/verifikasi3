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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ganti Username
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
<?php 
    include 'koneksi.php';
    $id = $_GET['id'];
    $gas = "SELECT * FROM user WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con, $gas));


    if (isset($_POST['tombol'])) {
        $baru       = $_POST['baru'];
        $pass       = $_POST['pass'];

        if ($data['password'] == $pass) {
            $perintah = "UPDATE user SET username = '$baru' WHERE id = '$id'";   
            mysqli_query($con, $perintah);
            echo "<script>
                window.alert('Username Berhasil Diganti');
                document.location.href='setting.php'
            </script>";            
        }
        else{
            echo "<script>
                window.alert('Password Salah');
                document.location.href='setting.php'
            </script>";            
        }
    }
 ?>

                <div class="row">
                    <div class="col-lg-6">

                        <form action="#" method="POST">       
                            <div class="form-group">
                                <label>Username Baru</label>
                                <input type="text" class="form-control" name="baru" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" required>
                            </div>
                             <input type="submit" name="tombol" class="btn btn-primary" value="Simpan">
                             <a href="setting.php" class="btn btn-danger">Batal</a>
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
