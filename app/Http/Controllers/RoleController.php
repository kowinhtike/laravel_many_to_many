<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;

class RoleController extends Controller
{
    //

    public function addRoles($role_name){

        $role = new Role();
        $role->name = $role_name;
        $role->save();

        // $roles = array('Admin','Editor','Manager',"Moderator","Developer","User");
        // foreach($roles as $item){
        //     $role = new Role();
        //     $role->name = $item;
        //     $role->save();
        // }

        return  $role_name." was added Successfully";
   }

   public function addUsers($name,$email,$password,$bookId){
    $user = new User();
    $user->name = $name;
    $user->email = $email;
    $user->password = Hash::make($password);
    $user->save();
    $user->roles()->attach($bookId);
    // $user->roles()->attach([1,2,3]);

    return "User added successfully";
   }

   public function getRolesByUser($id){
    $user = User::find($id);
    $roles = $user->roles;
    foreach($roles as $role){
        echo $role->name. "<br>";
    }
   }

   public function getUserByRoles($id){
    $role = Role::find($id);
    $users = $role->users;
    foreach($users as $user){
        echo $user->name. "<br>";
    }
   }
}
