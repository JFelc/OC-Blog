<?php

class Controller
{
    public $rewritebase = "/OC-Blog/";
    function __construct($url = "", $qs = "")
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
            default:
                $this->notFound();
                break;
        }
    }

    function home()
    {
        $post = new Post();
        $res = $post->selectPostsHome();
        require_once "./includes/header.php";
        require_once "./view/home.php";
        require_once "./includes/footer.php";
    }
    function notFound()
    {
        require_once "./view/404.php";
    }
}
