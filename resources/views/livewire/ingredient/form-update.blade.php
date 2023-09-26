<div class="min-w-[40vw]">
    <div class="flex py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">Editar ingrediente</h3>
    </div>
    <form wire:submit="update" method="POST" class="py-2">
        @csrf
        <div class="grid gap-2 mb-1 md:grid-cols-4">
            <div class="relative md:col-span-4">
                <div class="pb-2.5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                    <input type="text" name="name" wire:model.live="name" @class([
                        'bg-gray-50',
                        'mb-2',
                        'border-1',
                        'border-gray-300',
                        'border-red-500' => $errors->has('name'),
                        'text-gray-900',
                        'text-sm rounded-lg',
                        'focus:ring-blue-600',
                        'focus:border-blue-600',
                        'block',
                        'w-full',
                        'p-2.5',
                    ])
                        placeholder="Nome do ingrediente">
                </div>
                @error('name')
                    <div class="absolute bottom-0 flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                        </svg>
                        <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="relative md:grid md:col-span-4">
                <div class="pb-2.5">
                    <label for="descrption" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                    <textarea id="message" id="description" wire:model.live="description" rows="4" @class([
                        'bg-gray-50',
                        'mb-2',
                        'border-1',
                        'border-gray-300',
                        'border-red-500' => $errors->has('description'),
                        'text-gray-900',
                        'text-sm rounded-lg',
                        'focus:ring-blue-600',
                        'focus:border-blue-600',
                        'block',
                        'w-full',
                        'p-2.5',
                        'resize-none',
                    ])
                        placeholder="Descrição do ingrediente"></textarea>
                </div>

                @error('description')
                    <div class="absolute bottom-0 flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                        </svg>
                        <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                    </div>
                @enderror

            </div>
        </div>
        <div class="items-center sm:flex py-4 gap-2">
            <button type="submit"
                class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Editar ingrediente
            </button>
            <button wire:click.prevent='closeModal'
                class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10">
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
</div>
