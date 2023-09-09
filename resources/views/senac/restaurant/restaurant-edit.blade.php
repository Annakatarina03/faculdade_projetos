@extends('layouts.main')

@section('content')

<section class="bg-white min-h-[80vh]">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-32">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Atualizar restaurante</h2>
        <form method="POST" action="{{ route('restaurants.update', ['restaurant' => $restaurant->id]) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="w-full">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{$restaurant->name}}">
                        @error('name')
                        <div class="flex items-center gap-2 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <span class="absolute text-red-600 ml-4 text-sm w-full">{{ $message }}</span>
                        </div>
                        @enderror
                </div>
                <div class="w-full">
                    <label for="contact"
                        class="block mb-2 text-sm font-medium text-gray-900">Contato</label>
                    <input type="text" name="contact" id="contact"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{$restaurant->contact}}">
                        @error('contact')
                        <div class="flex items-center gap-2 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-red-600" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <span class="absolute text-red-600 ml-4 text-sm w-full">{{ $message }}</span>
                        </div>
                        @enderror
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Atualizar
                </button>
                <a href="{{route('employees.index')}}"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</section>

@endsection