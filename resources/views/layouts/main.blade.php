<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/sidebar.css', 'resources/js/sidebar.js', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>@yield('title')</title>
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
            <nav class="dashboard-nav-list flex flex-col">
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
                            <a href="{{ url('admin/employees') }}"
                                class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/employees') ? 'active' : '' }}">
                                <div class="dashboard-nav-dropdown-item-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                        viewBox="0 0 640 512">
                                        <path
                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                    </svg>
                                </div>
                                <div class="row-text-link flex w-[120px]">
                                    Funcionários
                                </div>
                            </a>
                        </div>
                        <div class="w-full pl-8">
                            <a href="{{ url('admin/restaurants') }}"
                                class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE] {{ Request::is('admin/restaurants') ? 'active' : '' }}">
                                <div class="dashboard-nav-dropdown-item-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z" />
                                    </svg>
                                </div>
                                <div class="row-text-link flex w-[120px]">
                                    Restautantes
                                </div>
                            </a>
                        </div>
                        <div class="w-full pl-8">
                            <a href="{{ url('admin/positions') }}"
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

                            <a href="{{ url('admin/measures') }}"
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

                            <a href="{{ url('admin/ingredients') }}"
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
                        <div class='dashboard-nav-dropdown flex flex-col w-full'>
                            <div class="w-full pl-8">
                                <a href="#!"
                                    class="dashboard-nav-item dashboard-nav-dropdown-toggle w-full min-h-[56px] pt-2 pr-4 pb-2 pl-6 flex justify-start items-center gap-3 hover:bg-[#8E9FAE]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                    </svg>
                                    Metas
                                </a>
                            </div>
                            <div class='dashboard-nav-dropdown-menu hidden flex-col'>
                                <div class="w-full pl-8">

                                    <a href="#"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pb-2 pl-10 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE]">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[140px]">
                                            Livros de receitas
                                        </div>
                                    </a>
                                </div>
                                <div class="w-full pl-8">

                                    <a href="#"
                                        class="dashboard-nav-dropdown-item min-h-[40px] pt-2 pb-2 pl-10 flex justify-start items-center transition ease-out duration-500 gap-3 hover:bg-[#8E9FAE]">
                                        <div class="dashboard-nav-dropdown-item-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M257.5 27.6c-.8-5.4-4.9-9.8-10.3-10.6c-22.1-3.1-44.6 .9-64.4 11.4l-74 39.5C89.1 78.4 73.2 94.9 63.4 115L26.7 190.6c-9.8 20.1-13 42.9-9.1 64.9l14.5 82.8c3.9 22.1 14.6 42.3 30.7 57.9l60.3 58.4c16.1 15.6 36.6 25.6 58.7 28.7l83 11.7c22.1 3.1 44.6-.9 64.4-11.4l74-39.5c19.7-10.5 35.6-27 45.4-47.2l36.7-75.5c9.8-20.1 13-42.9 9.1-64.9c-.9-5.3-5.3-9.3-10.6-10.1c-51.5-8.2-92.8-47.1-104.5-97.4c-1.8-7.6-8-13.4-15.7-14.6c-54.6-8.7-97.7-52-106.2-106.8zM208 144a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM144 336a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm224-64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
                                        </div>
                                        <div class="row-text-link flex w-[140px]">
                                            Receitas
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle min-h-[56px] pt-2 pr-4 pb-2 pl-8 flex items-center gap-3 hover:bg-[#8E9FAE]">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 448 512" fill="#fff">
                            <path
                                d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z" />
                        </svg>
                        Relatórios
                    </a>
                </div>
            </nav>
            <div class="w-full flex justify-center sm:justify-start lg:justify-center px-6">
                <div
                    class="dashboard-nav-profile absolute bottom-4 border rounded-[2em] p-3 justify-evenly gap-3 items-center flex">
                    <a href="#!" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-white"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <div class="flex flex-col">
                            {{-- <span class="text-xs">{{ \Auth::user()->username }}</span>
                            <span class="text-[12px]">{{ \Auth::user()->office->name }}</span> --}}
                        </div>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" title="Sair">
                        @csrf
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 512 512">
                                <path
                                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
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
