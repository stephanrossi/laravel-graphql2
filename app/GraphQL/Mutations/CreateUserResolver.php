<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserResolver
{
    /**
     * Handle the GraphQL mutation.
     *
     * @param  null  $_
     * @param  array{}  $args
     * @return User
     */
    public function __invoke($_, array $args)
    {
        // Encriptar o password
        $args['password'] = Hash::make($args['password']);

        // Criar o usuário com os dados fornecidos
        return User::create($args);
    }
}
