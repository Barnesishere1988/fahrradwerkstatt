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
}