<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $cookbook->title }}</title>

    <style>
        @font-face {
            font-family: 'Your custom font name';
            src: url({{ storage_path('fonts\your-custom-font.ttf') }}) format("truetype");
            font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here
        }

        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;
        }

        h1,
        h2 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }

        hr {}

        .container {
            width: 100%;
        }

        .recipe {
            padding: 1em;
        }

        .container-image {
            background: #FFF;
        }

        .container-image img {
            width: 100%;
        }

        .container-title {
            text-align: center;
        }

        .container-ingredients,
        .container-method-preparation {
            padding: 0.5em 0;
        }


        .ingredients {
            padding: 1em 2em;
        }
    </style>

</head>

<body>

    <div class="container">
        @foreach ($revenues as $revenue)
            <div class="container-image">
                <img src="{{ $revenue->images()->first() !== null ? public_path("storage/{$revenue->images->first()->url}") : public_path('storage/revenues/no_image.png') }}"
                    title="{{ $revenue->name }}" alt="{{ $revenue->name }}">
            </div>
            <div class="recipe">
                <div class="container-title">
                    <h1>
                        {{ $revenue->name }}
                    </h1>
                </div>
                <div class="container-recipe-info">
                    <div class="container-ingredients">
                        <h2>Ingredientes: </h2>
                        <ul class="ingredients">
                            @foreach ($revenue->ingredients as $ingredient)
                                <li>
                                    {{ $ingredient->name }} -
                                    {{ $ingredient->pivot->amount }}
                                    {{ \App\Models\Measure::find($ingredient->pivot->measure_id)->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="container-method-preparation">
                        <h2>Modo de prepraro: </h2>
                        <p>{{ $revenue->method_preparation }}</p>
                    </div>
                </div>
        @endforeach
    </div>
    </div>

</body>

</html>
