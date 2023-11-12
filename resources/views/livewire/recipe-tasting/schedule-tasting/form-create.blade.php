<div class="w-full">
    <div class="flex justify-between items-center py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">
            Marcar degustação
        </h3>
        @include('layouts.components.logo')
    </div>
    <form wire:submit="create" method="POST" enctype="multipart/form-data" class="py-8">
        @csrf
        <div class="flex xl:flex-row flex-col">
            <div class="grid gap-2 md:grid-cols-4 xl:h-52 ">
                <div class="relative md:grid md:col-span-4">
                    <div class="pb-2.5">
                        <label for="recipe_name" class="block mb-2 text-sm font-medium text-gray-900">
                            Nome da receita
                        </label>
                        <input type="text" name="recipe_name" wire:model.live="recipe_name" disabled
                            @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
                            ]) placeholder="Nome da receita">
                    </div>
                </div>
                <div class="relative md:col-span-4">
                    <div class="pb-2.5">
                        <label for="chef_name" class="block mb-2 text-sm font-medium text-gray-900">
                            Cozinheiro responsável
                        </label>
                        <input type="text" name="chef_name" wire:model.live="chef_name" disabled
                            @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
                            ]) placeholder="Chefe de cozinha">
                    </div>
                </div>
                <div class="relative md:grid md:col-span-2">
                    <div class="pb-2.5">
                        <label for="average_grade" class="block mb-2 text-sm font-medium text-gray-900">
                            Nota média
                        </label>
                        <input type="text" name="average_grade" wire:model.live="average_grade"
                            @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
                            ]) disabled>
                    </div>
                </div>
                <div class="relative md:grid md:col-span-2">
                    <div class="pb-2.5">
                        <label for="tasting_date" class="block mb-2 text-sm font-medium text-gray-900">
                            Data da degustação
                        </label>
                        <input type="date" min="{{ date('Y-m-d') }}" name="tasting_date" wire:model="tasting_date"
                            @class([
                                'bg-white',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('tasting_date'),
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                            ])>
                    </div>
                </div>
            </div>
            <div
                class="flex
                            flex-col justify-between md:flex-row gap-2 xl:grid xl:w-5/12 xl:pl-4 xl:gap-0 mb-1
                            md:grid-cols-2">
                <div class="justify-start w-full relative md:col-span-2">
                    <div class="pb-2.5">
                        <span class="block mb-2 text-sm font-medium text-gray-900">
                            Imagem da receita
                        </span>
                        <label for="image_recipe"
                            class="flex flex-col items-center justify-center w-64 max-h-44 h-36 border-gray-300 rounded-lg bg-gray-50">
                            <div class="flex flex-col items-center justify-center">
                                @if ($image_recipe || $revenue->images()->first())
                                    <img class="w-full rounded-lg"
                                        src="{{ $image_recipe ? $image_recipe->temporaryUrl() : url("storage/{$revenue->images()->first()->url}") }}"
                                        alt="{{ $revenue->name }}" title="{{ $revenue->name }}"
                                        class="w-full rounded-lg">
                                @else
                                    <img src="{{ $revenue->images()->first() !== null ? url("storage/{$revenue->images->first()->url}") : url('/storage/revenues/no_image.png') }}"
                                        class="w-full rounded-lg">
                                @endif
                            </div>
                            <input id="image_recipe" disabled name="image_recipe" wire:model="image_recipe"
                                type="file" class="hidden" />
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="items-center flex pt-28 pb-2 gap-2">
            <button type="submit"
                class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Marcar degustação
            </button>
            <button wire:click.prevent='closeModal'
                class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                Cancelar
            </button>
        </div>
    </form>
    <pre>
</div>
