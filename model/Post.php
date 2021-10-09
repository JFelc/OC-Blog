<?php

require_once 'Database.php';

class Post extends Database
{

    function selectPosts()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * FROM post ORDER BY date DESC');
        return $query;
    }
    function selectPost($idPost){
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('SELECT * FROM post WHERE idPost =:idPost', $values);
        return $query;
    }
    function addPost($vals = array())
    {
        $db = new Database();
        //File upload
        
        $query = $db->prepare('INSERT INTO post (auteur,titre,contenu,description,photo,Utilisateur_idUtilisateur,Categorie_idCategorie) VALUES (:auteur,:titre,:contenu,:description,:photo,:Utilisateur_idUtilisateur, :Categorie_idCategorie)', $vals);
        var_dump($query); 
        return $query;
    }
    function updatePost($vals = array())
    {
        $db = new Database();
        if(isset($vals[':photo'])){
            $query = $db->prepare('UPDATE post SET titre =:titre, contenu =:contenu, description =:description, photo =:photo WHERE idPost =:idPost', $vals);
        } else {
            $query = $db->prepare('UPDATE post SET titre =:titre, contenu =:contenu, description =:description WHERE idPost =:idPost', $vals);
        }
        
        return $query;
    }
    function deletePost($idPost)
    {
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('DELETE FROM post WHERE idPost = :idPost', $values);
        return true;
    }
    
    function clean($data){
        $return = htmlspecialchars($data);
        $return = trim($data);
        $return = addslashes($data);
        return $return;
    }
}
