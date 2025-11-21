<?php
$users = [
    [
        "name" => "Mari",
        "favoriteColor" => "blue"
    ],
    [
        "name" => "Santa",
        "favoriteColor" => "red"
    ],
    [
        "name" => "Shrek",
        "favoriteColor" => "green"
    ],
    [
        "name" => "Iron Man",
        "favoriteColor" => "red"
    ],
    [
        "name" => "Hulk",
        "favoriteColor" => "green"
    ],
    [
        "name" => "Hugues",
        "favoriteColor" => "blue"
    ]
];
$i = 0;
$color = $_GET["color"];
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4</title>
    </head>
    <body>
        <ul>
            <?php
            while($i < count($users))
            {
                if($users[$i]["favoriteColor"] === $color)
                {
                    echo'<li>';
                    echo $users[$i]["name"];
                    echo'</li>';
                }
                $i++;
            }?>
        </ul>
    </body>
</html>