<div class="w-full">
    <div class="flex justify-between items-center py-4 rounded-t border-b">
        <h3 class="text-lg font-semibold text-gray-900">Editar funcionário</h3>
        @include('layouts.components.logo')
    </div>
    <form wire:submit="update" method="POST" class="py-2">
        @csrf
        <div class="flex lg:flex-row flex-col gap-4">
            <div class="grid gap-2 mb-1 md:grid-cols-4">
                <div class="relative md:col-span-2">
                    <div class="pb-2.5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome
                            <span class="text-red-500" title="Campo obrigatório">*</span>
                        </label>
                        <input type="text" name="name" wire:model.lazy="name" @class([
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
                            wire:model.lazy="cpf" @class([
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
                        <input type="text" name="username" wire:model.lazy="username" @class([
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
                <div class="relative md:grid md:col-span-4">
                    <div class="pb-2.5">
                        <label for="role" class="block mb-4 text-sm font-medium text-gray-900">
                            Permissões
                        </label>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                            @foreach ($roles as $role)
                                <div class="flex items-center">
                                    <input name="employee_roles" id="{{ $role->name }}" type="checkbox"
                                        @checked (in_array($role->name, $employee_roles)) value="{{ $role->name }}"
                                        wire:model.lazy="employee_roles"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2">
                                    <label for="{{ $role->name }}" class="ml-2 text-sm font-medium text-gray-900">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('role')
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
                        <select name="office" wire:model.lazy="office" @class([
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
                                <option id="{{ $position->slug }}">
                                    {{ $position->name }}
                                </option>
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
                            wire:model.lazy="wage" @class([
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
                        <input wire:model.lazy="date_entry" type="date" max="{{ date('Y-m-d') }}"
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
                        <input type="password" name="password" wire:model.lazy="password"
                            @class([
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
                            ]) placeholder="Senha do funcionário">
                    </div>
                    @error('password')
                        <div class="absolute bottom-0 flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <span class="text-red-600 text-sm w-full">
                                {{ $message }}
                            </span>
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
                                <input id="active" type="radio" wire:model.lazy="status"
                                    value="{{ true }}" name="status"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="active" class="ml-2 text-sm font-medium text-gray-900">Sim</label>
                            </div>
                            <div class="flex items-center">
                                <input id="disable" type="radio" wire:model.lazy="status"
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
                            <span class="text-red-600 text-sm w-full">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid gap-2 mb-1 md:grid-cols-2 w-full md:w-96">
                <div class="pb-2.5 col-span-2">
                    <div class="flex items-center justify-between py-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            Referência:
                        </label>
                        <button wire:click.prevent="add"
                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Adicionar restaurante
                        </button>
                    </div>
                    <div class="max-h-[410px] overflow-y-auto">
                        @foreach ($employees_restaurant as $index => $employee_restaurant)
                            <div class="flex items-center">
                                <div class="flex flex-col gap-2 w-80 py-2">
                                    <div class="relative w-5/6">
                                        <div class="pb-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                Restaurante <span class="text-red-500"
                                                    title="Campo obrigatório">*</span>
                                            </label>
                                            <select name="employees_restaurant-{{ $index }}-restaurant"
                                                wire:model.lazy="employees_restaurant.{{ $index }}.restaurant"
                                                @class([
                                                    'bg-gray-50',
                                                    'mb-2',
                                                    'border-1',
                                                    'border-gray-300',
                                                    'border-red-500' => $errors->has("employees_restaurant.$index.restaurant"),
                                                    'text-gray-900',
                                                    'text-sm rounded-lg',
                                                    'focus:ring-blue-600',
                                                    'focus:border-blue-600',
                                                    'w-full',
                                                    'p-2.5',
                                                    'select2',
                                                ])>

                                                <option value="" selected disabled>
                                                    Selecione o restaurante
                                                </option>
                                                @foreach ($restaurants as $restaurant)
                                                    <option value="{{ $restaurant->name }}">
                                                        {{ $restaurant->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("employees_restaurant.$index.restaurant")
                                            <div class="absolute bottom-0 flex gap-1 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                </svg>
                                                <span class="text-red-600 text-sm w-full">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-3">
                                        <div class="relative w-8/12">
                                            <div class="pb-2.5">
                                                <label class="block mb-2 text-sm font-medium text-gray-900">
                                                    Data de admissão <span class="text-red-500"
                                                        title="Campo obrigatório">*</span>
                                                </label>
                                                <input name="employees_restaurant-{{ $index }}-date_entry"
                                                    wire:model.lazy="employees_restaurant.{{ $index }}.date_entry"
                                                    type="date" max="{{ date('Y-m-d') }}"
                                                    @class([
                                                        'bg-gray-50',
                                                        'mb-2',
                                                        'border-1',
                                                        'border-gray-300',
                                                        'border-red-500' => $errors->has("employees_restaurant.$index.date_entry"),
                                                        'text-gray-900',
                                                        'text-sm rounded-lg',
                                                        'focus:ring-blue-600',
                                                        'focus:border-blue-600',
                                                        'block',
                                                        'w-full',
                                                        'p-2.5',
                                                    ]) />
                                            </div>
                                            @error("employees_restaurant.$index.date_entry")
                                                <div class="absolute bottom-0 flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                    </svg>
                                                    <span class="text-red-600 text-sm w-full">
                                                        {{ $message }}
                                                    </span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="relative w-8/12">
                                            <div class="pb-2.5">
                                                <label class="block mb-2 text-sm font-medium text-gray-900">
                                                    Data de demissão
                                                </label>
                                                <input
                                                    name="employees_restaurant-{{ $index }}-resignation_date"
                                                    wire:model.lazy="employees_restaurant.{{ $index }}.resignation_date"
                                                    type="date" max="{{ date('Y-m-d') }}"
                                                    @class([
                                                        'bg-gray-50',
                                                        'mb-2',
                                                        'border-1',
                                                        'border-gray-300',
                                                        'border-red-500' => $errors->has(
                                                            "employees_restaurant.$index.resignation_date"),
                                                        'text-gray-900',
                                                        'text-sm rounded-lg',
                                                        'focus:ring-blue-600',
                                                        'focus:border-blue-600',
                                                        'block',
                                                        'w-full',
                                                        'p-2.5',
                                                    ]) />
                                            </div>
                                            @error("employees_restaurant.$index.resignation_date")
                                                <div class="absolute bottom-0 flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                    </svg>
                                                    <span class="text-red-600 text-sm w-full">
                                                        {{ $message }}
                                                    </span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <button wire:click.prevent="del({{ $index }})"
                                        class="flex items-center justify-center text-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm px-2 py-2 text-center"
                                        title="Deletar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewbox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="items-center flex py-2 gap-4">
            <button type="submit"
                class="w-full sm:w-auto justify-center text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Editar funcionário
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
</div>
