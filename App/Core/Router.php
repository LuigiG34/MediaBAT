<?php

namespace App\Core;

session_start();

use App\Controllers\PublicationController;
use App\Controllers\UserController;

var_dump($_SESSION);
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
                    $UserController->signInUser();
                    require URL."public/Views/signInView.php";
                    break;
                
                case 'signup':
                    $UserController->signUpUser();
                    require URL."public/Views/signUpView.php";
                    break;

                case 'signout':
                    $UserController->signOutUser();
                    break;

                case 'profile':
                    if(isset($url[1])){
                        if($url[1] == "standard"){
                            require URL."public/Views/standardProfileView.php";                     
                        }
                        if($url[1] == "professional"){
                            require URL."public/Views/professionalProfileView.php";                     
                        }
                        if($url[1] == "modify"){
                            require URL."public/Views/modifyProfileView.php";                     
                        }
                    }else{
                        http_response_code(404);
                        require URL."public/Views/404.php";
                    }
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