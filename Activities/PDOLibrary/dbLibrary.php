<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="title">
        <input type="text" name="id" id="id">
        <button name="save">submit</button>
    </form>
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "locallibrary" ;

    $data_source_name = "mysql:host=$host; dbname=$dbname";
    $conn = new PDO($data_source_name, $user, $password);
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    
    if(isset($_POST['id'])){
        $title = $_POST['title'];
        $search = $_POST['id'];
        $statement = $conn->prepare("SELECT * FROM books WHERE id = :id or title = :title");
        $data = [
            'id'=>$search,
            'title'=>$title
        ];
        $statement -> execute($data);
        $rows = $statement->fetchAll();
        foreach($rows as $row){
            echo "<tr><td>". $row->id . "</td><td>" . $row->title . "</td><td>" . $row->author . "</td><td>" . $row->published_year . "</td><td>" . $row->genre . "</td></tr>";
        }
    }else {
        $statement=$conn->query("SELECT * FROM books");
        $rows = $statement->fetchAll();
        foreach($rows as $row){
            echo "<tr><td>". $row->id . "</td><td>" . $row->title . "</td><td>" . $row->author . "</td><td>" . $row->published_year . "</td><td>" . $row->genre . "</td></tr>";
        }
    }
?>
<!-- <?php
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
                echo "<tr><td>". $row->id . "</td><td>" . $row->title . "</td><td>" . $row->author . "</td><td>" . $row->published_year . "</td><td>" . $row->genre . "</td></tr>";
            }
        ?> -->
</body>
</html>
