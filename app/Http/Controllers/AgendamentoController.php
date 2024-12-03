<?php

namespace App\Http\Controllers;
use App\Models\AgendamentoTatuagem;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index(Request $request)
    {
        $userEmail = $request->user()->email; // Obtém o e-mail do usuário logado
        $agendamentos = AgendamentoTatuagem::where('email', $userEmail)->get(); // Filtra os agendamentos por e-mail

        return view('agendamentos.index', compact('agendamentos')); // Retorna a view com os agendamentos
    }
}
