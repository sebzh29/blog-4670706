<?php

function getPosts()
{    
    require 'utils/dbconnect.php';    

    // On récupère les 5 derniers billets
    $stmt = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
     
    $posts = [];

    while ($row = $stmt->fetch())
    {
        $post = [            
            'title' => $row['titre'],
            'french_creation_date' => $row['date_creation_fr'],
            'content' => $row['contenu']
        ];

        $posts[] = $post;
    }
    
    return $posts;

}

?>