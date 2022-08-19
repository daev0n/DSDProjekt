<?php

function validateData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}

function connectToDBS($servername, $username, $password, $dbname,$serverID) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
        PDO::ATTR_TIMEOUT => 1, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        if(file_exists('tempSQL/'.$serverID.'tempSQL.sql')){
            $query = file_get_contents('tempSQL/'.$serverID.'tempSQL.sql');
            $sql = $conn->prepare($query);
            $sql->execute();
            unlink('tempSQL/'.$serverID.'tempSQL.sql');
        }
        return $conn;
        
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return 0;
    }
}

function createTempSQL($serverID, $sql){
    $sqlFile = fopen('tempSQL/'.$serverID.'tempSQL.sql','a');
    $query = $sql.PHP_EOL;
    fwrite($sqlFile,$query);
    fclose($sqlFile);
}

