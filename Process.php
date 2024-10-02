<?php
header('Content-Type: application/xml');

if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['age'])) {
    $name = htmlspecialchars($_GET['name']);
    $email = htmlspecialchars($_GET['email']);
    $age = htmlspecialchars($_GET['age']);

    
    $xml = new SimpleXMLElement('<response/>');
    $xml->addChild('name', $name);
    $xml->addChild('email', $email);
    $xml->addChild('age', $age);
    
    echo $xml->asXML();
} else {
    echo '<?xml version="1.0"?><response><error>Invalid input.</error></response>';
}
?>
