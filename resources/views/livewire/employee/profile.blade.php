<section class="bg-white flex justify-center">
    <div class="py-12 px-4 w-3.5/4 lg:py-16">
        <h2 class="mb-4 text-4xl font-bold text-[#2A384C]">Meu perfil</h2>
        <div class="bg-[#D1D9DF]  rounded-3xl">
            <div class="flex justify-end pt-6 pr-12 pl-6">
                <button class="bg-[#16A34A] px-2 py-1 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-4 h-4" viewBox="0 0 512 512">
                        <path
                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                    </svg>
                </button>

            </div>
            <div class="flex py-6">
                <div class="flex flex-col gap-2 px-12 border-r border-black">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-44 h-44 fill-white" viewBox="0 0 512 512">
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                    </div>
                    <h2 class="text-center text-2xl text-[#2A384C]">{{ auth()->user()->username }}</h2>
                    <h2 class="text-center font-bold text-[#2A384C] opacity-60">{{ auth()->user()->office->name }}</h2>
                </div>
                <div class="grid gap-2 mb-1 md:grid-cols-4 px-12 w-full">
                    <div class="relative md:col-span-2">
                        <div class="pb-2.5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                Nome:
                            </label>
                            <h2 @class([
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('office'),
                                'text-[#2A384C]',
                                'font-bold',
                                'text-sm',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
                            ])>
                                {{ $name }}
                            </h2>
                        </div>
                    </div>
                    <div class="relative md:grid md:col-span-2">
                        <div class="pb-2.5">
                            <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900">
                                CPF:
                            </label>
                            <h2 @class([
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('office'),
                                'text-[#2A384C]',
                                'font-bold',
                                'text-sm',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
                            ])>{{ $cpf }}</h2>


                        </div>
                    </div>
                    @if ($is_chef)
                        <div class="relative md:grid md:col-span-4">
                            <div class="pb-2.5">
                                <label for="fantasy_name" class="block mb-2 text-sm font-medium text-gray-900">
                                    Nome fantasia:
                                </label>
                                <h2 @class([
                                    'mb-2',
                                    'border-1',
                                    'border-gray-300',
                                    'border-red-500' => $errors->has('office'),
                                    'text-[#2A384C]',
                                    'font-bold',
                                    'text-sm',
                                    'focus:ring-blue-600',
                                    'focus:border-blue-600',
                                    'block',
                                    'w-full',
                                    'p-2.5',
                                    'cursor-not-allowed',
                                    'pointer-events-none',
                                ])>{{ $fantasy_name }}</h2>
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
                        <div class="pb-2.5">
                            <label for="office" class="block mb-2 text-sm font-medium text-gray-900">
                                Cargo:
                            </label>
                            <h2 @class([
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'border-red-500' => $errors->has('office'),
                                'text-[#2A384C]',
                                'font-bold',
                                'text-sm',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
                            ])>{{ $office }}</h2>
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
            </div>
            </form>
        </div>
</section>

{{-- <section class="bg-white flex justify-center">
        <div class="py-12 px-4 w-3/4 lg:py-16">
            @if (session()->has('success'))
                <div class="flex items-center p-2 justify-center text-sm text-green-800 border border-green-300 bg-green-50"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div>
                        <span class="font-medium"> {{ session()->get('success') }}
                        </span>
                    </div>
                </div>
            @elseif (session()->has('error'))
                <div class="flex items-center p-2 justify-center text-sm text-yellow-800 border border-yellow-300 bg-yellow-50"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium"> {{ session()->get('error') }}
                        </span>
                    </div>
                </div>
            @endif
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
                                'text-sm',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
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
                                    'text-sm',
                                    'focus:ring-blue-600',
                                    'focus:border-blue-600',
                                    'block',
                                    'w-full',
                                    'p-2.5',
                                    'cursor-not-allowed',
                                    'pointer-events-none',
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
                                        'text-sm',
                                        'focus:ring-blue-600',
                                        'focus:border-blue-600',
                                        'block',
                                        'w-full',
                                        'p-2.5',
                                    ]) placeholder="Nome fantasia">
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
                                'text-sm',
                                'focus:ring-blue-600',
                                'focus:border-blue-600',
                                'block',
                                'w-full',
                                'p-2.5',
                                'cursor-not-allowed',
                                'pointer-events-none',
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
                            class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center">
                            Atualizar perfil
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </section> --}}
