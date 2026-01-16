<?php

function createComment(string $post, string $author, string $comment)
{
    require 'utils/dbconnect.php';
    $statement = $bdd->prepare(
        'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
    );
    $affectedLines = $statement->execute([$post, $author, $comment]);

    return ($affectedLines > 0);
}

function getComments($identifier)
{
    require 'utils/dbconnect.php';    
    $statement = $bdd->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
    );
    $statement->execute([$identifier]);

    $comments = [];
    while (($row = $statement->fetch())) {
        $comment = [
            'author' => $row['author'],
            'french_creation_date' => $row['french_creation_date'],
            'comment' => $row['comment'],
        ];

        $comments[] = $comment;
    }

    return $comments;
}

// function commentDbConnect()
// {
//     try {
//         $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');

//         return $database;
//     } catch(Exception $e) {
//         die('Erreur : '.$e->getMessage());
//     }
// }