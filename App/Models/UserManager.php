<?php

namespace App\Models;

use App\Core\Database;
use PDO;

/**
 * UserManager Class
 */
class UserManager extends Database
{
    /**
     * signUp function
     * 
     * Inserts into database users input data
     *
     * @param $fname
     * @param $lname
     * @param $email
     * @param $password
     * @param $zipcode
     * @param $city
     * @param $birth_date
     * @param $status
     * @param $job
     */
    public function signUp($fname,$lname,$email,$password,$zipcode,$city,$birth_date,$status,$job)
    {
        $sql = "INSERT INTO users (fname_user, lname_user, email_user, password_user, zipcode_user, city_user, birthdate_user, status_user, job_user) VALUES (:fname, :lname, :email, :password, :zipcode, :city, :birthdate, :status, :job)";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":fname"=>$fname,
            ":lname"=>$lname,
            ":email"=>$email,
            ":password"=>$password,
            ":zipcode"=>$zipcode,
            ":city"=>$city,
            ":birthdate"=>$birth_date,
            ":status"=>$status,
            ":job"=>$job
        ]);
    }

    /**
     * updateUser function
     * 
     * updates user data in database
     *
     * @param $img
     * @param $email
     * @param $password
     * @param $city
     * @param $zipcode
     */
    public function updateUser($img,$email,$password,$city,$zipcode)
    {
        $sql = "UPDATE users SET profile_img = :img, email_user = :email, password_user = :password, zipcode_user = :zipcode, city_user = :city";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":img"=>$img,
            ":email"=>$email,
            ":password"=>$password,
            ":zipcode"=>$zipcode,
            ":city"=>$city
        ]);
    }

    /**
     * addProfileImg function
     *
     * Inserts profile img url into database
     * 
     * @param $img
     */
    public function addProfileImg($img)
    {
        $sql = "INSERT INTO users (profile_img) VALUES (:img)";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":img"=>$img
        ]);
    }

    /**
     * getByEmail function
     * 
     * gets User data from database with email
     *
     * @param $email
     */
    public function getByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email_user = :email_user";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":email_user"=>$email
        ]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        return $data;
    }

    /**
     * getById function
     * 
     * gets User data from database with id
     *
     * @param $id
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        return $data;
    }
}