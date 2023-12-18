<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}
print_r($_SESSION);
print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
</head>
<body>

<h1>Halo bro, <?php echo $_SESSION['session_username']; ?>!</h1>
<!-- Tombol Logout -->
<form action="" method="GET">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>

<?php
// Logout process
if (isset($_GET['logout'])) {
    // Hapus semua data sesi
    session_destroy();

    // Hapus cookie jika ada
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 86400, '/');
    }

    // Redirect ke halaman login setelah logout
    header("location:login.php");
    exit();
}
?>