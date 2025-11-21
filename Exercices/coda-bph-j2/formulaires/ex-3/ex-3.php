<?php
if($_GET["name"] === NULL)
{
    $name = "Anonyme";
}
else if($_GET["name"] === "")
{
    $name = "Anonyme";
}
else
{
    $name = $_GET["name"];
}
echo "Bienvenue $name !";
?>