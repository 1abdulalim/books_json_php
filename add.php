<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>
    <h1>Add a New Book</h1>
    <form method="post">
        <label for="title">Book Title</label>
        <input type="text" name="title" id="title" required placeholder="Book Title">
        <br> <br>
        <label for="author">Author Name</label>
        <input type="text" name="author" id="author" required placeholder="Author's Name">
        <br> <br>
        <label for="available">Available</label>
        <input type="text" name="available" id="available" required placeholder="YES or NO">
        <br> <br>
        <label for="pages">Number of pages</label>
        <input type="number" name="pages" id="pages" placeholder="Enter page numbers">
        <br> <br>
        <label for="isbn">ISBN Number</label>
        <input type="number" name="isbn" id="isbn" placeholder="ISBN number">
        <br> <br>
        <input type="submit" name="save" value="Save" >
    </form>

    <?php
        include_once("json_edit.php");
        if(isset($_POST['save'])) {
            $input = array(
                "title" => $_POST['title'],
                "author" => $_POST['author'],
                "available" => strtoupper($_POST['available']),
                "pages" => (int) $_POST['pages'],
                "isbn" => (int) $_POST['isbn']
            );
            json_edit($input);
            header('location: index.php');
        }
    ?>
</body>
</html>
