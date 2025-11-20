<?php
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny"
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit"
        ]
    ];
    $temp = ["",""];
    $i = 0;
    $j = 0;
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 3</title>
    </head>
    <body>
        <h1>
            Liste des utilisateurs
        </h1>
        <ul>
            <?php
            while($i < count($users))
            {
                $firstName = $users[$i]["firstName"];
                $lastName = $users[$i]["lastName"];
                $i++;?>
                <li><?= "$firstName $lastName" ?></li>
            <?php
            }?>
        </ul>
    </body>
</html>