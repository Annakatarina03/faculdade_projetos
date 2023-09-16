<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen"
        class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-yellow-500 focus:outline-none rounded-lg border hover:text-white border-yellow-500 hover:bg-yellow-500  focus:z-10 focus:ring-4 focus:ring-gray-200"
        title="Visualizar">
        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4">
            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
        </svg>
    </button>

    <div x-show="modelOpen" class="fixed  md:top-5 inset-0 z-10 " aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>
        <div class="flex justify-center">
            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block p-8 w-screen overflow-hidden text-left transition-all transform my-20 sm:w-6/12 md:w-6/12 md:my-40 bg-white md:rounded-lg shadow-xl">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">Informações do funcionário</h3>

                </div>
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                            <input type="text" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Nome do funcionário" value="{{ $employee->name }}" disabled>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">CPF</label>
                            <input type="text" name="cpf"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="CPF do funcionário" value="{{ $employee->cpf }}" disabled>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                            <input type="text" name="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Usuário do funcionário" value="{{ $employee->username }}" disabled>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Cargo</label>
                            <select name="office"
                                class="office bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 peer">
                                <option disabled>Selecione o cargo</option>
                                @foreach ($positions as $office)
                                    <option {{ $office->slug === $employee->office->slug ? 'selected' : '' }}
                                        value="{{ $office->slug }}" disabled>{{ $office->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Salário</label>
                            <input type="number" name="salary"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="$2999" value="{{ $employee->wage }}" disabled>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Data de
                                admissão</label>
                            <input type="date" name="date_entry"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                value="{{ $employee->date_entry }}" disabled>
                        </div>
                    </div>
                    <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <button @click="modelOpen = false" type="reset"
                            class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-200 focus:z-10">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Fechar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
