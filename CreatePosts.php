<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$author_id = $_POST["userName"];
$post_text = $_POST["postText"];
if ((strlen($author_id) > 0) && strlen($post_text) > 0) {
    $db = new mysqli("mysql.eecs.ku.edu", "jacobwagner", "voo9Ki4e", "jacobwagner");
    if ($db->connect_errno) {
        echo("Connection failed");
        include 'CreatePosts.html';
    }
    else {
        echo("Connected to database...writing posts<br>");
        $query = "SELECT user_id from Users WHERE user_id = '$author_id'";
        if ($results = $db->query($query)) {
            if (mysqli_num_rows($results) > 0) {
                echo("We found that username!<br>");
                $results->free();
                $query = "INSERT INTO Posts (content, author_id) VALUES ('$post_text', '$author_id')";
                //$query = "INSERT INTO Users (user_id) VALUES ('$user_id')";
                if ($result = $db->query($query)) {
                    echo("successfully inserted!<br>");
                }
                else {
                    echo("Post was too long!<br>");
                }
            }
            else {
                echo("We did not find that username! <br>");
            }
        }
        else {
            echo("The query for that user failed<br>");
        }
    }
}
else {
    echo("Did not enter in data for both fields<br>");
    include 'CreatePosts.html';
}
?>