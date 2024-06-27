<?php

namespace App\Models;

use App\Api\Employee;
use App\Api\Photo;
use Illuminate\Support\Facades\Session;
use Vizir\KeycloakWebGuard\Models\KeycloakUser;

class User extends KeycloakUser
{
    public function __construct($profile)
    {
        $email = $profile['email'];

        if (Session::has('user')) {
            if ($email != Session::get('user')['email']) {
                $this->retrieveAndStoreUser($email);
            }
        } else {
            $this->retrieveAndStoreUser($email);
        }

        $this->attributes = Session::get('user');
    }

    private function retrieveAndStoreUser($email)
    {
        $user = Employee::findBy('email', $email);
        $user->photoUrl = Photo::get($user->nik);

        Session::put('user', (array) $user);
    }
}
