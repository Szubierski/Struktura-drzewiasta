<?php
    function DBconnect() {
        $server = "localhost";
        $baza = "struktura drzewiasta";
        $uzytkownik = "root";
        $haslo = "";

        $conn = new mysqli($server,$uzytkownik,$haslo,$baza);

        if($conn -> connect_error) {
            echo "Połączenie z bazą niepowiodło się";
        }
        else {
            return $conn;
        }
    }

    function DBdisconnect($conn) {
        $conn -> close();
    }
?>