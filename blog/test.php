<?php

class Comment 
{
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
}

$comment = new Comment();
$comment->author = "Jean Dupont";
$comment->frenchCreationDate = "15/06/2024";
$comment->comment = "Ceci est un commentaire d'exemple.";

//echo $comment->author . " a écrit le " . $comment->frenchCreationDate . " : " . $comment->comment;
//var_dump($comment);

function Test(Comment $comment) 
{
    var_dump($comment);
}
Test($comment);

?>