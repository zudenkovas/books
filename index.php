<?php
include_once('config/database.php');
include_once('models/book.php');
include_once('repository/repo.php');
$database = new Database();
$db = $database->connect();
$repo = new Repo($db);
$books = $repo->getAll();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php
if (!$books === false) {
    echo "<table class='table table-striped'>";
    echo "<tr>";
    echo "<th><strong>Author name</strongt></th>";
    echo "<th><strong>Title</strongt></th>";
    echo "<th><strong>Year</strongt></th>";
    echo "<th><strong>Actions</strongt></th>";
    echo "</tr>";
    foreach($books as $book) {
        echo "<tr>";
        echo "<td>$book->author</td>";
        echo "<td>$book->title</td>";
        echo "<td>$book->year</td>";
        echo "<td><a class='btn btn-primary' href='singlebook.php?bookId=$book->bookId'>Details</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='alert alert-info'>No books found.</div>";
}
?>
</body>

</html>