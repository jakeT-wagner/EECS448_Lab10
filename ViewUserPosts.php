<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$db = new mysqli("mysql.eecs.ku.edu", "jacobwagner", "voo9Ki4e", "jacobwagner");
if ($db->connect_errno) {
    echo("Connection failed");
}
else {
    
    echo('<h2>' ."User Posts". '</h2>');
    echo('<table>');
    echo('<tr>');
    echo('<th scope = "col">' ."Author".'</th>');
    echo('<th scope = "col">' ."Post ID".'</th>');
    echo('<th scope = "col">' ."Content".'</th>');
    echo('</tr>');
    

    $user_id = $_POST["users"];
    $query = "SELECT * FROM Posts WHERE author_id = '$user_id'";

    if ($result = $db->query($query)) {
        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                echo('<tr>');
                echo('<td>'.$row["author_id"].'<td><td>'.$row["post_id"].'<td><td>'.$row["content"].'<td>');
                echo('<tr>');
            }
            echo('<table>');
        }
        else {
            echo("User: ".$user_id." Has not posted yet".'<br>');
        }
    }
    else {
        echo("Invalid Query".'<br>');
    }

    

}

?>
