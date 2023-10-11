<?php
   function json_edit(array $input) {
    
     $data = file_get_contents('books.json');
     $books = json_decode($data);
 
     $books[] = $input;
     $data = json_encode($books, JSON_PRETTY_PRINT);
     file_put_contents('books.json', $data);
   }

?>