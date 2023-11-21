<div>
    <h3 class="text-sm font-medium text-gray-900">Receitas publicadas: </h3>
    <div class="w-full col-span-4 py-4 sm:rounded-b-lg flex flex-wrap gap-8 justify-center">
        @foreach ($revenues as $index => $revenue)
            <div>
                <input type="checkbox" id="revenue{{ $revenue->id }}" name="publish_revenues[]"
                    wire:model.lazy="publish_revenues" class="hidden" disabled>
                <label for="revenue{{ $revenue->id }}"
                    class="flex items-center justify-between border-black border-2 rounded-3xl">
                    <div
                        class="bg-[#d1d9df] w-48 border-2 flex flex-col items-center justify-center gap-4 py-4 rounded-3xl">
                        <div class="bg-white rounded-3xl w-40 h-44">
                            <div class="flex justify-center w-full rounded-3xl">
                                <img src="{{ $revenue->images()->first() !== null ? url("storage/{$revenue->images->first()->url}") : url('/storage/revenues/no_image.png') }}"
                                    class="w-full h-24 rounded-t-3xl">
                            </div>
                            <div class="font-normal p-2 text-center">
                                <p role="document" class="text-wrap">{{ $revenue->name }}</p>
                            </div>
                        </div>
                        <div class="w-full flex justify-center">
                            <button
                                wire:click.prevent="openModal('revenue.revenues.form-view', {'id' : {{ $revenue->id }}})"
                                class="flex text-white py-1 px-4 justify-center items-center rounded-2xl bg-[#a0b2c2] hover:bg-opacity-50 focus:bg-opacity-50 cursor-pointer">
                                Ver receita
                            </button>
                        </div>
                    </div>
                </label>
            </div>
        @endforeach
    </div>
    <div class="bg-white relative sm:rounded-b-lg">
        @if (!empty($revenues->lastPage() > 1))
            <div class="py-4">{{ $revenues->withQueryString()->links() }}</div>
        @endif
    </div>
</div>
