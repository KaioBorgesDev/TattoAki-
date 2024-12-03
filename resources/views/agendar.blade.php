<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agende sua Tatuagem:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <h3 class="text-xl font-semibold mb-6">Preencha os dados abaixo para agendar sua tatuagem</h3>

                    <!-- Exibindo a mensagem de sucesso, se houver -->
                    @if(session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Formulário de agendamento -->
                    <form action="{{ route('agendar.tatuagem') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Seleção de Tatuagem -->
                        <div>
                            <label for="tatuagem" class="block text-lg font-medium text-gray-700">Escolha a Tatuagem</label>
                            <select id="tatuagem" name="tatuagem" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="tribal">Tatuagem Tribal</option>
                                <option value="floral">Tatuagem Floral</option>
                                <option value="geometrica">Tatuagem Geométrica</option>
                                <option value="retro">Tatuagem Retrô</option>
                                <option value="realista">Tatuagem Realista</option>
                            </select>
                        </div>

                        <!-- Data do Agendamento -->
                        <div>
                            <label for="data" class="block text-lg font-medium text-gray-700">Data do Agendamento</label>
                            <input type="date" id="data" name="data" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Hora do Agendamento -->
                        <div>
                            <label for="hora" class="block text-lg font-medium text-gray-700">Hora do Agendamento</label>
                            <input type="time" id="hora" name="hora" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Nome do Cliente -->
                        <div>
                            <label for="nome" class="block text-lg font-medium text-gray-700">Seu Nome</label>
                            <input type="text" id="nome" name="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Email do Cliente -->
                        <div>
                            <label for="email" class="block text-lg font-medium text-gray-700">Seu Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Telefone do Cliente -->
                        <div>
                            <label for="telefone" class="block text-lg font-medium text-gray-700">Seu Telefone</label>
                            <input type="tel" id="telefone" name="telefone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Botão de Submissão -->
                        <div class="mt-6">
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                                Agendar Tatuagem
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
