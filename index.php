<?php

$url = 'https://foodgawker.com';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$page = curl_exec($ch);

curl_close($ch);

//echo $page;
$domdocument = new DomDocument();
@$domdocument->loadHTML($page);


$xpath = new DOMXpath(@$domdocument);

$amount = ($xpath->query("//div[@class='flipwrapper']")->length);

include 'addEntry.php';
setupTable();

for ($i = 0; $i < $amount; $i++) {
    $title = $xpath->query("//div[@class='flipwrapper']")->item($i)->getAttribute('data-sharetitle');
    $link = $xpath->query("//div[@class='flipwrapper']")->item($i)->getAttribute('data-shareurl');
    $description = $xpath->query("//div[@class='flipwrapper']")->item($i)->getAttribute('data-sharecontent');
    $username = $xpath->query("//a[@class='submitter']")->item($i)->nodeValue;
    $faved = $xpath->query("//div[@class='faved']")->item($i)->nodeValue;
    $gawked = $xpath->query("//div[@class='gawked']")->item($i)->nodeValue;
    addEntry($title, $description, $username, $faved, $gawked);
    sleep(1);
}
 
 
 
