<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        return User::all();
    }

    public function createUser($rootValue, array $args)
    {
        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
        ]);

        return $user;
    }

    public function updateUser($rootValue, array $args)
    {
        $user = User::findOrFail($args['id']);

        $user->update([
            'name' => $args['name'] ?? $user->name,
            'email' => $args['email'] ?? $user->email,
            'password' => isset($args['password']) ? bcrypt($args['password']) : $user->password,
        ]);

        return $user;
    }

    public function deleteUser($rootValue, array $args)
    {
        $user = User::findOrFail($args['id']);
        $user->delete();

        return true;
    }
}

