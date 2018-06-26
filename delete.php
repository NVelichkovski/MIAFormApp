<?php 
require "script/db.php";
$rez=getFormData(41,1);
while ($row=mysqli_fetch_assoc($rez)) {
    foreach ($row as $key => $value) {
        echo $key."=>".$value." ";
    }
    echo "<br>";
}