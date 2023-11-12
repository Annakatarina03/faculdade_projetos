<div class="w-full">
    <div class="flex justify-between items-center py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">
            Informações do funcionário
        </h3>
        @include('layouts.components.logo')
    </div>
    <form class="py-2">
        @csrf
        <div class="grid gap-2 mb-1 md:grid-cols-4">
            <div class="relative md:col-span-2">
                <div class="pb-2.5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                        Nome
                    </label>
                    <input type="text" name="name" wire:model.live="name" @class([
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

            <div class="relative md:grid md:col-span-4">
                <div class="pb-2.5">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
                        Usuário
                    </label>
                    <input type="text" name="username" wire:model.live="username" @class([
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
                    ])
                        disabled>

                </div>
            </div>
            <div class="relative md:grid md:col-span-4">
                <div class="pb-2.5">
                    <label for="role" class="block mb-4 text-sm font-medium text-gray-900">
                        Permissões
                    </label>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                        <ul class="max-w-md space-y-1 text-black list-disc list-inside">
                            @foreach ($employee_roles as $employee_role)
                                <li class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-2 text-green-500 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg> {{ $employee_role->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="relative md:grid md:col-span-2">
                <div class="pb-2.5">
                    <label for="office" class="block mb-2 text-sm font-medium text-gray-900">
                        Cargo
                    </label>
                    <input type="text" name="office" wire:model.live="office" @class([
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
            <div class="relative md:grid md:col-span-1">
                <div class="pb-2.5">
                    <label for="wage" class="block mb-2 text-sm font-medium text-gray-900">
                        Salário
                    </label>
                    <input type="text" x-data x-init="Inputmask({
                        'alias': 'numeric',
                        'autoUnmask': true,
                        'radixPoint': ',',
                        'groupSeparator': '.',
                        'autoGroup': true,
                        'digits': 2,
                        'digitsOptional': false,
                        'prefix': 'R$ ',
                        'max': '1000000',
                        'rightAlign': false
                    }).mask($refs.input)" x-ref="input" name="wage"
                        wire:model.live="wage" @class([
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
            <div class="relative md:grid md:col-span-1">
                <div class="pb-2.5">
                    <label for="date_entry" class="block mb-2 text-sm font-medium text-gray-900">
                        Data de admissão
                    </label>
                    <input wire:model.live="date_entry" type="date" max="{{ date('Y-m-d') }}"
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
            <div class="relative md:grid md:col-span-4">
                <div class="flex gap-2">
                    <label for="date_entry" class="block mb-2 text-sm font-medium text-gray-900">
                        Status:
                    </label>
                    <div class="flex flex-col">
                        <div class="flex items-center">
                            <span @class([
                                'w-2',
                                'h-2',
                                'rounded-full',
                                $status ? 'bg-green-500' : 'bg-red-500',
                            ])></span>
                            <label for="active" @class([
                                'ml-2',
                                'text-sm',
                                'font-bold',
                                $status ? 'text-green-500' : 'text-red-500',
                            ])>
                                {{ $status ? 'Ativo' : 'Inativo' }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="items-center sm:flex py-4 gap-2">
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
</div>
