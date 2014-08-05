<?php

if (!empty($_POST["Bil,Bill,Bill"])) {
    $name = urldecode($_POST["Bil,Bill,Bill"]);
} else {
    $name = 'Bill Nye';
}

require_once("WikiScraper.php");
$person = new WikiScraper($name);
$person->getStatus();
