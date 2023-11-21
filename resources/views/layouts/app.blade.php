<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    @vite(['resources/css/sidebar.css', 'resources/js/sidebar.js', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>
        @yield('title')
    </title>
</head>

<body>
    <div class='dashboard dashboard-compact flex min-h-screen'>
        <div
            class="dashboard-nav z-20 w-full text-white bg-[#A0B2C2] fixed left-0 top-0 bottom-0 sm:w-[250px] sm:overflow-auto sm:flex sm:flex-col">
            <header class="flex items-center justify-between px-3 sm:px-0 sm:justify-center">
                <a href="#!"
                    class="menu-toggle flex relative w-[42px] h-[42px] sm:hidden items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-white" viewBox="0 0 448 512">
                        <path
                            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </a>
                <a href="#" class="font-bold text-sm flex flex-col h-[84px] justify-center items-center">
                    <span class="text-sm">Sistema de acervo de receitas</span>
                </a>
            </header>
            <nav class="dashboard-nav-list flex flex-col justify-between h-5/6 md:h-full">
                <div>
                    {{-- Painel do administrador --}}
                    @role('administrador')
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <span href=""
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] cursor-pointer pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 576 512">
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                                Entidades
                            </span>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col items-center'>
                                <div class="w-full pl-8">
                                    <a href="{{ route('admin.employees.index') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/employees') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 640 512">
                                                <path
                                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Funcionários
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('admin.restaurants.index') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/restaurants') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white"
                                                viewBox="0 0 183 189" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M83.5 20.5c-5.1 1.8-11 8.1-12.4 13.1-.6 2.2-1.1 8.7-1.1 14.6V59H49.3c-12.2 0-22.5.5-24.8 1.1-5.2 1.5-11.9 8.2-13.4 13.4-1.5 5.5-1.5 85.5 0 91 1.5 5.4 8.2 12 13.6 13.4 3 .8 22.8 1.1 67.5.9 61.2-.3 63.4-.4 66.7-2.3 1.9-1.1 4.8-3.7 6.5-5.8l3.1-3.9V99 31.2l-3.1-3.9c-6.4-7.9-5.7-7.8-43.9-8-27.5-.2-34.8 0-38 1.2zm25.3 19.7c.7.7 1.2 4.2 1.2 8.8s-.5 8.1-1.2 8.8-4.3 1.2-8.9 1.2C90.4 59 89 57.7 89 49s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm40 0c.7.7 1.2 4.2 1.2 8.8s-.5 8.1-1.2 8.8-4.3 1.2-8.9 1.2c-9.5 0-10.9-1.3-10.9-10s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm-40 30c.7.7 1.2 4.2 1.2 8.8s-.5 8.1-1.2 8.8-4.3 1.2-8.9 1.2C90.4 89 89 87.7 89 79s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm40 0c.7.7 1.2 4.2 1.2 8.8s-.5 8.1-1.2 8.8-4.3 1.2-8.9 1.2c-9.5 0-10.9-1.3-10.9-10s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm-100 10c1.6 1.6 1.6 16 0 17.6-.7.7-4.3 1.2-8.9 1.2C30.4 99 29 97.7 29 89s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm60 20c.7.7 1.2 4.2 1.2 8.8s-.5 8.1-1.2 8.8-4.3 1.2-8.9 1.2c-9.5 0-10.9-1.3-10.9-10s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm40 0c.7.7 1.2 4.2 1.2 8.8s-.5 8.1-1.2 8.8-4.3 1.2-8.9 1.2c-9.5 0-10.9-1.3-10.9-10s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2zm-100 10c1.6 1.6 1.6 16 0 17.6-.7.7-4.3 1.2-8.9 1.2-9.5 0-10.9-1.3-10.9-10s1.4-10 10.9-10c4.6 0 8.2.5 8.9 1.2z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Restautantes
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('admin.positions.index') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/positions') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8V444.8C394 378 431.1 230.1 432 141.4L256 66.8l0 0z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Cargos
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 448 512">
                                    <path
                                        d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z" />
                                </svg>
                                Receitas
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">

                                    <a href="{{ route('admin.measures.index') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/measures') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M177.9 494.1c-18.7 18.7-49.1 18.7-67.9 0L17.9 401.9c-18.7-18.7-18.7-49.1 0-67.9l50.7-50.7 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 50.7-50.7c18.7-18.7 49.1-18.7 67.9 0l92.1 92.1c18.7 18.7 18.7 49.1 0 67.9L177.9 494.1z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Medidas
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('admin.ingredients.index') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/ingredients') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Ingredientes
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('admin.categories.index') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/categories') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Categorias
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle w-full min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex justify-start items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                Metas
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">
                                    <a href="#"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/measures') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Livro de receitas
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="#"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/ingredients') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M257.5 27.6c-.8-5.4-4.9-9.8-10.3-10.6c-22.1-3.1-44.6 .9-64.4 11.4l-74 39.5C89.1 78.4 73.2 94.9 63.4 115L26.7 190.6c-9.8 20.1-13 42.9-9.1 64.9l14.5 82.8c3.9 22.1 14.6 42.3 30.7 57.9l60.3 58.4c16.1 15.6 36.6 25.6 58.7 28.7l83 11.7c22.1 3.1 44.6-.9 64.4-11.4l74-39.5c19.7-10.5 35.6-27 45.4-47.2l36.7-75.5c9.8-20.1 13-42.9 9.1-64.9c-.9-5.3-5.3-9.3-10.6-10.1c-51.5-8.2-92.8-47.1-104.5-97.4c-1.8-7.6-8-13.4-15.7-14.6c-54.6-8.7-97.7-52-106.2-106.8zM208 144a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM144 336a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm224-64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Receitas
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class='dashboard-nav-dropdown'>
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 512 512">
                                    <path
                                        d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                </svg>
                                Administração
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden w-full'>
                                <div class="w-full pl-8">
                                    <a href="#"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/categories') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 448 512"
                                                fill="#fff">
                                                <path
                                                    d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Relatórios
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endrole

                    {{-- Painel do Chefe de Cozinha --}}
                    @role('chefe-de-cozinha')
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 188 181"
                                    preserveAspectRatio="xMidYMid meet" xmlns:v="https://vecta.io/nano">
                                    <path
                                        d="M81.3 9.5c-7.6 2.1-12.9 5-17.8 10l-4.4 4.3-4.6-2.3c-18.3-9.3-40.8 3.1-43.1 23.7-1 9 6.7 34.8 17.1 57l2.6 5.8h11.5c10.5 0 11.5-.2 11.1-1.8-.3-.9-2.2-12.4-4.3-25.5-2.9-17.7-3.6-24.2-2.8-25.5 1.4-2.1 6.7-2.8 8.2-.9.6.7 3.1 13 5.4 27.3l4.4 25.9 10.7.3 10.7.3V81.7c0-28.1.1-28.7 5-28.7s5 .6 5 28.7v26.4l10.7-.3 10.7-.3 4.4-25.9c2.3-14.3 4.8-26.6 5.4-27.3 1.5-1.9 6.8-1.2 8.2.9.8 1.3.1 7.8-2.8 25.5l-4.3 25.5c-.4 1.6.6 1.8 11.1 1.8h11.5l2.6-5.8c4.4-9.4 11.2-27.1 14.1-36.7 3.6-12 3.8-22.9.5-29.8-7.3-15.1-26-21.6-40.6-14.2l-4.6 2.3-4.4-4.3c-5-5.1-10.2-7.9-18.2-10-7-1.8-12.1-1.8-19 0zM31 133.7c0 8.7.5 17.6 1.1 19.8 1.5 5.2 8.2 11.9 13.4 13.4 5.5 1.5 85.5 1.5 91 0 5.2-1.5 11.9-8.2 13.4-13.4.6-2.2 1.1-11.1 1.1-19.8V118H91 31v15.7z" />
                                </svg>
                                Receitas
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">

                                    <a href="{{ route('revenues.my-revenues') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('revenues/my-revenues') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 188 181" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M81.3 9.5c-7.6 2.1-12.9 5-17.8 10l-4.4 4.3-4.6-2.3c-18.3-9.3-40.8 3.1-43.1 23.7-1 9 6.7 34.8 17.1 57l2.6 5.8h11.5c10.5 0 11.5-.2 11.1-1.8-.3-.9-2.2-12.4-4.3-25.5-2.9-17.7-3.6-24.2-2.8-25.5 1.4-2.1 6.7-2.8 8.2-.9.6.7 3.1 13 5.4 27.3l4.4 25.9 10.7.3 10.7.3V81.7c0-28.1.1-28.7 5-28.7s5 .6 5 28.7v26.4l10.7-.3 10.7-.3 4.4-25.9c2.3-14.3 4.8-26.6 5.4-27.3 1.5-1.9 6.8-1.2 8.2.9.8 1.3.1 7.8-2.8 25.5l-4.3 25.5c-.4 1.6.6 1.8 11.1 1.8h11.5l2.6-5.8c4.4-9.4 11.2-27.1 14.1-36.7 3.6-12 3.8-22.9.5-29.8-7.3-15.1-26-21.6-40.6-14.2l-4.6 2.3-4.4-4.3c-5-5.1-10.2-7.9-18.2-10-7-1.8-12.1-1.8-19 0zM31 133.7c0 8.7.5 17.6 1.1 19.8 1.5 5.2 8.2 11.9 13.4 13.4 5.5 1.5 85.5 1.5 91 0 5.2-1.5 11.9-8.2 13.4-13.4.6-2.2 1.1-11.1 1.1-19.8V118H91 31v15.7z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Minhas receitas
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('revenues.all-revenues') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('revenues/all-revenues') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 188 181" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M81.3 9.5c-7.6 2.1-12.9 5-17.8 10l-4.4 4.3-4.6-2.3c-18.3-9.3-40.8 3.1-43.1 23.7-1 9 6.7 34.8 17.1 57l2.6 5.8h11.5c10.5 0 11.5-.2 11.1-1.8-.3-.9-2.2-12.4-4.3-25.5-2.9-17.7-3.6-24.2-2.8-25.5 1.4-2.1 6.7-2.8 8.2-.9.6.7 3.1 13 5.4 27.3l4.4 25.9 10.7.3 10.7.3V81.7c0-28.1.1-28.7 5-28.7s5 .6 5 28.7v26.4l10.7-.3 10.7-.3 4.4-25.9c2.3-14.3 4.8-26.6 5.4-27.3 1.5-1.9 6.8-1.2 8.2.9.8 1.3.1 7.8-2.8 25.5l-4.3 25.5c-.4 1.6.6 1.8 11.1 1.8h11.5l2.6-5.8c4.4-9.4 11.2-27.1 14.1-36.7 3.6-12 3.8-22.9.5-29.8-7.3-15.1-26-21.6-40.6-14.2l-4.6 2.3-4.4-4.3c-5-5.1-10.2-7.9-18.2-10-7-1.8-12.1-1.8-19 0zM31 133.7c0 8.7.5 17.6 1.1 19.8 1.5 5.2 8.2 11.9 13.4 13.4 5.5 1.5 85.5 1.5 91 0 5.2-1.5 11.9-8.2 13.4-13.4.6-2.2 1.1-11.1 1.1-19.8V118H91 31v15.7z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Todas receitas
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endrole
                    {{-- Final do painel do chefe de cozinha --}}

                    {{-- Painel do Degustador --}}
                    @role('degustador')
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white" viewBox="0 0 216 208"
                                    preserveAspectRatio="xMidYMid meet" xmlns:v="https://vecta.io/nano">
                                    <path
                                        d="M17.5 36.2c-.2.7-2.7 11.4-5.5 23.7-4.7 20.7-5 22.8-4 27.2 2.2 9.2 9 15.7 18.3 17.4l3.7.7v37.5 37.4l2.5 2.4c2.6 2.7 4.1 3 7.8 1.6 4.3-1.7 4.7-5 4.7-43v-35.6l5.8-1.7A22.5 22.5 0 0 0 67 82.2c0-3.3-8.4-41-10-45-.5-1.2-1.6-2.2-2.5-2.2-2 0-2.2 1.6-3.5 23-.6 10.1-1.4 18.8-1.6 19.2-.7 1-4.1 1-4.7 0-.3-.4-1.5-9.9-2.8-21.1-2.3-20-3.2-23.2-6-20.4-.5.5-1.8 8.8-2.9 18.4C30.1 79 30.3 78 27.5 78c-3 0-3-.5-4.4-23.8-.6-9.5-1.3-17.7-1.6-18.2-.9-1.4-3.5-1.2-4 .2zm175 2c-7.8 4-17 13.4-20.6 21.2-4 8.6-5.1 18.4-4.7 43.4l.3 21.4 3.3 2.9c3.1 2.7 3.7 2.9 12.2 2.9h9v24c0 19.3.3 24.7 1.5 27 2.5 4.9 9.8 5 12.5 0 .6-1.2 1-26.1 1-71.9 0-68.8 0-70.1-2-72.1-2.7-2.7-5.4-2.5-12.5 1.2zM98 41.4c-11.9 2.5-26 9.5-26 12.8 0 2.5 4.1 19.8 4.7 19.8.3 0 2.1-1.4 4-3 7.4-6.5 20.2-11 31.5-11 16.6 0 33.1 8.9 41.8 22.7l3 4.7v-6.2c0-3.4.7-9.8 1.6-14.2l1.6-7.9-3.2-2.8c-5.9-5.2-15.4-10.3-23.5-12.9-9.9-3.2-25.7-4-35.5-2zm4 30.2c-19.7 5.3-32.6 25.1-29.1 44.6 3 17.1 15.7 29.8 33 33 16.7 3.1 34.6-6.2 42.3-22 3.1-6.3 3.3-7.4 3.3-17.2s-.2-10.9-3.3-17.2c-8.4-17.3-27.7-26.2-46.2-21.2zm-43.7 40.3l-3.3 1.5v18.9 19l8.3 8.1c9.1 9 19.9 15.2 31.7 18.3 8.8 2.3 26.3 2.3 34.9-.1 12.6-3.4 28.1-13 35.3-21.8 3.9-4.8 9.8-13.8 9.8-15 0-.4-1.9-1.3-4.2-2-2.6-.8-5.9-2.9-8.4-5.4l-4-4.2-2.8 5.3c-3.8 7.3-14 16.8-21.8 20.5-24.6 11.5-53.9 1.6-66-22.5-1.7-3.3-3.8-9.6-4.7-14l-1.6-8-3.2 1.4z" />
                                </svg>
                                Degustações
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">
                                    <a href="{{ route('tasting.revenues-my-tasting') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('tasting/revenues/my-tasting') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white"
                                                viewBox="0 0 216 208" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M17.5 36.2c-.2.7-2.7 11.4-5.5 23.7-4.7 20.7-5 22.8-4 27.2 2.2 9.2 9 15.7 18.3 17.4l3.7.7v37.5 37.4l2.5 2.4c2.6 2.7 4.1 3 7.8 1.6 4.3-1.7 4.7-5 4.7-43v-35.6l5.8-1.7A22.5 22.5 0 0 0 67 82.2c0-3.3-8.4-41-10-45-.5-1.2-1.6-2.2-2.5-2.2-2 0-2.2 1.6-3.5 23-.6 10.1-1.4 18.8-1.6 19.2-.7 1-4.1 1-4.7 0-.3-.4-1.5-9.9-2.8-21.1-2.3-20-3.2-23.2-6-20.4-.5.5-1.8 8.8-2.9 18.4C30.1 79 30.3 78 27.5 78c-3 0-3-.5-4.4-23.8-.6-9.5-1.3-17.7-1.6-18.2-.9-1.4-3.5-1.2-4 .2zm175 2c-7.8 4-17 13.4-20.6 21.2-4 8.6-5.1 18.4-4.7 43.4l.3 21.4 3.3 2.9c3.1 2.7 3.7 2.9 12.2 2.9h9v24c0 19.3.3 24.7 1.5 27 2.5 4.9 9.8 5 12.5 0 .6-1.2 1-26.1 1-71.9 0-68.8 0-70.1-2-72.1-2.7-2.7-5.4-2.5-12.5 1.2zM98 41.4c-11.9 2.5-26 9.5-26 12.8 0 2.5 4.1 19.8 4.7 19.8.3 0 2.1-1.4 4-3 7.4-6.5 20.2-11 31.5-11 16.6 0 33.1 8.9 41.8 22.7l3 4.7v-6.2c0-3.4.7-9.8 1.6-14.2l1.6-7.9-3.2-2.8c-5.9-5.2-15.4-10.3-23.5-12.9-9.9-3.2-25.7-4-35.5-2zm4 30.2c-19.7 5.3-32.6 25.1-29.1 44.6 3 17.1 15.7 29.8 33 33 16.7 3.1 34.6-6.2 42.3-22 3.1-6.3 3.3-7.4 3.3-17.2s-.2-10.9-3.3-17.2c-8.4-17.3-27.7-26.2-46.2-21.2zm-43.7 40.3l-3.3 1.5v18.9 19l8.3 8.1c9.1 9 19.9 15.2 31.7 18.3 8.8 2.3 26.3 2.3 34.9-.1 12.6-3.4 28.1-13 35.3-21.8 3.9-4.8 9.8-13.8 9.8-15 0-.4-1.9-1.3-4.2-2-2.6-.8-5.9-2.9-8.4-5.4l-4-4.2-2.8 5.3c-3.8 7.3-14 16.8-21.8 20.5-24.6 11.5-53.9 1.6-66-22.5-1.7-3.3-3.8-9.6-4.7-14l-1.6-8-3.2 1.4z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Minhas degustações
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('tasting.revenues-schedule-tasting') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('tasting/revenues/schedule-tasting') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white"
                                                viewBox="0 0 216 208" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M17.5 36.2c-.2.7-2.7 11.4-5.5 23.7-4.7 20.7-5 22.8-4 27.2 2.2 9.2 9 15.7 18.3 17.4l3.7.7v37.5 37.4l2.5 2.4c2.6 2.7 4.1 3 7.8 1.6 4.3-1.7 4.7-5 4.7-43v-35.6l5.8-1.7A22.5 22.5 0 0 0 67 82.2c0-3.3-8.4-41-10-45-.5-1.2-1.6-2.2-2.5-2.2-2 0-2.2 1.6-3.5 23-.6 10.1-1.4 18.8-1.6 19.2-.7 1-4.1 1-4.7 0-.3-.4-1.5-9.9-2.8-21.1-2.3-20-3.2-23.2-6-20.4-.5.5-1.8 8.8-2.9 18.4C30.1 79 30.3 78 27.5 78c-3 0-3-.5-4.4-23.8-.6-9.5-1.3-17.7-1.6-18.2-.9-1.4-3.5-1.2-4 .2zm175 2c-7.8 4-17 13.4-20.6 21.2-4 8.6-5.1 18.4-4.7 43.4l.3 21.4 3.3 2.9c3.1 2.7 3.7 2.9 12.2 2.9h9v24c0 19.3.3 24.7 1.5 27 2.5 4.9 9.8 5 12.5 0 .6-1.2 1-26.1 1-71.9 0-68.8 0-70.1-2-72.1-2.7-2.7-5.4-2.5-12.5 1.2zM98 41.4c-11.9 2.5-26 9.5-26 12.8 0 2.5 4.1 19.8 4.7 19.8.3 0 2.1-1.4 4-3 7.4-6.5 20.2-11 31.5-11 16.6 0 33.1 8.9 41.8 22.7l3 4.7v-6.2c0-3.4.7-9.8 1.6-14.2l1.6-7.9-3.2-2.8c-5.9-5.2-15.4-10.3-23.5-12.9-9.9-3.2-25.7-4-35.5-2zm4 30.2c-19.7 5.3-32.6 25.1-29.1 44.6 3 17.1 15.7 29.8 33 33 16.7 3.1 34.6-6.2 42.3-22 3.1-6.3 3.3-7.4 3.3-17.2s-.2-10.9-3.3-17.2c-8.4-17.3-27.7-26.2-46.2-21.2zm-43.7 40.3l-3.3 1.5v18.9 19l8.3 8.1c9.1 9 19.9 15.2 31.7 18.3 8.8 2.3 26.3 2.3 34.9-.1 12.6-3.4 28.1-13 35.3-21.8 3.9-4.8 9.8-13.8 9.8-15 0-.4-1.9-1.3-4.2-2-2.6-.8-5.9-2.9-8.4-5.4l-4-4.2-2.8 5.3c-3.8 7.3-14 16.8-21.8 20.5-24.6 11.5-53.9 1.6-66-22.5-1.7-3.3-3.8-9.6-4.7-14l-1.6-8-3.2 1.4z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Marcar degustação
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endrole

                    {{-- Painel do Editor --}}
                    @role('editor')
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white" viewBox="0 0 237 191"
                                    preserveAspectRatio="xMidYMid meet" xmlns:v="https://vecta.io/nano">
                                    <path
                                        d="M50.9 17.5c-1.5.8-3.2 2.9-3.8 4.6-1.2 3.4-1.7 107.9-.5 107.9.6 0 54.1 10.2 60.7 11.6l2.7.6V83.7 25.2l-2.7-.6c-5.8-1.2-51.2-8.6-52.5-8.6-.7.1-2.5.7-3.9 1.5zm103.1 2L128.3 24l-7.3 1.2v58.4l.8 58.4c.7 0 48.2-9.1 58-11.1l5.2-1v-54-54.1l-2.9-2.9c-3.7-3.6-4.4-3.6-28.1.6zM23.4 22.8c-1.2.2-3.2 1.4-4.5 2.8l-2.4 2.6-.3 59.8.7 62.3c.6 1.4 2.1 3.3 3.3 4.1 1.3.9 23.3 5.8 48.9 11l46.5 9.4 46.7-9.4 48.6-10.4c1.2-.6 2.5-1.9 3.1-3 1.4-2.7 1.4-122.4-.1-125.2-1.8-3.4-6.6-4.8-12.6-3.6l-5.3 1.1v54.9c0 59.9.1 59.4-5.7 61.6-1.5.6-18.9 4.3-38.5 8.2l-35.8 7.1-35.8-7c-19.6-3.9-37.3-7.9-39.2-8.9-2.4-1.1-3.9-2.8-4.7-5.2-.9-2.5-1.2-18.4-1.2-57.3L34.3 24c-.5-.1-2.6-.4-4.8-.8s-5-.6-6.1-.4z" />
                                </svg>
                                Livros
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">
                                    <a href="{{ route('cookbooks.my-cookbooks') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('cookbook/my-cookbooks') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white"
                                                viewBox="0 0 237 191" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M50.9 17.5c-1.5.8-3.2 2.9-3.8 4.6-1.2 3.4-1.7 107.9-.5 107.9.6 0 54.1 10.2 60.7 11.6l2.7.6V83.7 25.2l-2.7-.6c-5.8-1.2-51.2-8.6-52.5-8.6-.7.1-2.5.7-3.9 1.5zm103.1 2L128.3 24l-7.3 1.2v58.4l.8 58.4c.7 0 48.2-9.1 58-11.1l5.2-1v-54-54.1l-2.9-2.9c-3.7-3.6-4.4-3.6-28.1.6zM23.4 22.8c-1.2.2-3.2 1.4-4.5 2.8l-2.4 2.6-.3 59.8.7 62.3c.6 1.4 2.1 3.3 3.3 4.1 1.3.9 23.3 5.8 48.9 11l46.5 9.4 46.7-9.4 48.6-10.4c1.2-.6 2.5-1.9 3.1-3 1.4-2.7 1.4-122.4-.1-125.2-1.8-3.4-6.6-4.8-12.6-3.6l-5.3 1.1v54.9c0 59.9.1 59.4-5.7 61.6-1.5.6-18.9 4.3-38.5 8.2l-35.8 7.1-35.8-7c-19.6-3.9-37.3-7.9-39.2-8.9-2.4-1.1-3.9-2.8-4.7-5.2-.9-2.5-1.2-18.4-1.2-57.3L34.3 24c-.5-.1-2.6-.4-4.8-.8s-5-.6-6.1-.4z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Meus livros
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('cookbooks.all-cookbooks') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white"
                                                viewBox="0 0 237 191" preserveAspectRatio="xMidYMid meet"
                                                xmlns:v="https://vecta.io/nano">
                                                <path
                                                    d="M50.9 17.5c-1.5.8-3.2 2.9-3.8 4.6-1.2 3.4-1.7 107.9-.5 107.9.6 0 54.1 10.2 60.7 11.6l2.7.6V83.7 25.2l-2.7-.6c-5.8-1.2-51.2-8.6-52.5-8.6-.7.1-2.5.7-3.9 1.5zm103.1 2L128.3 24l-7.3 1.2v58.4l.8 58.4c.7 0 48.2-9.1 58-11.1l5.2-1v-54-54.1l-2.9-2.9c-3.7-3.6-4.4-3.6-28.1.6zM23.4 22.8c-1.2.2-3.2 1.4-4.5 2.8l-2.4 2.6-.3 59.8.7 62.3c.6 1.4 2.1 3.3 3.3 4.1 1.3.9 23.3 5.8 48.9 11l46.5 9.4 46.7-9.4 48.6-10.4c1.2-.6 2.5-1.9 3.1-3 1.4-2.7 1.4-122.4-.1-125.2-1.8-3.4-6.6-4.8-12.6-3.6l-5.3 1.1v54.9c0 59.9.1 59.4-5.7 61.6-1.5.6-18.9 4.3-38.5 8.2l-35.8 7.1-35.8-7c-19.6-3.9-37.3-7.9-39.2-8.9-2.4-1.1-3.9-2.8-4.7-5.2-.9-2.5-1.2-18.4-1.2-57.3L34.3 24c-.5-.1-2.6-.4-4.8-.8s-5-.6-6.1-.4z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Todos os livros
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endrole

                    @role('editor')
                        <div class="dashboard-nav-dropdown relative flex flex-col">
                            <a href="#!"
                                class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 512 512">
                                    <path
                                        d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                Publicações
                            </a>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">
                                    <a href="{{ route('publications.publish.cookbooks') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('cookbooks/my-cookbooks') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Publicar livro
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('publications.my-publications.cookbooks') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('cookbooks/my-cookbooks') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Minhas publicações
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">
                                    <a href="{{ route('publications.all-publications.cookbooks') }}"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('') ? 'active' : '' }}">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[120px]">
                                            Todas as publicações
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endrole
                </div>
                <div class="flex justify-center">
                    <div
                        class="dashboard-nav-profile border rounded-[2em] p-3 justify-evenly gap-3 items-center flex my-4">
                        <a href="{{ route('profile') }}" class="flex items-center gap-3" title="Meu pefil"
                            wire:click="openModal('employee.profile', {'id' : {{ auth()->user()->id }}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-white"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <div class="flex flex-col">
                                <span class="text-xs">
                                    {{ auth()->user()->name }}
                                </span>
                                <span class="text-[12px]">
                                    {{ auth()->user()->office->name }}
                                </span>
                            </div>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" title="Sair">
                            @csrf
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class='dashboard-app flex flex-col flex-grow-[2] mt-[84px]'>
            <header
                class='dashboard-toolbar min-h-[84px] bg-[#2A384C] flex justify-between items-center py-2 px-[16px] fixed top-0 right-0 z-10'>
                <a href="#!" class="menu-toggle relative w-[42px] h-[42px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512" fill="#fff">
                        <path
                            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </a>
            </header>
            <div class='dashboard-content'>
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
    @livewireScripts
</body>

</html>
