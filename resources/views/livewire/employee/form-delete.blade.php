<div class="relative w-full p-4 h-full md:h-auto">
    <div>
        <div class="flex justify-center py-2 rounded-t">
            <h4 class="text-lg font-semibold text-gray-900 text-center">Confirmação de exclusão</h3>
        </div>
        <div class="flex justify-center  rounded-t">
            <p class="mb-4 text-gray-500">Você deseja mesmo excluir esse funcionário?</p>
        </div>
        @if ($has_cook_books || $has_revenues || $has_tasting_revenues)
            <div class="flex justify-center items-center gap-2 rounded-t">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-500" viewBox="0 0 512 512">
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                </svg>
                @if ($has_cook_books)
                    <p class="text-red-500 font-bold">Existem livros de receitas vinculados a essse editor.</p>
                @elseif ($has_revenues)
                    <p class="text-red-500 font-bold">Existem receitas vinculados a essse chefe de cozinha.</p>
                @else
                    <p class="text-red-500 font-bold">Existem degustações a essse degustador.</p>
                @endif
            </div>
        @endif
    </div>
    <div class="relative p-4 text-center bg-white sm:p-5">
        <div class="flex justify-center items-center space-x-4">
            <button wire:click.prevent="closeModal"
                class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10">
                Cancelar
            </button>
            @if (!$has_cook_books && !$has_revenues && !$has_tasting_revenues)
                <button wire:click="delete({{ $employee }})"
                    class="py-2 px-3 text-sm flex gap-1 items-center font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Exluir o funcionário
                </button>
            @endif
        </div>
    </div>
</div>
