<section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
    <div class="w-full sm:w-11/12 p-4 lg:px-12">
        <div class="pb-4 flex justify-center sm:justify-start">
            <span class="text-4xl font-bold text-[#2A384C]">
                Minhas degustações
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
                                placeholder="Nome da receita">
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
                            <span class="font-medium"> {{ session()->get('success') }}
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
                            <span class="font-medium"> {{ session()->get('error') }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-white relative shadow-md">
            <div class="relative py-4 sm:rounded-b-lg flex flex-wrap gap-8 justify-center">
                @foreach ($revenues as $revenue)
                    <div
                        class="bg-[#d1d9df] w-60 border border-black flex flex-col items-center justify-center gap-4 py-4 rounded-3xl">
                        <div class="bg-white rounded-3xl w-52 h-56">
                            <div class="flex justify-center w-full rounded-3xl">
                                <img src="{{ $revenue->images()->first() !== null ? url("storage/{$revenue->images->first()->url}") : url('/storage/revenues/no_image.png') }}"
                                    alt="{{ $revenue->name }}" class="w-full h-32 rounded-t-3xl">
                            </div>
                            <div class="font-normal p-2 text-center">
                                <p role="document" class="text-wrap">
                                    {{ $revenue->name }}
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex justify-center">
                            @if ($revenue->tasting()->firstWhere('taster_id', auth()->user()->id)->pivot->tasting_note)
                                <button
                                    wire:click="openModal('recipe-tasting.my-tasting.form-create', {'id' : {{ $revenue->id }}})"
                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                    title="Visualizar">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                    </svg>
                                </button>
                            @else
                                <button
                                    wire:click="openModal('recipe-tasting.my-tasting.form-create', {'id' : {{ $revenue->id }}})"
                                    class="flex text-white py-1 px-4 justify-center items-center rounded-2xl bg-[#a0b2c2] hover:bg-opacity-50 focus:bg-opacity-50 cursor-pointer">
                                    Avaliar
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white relative shadow-md sm:rounded-b-lg">
            @if (!empty($revenues->lastPage() > 1))
                <div class="py-4">{{ $revenues->withQueryString()->links() }}</div>
            @endif
        </div>
    </div>
</section>
