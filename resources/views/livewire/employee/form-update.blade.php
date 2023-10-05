<div class="w-full">
    <div class="flex py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">Editar funcionário</h3>
    </div>
    <form wire:submit="update" method="POST" class="py-2">
        @csrf
        <div class="grid gap-2 mb-1 md:grid-cols-4">
            <div class="relative md:col-span-2">
                <div class="pb-2.5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome
                        <span class="text-red-500" title="Campo obrigatório">*</span>
                    </label>
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
                        placeholder="Nome do funcionário">
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
                    <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900">CPF
                        <span class="text-red-500" title="Campo obrigatório">*</span>
                    </label>
                    <input type="text" x-data x-init="Inputmask({
                        'mask': '999.999.999-99',
                        'autoUnmask': true,
                    }).mask($refs.input)" x-ref="input" name="cpf"
                        wire:model.live="cpf" @class([
                            'bg-gray-50',
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
                        ]) placeholder="CPF do funcionário">
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

            <div class="relative md:grid md:col-span-4">
                <div class="pb-2.5">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Usuário
                        <span class="text-red-500" title="Campo obrigatório">*</span>
                    </label>
                    <input type="text" name="username" wire:model.live="username" @class([
                        'bg-gray-50',
                        'mb-2',
                        'border-1',
                        'border-gray-300',
                        'border-red-500' => $errors->has('username'),
                        'text-gray-900',
                        'text-sm rounded-lg',
                        'focus:ring-blue-600',
                        'focus:border-blue-600',
                        'block',
                        'w-full',
                        'p-2.5',
                    ])
                        placeholder="Usuário do funcionário">
                </div>
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
            <div class="relative md:grid md:col-span-2">
                <div class="pb-2.5">
                    <label for="office" class="block mb-2 text-sm font-medium text-gray-900">Cargo</label>
                    <select name="office" wire:model.live="office" @class([
                        'bg-gray-50',
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
                    ])>
                        <option value="" disabled>Selecione o cargo</option>
                        @foreach ($positions as $position)
                            <option id="{{ $position->slug }}" {{ $position->name === $office }}>
                                {{ $position->name }}</option>
                        @endforeach
                    </select>
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
            <div class="relative md:grid md:col-span-1">
                <div class="pb-2.5">
                    <label for="wage" class="block mb-2 text-sm font-medium text-gray-900">Salário
                        <span class="text-red-500" title="Campo obrigatório">*</span>
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
                            'bg-gray-50',
                            'mb-2',
                            'border-1',
                            'border-gray-300',
                            'border-red-500' => $errors->has('wage'),
                            'text-gray-900',
                            'text-sm rounded-lg',
                            'focus:ring-blue-600',
                            'focus:border-blue-600',
                            'block',
                            'w-full',
                            'p-2.5',
                        ]) placeholder="R$">
                </div>
                @error('wage')
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
                    <label for="date_entry" class="block mb-2 text-sm font-medium text-gray-900">Data de
                        admissão
                        <span class="text-red-500" title="Campo obrigatório">*</span>
                    </label>
                    <input wire:model.live="date_entry" type="date" max="{{ date('Y-m-d') }}"
                        @class([
                            'bg-gray-50',
                            'mb-2',
                            'border-1',
                            'border-gray-300',
                            'border-red-500' => $errors->has('date_entry'),
                            'text-gray-900',
                            'text-sm rounded-lg',
                            'focus:ring-blue-600',
                            'focus:border-blue-600',
                            'block',
                            'w-full',
                            'p-2.5',
                        ]) />
                </div>
                @error('date_entry')
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
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                    <input type="password" name="password" wire:model.live="password" @class([
                        'bg-gray-50',
                        'mb-2',
                        'border-1',
                        'border-gray-300',
                        'border-red-500' => $errors->has('password'),
                        'text-gray-900',
                        'text-sm rounded-lg',
                        'focus:ring-blue-600',
                        'focus:border-blue-600',
                        'block',
                        'w-full',
                        'p-2.5',
                    ])
                        placeholder="Senha do funcionário">
                </div>
                @error('password')
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
                <div class="flex gap-3">
                    <label for="date_entry" class="block mb-2 text-sm font-medium text-gray-900">Ativo:
                        <span class="text-red-500" title="Campo obrigatório">*</span>
                    </label>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center">
                            <input id="active" type="radio" wire:model.live="status"
                                value="{{ true }}" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="active" class="ml-2 text-sm font-medium text-gray-900">Sim</label>
                        </div>
                        <div class="flex items-center">
                            <input id="disable" type="radio" wire:model.live="status"
                                value="{{ false }}" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="disable" class="ml-2 text-sm font-medium text-gray-900">Não</label>
                        </div>
                    </div>
                </div>
                @error('status')
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
                class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Editar
                funcionário</button>
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
</div>
