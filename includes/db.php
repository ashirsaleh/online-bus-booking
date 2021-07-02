<?php
$dbname = "obs";
$name = 'root';
$pass = 'root';
$db = new PDO('mysql:host=localhost;dbname=' . $dbname . ';', $name, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function sanitizer($text) {
    //function to cleanup input text
    return htmlentities(stripcslashes(stripslashes(trim($text))));
}
