<?php

$db = new PDO('mysql:host=localhost;dbname=obs;', 'root', 'root');

function sanitizer($text) {
    //function to cleanup input text
    return htmlentities(stripcslashes(stripslashes(trim($text))));
}
