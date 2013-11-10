<?php
header("Cache-Control: no-cache, must-revalidate");
require_once("DOMElement.php");
$files=array(4,3);
$filenum=$files[array_rand($files)];
$xml = simplexml_load_file('jlpt-voc-'.$filenum.'-extra.xml');
$num=rand(0,count($xml->word));

$kanji=$xml->word[$num]->kanji;
$reading=$xml->word[$num]->kanji->reading;

$doctype=DOMImplementation::createDocumentType('html');
$dom=DOMImplementation::createDocument(NULL,"html",$doctype);
$dom->registerNodeClass('DOMElement', 'NewDOMElement');
$html=$dom->documentElement;
$html->addElement("head");
$html->head->addElement("title", "Random Kanji");
$html->head->addElement("link", null, array("rel"=>"stylesheet", "href"=>"style.css", "type"=>"text/css"));
$html->head->addElement("meta", null, array("charset"=>"UTF-8"));
$html->head->addElement("meta", null, array("name"=>"description", "content"=>"Random kanji generator"));


$html->addElement("body");
$html->body->addElement("div", $kanji, array("id"=>"kanji"));
$html->body->addElement("p", $reading, array("id"=>"reading"));



for($i=0; $i<count($xml->word[$num]->meaning); $i++) {
	$html->body->addElement("p", $xml->word[$num]->meaning[$i], array("class"=>"meaning"));
    $body->meaning[$i]=$dom->createElement("p");
    $body->meaning[$i]->nodeValue.=$xml->word[$num]->meaning[$i];
    $body->meaning[$i]->setAttribute("class", "meaning");
}

print($dom->saveHTML());
?>
