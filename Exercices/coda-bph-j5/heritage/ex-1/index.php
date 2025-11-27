<?php
require "Reader.php";
$i = 0;
$reader1 = new Reader("email1", "password1");
$reader1->addBookToFavorites("Les 3 mousquetaires");
$tab = $reader1->addBookToFavorites("Harry potter");
while($i < count($tab))
{
    echo"$tab[$i] ";
    $i++;
}
$i = 0;
echo "<br>";
$tab = $reader1->removeBookFromFavorites("Harry potter");
while($i < count($tab))
{
    echo"$tab[$i] ";
    $i++;
}
$tab = ["login", "password"];
$i = 0;
echo "<br>";
$login = $reader1->login();
while($i < count($login))
{
    echo "{$login[$tab[$i]]} ";
    $i++;
}
$i = 0;
echo "<br>";
?>