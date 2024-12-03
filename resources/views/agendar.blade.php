<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <h3 class="text-xl font-semibold mb-6">Agende a tatuagem: {{ $tatuagem['nome'] }}</h3>

                    <!-- Formulário de agendamento -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="https://via.placeholder.com/300x300" alt="{{ $tatuagem['nome'] }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-gray-800">{{ $tatuagem['nome'] }}</h4>
                        <p class="text-gray-600">{{ $tatuagem['descricao'] }}</p>
                        <p class="text-lg font-bold text-gray-800 mt-2">R$ {{ number_format($tatuagem['preco'], 2, ',', '.') }}</p>

                        <!-- Formulário de agendamento -->
                        <form action="{{ route('agendar.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="tatuagem" value="{{ $tatuagem['nome'] }}">
                            <div class="mt-4">
                                <label for="data" class="block">Data</label>
                                <input type="date" name="data" id="data" class="w-full p-2 border border-gray-300 rounded mt-1" required>

                                <label for="hora" class="block mt-4">Hora</label>
                                <input type="time" name="hora" id="hora" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                            </div>

                            <div class="mt-4">
                                <label for="nome" class="block">Seu nome</label>
                                <input type="text" name="nome" id="nome" class="w-full p-2 border border-gray-300 rounded mt-1" required>

                                <label for="email" class="block mt-4">E-mail</label>
                                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>

                                <label for="telefone" class="block mt-4">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                            </div>

                            <button type="submit" class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">Agendar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
