<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['who']) || empty($_POST['pass'])) {
        $error = "User name and password are required";
    } else {
        $salt = 'XyZzy12*_';
        $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
        $entered_password = $_POST['pass'];
        $hashed_password = hash('md5', $salt . $entered_password);

        if ($hashed_password === $stored_hash) {
            $_SESSION['name'] = $_POST['who'];
            header("Location: game.php?name=" . urlencode($_POST['who']));
            return;
        } else {
            $error = "Incorrect password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>c41d2575</title>
</head>
<body>
    <div class="container" style="margin-left: 50px;">
        <h1>Welcome to Rock Paper Scissors</h1>
        <p>Please Log In</p>

        <?php
        if (isset($error)) {
            echo "<p style='color: red;'>" . htmlentities($error) . "</p>";
        }
        ?>

        <form method="post" action="login.php">
            <label for="who">User Name:</label>
            <input type="text" name="who" required><br>

            <label for="pass">Password:</label>
            <input type="password" name="pass" required><br>

            <input type="submit" value="Log In">
        </form>

        <a>Please Log In</a>
    </div>
</body>
</html>


<!--      c41d2575  -->