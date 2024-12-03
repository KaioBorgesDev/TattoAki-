
<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        @endif
    </head>
    <body class="bg-gray-50 font-sans antialiased">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Painel Admin</h1>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 container mx-auto px-6 py-10">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800">Lista de Usuários</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-3 mb-4 rounded">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div class="bg-red-500 text-white p-3 mb-4 rounded">{{ session('error') }}</div>
                    @endif

                    <table class="min-w-full bg-white border border-gray-300 mt-6">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Admin</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Formulário para atualizar o status de admin -->
                                        <form action="{{ url('admin/usuarios/'.$user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')

                                            <label for="is_admin" class="text-sm">Administrador:</label>
                                            <select name="is_admin" id="is_admin" class="border rounded px-2 py-1 text-sm">
                                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Sim</option>
                                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Não</option>
                                            </select>

                                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Atualizar</button>
                                        </form>

                                        <!-- Formulário para deletar o usuário -->
                                        <form action="{{ url('admin/usuarios/'.$user->id) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-gray-100 text-center py-4 mt-6">
                <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} Sua Empresa. Todos os direitos reservados.</p>
            </footer>
        </div>
    </body>
</html>
</x-app-layout>