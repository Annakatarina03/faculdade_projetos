@extends('layouts.main')
@section('title', 'Restaurantes')
@section('content')
    {{-- <section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
        <div class="w-full sm:w-11/12 p-4 lg:px-12">

            <div class="pb-4 flex justify-center sm:justify-start">
                <span class="text-4xl text-bold">
                    Ingredientes
                </span>
            </div>
            <div class="bg-white relative shadow-md sm:rounded-lg">

                <div class="w-8/12 py-8 flex flex-wrap gap-6 items-center break">
                    @foreach ($revenues as $revenue)
                        <div
                            class="bg-[#d1d9df] w-52 border border-black flex flex-col items-center justify-center gap-4 py-4 rounded-3xl">
                            <div class="bg-white rounded-2xl w-44">
                                <div class="flex justify-center w-full rounded-2xl">
                                    <img src="{{ asset('images/picanha.png') }}" class="w-full" alt="foto do prato">
                                </div>
                                <div class="font-normal p-2 text-center">
                                    <p role="document" class="text-wrap">{{ $revenue->name }}</p>
                                </div>
                            </div>
                            <div class="w-full flex justify-center">
                                <button
                                    class="flex py-2 px-4 justify-center items-center rounded-lg bg-[#a0b2c2] cursor-pointer">
                                    <p class="text-white">Selecionar</p>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <div class="bg-white w-full shadow-md sm:rounded-lg">
                        @if (!empty($revenues->lastPage() > 1))
                            <div class="py-4 px-6">{{ $revenues->withQueryString()->links() }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <div>
        <section class="bg-gray-50 w-full antialiased flex justify-center min-h-[91vh]">
            <div class="w-full sm:w-11/12 p-4 lg:px-12">
                <div class="pb-4 flex justify-center sm:justify-start">
                    <span class="text-4xl text-bold">
                        Marcar degustação
                    </span>
                </div>
                <div class="relative  sm:rounded-lg flex flex-wrap gap-8 justify-center">
                    @foreach ($revenues as $revenue)
                        <div
                            class="bg-[#d1d9df] w-60 border border-black flex flex-col items-center justify-center gap-4 py-4 rounded-3xl">
                            <div class="bg-white rounded-2xl w-52 h-56">
                                <div class="flex justify-center w-full rounded-2xl">
                                    <img src="{{ asset('images/picanha.png') }}" class="w-full">
                                </div>
                                <div class="font-normal p-2 text-center">
                                    <p role="document" class="text-wrap">{{ $revenue->name }}</p>
                                </div>
                            </div>
                            <div class="w-full flex justify-center">
                                <button
                                    class="flex text-white py-1 px-4 justify-center items-center rounded-2xl bg-[#a0b2c2] hover:bg-opacity-50 focus:bg-opacity-50 cursor-pointer">
                                    Selecionar
                                </button>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="bg-white relative shadow-md sm:rounded-lg">
                    @if (!empty($revenues->lastPage() > 1))
                        <div class="py-4">{{ $revenues->withQueryString()->links() }}</div>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection
