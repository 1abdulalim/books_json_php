<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
</head>
<body>
<?php
$index = $_GET['index'];
$data = file_get_contents('books.json');
$books = json_decode($data);
$book = $books[$index];

if(isset($_POST['save'])) {
    $input = array(
        "title" => $_POST['title'],
        "author" => $_POST['author'],
        "available" => strtoupper($_POST['available']),
        "pages" => (int) $_POST['pages'],
        "isbn" => (int) $_POST['isbn']
    );

    $books[$index] = $input;
    $data = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents('books.json', $data);
    header('location: index.php');
}
?>
<h1>Book Update</h1>
<form method="post">
    <label for="title">Book Title</label>
    <input type="text" name="title" id="title" required value="<?php echo $book->title ?>" >
    <br> <br>
    <label for="author">Author Name</label>
    <input type="text" name="author" id="author" required value="<?php echo $book->author ?>" >
    <br><br>
    <label for="available">Available</label>
    <input type="text" name="available" id="available" required value="<?php echo $book->available ?>" >
    <br><br>
    <label for="pages">Number of Pages</label>
    <input type="number" name="pages" id="pages" value="<?php echo $book->pages ?>" >
    <br><br>
    <label for="isbn">ISBN Number</label>
    <input type="number" name="isbn" id="isbn" value="<?php echo $book->isbn ?>" >
    <br><br>
    <input type="submit" name="save" value="Update">
</form>
</body>
</html>
