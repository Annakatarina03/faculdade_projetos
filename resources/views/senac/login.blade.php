<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Login</title>
</head>

<body>
    <section class="min-h-[92.5vh] flex flex-col items-center justify-center bg-[#F4F1E9]">
        <div
            class="w-screen md:w-auto flex flex-col items-center justify-center bg-white py-16 md:px-20 rounded-xl shadow-[4px_2px_3px_rgba(0,0,0,0.3)]">
            <div>
                <h1 class="text-xl md:text-3xl font-bold text-[#D1D9DF] ">
                    Sistema de livro de acervo de receitas
                </h1>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <div class="p-8">
                    <img src="{{ asset('images/logo.png') }}" class="w-64 md:w-80" alt="Sample image">
                </div>
                <div class="p-8 space-y-8">
                    <div class="flex justify-center">
                        <h2 class="text-2xl font-bold text-[#A0B2C2]">Preencha seus dados</h2>
                    </div>
                    <form class="space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute top-[1.15rem] left-3 w-3.5 h-3.5 fill-[#9C9C9C]" viewBox="0 0 448 512">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg>
                            <input type="text" id="username" name="username" @class([
                                'bg-[#F5F5F5]',
                                'rounded-xl',
                                'pl-8',
                                'py-2.5',
                                'text-lg',
                                'shadow-[0px_2.5px_3px_rgba(0,0,0,0.3)]',
                                'border-2',
                                'border-red-500' => $errors->has('username'),
                            ])
                                placeholder="Usuário" />
                            @error('username')
                                <ul class='absolute font-bold py-0.5 px-2 text-sm text-red-600 space-y-1'>
                                    <li>
                                        {{ $message }}
                                    </li>
                                </ul>
                            @enderror
                        </div>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute top-[1.15rem] left-3 w-3.5 h-3.5 fill-[#9C9C9C]" viewBox="0 0 448 512">
                                <path
                                    d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                            </svg>
                            <input type="password" id="password" name="password" @class([
                                'bg-[#F5F5F5]',
                                'rounded-xl',
                                'pl-8',
                                'py-2.5',
                                'text-lg',
                                'shadow-[0px_2.5px_3px_rgba(0,0,0,0.3)]',
                                'border-2',
                                'border-red-500' => $errors->has('password'),
                            ])
                                placeholder="Senha" />
                            @error('password')
                                <ul class='absolute font-bold py-0.5 px-2 text-sm text-red-600 space-y-1'>
                                    <li>
                                        {{ $message }}
                                    </li>
                                </ul>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <input class="rounded-sm w-3 h-3" type="checkbox" value="" id="remember" />
                                <label class="text-md" for="remember">Lembra-me</label>
                            </div>
                            <a href="#!" class="underline text-md">Esqueceu sua senha?</a>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-[#A0B2C2] text-lg text-white px-12 py-2 rounded-2xl hover:bg-[#A0B2C9]">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <footer class="text-center text-white fixed bottom-0 w-screen bg-[#2A384C]">
        <div class="text-center p-3">
            © 2023 Copyright:
            <a class="text-white" href="#">Senac ADS</a>
        </div>
    </footer>
</body>

</html>
