<?php
include_once('config/database.php');
include_once('repository/repo.php');
include_once('models/Book.php');
$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : die('ERROR: missing Book ID.');
$database = new Database();
$db = $database->connect();
$repo = new Repo($db);
$book = $repo->showBook($bookId);
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
echo "<table class='table table-hover table-responsive table-bordered'>";
echo "<tr>";
echo "<td><strong>Book ID</strong></td>";
echo "<td>{$book->bookId}</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>Authors name</strong></td>";
echo "<td>{$book->author}</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>Title</strong></td>";
echo "<td>{$book->title}</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>Year</strong></td>";
echo "<td>{$book->year}</td>";
echo "</tr>";
echo "</table>";
?>
</body>

</html>