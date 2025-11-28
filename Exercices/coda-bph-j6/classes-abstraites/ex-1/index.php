<?php
require "Admin.php";
require "Member.php";
$member = new Member("member", "password_member","yo la team",["a","b"]);
$admin = new Admin("admin", "password_admin");
echo "<pre>";
var_dump($member);
echo "</pre>";
echo "<pre>";
var_dump($admin);
echo "</pre>";
$admin->changeMemberRole($member);
echo "<pre>";
var_dump($member);
echo "</pre>";
$admin->changeMemberRole($member);
echo "<pre>";
var_dump($member);
echo "</pre>";
