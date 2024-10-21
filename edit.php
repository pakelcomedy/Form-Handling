<?php
require ('koneksi.php');

if (isset($_POST['update'])) {
    $userId = $_POST['txt_id'];
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_fullname'];

    $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE id='$userId'";
    echo $query;
    $result = mysqli_query($koneksi, $query) or die(mysqli_error());
    header('location: index.php');
}
$id = $_GET['id'];
$query = "SELECT * FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi, $query) or die(mysqli_error());

while ($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $userMail = $row['user_email'];
    $userPass = $row['user_password'];
    $userName = $row['user_fullname'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <form action="edit.php" method="post">
        <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
        <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_email" value="<?php echo $userMail; ?>"></p>
        <p>password : <input type="password" name="txt_pass" value="<?php echo $userPass; ?>"></p>
        <p>nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_fullname" value="<?php echo $userName; ?>"></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="index.php">Kembali</a></p>
</body>
</html>
<?php
?>