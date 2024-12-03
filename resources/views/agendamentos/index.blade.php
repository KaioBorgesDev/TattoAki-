<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Agendamentos</title>
            @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            @else
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            @endif
        </head>
        <body class="bg-gray-50 font-sans antialiased">
            <div class="min-h-screen flex flex-col">
                <header class="bg-white shadow">
                    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                        <h1 class="text-xl font-semibold text-gray-800">Meus Agendamentos</h1>
                    </div>
                </header>

                <main class="flex-1 container mx-auto px-6 py-10">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-gray-800">Lista de Meus Agendamentos</h2>

                        @if(session('success'))
                            <div class="bg-green-500 text-white p-3 mb-4 rounded">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="bg-red-500 text-white p-3 mb-4 rounded">{{ session('error') }}</div>
                        @endif

                        <table class="min-w-full bg-white border border-gray-300 mt-6">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Tatuagem</th>
                                    <th class="px-4 py-2">Data</th>
                                    <th class="px-4 py-2">Hora</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">E-mail</th>
                                    <th class="px-4 py-2">Telefone</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendamentos as $agendamento)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ $agendamento->id }}</td>
                                        <td class="px-4 py-2">{{ $agendamento->tatuagem }}</td>
                                        <td class="px-4 py-2">{{ $agendamento->data }}</td>
                                        <td class="px-4 py-2">{{ $agendamento->hora }}</td>
                                        <td class="px-4 py-2">{{ $agendamento->nome }}</td>
                                        <td class="px-4 py-2">{{ $agendamento->email }}</td>
                                        <td class="px-4 py-2">{{ $agendamento->telefone }}</td>
                                        <td class="px-4 py-2">
                                            <!-- Formulário para editar o agendamento -->
                                            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="document.getElementById('edit-form-{{ $agendamento->id }}').classList.toggle('hidden')">Editar</button>

                                            <!-- Formulário de edição dentro de uma linha oculta -->
                                            <form id="edit-form-{{ $agendamento->id }}" action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST" class="hidden mt-4">
                                                @csrf
                                                @method('PUT')

                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="tatuagem" class="block text-sm">Tatuagem:</label>
                                                        <input type="text" name="tatuagem" value="{{ $agendamento->tatuagem }}" class="w-full border rounded px-2 py-1" required readonly>
                                                    </div>
                                                    <div>
                                                        <label for="data" class="block text-sm">Data:</label>
                                                        <input type="date" name="data" value="{{ $agendamento->data }}" class="w-full border rounded px-2 py-1" required readonly>
                                                    </div>
                                                    <div>
                                                        <label for="hora" class="block text-sm">Hora:</label>
                                                        <input type="time" name="hora" value="{{ $agendamento->hora }}" class="w-full border rounded px-2 py-1" required>
                                                    </div>
                                                    <div>
                                                        <label for="nome" class="block text-sm">Nome:</label>
                                                        <input type="text" name="nome" value="{{ $agendamento->nome }}" class="w-full border rounded px-2 py-1" required readonly>
                                                    </div>
                                                    <div>
                                                        <label for="email" class="block text-sm">E-mail:</label>
                                                        <input type="email" name="email" value="{{ $agendamento->email }}" class="w-full border rounded px-2 py-1" required readonly>
                                                    </div>
                                                    <div>
                                                        <label for="telefone" class="block text-sm">Telefone:</label>
                                                        <input type="text" name="telefone" value="{{ $agendamento->telefone }}" class="w-full border rounded px-2 py-1" required readonly>
                                                    </div>
                                                </div>
                                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Atualizar</button>
                                            </form>

                                            <!-- Formulário para deletar o agendamento -->
                                            <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </body>
    </html>
</x-app-layout>
