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
     * On hydrate (deplacer dans controller)
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
}