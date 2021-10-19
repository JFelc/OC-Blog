<?php

require_once "./model/Post.php";
require_once "./model/User.php";
require_once "./model/Comments.php";

class Controller
{
    public $rewritebase = "/OC-Blog/";

    public function __construct($url = "", $qs = "")
    {

        $url = explode('/', $url);
        $qs = explode('&', $qs);

        switch ($url[2]) {
            case '':
                $this->home();
                break;
            case 'accueil':
                $this->home();
                break;
            case 'admin':
                $this->admin($url);
                break;
            case 'posts':
                $this->posts($url);
                break;
            case 'login':
                $this->login($url);
                break;
            case 'post':
                $this->post($url);
                break;
            case 'profile':
                $this->profile($url);
                break;

            default:
                $this->notFound();
                break;
        }
    }

    public function home()
    {
        $post = new Post();
        $res = $post->selectPostsHome();
        $_SESSION['contact'] = false;
        unset($_SESSION['contact']);

        if(isset($_POST['contact']))
        {
            $_SESSION['contact'] = true;
            $fName = isset($_POST['fName']) ? $_POST['fName'] : '';
            $lName = isset($_POST['lName']) ? $_POST['lName'] : '';
            $contactMail = isset($_POST['contactMail']) ? $_POST['contactMail'] : '';
            $message = isset($_POST['contactMessage']) ? $_POST['contactMessage'] : '';
            
            //mail('julien.felici@gmail.com', 'Test Mail', $message, $fName);
        }
        require_once "./includes/header.php";
        require_once "./view/home.php";
        require_once "./includes/footer.php";
    }
    public function admin($url)
    {

        if (!isset($_SESSION['connectedUser'])) {
            header("location:" . $this->rewritebase . "login");
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] != 1) {
            header("location:" . $this->rewritebase);
        }
        $userId = $_SESSION['connectedUser'];
        $post = new Post();
        $comm = new Comments();

        if (isset($_POST['updateStatusPost'])) 
        {
            $res = $post->clean($_POST['updateStatusPost']);
            $post->updateStatusPost($res);
        }
        if (isset($_POST['updateStatusComm'])) 
        {
            $res = $comm->clean($_POST['updateStatusComm']);
            $comm->updateStatusComment($res);
        }
        if (isset($_POST['categoryCreate'])) 
        {
                isset($_POST['categoryInput']) ? $res = $post->clean($_POST['categoryInput']): '';
                $post->addCategory($res);
        }

        if (isset($url[3]) && $url[3] == 'posts') 
        {
            $allPosts = $post->selectAllPostsAdmin();
                isset($_POST['updateStatusPostAdmin']) ? $post->updateStatusPost($_POST['updateStatusPostAdmin']): '';
        }
        if (isset($url[3]) && $url[3] == 'comms') 
        {
            $allComms = $comm->selectAllCommentsAdmin();
                isset($_POST['updateStatusCommAdmin']) ? $comm->updateStatusComment($_POST['updateStatusCommAdmin']): '';
        }

        $postsAdmin = $post->selectPostsAdmin();
        $category = $post->getCategories();
        $commsAdmin = $comm->selectCommentsAdmin();

