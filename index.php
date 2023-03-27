<?php

require_once("config.php");

$sql = new Sql();

$users = $sql->select("SELECT * FROM users ORDER BY login");

$headers =  array();

foreach($users[0] as $key => $value){

    array_push($headers, ucfirst($key));

}

$file = fopen("users.csv", "w+");

fwrite($file, implode(",", $headers)."\r\n");

foreach($users as $row ){

    $data = array();

    foreach($row as $key => $value){
        
        array_push($data, $value);

    }
    fwrite($file, implode(",", $data)."\r\n");
}

fclose($file);

// $file = fopen("log.txt", "a+");
// fwrite($file, date("Y-m-d")."\r\n");
// fclose($file);
// echo "Arquivo criado com sucesso!"

?>