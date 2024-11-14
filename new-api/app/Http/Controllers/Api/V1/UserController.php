<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\V1\UserResource;

class UserController extends Controller
{
    // Retorna a lista de todos os usuários
    public function index()
    {
        return UserResource::collection(User::all());
    }

    // Exibe o formulário de criação de usuário (não usado em API)
    public function create()
    {
        //
    }

    // Salva um novo usuário no banco (implementação futura)
    public function store(Request $request)
    {
        //
    }

    // Mostra um usuário específico pelo ID
    public function show(User $user)
    {
        return new UserResource($user);
    }

    // Exibe o formulário de edição de usuário (não usado em API)
    public function edit(string $id)
    {
        //
    }

    // Atualiza os dados de um usuário pelo ID (implementação futura)
    public function update(Request $request, string $id)
    {
        //
    }

    // Exclui um usuário pelo ID (implementação futura)
    public function destroy(string $id)
    {
        //
    }
}
