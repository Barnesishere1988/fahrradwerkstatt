<?php

class WorkorderRequests
{
    public static function validate($data): bool|string
    {
        if($data['firstname'] == '') {
            return 'Vorname darf nicht leer sein';
        }
        if($data['lastname'] == '') {
            return 'Nachname darf nicht leer sein';
        }
        if($data['phone'] == '') {
            return 'Telefonnummer darf nicht leer sein';
        }
        // Telefonnummer prüfen
          $telpattern = "/^(\+[0-9]{2,3}|0+[0-9]{2,5}).+[\d\s\/\(\)-]/";
        if (!preg_match ($telpattern, $data['phone']))
        {
            return 'Telefonnummer hat das falsche Format';
        }
        if($data['brand'] == '') {
            return 'Marke darf nicht leer sein';
        }
        if($data['modell'] == '') {
            return 'Modell darf nicht leer sein';
        }
        if($data['checkindate']) {
            $d = DateTime::createFromFormat('Y-m-d', $data['checkindate']);
            if(!($d && $d->format('Y-m-d') == $data['checkindate'])) {
                return "Fehler im Annahmedatum";
            }
        }
        if($data['checkoutdate'] == '') {
            return 'Es muss ein ungefähres Abschlussdatum angegeben werden';
        }
        if($data['checkoutdate']) {
            $d = DateTime::createFromFormat('Y-m-d', $data['checkoutdate']);
            if(!($d && $d->format('Y-m-d') == $data['checkoutdate'])) {
                return "Fehler im Abschlussdatum";
            }
        }
        if($data['repaircost'] == '') {
            return "Es muss ein ungefährer Reparaturpreis angegeben werden";
        }
        $data['repaircost'] = str_replace(',', '.', $data['repaircost']);
        if(!is_numeric($data['repaircost'])) {
            return "Reparaturpreis muss eine Zahl sein";
        }
        if($data['repaircost'] < 0) {
            return "Reparaturpreis muss ein positiver Wert sein.";
        }
        return true;
    }
}