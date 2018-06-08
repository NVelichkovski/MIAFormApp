<?php
$conn = new mysqli('localhost', 'root', '','formAppDatabase');
if ($conn->connect_error) {
    die("Connection failed:".$conn->connect_error);
}
