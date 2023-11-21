<section class="bg-white min-h-screen flex justify-center">
    <div class="md:py-12 md:px-4 flex justify-center w-full lg:py-16">
        <div class="bg-[#D1D9DF] w-full md:w-[850px] md:h-3/6 shadow-[0px_1px_3px_rgba(0,0,0,0.7)] md:rounded-3xl">

            @if (session()->has('success'))
                <div class="w-full flex justify-center">
                    <div class="flex items-center p-2 justify-center text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div>
                            <span class="font-medium">
                                {{ session()->get('success') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="w-full flex justify-center">
                    <div class="flex items-center p-2 justify-center text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div>
                            <span class="font-medium">
                                {{ session()->get('error') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="relative flex items-center w-full justify-center">
                <h2 class="w-full text-4xl text-center py-4 font-bold text-[#2A384C]">
                    Meu perfil
                </h2>
                <div class="absolute right-0 p-4">
                    @include('layouts.components.logo')
                </div>
            </div>
            <div class="flex flex-col md:flex-row py-6">
                <div class="flex flex-col gap-2 px-12 border-r items-center md:border-black">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-44 h-44 fill-white" viewBox="0 0 512 512">
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                    </div>
                </div>
                <div class="grid gap-2 mb-1 md:grid-cols-5 px-12 w-full">
                    @if ($is_chef)
                        <div class="relative md:col-span-5 text-right">
                            <button wire:click="openModal('employee.profile.form-update', {'id' : {{ $employee->id }}})"
                                class="bg-[#16A34A] px-3 py-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-3 h-3"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <div class="relative md:col-span-3">
                        <div class="pb-2.5">
                            <label for="name" class="block mb-2 text-xl font-bold text-gray-900">
                                Nome:
                            </label>
                            <input type="text" name="name" wire:model.live="name" @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'text-[#2A384C]',
                                'font-bold',
                                'text-sm',
                                'rounded-lg',
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
                    </div>
                    <div class="relative md:grid md:col-span-2">
                        <div class="pb-2.5">
                            <label for="office" class="block mb-2 text-xl font-bold text-gray-900">
                                Cargo:
                            </label>
                            <input type="text" name="office" wire:model.live="office" @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'text-[#2A384C]',
                                'font-bold',
                                'text-sm',
                                'rounded-lg',
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
                    </div>
                    @if ($is_chef)
                        <div class="relative md:col-span-5">
                            <div class="pb-2.5">
                                <label for="fantasy_name" class="block mb-2 text-xl font-bold text-gray-900">
                                    Nome fantasia:
                                </label>
                                <input type="text" name="fantasy_name" wire:model.live="fantasy_name"
                                    @class([
                                        'bg-[#EEE]',
                                        'shadow-inner',
                                        'mb-2',
                                        'border-1',
                                        'border-gray-300',
                                        'text-[#2A384C]',
                                        'font-bold',
                                        'text-sm',
                                        'rounded-lg',
                                        'focus:ring-blue-600',
                                        'focus:border-blue-600',
                                        'block',
                                        'w-full',
                                        'p-2.5',
                                        'cursor-not-allowed',
                                        'pointer-events-none',
                                    ]) disabled>

                                @error('fantasy_name')
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
                    @endif
                    <div class="relative md:grid md:col-span-3">
                        <div class="pb-2.5">
                            <label for="office" class="block mb-2 text-xl font-bold text-gray-900">
                                Usuário:
                            </label>
                            <input type="text" name="username" wire:model.live="username"
                                @class([
                                    'bg-[#EEE]',
                                    'shadow-inner',
                                    'mb-2',
                                    'border-1',
                                    'border-gray-300',
                                    'text-[#2A384C]',
                                    'font-bold',
                                    'text-sm',
                                    'rounded-lg',
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
                            <label for="cpf" class="block mb-2 text-xl font-bold text-gray-900">
                                CPF:
                            </label>
                            <input type="text" name="cpf" wire:model.live="cpf" @class([
                                'bg-[#EEE]',
                                'shadow-inner',
                                'mb-2',
                                'border-1',
                                'border-gray-300',
                                'text-[#2A384C]',
                                'font-bold',
                                'text-sm',
                                'rounded-lg',
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
                    </div>
                </div>
            </div>
            </form>
        </div>
</section>
