<?php
require "models/User.php";
require "managers/UserManager.php";
$console = new UserManager();
$console->LoadUsers();
$users = $console->getUsers();

