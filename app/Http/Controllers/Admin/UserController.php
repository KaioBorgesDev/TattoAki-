<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Função para listar todos os usuários
    public function index()
    {
        // Verifica se o usuário autenticado é administrador
        if (auth()->user()->is_admin) {
            $users = User::all();
            return view('admin.users.index', compact('users'));
        }

        return redirect('/')->with('error', 'Você não tem permissão para acessar esta página.');
    }

    public function destroy($id)
    {
        // Encontrar o usuário pelo ID
        $user = User::findOrFail($id);

        // Excluir o usuário
        $user->delete();

        // Redirecionar de volta para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('admin.users.index')->with('success', 'Usuário excluído com sucesso.');
    }
    
    // Função para atualizar um usuário
    public function update($id, Request $request)
    {
        // Valida os dados enviados
        $validated = $request->validate([
            'is_admin' => 'required|boolean', // Garantindo que o campo 'is_admin' seja um booleano
        ]);

        // Busca o usuário pelo ID
        $user = User::findOrFail($id);

        // Atualiza o campo 'is_admin'
        $user->update([
            'is_admin' => $validated['is_admin'], // Atualiza o valor do campo 'is_admin'
        ]);

        // Redireciona de volta para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}