<div>
    <section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
        <div class="w-full sm:w-11/12 p-4 lg:px-12">
            <div class="pb-4 flex justify-center sm:justify-start">
                <span class="text-4xl font-bold text-[#2A384C]">
                    Funcionários
                </span>
            </div>
            <div class="bg-white relative shadow-md sm:rounded-lg">
                <div class="w-full bg-[#D1D9DF] px-4 rounded-tr-lg rounded-tl-lg">
                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between sm:mx-0 py-4">
                        <div class="w-full md:w-3/12">
                            <form>
                                <div class="relative flex gap-2">
                                    <input type="search" id="search" name="search" wire:model.live="search"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Nome do funcionário">
                                </div>
                            </form>
                        </div>
                        @if (session()->has('success'))
                            <div class="flex items-center p-2 justify-center text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div>
                                    <span class="font-medium"> {{ session()->get('success') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="flex items-center p-2 justify-center text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div>
                                    <span class="font-medium"> {{ session()->get('error') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button wire:click="openModal('employee.form-create')"
                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Registrar funcionário
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:flex overflow-auto">
                    <table class="text-sm text-left text-gray-500 w-full">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="overflow-x-hidden">
                                <th scope="col" class="p-4 w-10"></th>
                                <th scope="col" class="p-4 w-40 text-center">
                                    Nome
                                </th>
                                <th scope="col" class="p-4 text-center">
                                    CPF
                                </th>
                                <th scope="col" class="p-4 text-center">
                                    Status
                                </th>
                                <th scope="col" class="p-4 w-40 text-center">
                                    Última atualização
                                </th>
                                <th scope="col" class="p-4 w-40"></th>
                            </tr>
                        </thead>
                        <tbody class="overflow-x-hidden">
                            @foreach ($employees as $employee)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="p-4"></td>
                                    <td class="px-4 py-3 w-full justify-center flex items-center whitespace-nowrap">
                                        <div class="flex items-center justify-sttart w-72">
                                            <div class="flex py-1.5 items-center gap-3 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 214 208"
                                                    class="w-6 h-6 fill-blue-800" preserveAspectRatio="xMidYMid meet"
                                                    xmlns:v="https://vecta.io/nano">
                                                    <path
                                                        d="M96.7 31.4C84.9 34.8 74.2 44.6 69.9 56c-1.6 4-2.2 7.7-2.2 14 0 10.4 2.3 17.1 8.6 25 12.9 16.3 37.3 19.6 53.9 7.5 22.3-16.3 22.3-48.7 0-65-2.6-1.9-6.7-4.2-9.2-5-6.2-2.3-18.4-2.8-24.3-1.1zm.7 95.7c-1.9 2.1-1.8 2.2 1.7 8.7l3.6 6.7-5.1 18.8c-2.7 10.3-5.3 18.2-5.7 17.5-.3-.7-3-11-5.9-22.8s-5.7-22.1-6.2-22.8c-1.5-1.8-5.6-1.4-12.1 1.2-17.1 7.1-29.5 25.1-30 43.8-.2 5.6 0 6.1 3.1 8.9l3.3 2.9 64-.2 64.1-.3 2.4-2.8c1.7-2.1 2.4-4 2.4-7.2 0-17.9-10.9-35.3-27.2-43.5-9.4-4.7-14.3-5.2-15.8-1.8-.5 1.3-3.3 12.1-6.2 24.1-2.9 11.9-5.5 21.1-5.9 20.5-.4-.7-2.8-9.2-5.4-18.9l-4.6-17.7 3-5.4c5.5-9.6 3.9-11.8-8.2-11.8-6.2 0-7.7.3-9.3 2.1z" />
                                                </svg>
                                            </div>
                                            <span
                                                class="bg-blue-100 text-blue-800 text-sm font-medium px-2 py-0.5 rounded">
                                                {{ $employee->name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td scope="row" class="font-medium w-40 text-gray-900 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            {{ $employee->cpf }}
                                        </div>
                                    </td>
                                    <td scope="row" class="font-medium w-40 text-gray-900 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <span @class([
                                                'w-14',
                                                'font-bold',
                                                'text-xs',
                                                'text-center',
                                                'rounded-lg',
                                                'text-white',
                                                'bg-green-600' => $employee->status,
                                                'bg-red-600' => !$employee->status,
                                            ])>
                                                {{ $employee->status ? 'Ativo' : 'Inativo' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            {{ $employee->updated_at }}
                                        </div>
                                    </td>
                                    @if ($employee->name !== $admin_employee->name)
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center justify-center space-x-4">
                                                <button
                                                    wire:click="openModal('employee.form-update', {'id' : {{ $employee->id }}})"
                                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                                    title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button
                                                    wire:click="openModal('employee.form-view', {'id' : {{ $employee->id }}})"
                                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                                    title="Visualizar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                </button>
                                                <button
                                                    wire:click="openModal('employee.form-delete', {'id' : {{ $employee->id }}})"
                                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
                                                    title="Deletar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="grid grid-cols-1 gap-4 lg:hidden">
                    @foreach ($employees as $employee)
                        <div class="p-4 bg-gray-50 space-y-3">
                            <div>
                                <div>
                                    <div class="px-1 py-1 flex items-center whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 214 208"
                                                class="w-6 h-6 fill-blue-800" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M96.7 31.4C84.9 34.8 74.2 44.6 69.9 56c-1.6 4-2.2 7.7-2.2 14 0 10.4 2.3 17.1 8.6 25 12.9 16.3 37.3 19.6 53.9 7.5 22.3-16.3 22.3-48.7 0-65-2.6-1.9-6.7-4.2-9.2-5-6.2-2.3-18.4-2.8-24.3-1.1zm.7 95.7c-1.9 2.1-1.8 2.2 1.7 8.7l3.6 6.7-5.1 18.8c-2.7 10.3-5.3 18.2-5.7 17.5-.3-.7-3-11-5.9-22.8s-5.7-22.1-6.2-22.8c-1.5-1.8-5.6-1.4-12.1 1.2-17.1 7.1-29.5 25.1-30 43.8-.2 5.6 0 6.1 3.1 8.9l3.3 2.9 64-.2 64.1-.3 2.4-2.8c1.7-2.1 2.4-4 2.4-7.2 0-17.9-10.9-35.3-27.2-43.5-9.4-4.7-14.3-5.2-15.8-1.8-.5 1.3-3.3 12.1-6.2 24.1-2.9 11.9-5.5 21.1-5.9 20.5-.4-.7-2.8-9.2-5.4-18.9l-4.6-17.7 3-5.4c5.5-9.6 3.9-11.8-8.2-11.8-6.2 0-7.7.3-9.3 2.1z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="bg-blue-100  text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                            {{ $employee->name }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="px-1 py-1 font-medium text-gray-900 whitespace-nowrap" x-data
                                        x-init="Inputmask({
                                            'mask': '999.999.999-99',
                                        }).mask($refs.input_mobile)" x-ref="input_mobile">
                                        {{ $employee->cpf }}
                                    </span>
                                </div>
                                <div class=" py-1 flex items-center whitespace-nowrap">
                                    <span
                                        @class([
                                            'w-14',
                                            'font-bold',
                                            'px-1',
                                            'text-xs',
                                            'text-center',
                                            'rounded-lg',
                                            'text-white',
                                            'bg-green-500' => $employee->status,
                                            'bg-red-500' => !$employee->status,
                                        ])>{{ $employee->status ? 'Ativo' : 'Inativo' }}</span>
                                </div>
                                <div class="px-1 py-1 font-medium text-gray-900 w-40 whitespace-nowrap">
                                    <span class="flex items-center">
                                        {{ $employee->updated_at }}
                                    </span>
                                </div>
                                @if ($employee->name !== $admin_employee->name)
                                    <div>
                                        <td class="px-4 py-3 w-40 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center space-x-4">
                                                <button
                                                    wire:click="openModal('employee.form-update', {'id' : {{ $employee->id }}})"
                                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                                    title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button
                                                    wire:click="openModal('employee.form-view', {'id' : {{ $employee->id }}})"
                                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                                    title="Visualizar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                </button>
                                                <button
                                                    wire:click="openModal('employee.form-delete', {'id' : {{ $employee->id }}})"
                                                    class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
                                                    title="Deletar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (!empty($employees->lastPage() > 1))
                    <div class="py-4">{{ $employees->withQueryString()->links() }}</div>
                @endif
            </div>
        </div>
    </section>
</div>
