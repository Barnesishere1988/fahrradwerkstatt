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

    public function edit($data) {
        $data['repaircost'] = str_replace(',', '.', $data['repaircost']);
        $sql = '
            UPDATE 
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
            WHERE
                ID = :id
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
        $stmt->bindParam(':id', $data['id']);
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

    public function searchById($search) {
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
            WHERE
                ID = :id
            ORDER BY
                ID DESC
        ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $search);
        $stmt->execute();

        return $stmt->fetch();
    }

       public function searchByName($search) {
        $sql = "
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
            WHERE
                CONCAT_WS(' ', firstname, lastname) LIKE :search
            ORDER BY
                ID DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

        public function searchByFilter($search) {
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
            WHERE
                status = :status
            ORDER BY
                ID DESC
        ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $search);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete($data)
    {
        $sql = 'DELETE FROM workorder WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    }

    public function statuschange($id, $status) {
        $sql = '
            UPDATE 
                workorder 
            SET
                status = :status
            WHERE
                ID = :id
        ';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}