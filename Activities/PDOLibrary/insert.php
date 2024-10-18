<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $action = $_POST['action'];

    switch ($action) {
        case 'addbook':
            addbook();
            break;
        case 'updateBook':
            updateBook();
            break;
        case 'deletebook':
            deletebook();
            break;
        case 'searchBook':
            searchBook();
            break;
    }
}
    
function addbook(){
//connect database
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "locallibrary";

    $data_source_name="mysql:host=$host; dbname=$dbname";
    $conn = new PDO($data_source_name, $user, $password);
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $statement = $conn->query("SELECT * FROM books");
    $title = $_POST["title"];
    $author = $_POST["author"]; 
    $published = $_POST["published"];
    $genre = $_POST["genre"];

    
    $sql = "INSERT INTO books(title, author, published_year, genre) VALUES (:title, :author, :published, :genre)";
    $statement = $conn -> prepare($sql);
    $data = [
        'title' => $title,
        'author' => $author,
        'published' => $published,
        'genre' => $genre
    ];
    $statement -> execute($data);
}

function deletebook(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "locallibrary";

    $data_source_name="mysql:host=$host; dbname=$dbname";
    $conn = new PDO($data_source_name, $user, $password);
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $statement = $conn->query("SELECT * FROM books");
    $id = $_POST["id"];
    $sql = "DELETE FROM books WHERE id=:id";
    $statement=$conn->prepare($sql);
    $statement->execute(['id'=>$id]);
}

function updateBook(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "locallibrary";

    $data_source_name="mysql:host=$host; dbname=$dbname";
    $conn = new PDO($data_source_name, $user, $password);
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $statement = $conn->query("SELECT * FROM books");
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published'];
    $genre = $_POST['genre'];

    $sql = "UPDATE books SET title=:title, author=:author, published_year=:published_year, genre=:genre WHERE id=:id";
    $statement=$conn->prepare($sql);
    $data = [
        'id' => $id,
        'title' => $title,
        'author' => $author,
        'published_year' => $published_year,
        'genre' => $genre
    ];
    $statement->execute($data);
}
?>

</body>
</html>

