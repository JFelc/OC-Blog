<?php

require_once 'Database.php';

Class Comments extends Database
{
    //Fetch the comments of a specific post
    function selectCommentsOfPost($postId)
    {
        $db = new Database();
        $values[':idPost'] = $postId;
        $query = $db->prepare('SELECT C.*,U.nom,U.photo FROM commentaire as C JOIN utilisateur as U WHERE C.Post_idPost =:idPost AND U.idUtilisateur = Utilisateur_idUtilisateur AND C.status = 1', $values);
        return $query;
    }
    //Add a new comment to a specific post
    function addCommentToPost($postId,$valueField,$idAuthor,$idUser,$idCategory)
    {
        $db = new Database();
        $values[':valueField'] = $valueField;
        $values[':postId'] = $postId;
        $values[':idAuthor'] = $idAuthor;
        $values[':idUser'] = $idUser;
        $values[':idCategory'] = $idCategory;
        $query = $db->prepare('INSERT INTO commentaire (contenu,Post_idPost,Post_Utilisateur_idUtilisateur,Utilisateur_idUtilisateur,Post_Categorie_idCategorie) VALUES (:valueField, :postId,:idAuthor,:idUser,:idCategory)',$values);
    }
    //Update an existing comment
    function updateComment($commentId,$valueField)
    {
        $db = new Database();
        $values[':valueField'] = $valueField;
        $values[':commentId'] = $commentId;
        $query = $db->prepare('UPDATE commentaire SET contenu =:valueField, status = 0 WHERE idCommentaire  =:commentId', $values);
    }
    //Delete a comment (admin only)
    function deleteComment($commentId)
    {
        $db = new Database();
        $values[':commentId'] = $commentId;
        $query = $db->prepare('DELETE FROM commentaire WHERE idCommentaire =:commentId',$values);
    }
    //Fetch the 5 last comments waiting for review (status = 0)
    function selectCommentsAdmin()
    {
        $db = new Database();
        $query = $db->prepare('SELECT C.*,U.nom FROM commentaire as C JOIN utilisateur as U WHERE status = 0 ORDER BY date ASC LIMIT 5');
        return $query;
    }
    //Fetch all comments waiting for review (status = 0)
    function selectAllCommentsAdmin()
    {
        $db = new Database();
        $query = $db->prepare('SELECT C.*,U.nom FROM commentaire as C JOIN utilisateur as U WHERE status = 0');
        return $query;
    }
    //Update the status of comment from 0 to 1 (admin only)
    function updateStatusComment($commentId)
    {
        $db = new Database();
        $values[':commentId'] = $commentId;
        $query = $db->prepare('UPDATE commentaire set status = 1 WHERE idCommentaire =:commentId',$values);
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