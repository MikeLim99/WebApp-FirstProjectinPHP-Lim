<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $action = $_POST['action'];

    switch ($action) {
        case 'addbook':
            addbook();
            break;
        case 'deletebook':
            deletebook();
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
    echo "Successfully added a book" . "<br/>" . $title . "<br/>" . $author . "<br/>" . $published . "<br/>" . $genre . "<br/>";
    echo "<button><a href='index.html'>Back</a></button>";
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
    echo "You've succcessfully deleted a book from the list" . "<br/>";
    echo "<button><a href='index.html'>Back</a></button>";
}
?>