<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Daily dose of Books</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="" onclick="forfun()">About</a></li>
            <li><a href="" onclick="forfun()">How to</a></li>
            <li><a href="" onclick="forfun()">Login</a></li>
        </ul>
    </nav>
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
                <button onclick="alertbtn()" type="submit" name="action" value ="" id="delbtn">Delete book</button>
            </div>
            <br>
            <?php 
            include "insert.php";
            ?>
        </form>
    <script>
        function alertbtn(){
            let msg = "Press 'OK' to confirm the deletion, Cancel If you changed your mind";
            if (confirm(msg)== true){
                document.getElementById("delbtn").value = "deletebook";
                alert("Book has been deleted!");
            }else {
                alert("Nothing is deleted!");
            }
        }
        function forfun(){
            alert("This is just design and for fun!");
            alert("further improvements? I dont know!");
        }
    </script>
        
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

    //search for book bonus and for fun!!
    if(isset($_POST['id'])){
        $author = $_POST['author'];
        $title = $_POST['title'];
        $search = $_POST['id'];
        $statement = $conn->prepare("SELECT * FROM books WHERE id = :id or title = :title or author = :author");
        $statement -> execute(['id'=> $search, 'title'=>$title, 'author' => $author]);
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
