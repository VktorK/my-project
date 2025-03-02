<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product Management')</title>
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
<body>

<!-- Header -->
@include('parts.header')

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<!-- Footer -->
@include('parts.footer')
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
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
