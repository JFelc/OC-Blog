<?php

require_once 'Database.php';

class Post extends Database
{

    function selectPosts()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * FROM post WHERE status = 1 ORDER BY date DESC');
        return $query;
    }
    function selectPost($idPost){
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('SELECT * FROM post WHERE idPost =:idPost', $values);
        return $query;
    }

    function selectPostsHome(){
        $db = new Database();
        $query = $db->prepare('SELECT * FROM post WHERE status = 1 ORDER BY date DESC LIMIT 3');
        return $query;
    }

    function selectPostsAdmin(){
        $db = new Database();
        $query = $db->prepare('SELECT * from post WHERE status = 0 ORDER BY date ASC LIMIT 5');
        return $query;
    }
    
    function selectAllPostsAdmin(){
        $db = new Database();
        $query = $db->prepare('SELECT * from post WHERE status = 0');
        return $query;
    }

    function updateStatusPost($idPost){
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('UPDATE post set status = 1 WHERE idPost =:idPost', $values);
        return $query;
    }

    function addPost($vals = array())
    {
        $db = new Database();
        //File upload
        
        $query = $db->prepare('INSERT INTO post (auteur,titre,contenu,description,photo,Utilisateur_idUtilisateur,Categorie_idCategorie) VALUES (:auteur,:titre,:contenu,:description,:photo,:Utilisateur_idUtilisateur, :Categorie_idCategorie)', $vals);
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


    function addCategory($name){
        $db = new Database();
        $values[':name'] = $name;
        $query = $db->prepare('INSERT INTO categorie (nom) VALUES (:name)', $values);
        return $query;
    }

    function getCategories(){
        $db = new Database();
        $query = $db->prepare('SELECT * FROM categorie');
        return $query;
    }

    
    function clean($data){
        $return = htmlspecialchars($data);
        $return = trim($data);
        $return = addslashes($data);
        return $return;
    }
}
