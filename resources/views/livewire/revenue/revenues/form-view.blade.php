<div class="w-full">
    <div class="flex justify-between items-center py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">
            Informações da receita
        </h3>
        @include('layouts.components.logo')
    </div>
    <form wire:submit="update" method="POST" enctype="multipart/form-data" class="py-8">
        @csrf
        <div class="flex xl:flex-row flex-col">
            <div class="grid gap-2 md:grid-cols-3 xl:h-52">
                <div class="relative md:col-span-2">
                    <div class="pb-2.5">
                        <label for="recipe_name" class="block mb-2 text-sm font-medium text-gray-900">
                            Nome da receita <span class="text-red-500" title="Campo obrigatório">*</span>
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
                <div class="relative md:grid md:col-span-1">
                    <div class="pb-2.5">
                        <label for="creation_date" class="block mb-2 text-sm font-medium text-gray-900">
                            Data da publicação
                        </label>
                        <input type="date" name="creation_date" wire:model="creation_date" disabled
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
                            ])>
                    </div>
                </div>
                <div class="relative md:grid md:col-span-2">
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
                <div class="relative md:col-span-1">
                    <div class="pb-2.5">
                        <label for="number_servings" class="block mb-2 text-sm font-medium text-gray-900">
                            Quantidade de porções
                        </label>
                        <input type="text" x-data x-init="Inputmask('integer', { allowMinus: false, numericInput: true, rightAlign: false }).mask($refs.input)" x-ref="input" name="number_servings"
                            wire:model.live="number_servings" disabled @class([
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
                            ])>
                    </div>
                </div>
                <div class="relative md:grid md:col-span-2">
                    <div class="pb-2.5">
                        <label for="number_servings" class="block mb-2 text-sm font-medium text-gray-900">
                            Categoria <span class="text-red-500" title="Campo obrigatório">*</span>
                        </label>
                        <input type="text" @class([
                            'bg-[#EEE]',
                            'shadow-inner',
                            'mb-2',
                            'border-1',
                            'border-gray-300',
                            'text-gray-900',
                            'text-sm rounded-lg',
                            'focus:ring-blue-600',
                            'focus:border-blue-600',
                            'w-full',
                            'p-2.5',
                            'cursor-not-allowed',
                            'pointer-events-none',
                        ]) name="category" wire:model.live="category"
                            disabled>
                    </div>
                </div>
                <div class="relative md:grid md:col-span-3">
                    <div class="pb-2.5">
                        <div class="flex items-center">
                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                Ingredientes:
                            </label>
                        </div>
                        <div class="h-[150px] max-h-[150px] overflow-y-auto">
                            @foreach ($recipe_ingredients as $index => $recipe_ingredient)
                                <div class="flex gap-2 items-center w-full py-2">
                                    <div class="relative w-2/6">
                                        <div class="pb-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Ingrediente
                                            </label>
                                            <input type="text" @class([
                                                'bg-[#EEE]',
                                                'shadow-inner',
                                                'mb-2',
                                                'border-1',
                                                'border-gray-300',
                                                'text-gray-900',
                                                'text-sm rounded-lg',
                                                'focus:ring-blue-600',
                                                'focus:border-blue-600',
                                                'w-full',
                                                'p-2.5',
                                                'cursor-not-allowed',
                                                'pointer-events-none',
                                            ]) disabled
                                                name="recipe_ingredients-{{ $index }}-ingredient"
                                                wire:model.live="recipe_ingredients.{{ $index }}.ingredient">
                                        </div>
                                    </div>
                                    <div class="relative w-16">
                                        <div class="pb-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Qtd.
                                            </label>
                                            <input type="text" x-data x-init="Inputmask('integer', { allowMinus: false, numericInput: true, rightAlign: false }).mask($refs.input)" x-ref="input"
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
                                                    'w-full',
                                                    'p-2.5',
                                                    'text-center',
                                                    'cursor-not-allowed',
                                                    'pointer-events-none',
                                                ]) disabled
                                                name="recipe_ingredients-{{ $index }}-amount"
                                                wire:model.live="recipe_ingredients.{{ $index }}.amount"
                                                placeholder="Ex: 1">
                                        </div>
                                        @error("recipe_ingredients.$index.amount")
                                            <div class="absolute bottom-0 flex gap-1 items-center"
                                                title="{{ $message }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                </svg>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="relative w-2/6">
                                        <div class="pb-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Medida
                                            </label>
                                            <input type="text" @class([
                                                'bg-[#EEE]',
                                                'shadow-inner',
                                                'mb-2',
                                                'border-1',
                                                'border-gray-300',
                                                'text-gray-900',
                                                'text-sm rounded-lg',
                                                'focus:ring-blue-600',
                                                'focus:border-blue-600',
                                                'w-full',
                                                'p-2.5',
                                                'cursor-not-allowed',
                                                'pointer-events-none',
                                            ])
                                                name="recipe_ingredients-{{ $index }}-measure"
                                                wire:model.live="recipe_ingredients.{{ $index }}.measure">
                                        </div>
                                        @error("recipe_ingredients.$index.measure")
                                            <div class="absolute bottom-0 flex gap-1 items-center"
                                                title="{{ $message }}"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                </svg>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col justify-between md:flex-row gap-2 xl:grid xl:w-5/12 xl:pl-4 xl:gap-0 mb-1 md:grid-cols-2">

                <div class="relative md:col-span-2">
                    <div class="pb-2.5">
                        <label for="method_preparation" class="block mb-2 text-sm font-medium text-gray-900">
                            Modo de preparo <span class="text-red-500" title="Campo obrigatório">*</span>
                        </label>
                        <textarea @class([
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
                            'rounded-xl',
                            'resize-none',
                        ]) id="method_preparation" disabled name="method_preparation" cols="40"
                            rows="8" wire:model.live="method_preparation"></textarea>
                    </div>
                    @error('method_preparation')
                        <div class="absolute bottom-0 flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
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
            <button wire:click.prevent='closeModal'
                class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10">
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
    <pre>
</div>