        require_once "./includes/header.php";
        require_once "./view/admin.php";
        require_once "./includes/footer.php";
    }

    public function profile($url)
    {
        if (!isset($_SESSION['connectedUser'])) 
        {
            header("location:" . $this->rewritebase . "login");
        }
        $user = new User();
        $userId = $_SESSION['connectedUser'];
        if (isset($url[3]) && $url[3] == 'changePassword') 
        {
            if (isset($_POST['updatePasswd'])) 
            {
                $oldPasswd = isset($_POST['oldPasswd']) ? $user->clean($_POST['oldPasswd']) : '';
                $newPasswd = isset($_POST['newPasswd']) ? $user->clean($_POST['newPasswd']) : '';
                $passwd = $user->cryptPasswd($newPasswd);
                $res2 = $user->updatePassword($_SESSION['connectedUser'], $oldPasswd, $passwd);
            }

        }

        if (isset($_POST['updateProfile'])) 
        {
            $uploads = 'uploads/';
            $uploadFile = isset(($_FILES['image']['name'])) ? $uploads . basename($_FILES['image']['name']) : '';
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) 
            {
                $resPhoto = $user->updateUser($userId, 'photo', $uploadFile);
            }
        }

        $res = $user->selectUserById($_SESSION['connectedUser']);
        require_once "./includes/header.php";
        require_once "./view/profile.php";
        require_once "./includes/footer.php";
    }

    public function notFound()
    {
        require_once "./view/404.php";
    }
    public function login($url)
    {
        if (isset($url[3]) && $url[3] == 'create') 
        {
            if (isset($_POST['subscribe'])) 
            {
                $_user = new User();
                $name = isset($_POST['name']) ? $_user->clean($_POST['name']) : '';
                $email = isset($_POST['email']) ? $_user->clean($_POST['email']): '';
                $pass = isset($_POST['passwd']) ? $_user->clean($_POST['passwd']): '';
                $passwd = $_user->cryptPasswd($pass);
                $createdUser = $_user->addUser(array(':name' => $name, ':email' => $email, ':password' => $passwd));
            }
        } else {
            if (isset($_POST['login'])) 
            {
                $_user = new User();
                $email = isset($_POST['email']) ? $_user->clean($_POST['email']): '';
                $passwd = isset($_POST['passwd']) ? $_user->clean($_POST['passwd']): '';
                $connectedUser = $_user->selectUserByEmail($email, $passwd);
                $_SESSION['connectedUser'] = $connectedUser['idUtilisateur'];
                $_SESSION['name'] = $connectedUser['nom'];
                $_SESSION['role'] = $connectedUser['role'];
                header("location:" . $this->rewritebase);
            }
        }
        require_once "./includes/header.php";
        require_once "./view/login.php";
        require_once "./includes/footer.php";
    }

    public function posts($url)
    {
        if (isset($url[3]) && $url[3] == 'create') 
        {
            $post = new Post();
            $categories = $post->getCategories();
            if (isset($_POST['postCreate'])) {
                $auteur = isset($_POST['name']) ? $post->clean($_POST['name']): '';
                $titre = isset($_POST['title']) ? $post->clean($_POST['title']) : '';
                $contenu = isset($_POST['content']) ? $post->clean($_POST['content']) : '';
                $description = isset($_POST['description']) ? $post->clean($_POST['description']) : '';
                $uploads = 'uploads/';
                $category = isset($_POST['category']) ? $post->clean($_POST['category']) : '';

                $uploadFile = $uploads . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) 
                {
                    $newPost = $post->addPost(array(
                        ':auteur' => $auteur, 
                        ':titre' => $titre, 
                        ':contenu' => $contenu, 
                        ':description' => $description, 
                        ':photo' => $uploadFile, 
                        ':Utilisateur_idUtilisateur' => intval($_SESSION['connectedUser']), 
                        ':Categorie_idCategorie' => $category));
                }

            }

        } else {
            $post = new Post();
            $res = $post->selectPosts();
        }
        require_once "./includes/header.php";
        require_once "./view/posts.php";
        require_once "./includes/footer.php";
    }
    public function post($url)
    {
        $post = new Post();
        $idPost = intval($url[3]);
        $res = $post->selectPost($idPost);
        $categories = $post->getCategories();
        $idAuthor = $res[0]['Utilisateur_idUtilisateur'];
        $category = $res[0]['Categorie_idCategorie'];
        $idUser = $_SESSION['connectedUser'];
        if (isset($_POST['addComment'])) {
            $comment = new Comments();
            $contenu = isset($_POST['commentValue']) ? $comment->clean($_POST['commentValue']): '';
            $res = $comment->addCommentToPost($comment->clean($idPost), $contenu, $idAuthor, $idUser, $category);
        }
        if (isset($_POST['editPost'])) {
            $post = new Post();
            $titre = isset($_POST['title']) ? $post->clean($_POST['title']): '';
            $contenu = isset($_POST['content']) ? $post->clean($_POST['content']): '';
            $description = isset($_POST['description']) ? $post->clean($_POST['description']): '';
            $category = isset($_POST['category']) ? $post->clean($_POST['category']) : '';
            if (isset($_FILES['image'])) {
                $photo = $_FILES['image']['name'];
            } else {
                $photo = null;
            }

            if ($photo != null) {
                $uploads = 'uploads/';

                $uploadFile = $uploads . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'],$uploadFile)) 
                {
                    $newPost = $post->updatePost(
                        array(
                        ':titre' => $titre, 
                        ':contenu' => $contenu, 
                        ':description' => $description, 
                        ':photo' => $uploadFile, 
                        ':idPost' => $idPost, 
                        ':Categorie_idCategorie' => $category)
                    );
                }
            } else {
                    $newPost = $post->updatePost(
                        array(
                            ':titre' => $titre, 
                            ':contenu' => $contenu, 
                            ':description' => $description,
                            ':idPost' => $idPost, 
                            ':Categorie_idCategorie' => $category)
                    );
               
            }

        }
        $comment = new Comments();
        $commValue = $comment->selectCommentsOfPost($idPost);
        require_once "./includes/header.php";
        require_once "./view/post.php";
        require_once "./includes/footer.php";
    }

}
