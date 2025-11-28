<?php
require "AbstractUser.php";
class Admin extends AbstractUser
{
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = "ADMIN";
    }

    public function changeMemberRole(Member $member) : void
    {
        if($member->role === "MEMBER")
        {
            $member->role = "PREMIUM_MEMBER";
        }
        elseif($member->role === "PREMIUM_MEMBER")
        {
            $member->role = "MEMBER";
        }
    }
}