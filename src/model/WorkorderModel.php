<?php

include (__DIR__ . "/DB.php");

class WorkorderModel extends DB
{
    public function add($data) {
        $data['repaircost'] = str_replace(',', '.', $data['repaircost']);
        $sql = '
            INSERT INTO 
                workorder 
            SET
                firstname = :firstname,
                lastname = :lastname,
                phone = :phone,
                brand = :brand,
                modell = :modell,
                description = :description,
                checkindate = :checkindate,
                checkoutdate = :checkoutdate,
                repaircost = :repaircost
        ';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':brand', $data['brand']);
        $stmt->bindParam(':modell', $data['modell']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':checkindate', $data['checkindate']);
        $stmt->bindParam(':checkoutdate', $data['checkoutdate']);
        $stmt->bindParam(':repaircost', $data['repaircost']);
        $stmt->execute();
    }

    public function showAll() {
        $sql = '
            SELECT 
                ID,
                firstname,
                lastname,
                phone,
                brand,
                modell,
                description,
                checkindate,
                checkoutdate,
                repaircost,
                status
            FROM
                workorder
            ORDER BY
                ID DESC
        ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}