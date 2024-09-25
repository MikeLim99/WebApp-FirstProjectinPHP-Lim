<?php 

//added function from last week lesson
    function displayOrderSummary(){
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
            $name = $_POST['name'];
            $instructions = $_POST["instructions"];

            if(isset($_POST["extras"])) {
                $extras = $_POST["extras"];
            }else {
                $extras = [];
            }

            $total_price = calculatePrice($burger_prices, $drinks_prices, $drinks_sizes, $burger_type, $size, $drink_type, $extras, $extras_prices);

            echo "Customer Name :" . $name;
            echo "<br/>";
            echo $burger_type;
            echo "<br/>";
            echo $drink_type . " " . $size;
            echo "<br/>";
            echo $total_price;
            echo "<br/>";
            echo "Instructions :" . $instructions;
            echo "<br/>";

            $receiptContent = generateReceipt($name, $burger_type, $drink_type, $size, $total_price, $instructions);

            saveReceipt($receiptContent);
            echo "<br/>";

            
            // $total_price = $burger_prices[$burger_type] + $drinks_sizes[$size] + $drinks_prices[$drink_type];
    
            // foreach($extras as $extra) {
            //     $total_price = $total_price + $extras_prices[$extra];
            // }
            // echo $burger_type;
            // echo "<br>";
            // echo  $drink_type . " " . $size;
            // echo "<br>";
            // echo " Total price :" . " " . $total_price;
            // echo "<br>";
    
            // $instructions = $_POST["instructions"];
            // echo "Order instructions :" . " " . $instructions;
            // echo "<br>";
    
            // if ($burger_type !== "quarter-pound"){
            //     echo "Order name :" . " " . htmlspecialchars($_POST["name"]) . "!";
            //     echo "<p>D kana sisikatan ng araw!</p>";
            // } elseif ($total_price >= 50){
            //     echo "<p>Password for wi-fi: wala kami nun!</p>";
            // }
        }
        giveAccess($total_price);
    }
    function joke(){
        $burger_type = $_POST["burger"];
        if($burger_type !== "cheese-burger"){
            echo "<br/>Challenge accepted! <br/>";
            echo "Hey, " . htmlspecialchars($_POST["name"])."!";
            echo "Here's a joke for you: why did the coffee file a police report? It got mugged!";
        }
    }
    function giveAccess($total_price){
        if($total_price > 42 && $total_price < 50) {
            echo "Password for the CR is wala! mag CR kalang!";
        }elseif($total_price >= 70){
            echo "The Wifi Password is incorrect";
        }
    }

    

    function calculatePrice($burger_prices, $drinks_prices, $drinks_sizes, $burger_type, $size, $drink_type, $extras, $extras_prices){
        $total_price = $burger_prices[$burger_type] + $drinks_sizes[$size] + $drinks_prices[$drink_type];
    
            foreach($extras as $extra) {
                $total_price = $total_price + $extras_prices[$extra];
            }

            return $total_price;
    }

    function generateReceipt($name, $burger_type, $drink_type, $size, $total_price, $instructions){
        $receiptContent = "Order Summary\n";
        $receiptContent .= "----------------\n";

        $receiptContent .="Name : " . $name . "\n";
        $receiptContent .="Order : " . $burger_type . "\n";
        $receiptContent .="Drinks : " . $drink_type ."\n";
        $receiptContent .="Drinks size : " . $size ."\n";
        $receiptContent .="Total Price : " . $total_price . "\n";
        $receiptContent .="Instructions : " . $instructions . "\n";
        $receiptContent .= "Thank you for Ordering!";
        return $receiptContent;
    }

    function saveReceipt($receiptContent){
        $file = fopen("Order Summary.txt", "w") or die("Unable to open file");
        fwrite($file, $receiptContent);
        fclose($file);
        echo "Receipt saved";
    }
    //calling the function 
    displayOrderSummary();
    joke();
?>