<?php
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny",
            "age" => 29
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit",
            "age" => 17
        ]
    ];
    $i = 0;
    $val = 0;
    $level = ["mineur","majeur"];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4</title>
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
                $age = $users[$i]["age"];
                if($age > 17)
                {
                    $val++;
                }
                $i++;?>
                <li><?= "$firstName $lastName $level[$val]" ?></li>
            <?php
                $val = 0;
            }
            $i = 0;?>
        </ul>
    </body>
</html>