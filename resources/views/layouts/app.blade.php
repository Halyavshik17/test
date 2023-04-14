<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>lite version</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800;900&display=swap" rel="stylesheet">

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app" data-v-app>
        <div class="bar bar--top">
            <header class="header">
                {{-- <div class="wrapper site-header__wrapper"> --}}
                <div class="header__layout">
                    <!--Вместо изображения с логотипом в формате svg пока что заголовок.-->
                    <div class="header__left">
                        <h1 class="anti-logo">flash<br>AQUA</h1>
                    </div>
                    <div class="search header__search">
                        <div class="field field--default"><label class="field__wrapper"><svg
                                    class="icon icon--search field__icon field__icon--left" height="20"
                                    width="20">
                                    <use xlink:href="#search"></use>
                                </svg><input type="text" placeholder="Поиск" class="text-input">
                                <!---->
                                <!---->
                            </label>
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                    {{-- <button class="btn-in">Вход</button> --}}
                    {{-- <button class="btn-reg">Регистрация</button> --}}
                    <div class="header__right">
                        <div class="bell header__bell"><button class="bell__button"><svg
                                    class="icon icon--bell bell__button-icon" height="28" width="28">
                                    <use xlink:href="#bell"></use>
                                </svg>
                                <!---->
                            </button>
                            <!---->
                        </div><button class="user">
                            <div class="andropov-media andropov-media--rounded andropov-media--bordered andropov-image user__avatar"
                                style="aspect-ratio: 1 / 1; width: 40px; height: 40px; max-width: none; background-color: rgb(34, 30, 46);">
                                <img src="https://leonardo.osnova.io/6dcd0672-9c6f-5f0e-ad5d-0a734034906d/-/scale_crop/40x40/"
                                    alt="">
                            </div><svg class="icon icon--chevron_down" height="20" width="20">
                                <use xlink:href="#chevron_down"></use>
                            </svg>
                        </button>
                        <!---->
                    </div>
                    <!--Сюда необходимо добавить картинку профиля.-->
                </div>
            </header>
        </div>

        <!--Сайдбары и основной контент-->
        {{-- <div class="page-wrapper"> --}}
        <div class="layout">

            {{-- <aside class="left-sidebar"> --}}
            <div class="aside aside--left">
                <div class="sidebar">
                    <div class="sidebar__main">
                        <!-- левый сайдбар -->
                        <div class="background">
                            <h2>Поиск по темам</h2>
                        </div>
                        {{-- <div class="themes"> --}}
                        <a class="sidebar-item" href="#">Аквариумные рыбки</a>
                        <a class="sidebar-item" href="#">Растения</a>
                        <a class="sidebar-item" href="#">Грунт</a>
                        <a class="sidebar-item" href="#">Декор</a>
                        <a class="sidebar-item" href="#">Оборудование</a>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>


            {{-- @livewire('paginate-post', ['posts' => $posts]) --}}

            {{ $slot }}

            {{-- <aside class="right-sidebar"> --}}
            <aside class="aside aside--right">
                <div class="sidebar">
                    <div class="sidebar__main">
                        <!-- правый сайдбар -->
                        <div class="background">
                            <h2>Поиск по темам</h2>
                        </div>
                        {{-- <div class="themes"> --}}
                        <a class="sidebar-item" href="#">Ссылка 1</a>
                        <a class="sidebar-item" href="#">Ссылка 1</a>
                        <a class="sidebar-item" href="#">Ссылка 1</a>
                        <a class="sidebar-item" href="#">Ссылка 1</a>
                        {{-- </div> --}}
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
                <div class="social-media">
                    <h3>Мы в социальных сетях</h3>
                    <ul>
                        <li><a href="#">VK</a></li>
                        <li><a href="#">Telegram</a></li>
                    </ul>
                </div>
                <div class="service-info">
                    <h3>Служебная информация</h3>
                    <ul>
                        <li><a class="footer__a" href="#">Журнал обновлений</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    @livewireScripts
</body>

</html>
