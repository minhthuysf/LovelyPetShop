<?php
header('Content-Type: text/xml; charset=utf-8');
$conn = new mysqli('localhost', 'root', '', 'lovepets');
mysqli_set_charset($conn, 'UTF8');
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$city = $_GET['city'];
$sql = "select * from district where id ='$city'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $root = $doc->createElement("cities");
    $doc->appendChild($root);
    while ($row = $result->fetch_row()) {
        // echo $row[0];
        $node = $doc->createElement("city");
        $name = $doc->createElement("id");
        $name->appendChild($doc->createTextNode($row[0]));
        $node->appendChild($name);

        $name = $doc->createElement("name");
        $name->appendChild($doc->createTextNode($row[2]));
        $node->appendChild($name);

        $root->appendChild($node);
    }
    mysqli_free_result($result);
}
$conn->close();
echo $doc->saveXML();
?>
