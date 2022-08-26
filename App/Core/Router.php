<?php

namespace App\Core;

use App\Controllers\PublicationController;
use App\Controllers\UserController;

session_start();

class Router
{
    public function start()
    {
        $UserController = new UserController;
        $PublicationController = new PublicationController;

        if (!isset($_GET['page'])) {
            require URL."public/Views/homeView.php";
        } else {
            // get $url and store each param in an array
            $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
            // If url = case
            switch ($url[0]) {
                case 'home':
                    require URL."public/Views/homeView.php";
                    break;

                case 'signin':
                    require URL."public/Views/signInView.php";
                    break;
                
                case 'signup':
                    require URL."public/Views/signUpView.php";
                    break;
                
                case 'profile':
                    require URL."public/Views/profileView.php";                     
                    break;
                 
                case 'modify':
                    require URL."public/Views/modifyProfileView.php";
                    break;

                default:
                    // If none of the above than display 404 ERROR
                    http_response_code(404);
                    require URL."public/Views/404.php";
                    break;
            }
        }
    }
}