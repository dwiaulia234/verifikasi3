<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #fff;">
<?php 
    include 'admin/koneksi.php';
    if (isset($_POST['tombol'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $login = mysqli_query($con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'");
        $ketemu = mysqli_num_rows($login);
        $r = mysqli_fetch_array($login);

        if ($ketemu > 0) {
            session_start();
            $_SESSION['id'] = $r['id'];
            $_SESSION['username'] = $r['username'];
            $_SESSION['level'] = $r['level'];

            echo "<script>
                window.alert('Login Berhasil');
                document.location.href='admin/index.php';
            </script>";
        }
        else{
            echo "<script>
                window.alert('Login Gagal');
                document.location.href='index.php';
            </script>";   
        }
    }
 ?>
<div class="col-md-12" style="text-align: center; margin-top: 50px;">
    <div class="col-md-12">
    <img src="logo_utama_sultra.png" width="130">
    </div>
    <br><br><br><br>
    <div style="background-color: #e8a584; margin: auto; width: 40%; height: 230px; border-radius: 10px; padding: 20px; text-align: center;">
        <form action="#" method="POST">
            <div class="form-group" style="width: 100%;">
                <label style="color: #fff; float: left;">Username</label>
                <input style="width: 100%; height: 35px;" type="text" class="form-coltrol" name="user" required>
            </div>

            <div class="form-group" style="width: 100%;">
                <label style="color: #fff; float: left;">Password</label>
                <input style="width: 100%; height: 35px;" type="password" class="form-coltrol" name="pass" required>
            </div>
            <input type="submit" name="tombol" class="btn btn-default" style="float: left; width: 120px; background-color: #ae3939; color: #fff;" value="LOGIN">
        </form>
    </div>
</div>

</body>

</html>
