<?php
$data = file_get_contents('books.json');
$books = json_decode($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>
</head>

<body>
    <div class="container">
        <h1>My Book Library</h1>
        <br><br>
        <a href="add.php" class="btn btn-primary">Add New</a> <br> <br>
        <form method="post">
            <input type="text" name="input_text" id="" class="form-control rounded" placeholder="Search a Book">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["search"])) {
                $searchQuery = $_POST["input_text"];
                $flag = false;
                foreach ($books as $book) {
                    if ($book->title == $searchQuery) {
                        if ($book->available == "YES") {
                            echo "<p style='background-color: white; color: green; padding: 10px; margin-left:25px;'><b>Available!</b></p>";
                            $flag = true;
                        }
                    }
                }
                if (!$flag) {
                    echo "<p style='background-color: white; color: red; padding: 10px; margin-left:25px;'><b>Not Available!</b></p>";
                }
            }
        }
        ?>

        <table border='1' style="margin-top:20px;">
            <thead>
                <th>Title</th>
                <th>Author</th>
                <th>Available</th>
                <th>Pages</th>
                <th>ISBN</th>
                <th>Operations</th>
            </thead>
            <?php
            $index = 0;
            foreach ($books as $book) {
                echo "
                <tr>
                    <td>" . $book->title . "</td>
                    <td>" . $book->author . "</td>
                    <td>" . $book->available . "</td>
                    <td>" . $book->pages . "</td>
                    <td>" . $book->isbn . "</td>
                    <td>
                        <a href='edit.php?index=" . $index . "' >Edit</a>
                        <a href='delete.php?index=" . $index . "' >Delete</a>
                    </td>
                </tr>";
                $index += 1;
            }
            ?>
        </table>
    </div>
</body>

</html>
