<?php
    $users = [
        [
            "firstName" => "Hugues",
            "lastName" => "Froger"
        ],
        [
            "firstName" => "Mari",
            "lastName" => "Doucet"
        ]
    ];
    $i = 0;
    while($i < count($users))
    {
        foreach($users[$i] as $key => $user)
        {
            echo "User $key : $user <br>";
        }
        $i++;
    }
?>