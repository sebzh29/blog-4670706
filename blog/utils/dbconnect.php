<?php
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'password');
    }
    catch(Exception $e){
        die( 'Erreur : '.$e->getMessage()   );
    }
?>