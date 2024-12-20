<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $language = $_POST['language'];
    setcookie('language', $language, time() + (86400 * 30), "/"); // 30 jours
    $message = "Préférence de langue mise à jour : $language.";
}

$language = !empty($_COOKIE['language']) ? $_COOKIE['language'] : "non définie";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Préférences</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-center">Préférences utilisateur</h2>
        <?php if (!empty($message)) echo "<p class='text-green-500 mb-4'>$message</p>"; ?>
        <p class="mb-4">Langue actuelle : <span class="font-semibold"><?php echo htmlspecialchars($language); ?></span></p>
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block text-gray-700">Choisissez votre langue :</label>
                <select name="language" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded py-2 px-3">
                    <option value="Français">Français</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Espagnol">Espagnol</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                Sauvegarder
            </button>
        </form>
    </div>
</body>
</html>
