<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @elseif(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                    <td>
                        <!-- Formulário para atualizar o status de admin -->
                        <form action="{{ url('admin/usuarios/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="is_admin">Administrador:</label>
                            <select name="is_admin" id="is_admin">
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Não</option>
                            </select>

                            <button type="submit">Atualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
