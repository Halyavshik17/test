<!DOCTYPE html>
<html lang="en">
<head>

	{{-- @include('widgets.meta',$meta) --}}

	{!! Meta::toHtml() !!}

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
			<a href="{{ route('index') }}"><img class="logo" src="{{ asset('storage/logo.svg') }}"></a>

			{{-- <button class="btn-in">Вход</button> --}}
			{{-- <button class="btn-reg">Регистрация</button> --}}

			<!--Сюда необходимо добавить картинку профиля.-->
		</div>
	</header>

	<!--Сайдбары и основной контент-->
  <div class="page-wrapper">
		<livewire:search-category-post />

        {{ $slot }}
		<aside class="right-sidebar">
			<!-- правый сайдбар -->
			<div class="background-right">
			<p>Популярные статьи</p>
		</div>
		<div class="helper">
			<ul>
				<li><a href="#">Круглый аквариум — ваза</a></li>
				<li><a href="#">Живые растения</a></li>
				<li><a href="#">Большой объем</a></li>
				<li><a href="#">Культура аквариумистики</a></li>
				<li><a href="#">Биотопный аквариум</a></li>
				<li><a href="#"></a></li>
			</ul>
		</div>
		<div class="social-media">
			<div class="background-right">
				<p>Социальные сети</p>
			</div>
			<div class="social-media__ref">
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
