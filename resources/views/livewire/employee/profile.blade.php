<div>
    <section class="bg-white flex justify-center">
        <div class="py-12 px-4 w-3/4 lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Minhas informações</h2>
            <form wire:submit="update" method="POST" class="py-2">
                @csrf
                <div class="grid gap-2 mb-1 md:grid-cols-4">
                    <div class="relative md:col-span-2">
                        <div class="pb-2.5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                            <input type="text" name="name" wire:model.live="name" @class([
                                'bg-[#EEE]',
                                'shadow-inner',
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
                                'cursor-not-allowed',
                            ])
                                disabled>

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
                    <div class="relative md:grid md:col-span-2">
                        <div class="pb-2.5">
                            <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900">CPF</label>
                            <input type="text" x-data x-init="Inputmask({
                                'mask': '999.999.999-99',
                                'autoUnmask': true,
                            }).mask($refs.input)" x-ref="input" name="cpf"
                                wire:model.live="cpf" @class([
                                    'bg-[#EEE]',
                                    'shadow-inner',
                                    'mb-2',
                                    'border-1',
                                    'border-gray-300',
                                    'border-red-500' => $errors->has('cpf'),
                                    'text-gray-900',
                                    'text-sm rounded-lg',
                                    'focus:ring-blue-600',
                                    'focus:border-blue-600',
                                    'block',
                                    'w-full',
                                    'p-2.5',
                                    'cursor-not-allowed',
                                ]) disabled>

                        </div>
                        @error('cpf')
                            <div class="absolute bottom-0 flex gap-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                                <span class="text-red-600 text-sm w-full">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    @if ($is_chef)
                        <div class="relative md:grid md:col-span-4">
                            <div class="pb-2.5">
                                <label for="fantasy_name" class="block mb-2 text-sm font-medium text-gray-900">Nome
                                    fantasia</label>
                                <input type="text" name="fantasy_name" wire:model.live="fantasy_name"
                                    @class([
                                        'bg-gray-50',
                                        'mb-2',
                                        'border-1',
                                        'border-gray-300',
                                        'border-red-500' => $errors->has('fantasy_name'),
                                        'text-gray-900',
                                        'text-sm rounded-lg',
                                        'focus:ring-blue-600',
                                        'focus:border-blue-600',
                                        'block',
                                        'w-full',
                                        'p-2.5',
                                    ]) placeholder="Nome fantasia do chefe de cozinha">
                            </div>
                            @error('username')
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
                    @endif
                    <div class="relative md:grid md:col-span-4">
                        @error('username')
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
                            <label for="office" class="block mb-2 text-sm font-medium text-gray-900">Cargo</label>
                            <input type="text" name="office" wire:model.live="office" @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('office'),
                                'text-gray-900',
                                'text-sm rounded-lg',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                            ])
                                disabled>
                        </div>
                        @error('office')
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
                    @if ($is_chef)
                        <button type="submit"
                            class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Atualizar perfil
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>
