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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Bienvenue, <?php echo htmlspecialchars($username); ?> !</h2>
        <a href="logout.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Déconnexion
        </a>
    </div>
</body>
</html>
