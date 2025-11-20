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
    //premier essai (un peu capilotracté...)
    /*while($i < count($users))
    {
        foreach($users[$i] as $key => $user)
        {
            echo "User $key : $user <br>";
        }
        $i++;
    }*/
    //deuxieme essai
    while($i < count($users))
    {
        $firstName = $users[$i]["firstName"];
        $lastName = $users[$i]["lastName"];
        $i++;
        echo "$firstName $lastName<br>";
    }
?>