<?php

if (!empty($_POST["person"])) {
    $name = urldecode($_POST["person"]);
} else {
    $name = 'Justin Bieber';
}

require_once("WikiScraper.php");
$person = new WikiScraper($name);
$person->getStatus();
