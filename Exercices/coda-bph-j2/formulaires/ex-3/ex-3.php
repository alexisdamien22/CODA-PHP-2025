<?php
$name = $_GET["name"];
if($name === "")
{
    $name = "Anonyme";
}
echo "Bienvenue $name !";
?>