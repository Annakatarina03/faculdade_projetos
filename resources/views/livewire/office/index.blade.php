<div>
    <section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
        <div class="w-full sm:w-11/12 p-4 lg:px-12">
            <div class="pb-4 flex justify-center sm:justify-start">
                <span class="text-4xl text-bold">Cargos</span>
            </div>
            <div class="bg-white relative shadow-md sm:rounded-lg">

                <div class="w-full bg-[#D1D9DF] px-4 rounded-tr-lg rounded-tl-lg">
                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between sm:mx-0 py-4">
                        <div class="w-full md:w-3/12">
                            <form>
                                <div class="relative flex gap-2">
                                    <input type="search" id="search" name="search" wire:model.live="search"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Nome do cargo">
                                </div>
                            </form>
                        </div>
                        @if (session()->has('success'))
                            <div class="flex items-center p-2  text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div>
                                    <span class="font-medium"> {{ session()->get('success') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="flex items-center p-2  text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div>
                                    <span class="font-medium"> {{ session()->get('error') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button wire:click="openModal('office.form-create')"
                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Registrar cargo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex overflow-auto">
                    <table class="text-sm text-left text-gray-500 w-full">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="overflow-x-hidden">
                                <th scope="col" class="p-4 w-10"></th>
                                <th scope="col" class="p-4 w-40 text-center">Nome</th>
                                <th scope="col" class="p-4 w-40 text-center">Última atualização</th>
                                <th scope="col" class="p-4 w-40"></th>
                            </tr>
                        </thead>
                        <tbody class="overflow-x-hidden">
                            @foreach ($positions as $office)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="p-4"></td>
                                    <td class="px-4 py-3 w-full justify-center flex items-center whitespace-nowrap">
                                        <div class="flex items-center justify-start w-72">
                                            <div class="flex py-1.5 items-center gap-3 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-blue-800"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8V444.8C394 378 431.1 230.1 432 141.4L256 66.8l0 0z" />
                                                </svg>
                                            </div>
                                            <span class="text-blue-800 text-sm font-medium px-2 py-0.5 rounded">
                                                {{ $office->name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            {{ $office->updated_at }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-4">
                                            <button
                                                wire:click="openModal('office.form-update', {'id' : {{ $office->id }}})"
                                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                                title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button
                                                wire:click="openModal('office.form-view', {'id' : {{ $office->id }}})"
                                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-yellow-500 focus:outline-none rounded-lg border hover:text-white focus:ring-yellow-300 border-yellow-500 hover:bg-yellow-500  focus:z-10 focus:ring-4"
                                                title="Visualizar">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                            </button>
                                            <button
                                                wire:click="openModal('office.form-delete', {'id' : {{ $office->id }}})"
                                                class="flex items-center justify-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center"
                                                title="Deletar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="grid grid-cols-1 gap-4 md:hidden">
                    @foreach ($positions as $office)
                        <div class="p-4 bg-gray-50 space-y-3">
                            <div>
                                <div>
                                    <div class="px-1 py-1 flex items-center whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-blue-800"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8V444.8C394 378 431.1 230.1 432 141.4L256 66.8l0 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                            {{ $office->name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="px-1 py-1 font-medium text-gray-900 w-40 whitespace-nowrap">
                                    <span class="flex items-center">
                                        {{ $office->updated_at }}
                                    </span>
                                </div>
                                <div>
                                    <td class="px-4 py-3 w-40 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <button
                                                wire:click="openModal('office.form-update', {'id' : {{ $office->id }}})"
                                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                                title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button
                                                wire:click="openModal('office.form-view', {'id' : {{ $office->id }}})"
                                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-yellow-500 focus:outline-none rounded-lg border hover:text-white focus:ring-yellow-300 border-yellow-500 hover:bg-yellow-500  focus:z-10 focus:ring-4"
                                                title="Visualizar">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                            </button>
                                            <button
                                                wire:click="openModal('office.form-delete', {'id' : {{ $office->id }}})"
                                                class="flex items-center justify-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center"
                                                title="Deletar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-white relative shadow-md sm:rounded-lg">
                    @if (!empty($positions->lastPage() > 1))
                        <div class="py-4">{{ $positions->withQueryString()->links() }}</div>
                    @endif
                </div>
            </div>
    </section>
</div>
