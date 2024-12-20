<?php
session_start();

if (empty($_SESSION['username']) && !empty($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenue, <?php echo htmlspecialchars($username); ?> !</h2>
    <a href="logout.php">Déconnexion</a>
</body>
</html>
