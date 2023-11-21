<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/errors/403.css'])
    <title>Acesso negado</title>
</head>

<body>
    <div class="container">
        <div class="container-info">
            <div class="message">
                Você não possui autorização.
            </div>
            <div class="message2">
                Você tentou acessar uma página para a qual não tinha autorização prévia.
            </div>
            <div class="message3">
                <a class="back-button" href="{{ url()->previous() }}" type="button"
                    class="btn btn-outline-primary">Voltar</a>
            </div>
        </div>
        <div class="container-icon">
            <div class="neon">403</div>
            <div class="door-frame">
                <div class="door">
                    <div class="rectangle">
                    </div>
                    <div class="handle">
                    </div>
                    <div class="window">
                        <div class="eye">
                        </div>
                        <div class="eye eye2">
                        </div>
                        <div class="leaf">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
