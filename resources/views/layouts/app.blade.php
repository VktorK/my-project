<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            .actions {
                display: flex;
                justify-content: center;
            }
            .navbar {
                margin-bottom: 20px;
            }
            .footer {
                margin-top: 20px;
                padding: 10px 0;
                background-color: #f8f9fa;
                text-align: center;
            }
            .cart-icon {
                position: relative;
                display: inline-block;
                font-size: 24px; /* Размер иконки */
                margin: 10px;
            }

            .cart-quantity {
                position: absolute;
                top: -5px; /* Положение количества относительно иконки */
                right: -10px; /* Положение количества относительно иконки */
                background-color: red; /* Цвет фона для количества */
                color: white; /* Цвет текста */
                border-radius: 50%; /* Круглая форма */
                padding: 2px 6px; /* Отступы */
                font-size: 12px; /* Размер текста */
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            function showInput(button) {
                const inputGroup = button.parentElement.querySelector('#input-group');
                inputGroup.style.display = 'block'; // Показываем поле ввода

                // Скрываем иконку корзины
                button.style.display = 'none'; // Скрываем кнопку с иконкой
            }

            function hideInput(button) {
                const inputGroup = button.parentElement; // Получаем родительский элемент (группу ввода)
                inputGroup.style.display = 'none'; // Скрываем группу ввода

                // Показываем иконку корзины
                const cartButton = inputGroup.previousElementSibling; // Находим кнопку с иконкой
                cartButton.style.display = 'inline'; // Показываем кнопку с иконкой
            }

            function showInputOrder(button) {
                const inputGroup = button.parentElement.querySelector('#input-group-order');
                inputGroup.style.display = 'block'; // Показываем поле ввода

                // Скрываем иконку корзины
                button.style.display = 'none'; // Скрываем кнопку с иконкой
            }

            function hideInputOrder(button) {
                const inputGroup = button.parentElement; // Получаем родительский элемент (группу ввода)
                inputGroup.style.display = 'none'; // Скрываем группу ввода

                // Показываем иконку корзины
                const cartButton = inputGroup.previousElementSibling; // Находим кнопку с иконкой
                cartButton.style.display = 'inline'; // Показываем кнопку с иконкой
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
