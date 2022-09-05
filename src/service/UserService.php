<?php

require_once dirname(__DIR__) . "../data/users.php";

class UserService
{
    public function login($username, $password)
    {
        foreach (ADMINS as $admin) {
            //strtoupper could be applied for case-insensivity
            //there was no password hashing in the requirement
            // so a simple text comparison
            if (
                $username === $admin['username']
                && $password === $admin['password']
            ) {                
                return $admin;
            }
        }
        return null;
    }
}
