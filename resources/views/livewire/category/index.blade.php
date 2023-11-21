<section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
    <div class="w-full sm:w-11/12 p-4 lg:px-12">
        <div class="pb-4 flex justify-center sm:justify-start">
            <span class="text-4xl font-bold text-[#2A384C]">
                Categorias
            </span>
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
                                    placeholder="Descrição da categoria">
                            </div>
                        </form>
                    </div>
                    @if (session()->has('success'))
                        <div class="flex items-center p-2 justify-center text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div>
                                <span class="font-medium">
                                    {{ session()->get('success') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button wire:click="openModal('category.form-create')"
                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Registrar categoria
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex overflow-auto">
                <table class="text-sm text-left text-gray-500 w-full">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr class="overflow-x-hidden">
                            <th scope="col" class="p-4 w-10"></th>
                            <th scope="col" class="p-4 w-40 text-center">
                                Nome
                            </th>
                            <th scope="col" class="p-4 w-40 text-center">
                                Última atualização
                            </th>
                            <th scope="col" class="p-4 w-40"></th>
                        </tr>
                    </thead>
                    <tbody class="overflow-x-hidden">
                        @foreach ($categories as $category)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-4"></td>
                                <td class="px-4 py-3 w-full justify-center flex items-center whitespace-nowrap">
                                    <div class="flex items-center justify-sttart w-72">
                                        <div class="flex py-1.5 items-center gap-3 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-800"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
                                        </div>
                                        <span class="text-blue-800 text-sm font-medium px-2 py-0.5 rounded">
                                            {{ $category->name }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        {{ $category->updated_at }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    <div class="flex items-center justify-center space-x-4">
                                        <button
                                            wire:click="openModal('category.form-update', {'id' : {{ $category->id }}})"
                                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                            title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button
                                            wire:click="openModal('category.form-view', {'id' : {{ $category->id }}})"
                                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                            title="Visualizar">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </button>
                                        <button
                                            wire:click="openModal('category.form-delete', {'id' : {{ $category->id }}})"
                                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
                                            title="Deletar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
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
                @foreach ($categories as $category)
                    <div class="p-4 bg-gray-50 space-y-3">
                        <div>
                            <div>
                                <div class="px-1 py-1 flex items-center whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-800"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>
                                    </div>
                                    <span class="text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                        {{ $category->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="px-1 py-1 font-medium text-gray-900 w-40 whitespace-nowrap">
                                <span class="flex items-center">
                                    {{ $category->updated_at }}
                                </span>
                            </div>
                            <div>
                                <td class="px-4 py-3 w-40 font-medium text-gray-900 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <button
                                            wire:click="openModal('category.form-update', {'id' : {{ $category->id }}})"
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
                                            wire:click="openModal('category.form-view', {'id' : {{ $category->id }}})"
                                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                            title="Visualizar">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </button>
                                        <button
                                            wire:click="openModal('category.form-delete', {'id' : {{ $category->id }}})"
                                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
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
                @if (!empty($categories->lastPage() > 1))
                    <div class="py-4">{{ $categories->withQueryString()->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
