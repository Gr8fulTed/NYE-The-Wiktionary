<?php

// -- Class Name : WikiScraper
// -- Purpose : A class that scrapes information from a wikipedia article, hit or miss.
// -- Created On : 5/19/14 - 5:26 AM
class WikiScraper
{
    public $name;


    // -- Function Name : __construct
    // -- Params : $name
    // -- Purpose : Constructs the class
    public function __construct($name)
    {
        $this->name = $name;
    }



    // -- Function Name : getHTML
    // -- Params : $wikiname
    // -- Purpose : Grabs the HTML Source Code from Wikipedia
    private function getHTML($wikiname)
    {
        $wikiname = str_replace(' ', '_', $wikiname);
$wikiname = strtolower($wikiname);
        $html = file_get_contents("http://en.wikipedia.org/wiki/$wikiname");
        return $html;

    }


   // -- Function Name : getStatus
    // -- Params :
    // -- Purpose : Retrieves the life status of the entered person (fictional or non-fictional)
    public function getStatus()
    {
        $person_name = $this->name;
        $html_contents = $this->getHTML($person_name);
        //Can most defiantly be done better, no idea how functional this is. Job gets done.
        if (strpos($html_contents, 'Died</th>') !== false) {
            echo "<a href = \"http://en.wikipedia.org/wiki/$person_name\">Here you go.</a><br>";
} else if (strpos($html_contents, 'appearance</th>') !== false) {
echo "<a href = \"http://en.wikipedia.org/wiki/$person_name\">Here you go.</a><br>";
} else {
echo "<a href = \"http://en.wikipedia.org/wiki/$person_name\">Here you go.</a><br>";
}
}


// -- Function Name : __destruct
// -- Params :
// -- Purpose : Deconstructs the class.
public function __destruct()
{

}
}
