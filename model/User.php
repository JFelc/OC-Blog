<?php

require_once 'Database.php';

class User extends Database
{


    function selectUsers()
    {
        $db = new Database();
        $query = $db->prepare('SELECT * FROM utilisateur ORDER BY ASC');
        return $query;
    }
    function selectUserById($idUser){
        $db = new Database();
        $values[':idUser'] = $idUser;
        $query = $db->prepare('SELECT * FROM utilisateur WHERE idUtilisateur =:idUser', $values);
        return $query;
    }
    function selectUserByEmail($emailUser,$passwd){
        $db = new Database();
        $values[':emailUser'] = $emailUser;
        $query = $db->prepare('SELECT idUtilisateur,password,nom,role FROM utilisateur WHERE email =:emailUser', $values);
        var_dump($query[0]);
        $return =  password_verify($passwd,$query[0]['password']) ? $query[0] : false;
        return $return;
    }
    function updateUser($idUser, $field, $valueField)
    {
        $db = new Database();
        $values[':idUser'] = $idUser;
       // $values[':field'] = $field;
        $values[':valueField'] = $valueField;
        $query = $db->prepare('UPDATE utilisateur SET '.$field.' =:valueField WHERE idUtilisateur =:idUser', $values);
        var_dump($query);
        return $query;
    }

    function updatePassword($idUser,$oldPasswd,$newPasswd){
        $db = new Database();
        $values[':User'] = $idUser;
        $value[':password'] = $newPasswd;
        $value[':User'] = $idUser;
        $query = $db->prepare('SELECT * FROM utilisateur WHERE idUtilisateur =:User', $values);
        $return =  password_verify($oldPasswd,$query[0]['password']) ? $query[0]['idUtilisateur'] : false;
        var_dump($values);
        var_dump($query);
        var_dump($return);
        if($return){
            $update = $db->prepare('UPDATE utilisateur SET password =:password WHERE idUtilisateur =:User', $value);
        }
        return $return;
        
    }
    
    function addUser($vals = array())
    {
        $db = new Database();
        //vérif que User existe déjà
        $email = $db->prepare('SELECT email FROM utilisateur WHERE email =:email', array(':email'=>$vals[':email']));
        var_dump($email);
        /*if($vals[':email'] == $email){
            //erreur user déjà existant
        }
        else {*/
            $query = $db->prepare('INSERT INTO utilisateur (nom,email,password) VALUES (:name,:email,:password)',$vals);
        //}
        
    }
    function deleteUser($idUser)
    {
        $db = new Database();
        $values[':idUser'] = $idUser;
        //check if admin
        $query = $db->prepare('DELETE FROM utilisateur WHERE idUtilisateur = :idUser', $values);
    }

    function cryptPasswd($data){
        $salt = password_hash($data,PASSWORD_BCRYPT);
        $return = crypt($data,$salt);
        return $return;
    }

    function clean($data){
        $return = htmlspecialchars($data);
        $return = trim($data);
        $return = addslashes($data);
        return $return;
    }
}
