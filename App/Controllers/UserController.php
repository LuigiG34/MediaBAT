<?php

namespace App\Controllers;

use App\Models\UserClass;
use App\Models\UserManager;

class UserController
{
    private $UserManager;
    private $UserClass;

    public function __construct()
    {
        $this->UserManager = new UserManager;
        $this->UserClass = new UserClass;
    }

    /**
     * sets user basic data
     * hydrate & set session
     *
     * @param $id
     * @param $fname
     * @param $lname
     * @param $email
     * @param $password
     * @param $birthdate
     * @param $status
     * @param $registration
     * @param $city
     * @param $zipcode
     * @param $user_job
     */
    public function setUserBasic($id,$fname,$lname,$email,$password,$birthdate,$status,$registration,$city,$zipcode,$user_job)
    {
        $this->UserClass->setId_user($id)
        ->setFname_user($fname)
        ->setLname_user($lname)
        ->setEmail_user($email)
        ->setPassword_user($password)
        ->setBirthdate_user($birthdate)
        ->setRegistration_date($registration)
        ->setStatus($status)
        ->setCity_user($city)
        ->setZipcode_user($zipcode)
        ->setJob_user($user_job);

        $this->UserClass->setSession();
    }

    /**
     * signUpUser function
     * 
     * Register controller
     */
    public function signUpUser()
    {
        if(isset($_POST['submit'])){
            $fname = htmlspecialchars($_POST['fname']);
            $lname = htmlspecialchars($_POST['lname']);
            $email = htmlspecialchars($_POST['email']);
            $pass = htmlspecialchars($_POST['password']);
            $city = htmlspecialchars($_POST['city']);
            $zipcode = htmlspecialchars($_POST['zipcode']);
            $birthdate = htmlspecialchars($_POST['date']);
            $status = htmlspecialchars($_POST['status']);
            if(isset($_POST['metier'])){
                $job = htmlspecialchars($_POST['metier']);
            }else{
                $job = "null";
            }
            $password = password_hash($pass, PASSWORD_ARGON2I);
            $this->UserManager->signUp($fname,$lname,$email,$password,$birthdate,$status,$city,$zipcode,$job);

            CoreController::alert("success", "You successfully registered.");
            header('Location: home');
        }else{
            CoreController::alert("danger", "An error occured.");
            header('Location: signup');
        }
    }

    /**
     * signInUser function
     *
     * gets data and compares it to inputs
     */
    public function signInUser()
    {
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $data = $this->UserManager->getByEmail($email);

            if($data){
                $this->setUserBasic($data->id_user,$data->fname_user,$data->lname_user,$data->email_user,$data->password_user,$data->birthdate_user,$data->status_user,$data->registration_date_user,$data->city_user,$data->zipcode_user,$data->job_user);

                if(password_verify($password, $this->UserClass->getPassword_user())) {
                    CoreController::alert("success","User logged in successfully !");
                    header("Location: home");
                }else{
                    CoreController::alert("danger","Passwords don't match !");
                }
            }else{
                CoreController::alert("danger","User not found !");
            }
        }
    }

    /**
     * signOutUser function
     */
    public function signOutUser()
    {
        if(!isset($_SESSION['user'])){
            CoreController::alert('danger','You are not connected !');
        }

        session_destroy();
        unset($_SESSION['user']);
        header("Location: home");
    }
}