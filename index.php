<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>First Project in PHP</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="#">home</a></li>
        <li><a href="#">About me</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
        <li onclick="darkMode()"><a href="#"><i class="fa-solid fa-gear"></i></a></li>
    </ul>
</nav>
<div class="section">
    <h2>Welcome to my Web!</h2>
</div>
<div class="section">
    <div class="content">
        <div class="php">
            <?php
                $beeCount = 1000;
                $beSpecie = "Honey bees";
                $greetings = "Hi!";
                $beeColor = "black,yellow,red,orange";
                $averageLifeSpan = 25;
                var_dump($beeColor);
                echo "<br>";
                $isDead = false;

                echo "The bee count is " . $beeCount . ".<br/>";
                $lifeInfo = $isDead ? "Yes it is dead.<br/>" : "It is still moving. <br/>";
                echo $lifeInfo;
                echo $averageLifeSpan + $beeCount;

            ?>
        </div>
    </div>
</div>

</body>
</html>

