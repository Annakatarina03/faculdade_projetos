<section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
    <div class="w-full sm:w-11/12 p-4 lg:px-12">
        <div class="pb-4 flex justify-center sm:justify-start">
            <span class="text-4xl font-bold text-[#2A384C]">
                Publicação de livros
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
                @elseif (session()->has('error'))
                    <div class="flex items-center p-2 justify-center text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50"
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
                        <div class="w-full flex justify-center">
                            @if ($cookbook->revenues()->get()->isEmpty())
                                <a href="{{ route('publications.publish.cookbooks-create', $cookbook) }}"
                                    class="flex text-white py-1 px-4 justify-center items-center rounded-2xl bg-[#a0b2c2] hover:bg-opacity-50 focus:bg-opacity-50 cursor-pointer">
                                    Publicar
                                </a>
                            @else
                                <span
                                    class="inline-flex gap-1 justify-center items-center bg-green-900 text-white text-xs font-medium px-4 py-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-white"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                                    </svg> Publicado
                                </span>
                        </div>
                @endif
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
