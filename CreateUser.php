<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$user_id = $_POST["userName"];

if (strlen($user_id) > 0) {
    $db = new mysqli("mysql.eecs.ku.edu", "jacobwagner", "voo9Ki4e", "jacobwagner");
    if ($db->connect_errno) {
        echo("Connection failed");
        include 'CreateUser.html';
    }
    else {
        echo("Database connected...creating query<br>");
        $query = "INSERT INTO Users (user_id) VALUES ('$user_id')";
        if ($result = $db->query($query)) {
            echo("Made insertion!<br>");
        }
        else {
            echo("User_ID already used!");
            include 'CreateUser.html';
        }
    }
    
}
else {
    echo("You left the field empty. Add user failed.<br>");
    include 'CreateUser.html';
}

?>