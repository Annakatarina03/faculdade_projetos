@extends('layouts.main')
@section('title', 'Funcionários')
@section('content')
    <section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
        <div class="w-full sm:w-11/12 p-4 lg:px-12">
            <div class="pb-4 flex justify-center sm:justify-start">
                <span class="text-4xl text-bold">Funcionários</span>
            </div>
            <div class="bg-white relative shadow-md sm:rounded-lg">
                <div class="w-full bg-[#D1D9DF] px-4 rounded-tr-lg rounded-tl-lg">
                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between sm:mx-0 py-4">
                        <div class="w-full md:w-3/12">
                            <form>
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                                <div class="relative flex gap-2">
                                    <input type="search" id="search" name="search"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Nome do funcionário">
                                    <button type="submit"
                                        class="text-white  right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                                        Pesquisar
                                    </button>
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
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium"> {{ session()->get('success') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            @include('senac.employee.modal-create-employee')
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex overflow-auto">
                    <table class="text-sm text-left text-gray-500 w-full">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="overflow-x-hidden">
                                <th scope="col" class="p-4 w-10"></th>
                                <th scope="col" class="p-4 w-40 text-center">Nome</th>
                                <th scope="col" class="p-4 text-center">CPF</th>
                                <th scope="col" class="p-4 w-40 text-center">Última atualização</th>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-gray-900"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                                </svg>
                                            </div>
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                                {{ $employee->name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td scope="row" class="font-medium w-40 text-gray-900 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            {{ $employee->cpf }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            {{ $employee->updated_at }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-4">
                                    <a href="{{route('employees.edit',['employee' => $employee])}}"
                                            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>                                 
                                            @include('senac.employee.modal-view-employee')
                                            @include('senac.employee.modal-confirmation-delete-employee')
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="grid grid-cols-1 gap-4 md:hidden">
                    @foreach ($employees as $employee)
                        <div class="p-4 uppercase bg-gray-50 space-y-3">
                            <div>
                                <div>
                                    <div class="px-1 py-1 flex items-center whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-gray-900"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                            </svg>
                                        </div>
                                        <span class="bg-blue-100  text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                            {{ $employee->name }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="px-1 py-1 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $employee->cpf }}
                                    </span>
                                </div>
                                <div class="px-1 py-1 font-medium text-gray-900 w-40 whitespace-nowrap">
                                    <span class="flex items-center">
                                        {{ $employee->updated_at }}
                                    </span>
                                </div>
                                <div>
                                    <td class="px-4 py-3 w-40 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <a href="{{route('employees.edit',['employee' => $employee])}}"
                                                class="py-2 px-3 flex items-center justify-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>         
                                            @include('senac.employee.modal-view-employee')
                                            @include('senac.employee.modal-confirmation-delete-employee')
                                        </div>
                                    </td>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (!empty($employees->lastPage() > 1))
                    <div class="py-4">{{ $employees->links() }}</div>
                @endif
            </div>
        </div>
    </section>
    @push('scripts')
        @vite('resources/js/modal-delete.js')
    @endpush
@endsection
