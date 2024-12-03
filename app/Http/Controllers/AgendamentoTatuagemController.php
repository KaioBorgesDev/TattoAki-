<?php

namespace App\Http\Controllers;

use App\Models\AgendamentoTatuagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentoTatuagemController extends Controller
{
    public function index()
    {
        // Busca os agendamentos do usuário logado
        $agendamentos = AgendamentoTatuagem::where('email', Auth::user()->email)->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

   // Método para exibir o formulário de edição
   public function edit($id)
   {
       $agendamento = AgendamentoTatuagem::findOrFail($id);

       // Verificar se o agendamento pertence ao usuário logado
       if ($agendamento->email !== auth()->user()->email) {
           return redirect()->route('agendamentos.index')->with('error', 'Você não tem permissão para editar este agendamento.');
       }

       return view('agendamentos.edit', compact('agendamento'));
   }

   // Método para atualizar o agendamento
   public function update(Request $request, $id)
   {
       $request->validate([
           'tatuagem' => 'required|string',
           'data' => 'required|date',
           'hora' => 'required|date_format:H:i',
           'nome' => 'required|string',
           'email' => 'required|email',
           'telefone' => 'required|string',
       ]);

       $agendamento = AgendamentoTatuagem::findOrFail($id);

       // Verificar se o agendamento pertence ao usuário logado
       if ($agendamento->email !== auth()->user()->email) {
           return redirect()->route('agendamentos.index')->with('error', 'Você não tem permissão para editar este agendamento.');
       }

       $agendamento->update([
           'tatuagem' => $request->tatuagem,
           'data' => $request->data,
           'hora' => $request->hora,
           'nome' => $request->nome,
           'email' => $request->email,
           'telefone' => $request->telefone,
       ]);

       return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
   }
   
    public function destroy($id)
    {
        $agendamento = AgendamentoTatuagem::findOrFail($id);
        
        // Verifica se o agendamento pertence ao usuário logado
        if ($agendamento->email !== Auth::user()->email) {
            return redirect()->route('agendamentos.index')->with('error', 'Você não tem permissão para excluir este agendamento.');
        }

        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }
}
