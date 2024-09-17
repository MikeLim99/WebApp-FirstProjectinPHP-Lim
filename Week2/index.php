<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        echo "<h2>Order Summary</h2>";

        $burger_prices = [
            "quarter-pound" => 60,
            "cheese-burger" => 25,
        ];

        $drinks_prices = [
            "coke" => 25,
            "rc-cola" => 12,
        ];

        $drinks_sizes = [
            "small" => 0,
            "medium" => 10,
            "large" => 20,
        ];

        $extras_prices = [
            "cheese-sauce" => 5,
            "Lettuce" => 5,
        ];

        $burger_type = $_POST["burger"];
        $drink_type = $_POST["drinks"];
        $size = $_POST["size"];

        if(isset($_POST["extras"])) {
            $extras = $_POST["extras"];
        }else {
            $extras = [];
        }

        $total_price = $burger_prices[$burger_type] + $drinks_sizes[$size] + $drinks_prices[$drink_type];

        foreach($extras as $extra) {
            $total_price = $total_price + $extras_prices[$extra];
        }

        echo $total_price;
        echo "<br>";

        if ($burger_type !== "quarter-pound"){
            echo "Hey" . " " . htmlspecialchars($_POST["name"]) . "!";
            echo "<p>D kana sisikatan ng araw!</p>";
        } elseif ($total_price >= 50){
            echo "<p>Password for wi-fi: wala kami nun!</p>";
        }

        $instructions = $_POST["instructions"];
        echo $instructions;
    }
?>