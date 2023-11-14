<section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
    <div class="w-full sm:w-11/12 p-4 lg:px-12">
        <div class="pb-4 flex justify-center sm:justify-start">
            <span class="text-4xl font-bold text-[#2A384C]">
                Todos livros de receitas
            </span>

        </div>
        <div class="w-full bg-[#D1D9DF] px-4 rounded-tr-lg rounded-tl-lg">
            <div
                class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between sm:mx-0 py-4">
                <div class="w-full md:w-3/12">
                    <form>
                        <div class="relative flex gap-2">
                            <input type="search" id="search" name="search" wire:model.live="search"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nome do livro de receita">
                        </div>
                    </form>
                </div>
                @if (session()->has('success'))
                    <div class="flex items-center p-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
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
                @elseif (session()->has('error'))
                    <div class="flex items-center p-2  text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div>
                            <span class="font-medium">
                                {{ session()->get('error') }}
                            </span>
                        </div>
                    </div>
                @endif
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button wire:click="openModal('cook-book.my-cook-books.form-create')"
                        class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Registrar livro de receitas
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white relative shadow-md">
            <div class="relative py-4 sm:rounded-b-lg flex flex-wrap gap-8 justify-center">
                @foreach ($cookbooks as $cookbook)
                    <div
                        class="bg-[#d1d9df] w-60 border border-black flex flex-col items-center justify-center gap-4 py-4 rounded-3xl">
                        <div class="font-normal p-2 text-center">
                            <h2 role="document" class="text-wrap text-lg font-bold">
                                {{ $cookbook->title }}
                            </h2>
                        </div>
                        <div class="flex justify-center w-full pl-6 rounded-3xl">
                            <img src="{{ url('/images/cookbooks/cookbook_image.png') }}" alt="Livro de receitas"
                                class="w-36 rounded-t-3xl">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white relative shadow-md sm:rounded-b-lg">
            @if (!empty($cookbooks->lastPage() > 1))
                <div class="py-4">{{ $cookbooks->withQueryString()->links() }}</div>
            @endif
        </div>
    </div>
</section>
