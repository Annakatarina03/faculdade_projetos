<div class="w-full">
    <div class="flex justify-between items-center py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">
            Atualizar receita
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
                        <input type="text" name="recipe_name" wire:model.live="recipe_name"
                            @class([
                                'bg-gray-50',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('recipe_name'),
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                            ]) placeholder="Nome da receita">
                    </div>
                    @error('recipe_name')
                        <div class="absolute bottom-0 flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="relative md:grid md:col-span-1">
                    <div class="pb-2.5">
                        <label for="creation_date" class="block mb-2 text-sm font-medium text-gray-900">
                            Data da publicação
                        </label>
                        <input type="date" name="creation_date" wire:model="creation_date"
                            @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('creation_date'),
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
                        <input type="text" name="chef_name" wire:model.live="chef_name" @class([
                            'bg-[#EEE]',
                            'shadow-inner',
                            'mb-2',
                            'border-1',
                            'border-gray-300',
                            'border-red-500' => $errors->has('chef_name'),
                            'text-gray-900',
                            'text-sm rounded-lg',
                            'focus:ring-blue-600',
                            'focus:border-blue-600',
                            'block',
                            'w-full',
                            'p-2.5',
                            'cursor-not-allowed',
                            'pointer-events-none',
                        ])
                            placeholder="Chefe de cozinha">
                    </div>
                </div>
                <div class="relative md:col-span-1">
                    <div class="pb-2.5">
                        <label for="number_servings" class="block mb-2 text-sm font-medium text-gray-900">
                            Quantidade de porções
                        </label>

                        <input type="text" x-data x-init="Inputmask('integer', { allowMinus: false, numericInput: true, rightAlign: false }).mask($refs.input)" x-ref="input" name="number_servings"
                            wire:model.live="number_servings" @class([
                                'bg-gray-50',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('number_servings'),
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
                <div class="relative md:grid md:col-span-2">
                    <div class="pb-2.5">
                        <label for="number_servings" class="block mb-2 text-sm font-medium text-gray-900">
                            Categoria <span class="text-red-500" title="Campo obrigatório">*</span>
                        </label>
                        <select name="category" wire:model.live="category" @class([
                            'bg-gray-50',
                            'mb-2',
                            'border-1',
                            'border-gray-300',
                            'border-red-500' => $errors->has('category'),
                            'text-gray-900',
                            'text-sm rounded-lg',
                            'focus:ring-blue-600',
                            'focus:border-blue-600',
                            'w-full',
                            'p-2.5',
                        ])>
                            <option value='' disabled>
                                Selecione a categoria
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <div class="absolute bottom-0 flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="relative md:grid md:col-span-3">
                    <div class="pb-2.5">
                        <div class="flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                Ingredientes:
                            </label>
                            <div class="w-full flex justify-start py-2">
                                <button wire:click.prevent="add"
                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Adicionar ingrediente
                                </button>
                            </div>
                        </div>
                        <div class="h-[150px] max-h-[150px] overflow-y-auto">
                            @foreach ($recipe_ingredients as $index => $recipe_ingredient)
                                <div class="flex gap-2 items-center w-full py-2">
                                    <div class="relative w-2/6">
                                        <div class="pb-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Ingrediente
                                            </label>
                                            <select name="recipe_ingredients-{{ $index }}-ingredient"
                                                wire:model.live="recipe_ingredients.{{ $index }}.ingredient"
                                                @class([
                                                    'bg-gray-50',
                                                    'mb-2',
                                                    'border-1',
                                                    'border-gray-300',
                                                    'border-red-500' => $errors->has("recipe_ingredients.$index.ingredient"),
                                                    'text-gray-900',
                                                    'text-sm rounded-lg',
                                                    'focus:ring-blue-600',
                                                    'focus:border-blue-600',
                                                    'w-full',
                                                    'p-2.5',
                                                    'select2',
                                                ])>

                                                <option value="" selected disabled>
                                                    Selecione o ingrediente
                                                </option>
                                                @foreach ($ingredients as $ingredient)
                                                    <option value="{{ $ingredient->name }}">
                                                        {{ $ingredient->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("recipe_ingredients.$index.ingredient")
                                            <div class="absolute bottom-0 flex gap-1 items-center"
                                                title="{{ $message }}"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                </svg>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="relative w-16">
                                        <div class="pb-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Qtd.
                                            </label>
                                            <input type="text" x-data x-init="Inputmask('integer', { allowMinus: false, numericInput: true, rightAlign: false }).mask($refs.input)" x-ref="input"
                                                name="recipe_ingredients-{{ $index }}-amount"
                                                wire:model.live="recipe_ingredients.{{ $index }}.amount"
                                                @class([
                                                    'bg-gray-50',
                                                    'mb-2',
                                                    'border-1',
                                                    'border-gray-300',
                                                    'border-red-500' => $errors->has("recipe_ingredients.$index.amount"),
                                                    'text-gray-900',
                                                    'text-sm rounded-lg',
                                                    'focus:ring-blue-600',
                                                    'focus:border-blue-600',
                                                    'w-full',
                                                    'p-2.5',
                                                    'text-center',
                                                ])>
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
                                            <select name="recipe_ingredients-{{ $index }}-measure"
                                                wire:model.live="recipe_ingredients.{{ $index }}.measure"
                                                @class([
                                                    'bg-gray-50',
                                                    'mb-2',
                                                    'border-1',
                                                    'border-gray-300',
                                                    'border-red-500' => $errors->has("recipe_ingredients.$index.measure"),
                                                    'text-gray-900',
                                                    'text-sm rounded-lg',
                                                    'focus:ring-blue-600',
                                                    'focus:border-blue-600',
                                                    'w-full',
                                                    'p-2.5',
                                                ])>
                                                <option value="" disabled>
                                                    Selecione a medida
                                                </option>
                                                @foreach ($measures as $measure)
                                                    <option value="{{ $measure->name }}">
                                                        {{ $measure->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                    <div class="pt-3">
                                        <button wire:click.prevent="del({{ $index }})"
                                            class="flex items-center justify-center text-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm px-2 py-2 text-center"
                                            title="Deletar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
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
                        <textarea id="method_preparation" name="method_preparation" cols="40" rows="8"
                            wire:model.live="method_preparation" @class([
                                'bg-gray-50',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('method_preparation'),
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'rounded-xl',
                                'resize-none',
                            ])></textarea>
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
                        <label for="image_recipe" @class([
                            'flex',
                            'flex-col',
                            'items-center',
                            'justify-center',
                            'w-64',
                            'max-h-44',
                            'h-36',
                            'border-2' => $image_recipe,
                            'border-gray-300',
                            'border-dashed' => $image_recipe,
                            'rounded-lg',
                            'cursor-pointer',
                            'bg-gray-50',
                        ])>
                            <div class="flex flex-col items-center justify-center">

                                @if ($image_recipe || $revenue->images()->first())
                                    <img class="w-96 max-h-36 rounded-lg"
                                        src="{{ $image_recipe ? $image_recipe->temporaryUrl() : url("storage/{$revenue->images()->first()->url}") }}"
                                        alt="{{ $revenue->name }}" title="{{ $revenue->name }}">
                                @else
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">
                                            Adicione a imagem da receita
                                        </span>
                                    </p>
                                @endif
                            </div>
                            <input id="image_recipe" name="image_recipe" wire:model="image_recipe" type="file"
                                class="hidden" />
                        </label>
                        @error('image_recipe')
                            <div class="absolute bottom-0 flex gap-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                                <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="items-center flex pt-28 pb-2 gap-2">
            <button type="submit"
                class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Atualizar receita
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
