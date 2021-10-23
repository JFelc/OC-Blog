<?php

require_once 'Database.php';

class Post extends Database
{
    //Fetch all valid posts starting with the most recent ones
    function selectPosts()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * FROM post WHERE status = 1 ORDER BY date DESC');
        return $query;
    }
    //Fetch a specific post
    function selectPost($idPost)
    {
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('SELECT * FROM post WHERE idPost =:idPost', $values);
        return $query;
    }
    //Fetch the posts displayed on the home page, all valid but limited to 3
    function selectPostsHome()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * FROM post WHERE status = 1 ORDER BY date DESC LIMIT 3');
        return $query;
    }
    //Fetch 5 posts waiting for review (status = 0)
    function selectPostsAdmin()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * from post WHERE status = 0 ORDER BY date ASC LIMIT 5');
        return $query;
    }
    //Fetch all posts waiting for review (status = 0)
    function selectAllPostsAdmin()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * from post WHERE status = 0');
        return $query;
    }
    //Update the status of a post, going from 0 to 1, meaning he becomes valid
    function updateStatusPost($idPost)
    {
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('UPDATE post set status = 1 WHERE idPost =:idPost', $values);
        return $query;
    }
    //Add a new Post
    function addPost($vals = array())
    {
        $db = new Database();
        $query = $db->prepare('INSERT INTO post (auteur,titre,contenu,description,photo,Utilisateur_idUtilisateur,Categorie_idCategorie) VALUES (:auteur,:titre,:contenu,:description,:photo,:Utilisateur_idUtilisateur, :Categorie_idCategorie)', $vals);
        return $query;
    }
    //Edit an existing post
    function updatePost($vals = array())
    {
        $db = new Database();
        if(isset($vals[':photo'])){
            $query = $db->prepare('UPDATE post SET titre =:titre, contenu =:contenu, description =:description, photo =:photo, status=0, Categorie_idCategorie =:Categorie_idCategorie WHERE idPost =:idPost', $vals);
        } else {
            $query = $db->prepare('UPDATE post SET titre =:titre, contenu =:contenu, description =:description, status=0, Categorie_idCategorie =:Categorie_idCategorie WHERE idPost =:idPost', $vals);
        }
        
        return $query;
    }
    //Delete a post
    function deletePost($idPost)
    {
        $db = new Database();
        $values[':idPost'] = $idPost;
        $query = $db->prepare('DELETE FROM post WHERE idPost = :idPost', $values);
        return true;
    }
    //Add a new Post category
    function addCategory($name)
    {
        $db = new Database();
        $values[':name'] = $name;
        $query = $db->prepare('INSERT INTO categorie (nom) VALUES (:name)', $values);
        return $query;
    }
    //Fetch all Post categories
    function getCategories()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * FROM categorie');
        return $query;
    }

    
    function clean($data)
    {
        $return = htmlspecialchars($data);
        $return = trim($data);
        $return = addslashes($data);
        return $return;
    }
}
