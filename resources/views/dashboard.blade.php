<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Dashboard</title>
</head>

<body>
    <section class="min-h-[95.5vh] flex flex-col items-center justify-center bg-[#F4F1E9]">
        <div
            class="w-screen md:w-auto flex flex-col bg-white py-20 md:px-20 rounded-xl shadow-[4px_2px_3px_rgba(0,0,0,0.3)]">
            <div class="flex justify-center md:justify-start items-center">
                <div>
                    <h1 class="text-xl md:text-3xl font-bold text-[#D1D9DF] ">
                        Sistema de livro de acervo de receitas
                    </h1>
                </div>
                <div class="pl-8">
                    <img src="{{ asset('images/logo-system.png') }}" alt="S"
                        class="max-w-[50px] md:max-w-[100px]">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center" style="font-size: 18px;">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="pr-8">
                        <h2><strong>Bem-Vindo, {{ Auth::user()->name }} !</strong></h2>
                        <br>
                        <p><strong>Seu cargo é de: {{ Auth::user()->office->name }}</strong></p>
                        <br>
                        <p>Estamos muito felizes que esteja aqui,<br>contribuindo e engajando com o nosso sistema<br>de
                            acervo de livro de receitas.</p>
                    </div>
                    <div>
                        <img src="{{ asset('images/dashboard.png') }}" alt="P"
                            class="max-w-[200px] md:max-w-[200px]">
                    </div>
                </div>
                <br>
                <div class="flex justify-center md:justify-normal">
                    <a href="{{ route('system') }}" type="button"
                        class="bg-[#6c757d] text-white px-2 py-3 border-none rounded-md cursor-pointer">
                        Prosseguir
                    </a>
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
