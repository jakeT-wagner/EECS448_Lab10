<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$db = new mysqli("mysql.eecs.ku.edu", "jacobwagner", "voo9Ki4e", "jacobwagner");
        if ($db->connect_errno) {
            echo("Connection failed");
            echo('<option value = "Could not connect">'."Could not connect".'</option>');
        }
        else {
            $query = "SELECT * FROM Posts";
            if ($result = $db->query($query)) {
                $count = mysqli_num_rows($result);
                if ($count > 0) 
                    echo("Deleting these value(s): ");
                    foreach($_POST['delete'] as $entry) {
                        echo($entry.", ");
                    }
                    echo('<br>');
                }
                else {
                    echo("No posts yet".'<br>');
                }
            }
            else {
                echo("Invalid Query".'<br>');
            }
        }

?>