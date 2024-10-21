<?php
require ('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    
    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            $row = mysqli_fetch_assoc($result);
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];

            if ($userVal == $email && $passVal == $pass) {
                $_SESSION['user_fullname'] = $row['user_fullname'];
                header("Location: index.php"); // Ubah ke index.php
            } else {
                $error = "User atau password salah";
                header('location: login.php');
            }
        } else {
            $error = "User tidak ditemukan";
            header('location: login.php');
        }
    } else {
        $error = "Data tidak boleh kosong";
        echo $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
    <form action="login.php" method="post">
        <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txt_email"></p>
        <p>password : <input type="password" name="txt_pass"></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
</body>
</html>
