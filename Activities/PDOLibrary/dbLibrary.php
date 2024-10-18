<?php
    //connect to database
    $host="localhost";
    $user="root";
    $password="";
    $dbname="locallibrary";

    $data_source_name="mysql:host=$host; dbname=$dbname";
    $conn=new PDO($data_source_name, $user, $password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $statement=$conn->query("SELECT * FROM books");
    $rows = $statement->fetchAll();
    foreach($rows as $row){
        echo "<table>". $row->title . " | " . $row->author . " | " . $row->published_year . " | " . $row->genre . "<table/>" .  "<br/>";
    }
?>
