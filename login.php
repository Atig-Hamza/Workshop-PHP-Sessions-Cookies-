<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password') {
        $_SESSION['username'] = $username;

        if (!empty($_POST['remember_me'])) {
            setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
        }
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-center">Connexion</h2>
        <?php if (!empty($error)) echo "<p class='text-red-500 mb-4'>$error</p>"; ?>
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block text-gray-700">Nom d'utilisateur :</label>
                <input type="text" name="username" required class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Mot de passe :</label>
                <input type="password" name="password" required class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded py-2 px-3">
            </div>
            <div class="mb-4">
                <input type="checkbox" name="remember_me" class="mr-2"> Se souvenir de moi
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>
