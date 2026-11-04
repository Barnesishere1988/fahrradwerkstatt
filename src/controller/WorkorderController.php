<?php

include (__DIR__ . '/../requests/WorkorderRequests.php');
include (__DIR__ . '/../model/WorkorderModel.php');

class WorkorderController
{
    public function add(array $data)
    {
        $result = WorkorderRequests::validate($data);
        if ($result === true) {
            $workorder = new WorkorderModel();
            $workorder->add($data);
            return [
            "type" => "success",    
            "msg" => "Auftrag erfolgreich hinzugefügt"];
        } else {
            return [
            "type" => "error",    
            "msg" => $result];
        }
    }

    public function showAll()
    {
        $workorder = new WorkorderModel();
        return $workorder->showAll();
    }

    public function showSearch($data)
    {
        $result = WorkorderRequests::validateSearch($data);
        if ($result === false) {
            return [];
        }
        $workorder = new WorkorderModel();
        if($data['category'] == 'id') {
            return $workorder->searchById($data['phrase']);
        } else {
            return $workorder->searchByName($data['phrase']);
        }
    }

    public function showFilter($data)
    {
        $result = WorkorderRequests::validateFilter($data);
        if ($result === false) {
            return $this->showAll();
        }
        $workorder = new WorkorderModel();
        return $workorder->searchbyFilter($data['filter']);
    }

    public function delete($data)
    {
        $workorder = new WorkorderModel();
        $workorder->delete($data);
    }
}