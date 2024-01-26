<?php
session_start();

if (!isset($_SESSION['name'])) {
    die("Name parameter missing");
}

function check($computer, $human) {
    if ($computer == $human) {
        return "Tie";
    } elseif (($computer == "Rock" && $human == "Scissors") ||
              ($computer == "Scissors" && $human == "Paper") ||
              ($computer == "Paper" && $human == "Rock")) {
        return "You Lose";
    } else {
        return "You Win";
    }
}

$names = array("Rock", "Paper", "Scissors");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['human'])) {
        $human = $_POST['human'];
        $computer = $names[rand(0, 2)];
        $result = check($computer, $human);

        echo "Your Play=$human Computer Play=$computer Result=$result";
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

        <form method="post" action="game.php">
            <select name="human">
                <option value="Rock">Rock</option>
                <option value="Paper">Paper</option>
                <option value="Scissors">Scissors</option>
            </select>
            <input type="submit" value="Play">
            <a href="index.php">Logout</a>
        </form>
    </div>
</body>
</html>
