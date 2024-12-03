<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agende a sua tatuagem:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <h3 class="text-xl font-semibold mb-6">Escolha a tatuagem que você deseja fazer!</h3>

                    <!-- Lista de tatuagens -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tatuagem 1 -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/300x300" alt="Tatuagem Tribal" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Tatuagem Tribal</h4>
                            <p class="text-gray-600">A tatuagem tribal com detalhes únicos e personalizados.</p>
                            <p class="text-lg font-bold text-gray-800 mt-2">R$ 300,00</p>
                            <a href="{{ route('agendar.tatuagem.form', ['tatuagem' => 'tribal']) }}" class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">Agendar</a>
                        </div>

                        <!-- Tatuagem 2 -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/300x300" alt="Tatuagem Floral" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Tatuagem Floral</h4>
                            <p class="text-gray-600">Um design delicado com flores e folhas, para quem ama a natureza.</p>
                            <p class="text-lg font-bold text-gray-800 mt-2">R$ 350,00</p>
                            <a href="{{ route('agendar.tatuagem.form', ['tatuagem' => 'floral']) }}" class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">Agendar</a>
                        </div>

                        <!-- Tatuagem 3 -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/300x300" alt="Tatuagem Geométrica" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Tatuagem Geométrica</h4>
                            <p class="text-gray-600">Para quem gosta de linhas e formas geométricas modernas.</p>
                            <p class="text-lg font-bold text-gray-800 mt-2">R$ 400,00</p>
                            <a href="{{ route('agendar.tatuagem.form', ['tatuagem' => 'geometrica']) }}" class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">Agendar</a>
                        </div>

                        <!-- Tatuagem 4 -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/300x300" alt="Tatuagem Retrô" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Tatuagem Retrô</h4>
                            <p class="text-gray-600">Uma tatuagem com um estilo retrô, trazendo elementos vintage.</p>
                            <p class="text-lg font-bold text-gray-800 mt-2">R$ 250,00</p>
                            <a href="{{ route('agendar.tatuagem.form', ['tatuagem' => 'retro']) }}" class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">Agendar</a>
                        </div>

                        <!-- Tatuagem 5 -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/300x300" alt="Tatuagem Realista" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-gray-800">Tatuagem Realista</h4>
                            <p class="text-gray-600">Uma tatuagem com detalhes realistas, ideal para retratos e figuras.</p>
                            <p class="text-lg font-bold text-gray-800 mt-2">R$ 500,00</p>
                            <a href="{{ route('agendar.tatuagem.form', ['tatuagem' => 'realista']) }}" class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">Agendar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
