<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meus Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-4">Tatuagem</th>
                            <th class="border p-4">Data</th>
                            <th class="border p-4">Hora</th>
                            <th class="border p-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agendamentos as $agendamento)
                            <tr>
                                <td class="border p-4">{{ $agendamento->tatuagem }}</td>
                                <td class="border p-4">{{ $agendamento->data }}</td>
                                <td class="border p-4">{{ $agendamento->hora }}</td>
                                <td class="border p-4">
                                    <!-- Aqui você pode adicionar links para editar ou excluir os agendamentos -->
                                    <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                                    <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border p-4 text-center">Nenhum agendamento encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
