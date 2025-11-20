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
                foreach($users[$i] as $key => $value)
                {
                    $temp[$j]=$value;
                    $j++;
                }?>
                <li><?= "$temp[0] $temp[1]" ?></li>
                <?php
                $temp = ["",""];
                $j = 0;
                $i++;
            }?>
        </ul>
    </body>
</html>