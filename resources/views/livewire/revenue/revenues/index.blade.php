<section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
    <div class="w-full sm:w-11/12 p-4 lg:px-12">
        <div class="pb-4 flex justify-center sm:justify-start">
            <span class="text-4xl font-bold text-[#2A384C]">
                Todas as receitas
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
            </div>
        </div>
        <div class="bg-white relative shadow-md">
            <div class="relative py-4 sm:rounded-b-lg flex flex-wrap gap-8 justify-center">
                @foreach ($revenues as $revenue)
                    <div
                        class="bg-[#d1d9df] w-60 border border-black flex flex-col items-center justify-center gap-4 py-4 rounded-3xl">
                        <div class="bg-white rounded-3xl w-52 h-56">
                            <div class="flex justify-center w-full rounded-2xl">
                                <img src="{{ $revenue->images()->first() !== null ? url("storage/{$revenue->images->first()->url}") : url('/storage/revenues/no_image.png') }}"
                                    class="w-full h-32 rounded-t-3xl">
                            </div>
                            <div class="font-normal p-2 text-center">
                                <p role="document" class="text-wrap">{{ $revenue->name }}</p>
                            </div>
                        </div>
                        <div class="w-full flex justify-center">
                            <button wire:click="openModal('revenue.revenues.form-view', {'id' : {{ $revenue->id }}})"
                                class="flex text-white py-1 px-4 justify-center items-center rounded-2xl bg-[#a0b2c2] hover:bg-opacity-50 focus:bg-opacity-50 cursor-pointer">
                                Ver receita
                            </button>
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
