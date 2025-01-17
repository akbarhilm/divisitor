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
        $role = [];
		$otoritas = Otoritas::select('i_idmodul')->where('i_emp',$user->nik)->where('c_active', '1')->get();
        
		foreach($otoritas as $o){
			array_push($role,$o->i_idmodul);
		}
        $user->role=$role;
       
        Session::put('user', (array) $user);
        //Session::put();

    }
}
