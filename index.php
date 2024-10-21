<?php
session_start(); // Tambahkan ini untuk memulai sesi
require ('koneksi.php');

if (!isset($_SESSION['user_fullname'])) {
    header('Location: login.php'); // Redirect ke login jika sesi belum diatur
    exit();
}

$email = $_SESSION['user_fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $email; ?></h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Nama</th>
        </tr>
        <?php
        $query = "SELECT * FROM user_detail";
        $result = mysqli_query($koneksi, $query);
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $userMail = $row['user_email'];
            $userName = $row['user_fullname'];
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $userMail; ?></td>
            <td><?php echo $userName; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
        </td>
        </tr>
        <?php
        $no++;
    } ?>
    </table>
</body>
</html>
