<?php
require ('koneksi.php');

if (isset($_POST['register'])) {
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pass'];
    $userName = $_POST['txt_name'];

    $query = "INSERT INTO user (user_email, user_password, user_name) VALUES ('$email', '$password', '$userName')";
    $result = mysqli_query($conn, $query);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_email"></p>
        <p>password : <input type="password" name="txt_pass"></p>
        <p>nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_name"></p>
        <button type="submit" name="register">Register</button>
    </form>
    <p><a href="login.php">Login</p>
</body>
</html>