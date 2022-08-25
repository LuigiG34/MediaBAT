<?php

namespace App\Models;

use App\Core\Database;
use PDO;

/**
 * PublicationManager Class
 */
class PublicationManager extends Database
{
    /**
     * createPublication function
     * 
     * inserts publication data in database
     *
     * @param $content
     * @param $img
     * @param $userId
     */
    public function createPublication($content,$img,$userId)
    {
        $sql = "INSERT INTO publications (content_publication, img_url, id_user) VALUES (:content, :img, :userId)";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":content"=>$content,
            ":img"=>$img,
            ":userId"=>$userId
        ]);
    }

    /**
     * getUsersPublication function
     * 
     * gets users publication with userId
     *
     * @param $userId
     */
    public function getUsersPublication($userId)
    {
        $sql = "SELECT * FROM publications WHERE id_user = :userId";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":userId"=>$userId
        ]);
        $data= $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    /**
     * updatePublication function
     *
     * updates publication data
     * 
     * @param $content
     * @param $img
     * @param $userId
     * @param $id
     */
    public function updatePublication($content,$img,$userId,$id)
    {
        $sql = "UPDATE publications SET content_publication = :content, img_url = :img, id_user = :userId WHERE id_publication = :id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute([
            ":content"=>$content,
            ":img"=>$img,
            ":userId"=>$userId,
            ":id"=>$id
        ]);
    }

    /**
     * deletePublication function
     *
     * @param $id
     */
    public function deletePublication($id)
    {
        $sql = "DELETE FROM publications WHERE id_publication = :id";
        $stmt = $this->getDb()->prepare($sql);
        $result = $stmt->execute([
            ":id"=>$id
        ]);
    }
}