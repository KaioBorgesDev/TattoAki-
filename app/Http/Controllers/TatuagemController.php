<?php

namespace App\Http\Controllers;

use App\Models\AgendamentoTatuagem;
use Illuminate\Http\Request;

class TatuagemController extends Controller
{
    // Exibe o formulário de agendamento
    public function create()
    {
        return view('agendar');
    }

    public function showForm($tatuagem)
    {
        $tatuagens = [
            'tribal' => ['nome' => 'Tatuagem Tribal', 'preco' => 300, 'descricao' => 'Descrição da tatuagem tribal.'],
            'floral' => ['nome' => 'Tatuagem Floral', 'preco' => 350, 'descricao' => 'Descrição da tatuagem floral.'],
            'geometrica' => ['nome' => 'Tatuagem Geométrica', 'preco' => 400, 'descricao' => 'Descrição da tatuagem geométrica.'],
            'retro' => ['nome' => 'Tatuagem Retrô', 'preco' => 250, 'descricao' => 'Descrição da tatuagem retrô.'],
            'realista' => ['nome' => 'Tatuagem Realista', 'preco' => 500, 'descricao' => 'Descrição da tatuagem realista.'],
        ];

        // Verifique se a tatuagem existe
        if (!array_key_exists($tatuagem, $tatuagens)) {
            abort(404); // Caso a tatuagem não exista, retorna um erro 404
        }

        // Passando a tatuagem para a view
        return view('agendar', ['tatuagem' => $tatuagens[$tatuagem]]);
    }

    // Salva o agendamento no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'tatuagem' => 'required|string',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
        ]);

        AgendamentoTatuagem::create([
            'tatuagem' => $request->tatuagem,
            'data' => $request->data,
            'hora' => $request->hora,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        return redirect()->route('tatto')->with('success', 'Agendamento realizado com sucesso!');
    }
}
