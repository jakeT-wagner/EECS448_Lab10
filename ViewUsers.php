<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$db = new mysqli("mysql.eecs.ku.edu", "jacobwagner", "voo9Ki4e", "jacobwagner");
if ($db->connect_errno) {
    echo("Connection failed");
}
else {
    
    echo('<h2>' ."USERS". '</h2>');
    echo('<table>');
    echo('<tr>');
    echo('<td></td>');
    echo('<th scope = "col">' ."User Identifier".'</th>');
    echo('</tr>');
    
    $query = "SELECT user_id FROM Users";

    if ($result = $db->query($query)) {
        $counter = 1;
        while($row = $result->fetch_assoc()) {
            echo('<tr>');
            echo('<th scope = "row">'.$counter.'</th>');
            echo('<td>'.$row["user_id"].'<td>');
            echo('<tr>');
            $counter += 1;
        }
        echo('<table>');
    }
    else {
        echo("Query returned no results");
    }

    

}

?>
