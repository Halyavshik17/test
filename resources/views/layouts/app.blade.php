<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>lite version</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800;900&display=swap" rel="stylesheet">


    @livewireStyles
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
	<header>
		<div class="wrapper site-header__wrapper">
			<!--Вместо изображения с логотипом в формате svg пока что заголовок.-->
			<h1 class="anti-logo">flash<br>AQUA</h1>

			{{-- <button class="btn-in">Вход</button> --}}
			{{-- <button class="btn-reg">Регистрация</button> --}}

			<!--Сюда необходимо добавить картинку профиля.-->
		</div>
	</header>

	<!--Сайдбары и основной контент-->
  <div class="page-wrapper">

		<aside class="left-sidebar">
			<!-- левый сайдбар -->
			<div class="background-left">
			<p>Поиск по темам</p>
			</div>
			<div class="themes">
			<ul>
                @foreach ($categories as $category)
                    <li><a href="#">{{ $category }}</a></li>
                @endforeach
			</ul>
			</div>
		</aside>
        {{ $slot }}
		<aside class="right-sidebar">
			<!-- правый сайдбар -->
			<div class="background-right">
			<p>Полезная информация</p>
		</div>
		<div class="helper">
			<ul>
				<li><a href="#">Польза</a></li>
				<li><a href="#">Польза</a></li>
				<li><a href="#">Польза</a></li>
				<li><a href="#">Польза</a></li>
				<li><a href="#">Польза</a></li>
				<li><a href="#">Польза</a></li>
			</ul>
		</div>
		<div class="socail-media">
			<div class="background-right">
				<p>Социальные сети</p>
			</div>
			<div class="socail-media__ref">
			<ul>
			<li>Telegram</li>
			<li>VK</li>
			</ul>
		</div>
		</div>
		</aside>
	</div>
	<footer>
	<div class="footer gradient-border">
		<div class="contacts">
			<h3>Kонтакты</h3>
			<p>E-mail: info@example.com</p>
		</div>
		<div class="service-info">
			<h3>Служебная информация</h3>
			<a class="footer__a" href="#">Журнал обновлений</a>
		</div>
	</div>
</footer>

@livewireScripts
@livewireEditorjsScripts
</body>
</html>
