<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Daily dose of Books</title>
</head>
<body>
    <div class="formSheet"> 
        <form action="#" method="post">
            <h1>Local Library of your daily lives</h1>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title">
            <label for="author">Author: </label>
            <input type="text" name="author" id="author">
            <label for="published">Year: </label>
            <input type="text" name="published" id="published">
            <label for="genre">Genre: </label>
            <input type="text" name="genre" id="genre">
                <div class="btn">
                    <button type="submit" name="action" value="addbook">Add book</button>
                    <button type="submit" name="action" value="updateBook">Update book</button>
                </div>
            <br>
            <label for="bookId">Book ID: </label>
            <input type="text" name="id" id="id">
            <div class="btn">
                <button type="submit" name="action" value="searchBook">Search book</button>
                <button type="submit" name="action" value="deletebook">Delete book</button>
            </div>
            <br>
            <?php 
            include "insert.php";
            ?>
        </form>
        
    </div>
    <!-- bug found adding books even without information on the field -->
    <!-- bug fix required element -->
<h2>Available Books in Library</h2>

<div class="librarytable">

    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
        </tr>
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
        $statement -> execute(['id'=> $search, 'title'=>$title]);
        $rows = $statement->fetchAll();
        foreach($rows as $row){
            echo "<tr><td>". $row->id . "</td><td>" . $row->title . "</td><td>" . $row->author . "</td><td>" . $row->published_year . "</td><td>" . $row->genre . "</td></tr>";
        }
        echo "</table>";
        echo "<div class='btn center'>" . "<button><a href='index.php'>" . "refresh" . "</a></button>" . "</div>";
    }else {
        $statement=$conn->query("SELECT * FROM books");
        $rows = $statement->fetchAll();
        foreach($rows as $row){
            echo "<tr><td>". $row->id . "</td><td>" . $row->title . "</td><td>" . $row->author . "</td><td>" . $row->published_year . "</td><td>" . $row->genre . "</td></tr>";
        }
    }
?>
    </table>
</div>
</body>
</html>
