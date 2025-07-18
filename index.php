﻿<?php
//request();

function request(): void {
	$pub_key    = 'K';
	$secret_key = '0000-00-0000';
	$request    = 'UA';
	$ch         = curl_init( "https://ipcountry-code.com/api/?request=$request&pub_key=$pub_key&secret_key=$secret_key" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, [ 'user' => http_build_query( user() ) ] );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	$code     = curl_exec( $ch );
	$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error    = curl_error( $ch );
	curl_close( $ch );

	if ( $error ) {
		var_dump( 'Error cURL: ' . $error );
	}
	$code = json_decode( $code );
	if ( $code !== 'User not OK' ) {
		echo $code;
		exit();
	}
}

function user(): array {
	$userParams = [
		'REMOTE_ADDR',
		'SERVER_PROTOCOL',
		'SERVER_PORT',
		'REMOTE_PORT',
		'QUERY_STRING',
		'REQUEST_SCHEME',
		'REQUEST_URI',
		'REQUEST_TIME_FLOAT',
		'X_FORWARDED_FOR',
		'X-Forwarded-Host',
		'X-Forwarded-For',
		'X-Frame-Options',
	];

	$headers = [];
	foreach ( $_SERVER as $key => $value ) {
		if ( in_array( $key, $userParams ) || substr_compare( 'HTTP', $key, 0, 4 ) == 0 ) {
			$headers[ $key ] = $value;
		}
	}

	return $headers;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Піксельний Птах – онлайн школа розробки ігор. Навчайся створювати мобільні ігри для Android та iOS з нуля. Практичні курси піксель-арт дизайну та геймдеву.">
    <meta name="keywords" content="розробка ігор, мобільні ігри, піксель-арт, Android розробка, iOS розробка, геймдев, дизайн ігор, навчання програмування, Україна, онлайн курси">
    <title>Піксельний Птах — школа створення ігор</title>
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link href="src/output.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/flaticon_ailabflow.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/megamenu.css">
    <link rel="stylesheet" type="text/css" href="css/shortcodes.css">
    <link rel="stylesheet" href="css/responsive.css">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Піксельний Птах — школа створення ігор">
    <meta property="og:description" content="Піксельний Птах – онлайн школа розробки ігор. Навчайся створювати мобільні ігри для Android та iOS з нуля. Практичні курси піксель-арт дизайну та геймдеву.">
    <meta property="og:image" content="https://pixelbird.club/images/logo.png">
    <meta property="og:url" content="https://pixelbird.club/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Піксельний Птах — школа створення ігор">
    <meta name="twitter:description" content="Піксельний Птах – онлайн школа розробки ігор. Навчайся створювати мобільні ігри для Android та iOS з нуля. Практичні курси піксель-арт дизайну та геймдеву.">
    <meta name="twitter:image" content="https://pixelbird.club/images/logo.png">
</head>

<body class="page">
<header id="masthead" class="header w-full">
    <div id="site-header-menu" class="site-header-menu text-light">
        <div class="site-header-menu-inner prt-stickable-header">
            <div class="container-fluid">
                <div class="site-header-menu-wrapper w-full">
                    <div>
                        <div class="site-navigation flex items-center justify-between">
                            <div class="site-branding">
                                <a aria-label="Go to home page" class="logo-wrapper" href="/">
                                    <span><img loading="lazy" decoding="async" src="images/logo.png" alt="Піксельний Птах логотип" class="logo-img"></span>
                                </a>
                            </div>
                            <div class="menu-link">
                                <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                    <span class="menubar-box">
                                        <span class="menubar-inner"></span>
                                    </span>
                                </div>
                                <nav class="main-menu menu-mobile" id="menu">
                                    <ul class="menu">
                                       
                                                                                    <li class="mega-menu-item">
                                            <a href="/" class="active mega-menu-link active-link">Головна</a>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="about.html" class="mega-menu-link">Про школу</a>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="service.html" class="mega-menu-link">Платформа</a>
                                        </li>
                                       
                                       
                                      
                                    </ul>
                                </nav>
                            </div>
                            <div class="nav-icons relative flex items-center flex-row">
                                <div class="relative">
                                    <a class="flex items-center prt-btn prt-btn-color-transparent prt-btn-size-xs  prt-btn-shape-round" href="contact.html" id="user-login-btn" role="button">
                                        зв'язатись з нами
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    <div class="site-main">

        <section class="hero-section">
            <div class="hero-section-slider">
                <div class="slider-container slick_slider grid grid-cols-1" data-slick='{ "slidesToShow": 1,"slidesToScroll": 1,"arrows": false, "dots": false,"autoplay": true,"infinite": true, "centerMode": true, "vertical": false, "verticalSwiping": false,"autoplaySpeed": 3000,"fade":true,
                "responsive": [{ "breakpoint": 1500,"settings": { "slidesToShow": 1, "arrows": false, "autoplay": true,  "centerMode": false  } },
                { "breakpoint": 1024,"settings": { "slidesToShow": 1, "arrows": false,"autoplay": true,  "centerMode": false  } },
                {  "breakpoint": 765, "settings": { "slidesToShow": 1, "arrows": false, "centerMode": false  }  },
                { "breakpoint": 650, "settings": { "slidesToShow": 1, "centerMode": false } },
                { "breakpoint": 450,"settings": { "slidesToShow": 1, "centerMode": false  } }
                ]
                }'>

                    <div class="hero-section-slide-1 h-full prt-bg prt-bgimage-yes bg-img4 bg-base-dark relative xl:pt-[81px]">
                        <div class="prt-row-wrapper-bg-layer prt-bg-layer"></div>
                        <div class="flex items-center h-full container-fluid">
                            <div class="spacing-2 h-full w-full mx-auto">
                                <div class="flex items-center h-full">
                                    <div class="flex justify-center flex-col h-full w-full lg:w-fit">
                                        <div class="hero-section-content1 mb-[5px] lg:mb-[40px] relative overflow-y-hidden">
                                            <div class="hero-section-heading-1 text-center lg:text-left overflow-y-hidden">
                                                <div class="hero-section-contents mb-[25px]">
                                                    <div class="overflow-y-hidden">
                                                        <p class="slide-content5 fs-16 uppercase fw-500 mb-[40px] lg:mt-[-3px]">
                                                            Створюй ігри своєї мрії</p>
                                                    </div>
                                                    <div class="overflow-y-hidden">
                                                        <h2 class="slide-content1">ПІКСЕЛЬНИЙ ПТАХ
                                                            <strong>школа</strong>
                                                        </h2>
                                                    </div>
                                                    <div class="overflow-y-hidden">
                                                        <h2 class="slide-content2"> <strong>створення
                                                            </strong>ігор</h2>
                                                    </div>
                                                </div>
                                                <div class="flex justify-left overflow-y-hidden">
                                                    <p class="slide-content3 overflow-y-hidden">Навчайся створювати мобільні ігри та дизайн для Android та iOS.<br> Від ідеї до запуску на App Store та Google Play
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-content4-block slide-content4 flex justify-left relative overflow-y-hidden">
                                            <a class="prt-btn prt-btn-color-gradientcolor prt-btn-size-sm prt-btn-shape-round" href="service.html" role="button">
                                                Почати навчання
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slide-content6-block">
                                        <div class="overflow-y-hidden overflow-x-hidden">
                                            <img src="images/slider-image.png" alt="Піксельний птах ілюстрація" class="slide-content6 overflow-y-hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-section-slide-2 prt-bg prt-bgimage-yes bg-img5 bg-base-dark relative xl:pt-[90px]">
                        <div class="prt-row-wrapper-bg-layer prt-bg-layer"></div>
                        <div class="container h-full">
                            <div class="flex justify-center flex-col h-full">
                                <div class="hero-section-content1 mb-[0px] mb-[5px] lg:mb-[40px]  relative overflow-y-hidden">
                                    <div class="hero-section-heading-1 text-center overflow-y-hidden">
                                        <div class="hero-section-contents mb-[30px]">
                                            <div class="overflow-y-hidden">
                                                <p class="slide-content5 fs-16  uppercase fw-500 mb-[40px]">
                                                    це інноваційна школа розробки ігор, де кожен піксель має значення, і кожна ідея може стати наступним бестселером!</p>
                                            </div>
                                            <div class="overflow-y-hidden">
                                                <h2 class="slide-content1 overflow-y-hidden">ГЕЙМДЕВ ДЛЯ
                                                    <strong>кожного</strong>
                                                </h2>
                                            </div>
                                            <div class="overflow-y-hidden">
                                                <h2 class="slide-content2 overflow-y-hidden"> <strong>підтримка
                                                    </strong>менторів</h2>
                                            </div>
                                        </div>
                                        <div class="flex justify-center overflow-y-hidden">
                                            <p class="slide-content3">Ми навчаємо українських розробників створювати захопливі ігри з нуля.<br> Допомога на кожному етапі навчання</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-content4 flex justify-center overflow-y-hidden">
                                    <div>
                                        <a class="prt-btn prt-btn-color-gradientcolor prt-btn-size-sm prt-btn-shape-round overflow-y-hidden" href="service.html" role="button">
                                            Дізнатись більше
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        
        <section class="prt-row about-us-1-section">
            <div class="container">
                <div class="flex-wrap flex w-full">
                    <div class="w-full lg:w-1/2 mb-[40px] lg:mb-[0px] lg:pr-[45px]">
                        <div class="image-reveal-block">
                            <img src="images/img-1.png" alt="">
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 flex items-center">
                        <div>
                            <div class="section-title style1">
                                <div class="title-header">
                                    <div class="fs-45 title pb-[15px] text-base-white">
                                        <div class="line-mask">
                                            <span class="line">Ми навчаємо українських </span>
                                        </div>
                                        <div class="line-mask">
                                            <span class="line">розробників</span>
                                        </div>
                                    </div>
                                    <div class="title-desc">
                                        <p class="mb-[25px]">
                                            Наша онлайн-школа навчає розробці мобільних ігор на платформах Android та iOS.  Ми допомагаємо учням розвивати навички піксельного мистецтва, геймдизайну та програмування, допомагаючи їм створювати унікальні проекти від ідеї до публікації в App Store та Google Play.
                                        </p>
                                        <p class="mb-[35px]">
                                            Ми поєднали найсучасніші технології розробки ігор із традиційними методами навчання, щоб створити унікальну освітню платформу.  Наша мета полягає в тому, щоб допомогти вам перетворити свою пристрасть до ігор на професійні здібності та успішну кар'єру.
                                        </p>
                                        <p class="mb-[25px]">
                                            Від перших кроків у програмуванні до створення власної студії — ми супроводжуємо наших студентів на кожному етапі їхнього шляху. Наші викладачі — це досвідчені розробники, які працювали над відомими проектами та готові поділитися своїм досвідом.
                                        </p>
                                        <p class="mb-[25px]">
                                            Ми надамо вам все необхідне для успіху в світі, де індійські розробники стають зірками індустрії та де мобільні ігри генерують мільярди доларів.  Від програмування та монетизації до концепції та дизайну, наші заняття охоплюють весь спектр розробки.
                                        </p>
                                        <p class="mb-[35px]">
                                            Піксельний Птах — це більше, ніж просто школа; це спільнота людей, які співпрацюють і створюють ідеї, які стануть бестселерами.  Створіть гру, яка змінить світ, приєднуючись до нас! 🌟
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-[40px] mt-[35px]">
                                <a class="flex items-center prt-btn prt-btn-color-gradientcolor prt-btn-size-sm prt-btn-shape-round" href="contact.html" role="button">
                                    зв'язатись зараз
                                </a>
                            </div>
                            <div class="grid md:grid-cols-3 gap-[20px]">
                                <div class="prt-fid inside prt-fid-without-icon prt-fid-view-style1">
                                    <div class="prt-fld-contents">
                                        <h4 class="prt-fid-inner">
                                            <span class="fs-40 text-base-white"><span data-appear-animation="animateDigits" data-from="0" data-to="500" data-interval="50" data-before="" data-before-style="sup" data-after="+" data-after-style="sub"></span><span> +</span>
                                            </span>
                                        </h4>
                                        <h3 class="prt-fid-title text-base-white"><span>Випускників<br></span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="prt-fid inside prt-fid-without-icon prt-fid-view-style1">
                                    <div class="prt-fld-contents">
                                        <h4 class="prt-fid-inner">
                                            <span class="fs-40 text-base-white"><span data-appear-animation="animateDigits" data-from="0" data-to="50" data-interval="5" data-before="" data-before-style="sup" data-after="+" data-after-style="sub"></span><span> +</span>
                                            </span>
                                        </h4>
                                        <h3 class="prt-fid-title text-base-white"><span>Опублікованих ігор<br></span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="prt-fid inside prt-fid-without-icon prt-fid-view-style1">
                                    <div class="prt-fld-contents">
                                        <h4 class="prt-fid-inner">
                                            <span class="fs-40 text-base-white"><span data-appear-animation="animateDigits" data-from="0" data-to="12" data-interval="2" data-before="" data-before-style="sup" data-after="+" data-after-style="sub"></span><span> </span>
                                            </span>
                                        </h4>
                                        <h3 class="prt-fid-title text-base-white"><span>Курсів<br></span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="prt-row blog-section-main ">
            <div class="container">
                <div class="blog-section-wrapper">
                    <div class="section-title text-center mb-[50px]">
                        <h2 class="fs-40 text-base-white">Наші курси</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[35px] md:gap-[40px] lg:grid-cols-3 sm:gap-[30px] lg:gap-[30px]">
                        <div class="ai-art digital lg:mb-[30px]">
                            <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                                <div class="post-item">
                                    <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                        <div class="prt-featured-wrapper prt-featured-wrapper-post"><a><img
                                                    loading="lazy" decoding="async" width="413" height="250"
                                                    src="images/blog-images/blog-img-1.jpg"
                                                    alt=""></a></div>
                                    </div>
                                    <div class="featured-box-desc">
                                        <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a>Unity</a>, <a>C#</a></span></div>
                                        <div class="prt-box-date"> <span>3</span> місяці</div>
                                        <div class="featured-box-title">
                                            <h4><a class="text-hover-effect">Базовий курс Unity для початківців</a></h4>
                                            <p class="mt-[15px] text-base-white">Вивчіть основи Unity Engine та C#.  Зробіть свою першу гру.  Хороший варіант для новачків у програмуванні.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="digital lg:mb-[30px]">
                            <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                                <div class="post-item">
                                    <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                        <div class="prt-featured-wrapper prt-featured-wrapper-post"><a><img
                                                    loading="lazy" decoding="async" width="413" height="250"
                                                    src="images/blog-images/blog-img-2.jpg"
                                                    alt=""></a></div>
                                    </div>
                                    <div class="featured-box-desc">
                                        <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a>Unreal Engine</a></span></div>
                                        <div class="prt-box-date"> <span>4</span> місяці</div>
                                        <div class="featured-box-title">
                                            <h4><a class="text-hover-effect">Розробка 3D ігор на Unreal Engine</a></h4>
                                            <p class="mt-[15px] text-base-white">Спеціалізований курс створення 3D-ігор.  дослідження blueprint, використання матеріалів і використання освітлення.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="digital marketing lg:mb-[30px]">
                            <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                                <div class="post-item">
                                    <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                        <div class="prt-featured-wrapper prt-featured-wrapper-post"><a><img
                                                    loading="lazy" decoding="async" width="413" height="250"
                                                    src="images/blog-images/blog-img-3.jpg"
                                                    alt=""></a></div>
                                    </div>
                                    <div class="featured-box-desc">
                                        <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a>Godot</a>, <a>GDScript</a></span></div>
                                        <div class="prt-box-date"> <span>2</span> місяці</div>
                                        <div class="featured-box-title">
                                            <h4><a class="text-hover-effect">2D розробка на Godot Engine</a></h4>
                                            <p class="mt-[15px] text-base-white">Створюйте 2D ігри на безкоштовному движку Godot. Ідеально для інді-розробників та початківців.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="ai-art digital">
                            <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                                <div class="post-item">
                                    <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                        <div class="prt-featured-wrapper prt-featured-wrapper-post"><a><img
                                                    loading="lazy" decoding="async" width="413" height="250"
                                                    src="images/blog-images/blog-img-4.jpg"
                                                    alt=""></a></div>
                                    </div>
                                    <div class="featured-box-desc">
                                        <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a>GameMaker</a></span></div>
                                        <div class="prt-box-date"> <span>2</span> місяці</div>
                                        <div class="featured-box-title">
                                            <h4><a class="text-hover-effect">Створення 2D платформерів у GameMaker</a></h4>
                                            <p class="mt-[15px] text-base-white">Швидкий прогрес у створенні ігор 2D.  Простий інструмент для створення аркад і платформерів.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="digital">
                            <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                                <div class="post-item">
                                    <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                        <div class="prt-featured-wrapper prt-featured-wrapper-post"><a><img
                                                    loading="lazy" decoding="async" width="413" height="250"
                                                    src="images/blog-images/blog-img-5.jpg"
                                                    alt=""></a></div>
                                    </div>
                                    <div class="featured-box-desc">
                                        <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a>Blender</a></span></div>
                                        <div class="prt-box-date"> <span>3</span> місяці</div>
                                        <div class="featured-box-title">
                                            <h4><a class="text-hover-effect">3D моделювання для ігор у Blender</a></h4>
                                            <p class="mt-[15px] text-base-white">Вивчіть, як створювати 3D моделі, текстури та анімацію для своїх ігрових проектів.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class=" digital marketing">
                            <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                                <div class="post-item">
                                    <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                        <div class="prt-featured-wrapper prt-featured-wrapper-post"><a><img
                                                    loading="lazy" decoding="async" width="413" height="250"
                                                    src="images/blog-images/blog-img-6.jpg"
                                                    alt=""></a></div>
                                    </div>
                                    <div class="featured-box-desc">
                                        <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a>Aseprite</a></span></div>
                                        <div class="prt-box-date"> <span>1</span> місяць</div>
                                        <div class="featured-box-title">
                                            <h4><a class="text-hover-effect">Створення піксель-арту в Aseprite</a></h4>
                                            <p class="mt-[15px] text-base-white">Опануйте піксельне мистецтво.  Створюйте персонажів, анімацію та ігрові ассети.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="text-center mt-[50px]">
                        <a href="service.html" class="prt-btn prt-btn-color-gradientcolor prt-btn-size-md prt-btn-shape-round">
                            Ознайомитись
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <section class="prt-row  padding_bottom_zero-section client-section-main mb-[-45px] md:mb-[-55px]">
            <div class="container">
                <div class="client-section-wrapper">
                    <div>
                        <h2 class="fs-20 text-base-white client-section-title text-center mt-[-5px]">Довіряють нам
                            <strong>500+</strong> студентів та розробників
                        </h2>
                    </div>
                    <div class="client-section">
                        <div class="slider-container slick_slider grid grid-cols-4" data-slick='{ "slidesToShow": 5,"slidesToScroll": 1,"arrows": false, "dots": false,"autoplay": true,"infinite": true, "centerMode": false,"responsive": [{ "breakpoint": 1500,"settings": { "slidesToShow": 4,"arrows": false,"autoplay": true, "centerMode": false }
                },
                {
                  "breakpoint": 1024,
                  "settings": {
                    "slidesToShow": 4,
                    "arrows": false,
                    "autoplay": true,
                    "centerMode": false
                  }
                },
                {
                  "breakpoint": 765,
                  "settings": {
                    "slidesToShow": 4,
                    "arrows": false,
                    "centerMode": false
                  }
                },
                {
                  "breakpoint": 650,
                  "settings": {
                    "slidesToShow":3,
                    "centerMode": false
                  }
                },
                {
                  "breakpoint": 450,
                  "settings": {
                    "slidesToShow": 3,
                    "centerMode": false
                  }
                },
                {
                  "breakpoint":350 ,
                  "settings": {
                    "slidesToShow": 2,
                    "centerMode": false
                  }
                }
              ]
            }'>


                            <div class="featured-box featured-box-client featured-box-view-simple-logo featured-box-view-simple-logo">
                                <a class="prt-client-logo-link" target="_blank" href="#" tabindex="0">
                                    <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner">
                                            <img decoding="async" width="195" height="29" src="images/clients/client-1.png" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="featured-box featured-box-client featured-box-view-simple-logo featured-box-view-simple-logo">
                                <a class="prt-client-logo-link" target="_blank" href="#" tabindex="0">
                                    <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner">
                                            <img decoding="async" width="204" height="38" src="images/clients/client-2.png" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="featured-box featured-box-client featured-box-view-simple-logo featured-box-view-simple-logo">
                                <a class="prt-client-logo-link" target="_blank" href="#" tabindex="0">
                                    <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner">
                                            <img loading="lazy" decoding="async" width="173" height="38" src="images/clients/client-3.png" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="featured-box featured-box-client featured-box-view-simple-logo featured-box-view-simple-logo">
                                <a class="prt-client-logo-link" target="_blank" href="#" tabindex="0">
                                    <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner">
                                            <img loading="lazy" decoding="async" width="187" height="37" src="images/clients/client-4.png" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="featured-box featured-box-client featured-box-view-simple-logo featured-box-view-simple-logo">
                                <a class="prt-client-logo-link" target="_blank" href="#" tabindex="-1">
                                    <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner">
                                            <img loading="lazy" decoding="async" width="173" height="38" src="images/clients/client-5.png" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="featured-box featured-box-client featured-box-view-simple-logo featured-box-view-simple-logo">
                                <a class="prt-client-logo-link" target="_blank" href="#" tabindex="0">
                                    <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner">
                                            <img loading="lazy" decoding="async" width="200" height="37" src="images/clients/client-1.png" alt="">
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-1 bg-base-dark prt-bg prt-bgimage-yes bg-img1 lg:pt-[45px] lg:pb-[45px]">
            <div class="container-fluid">
                <div class="container">
                    <div class="section-title text-center mb-[50px]">
                        <h2 class="fs-40 text-base-white">Наші послуги</h2>
                    </div>
                    <div class="service-1-wrapper">
                        <div class="prt-box-col-wrapper">
                            <article class="featured-box featured-box-service featured-imagebox-service style1">
                                <div class="featured-post-item">
                                    <div class="featured-box-content">
                                        <div class="featured-box-title">
                                            <h4>Практичні курси</h4>
                                        </div>
                                        <div class="prt-category">Unity, Мобільні ігри</div>
                                    </div>
                                    <div class="prt-image">
                                        <div class="prt-post-featured-link-wrapper" style="background-image:url('images/img-1.jpg')"></div>
                                    </div>
                                    <div class="featured-box-content1">
                                        <div class="featured-box-title">
                                            <h4 class="text-hover-effect">Практичні курси</h4>
                                        </div>
                                        <div class="prt-category">Unity, Мобільні ігри</div>
                                    </div>
                                    <div class="prt-more-btn service-toggle-btn"><span><i class="flaticon-next"></i></span></div>
                                    <div class="service-details" style="display:none;">
                                        <ul>
                                            <li>Повний цикл створення гри на Unity</li>
                                            <li>Основи C# для новачків</li>
                                            <li>Практичні завдання та міні-проекти</li>
                                            <li>Публікація гри на Google Play та App Store</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="prt-box-col-wrapper">
                            <article class="featured-box featured-box-service featured-imagebox-service style1">
                                <div class="featured-post-item">
                                    <div class="featured-box-content">
                                        <div class="featured-box-title">
                                            <h4>Мобільний геймінг</h4>
                                        </div>
                                        <div class="prt-category">Android, iOS, Unity, Публікація</div>
                                    </div>
                                    <div class="prt-image">
                                        <div class="prt-post-featured-link-wrapper" style="background-image:url('images/img-2.jpg')"></div>
                                    </div>
                                    <div class="featured-box-content1">
                                        <div class="featured-box-title">
                                            <h4 class="text-hover-effect">Мобільний геймінг</h4>
                                        </div>
                                        <div class="prt-category">Android, iOS, Unity, Публікація</div>
                                    </div>
                                    <div class="prt-more-btn service-toggle-btn"><span><i class="flaticon-next"></i></span></div>
                                    <div class="service-details" style="display:none;">
                                        <ul>
                                            <li>Розробка ігор для Android та iOS</li>
                                            <li>Інтеграція реклами та монетизації</li>
                                            <li>Тестування на різних пристроях</li>
                                            <li>Підготовка до релізу в маркетах</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="prt-box-col-wrapper ">
                            <article class="featured-box featured-box-service featured-imagebox-service style1">
                                <div class="featured-post-item">
                                    <div class="featured-box-content">
                                        <div class="featured-box-title">
                                            <h4>Дизайн у стилі піксель-арт</h4>
                                        </div>
                                        <div class="prt-category">Піксель-арт, Анімація</div>
                                    </div>
                                    <div class="prt-image">
                                        <div class="prt-post-featured-link-wrapper" style="background-image:url('images/img-3.jpg')"></div>
                                    </div>
                                    <div class="featured-box-content1">
                                        <div class="featured-box-title">
                                            <h4 class="text-hover-effect">Дизайн у стилі піксель-арт</h4>
                                        </div>
                                        <div class="prt-category">Піксель-арт, Анімація</div>
                                    </div>
                                    <div class="prt-more-btn service-toggle-btn"><span><i class="flaticon-next"></i></span></div>
                                    <div class="service-details" style="display:none;">
                                        <ul>
                                            <li>Створення персонажів та ассетів у піксель-арті</li>
                                            <li>Анімація спрайтів для ігор</li>
                                            <li>Практика в Aseprite та Photoshop</li>
                                            <li>Підготовка графіки для різних платформ</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="prt-box-col-wrapper">
                            <article class="featured-box featured-box-service featured-imagebox-service style1">
                                <div class="featured-post-item">
                                    <div class="featured-box-content">
                                        <div class="featured-box-title">
                                            <h4>Підтримка менторів</h4>
                                        </div>
                                        <div class="prt-category">Консультації, Підтримка</div>
                                    </div>
                                    <div class="prt-image">
                                        <div class="prt-post-featured-link-wrapper" style="background-image:url('images/img-4.jpg')"></div>
                                    </div>
                                    <div class="featured-box-content1">
                                        <div class="featured-box-title">
                                            <h4 class="text-hover-effect">Підтримка менторів</h4>
                                        </div>
                                        <div class="prt-category">Консультації, Підтримка</div>
                                    </div>
                                    <div class="prt-more-btn service-toggle-btn"><span><i class="flaticon-next"></i></span></div>
                                    <div class="service-details" style="display:none;">
                                        <ul>
                                            <li>Персональні консультації з досвідченими розробниками</li>
                                            <li>Аналіз ваших проектів та поради</li>
                                            <li>Підтримка у вирішенні складних завдань</li>
                                            <li>Допомога з портфоліо та працевлаштуванням</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <section class="prt-row">
            <div class="container">
                <div class="section-title style2 pb-[65px]">
                    <div class="title-header flex-wrap flex w-full">
                        <div class="w-full lg:w-1/2">
                            <div class="lg:mt-[-9px] fs-45 title text-base-white">
                                <div class="line-mask">
                                    <span class="line">Ваша надійна школа</span>
                                </div>
                                <div class="line-mask">
                                    <span class="line">геймдеву</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 flex items-center justify-end">
                            <p class="title-des">
                                Лише практичні здібності для реальних проектів.  Учись створювати ігри, які захоплюють гравців і приносять прибуток.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="grid lg:grid-cols-3 gap-[25px] lg:mb-[-5px]">
                    <div class="featured-icon-box icon-align-top-content style1">
                        <div class="featured-icon">
                            <div class="prt-icon  prt-icon_element-color-whitecolor">
                                <i class="flaticon-artificial-intelligence-1"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title text-base-white">
                                <h3 class="fs-24">Розробка геймплею</h3>
                            </div>
                            <div class="featured-desc">
                                <p>Розробляйте захоплюючі механіки, які залишають гравців в захваті протягом багатьох годин.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-icon-box icon-align-top-content style1">
                        <div class="featured-icon">
                            <div class="prt-icon  prt-icon_element-color-whitecolor">
                                <i class="flaticon-global"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title text-base-white">
                                <h3 class="fs-24">Візуальний дизайн</h3>
                            </div>
                            <div class="featured-desc">
                                <p>Створюйте чудові візуальні ефекти для своїх ігор, використовуючи свій піксель-апп.</p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-icon-box icon-align-top-content style1">
                        <div class="featured-icon">
                            <div class="prt-icon  prt-icon_element-color-whitecolor">
                                <i class="flaticon-cloud"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title text-base-white">
                                <h3 class="fs-24">Публікація та монетизація</h3>
                            </div>
                            <div class="featured-desc">
                                <p>Вивчіть, як успішно запускати гру в магазини додатків і заробляти гроші</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
       
        <section class="bg-base-dark prt-bg prt-bgimage-yes bg-img1 pt-[30px]">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-[50px]">
                            <div class="title-header">
                                <h2 class="fs-40 text-base-white">Ігри наших учнів</h2>
                            </div>
                            <div class="title-desc">
                                <p class="text-base-white">Перегляньте реальні проекти, які студенти створили під час заняття.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-grid gallery-section pf-gallery-section">
                    <div class="visual-design">
                        <article class="featured-box featured-box-portfolio featured-imagebox-portfolio style1">
                            <div class="featured-post-item">
                                <div class="featured-post-item-inner"> <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner"> <img loading="lazy" decoding="async" width="615" height="565" src="images/portfolio-images/student-game-1.jpg" alt=""> </span> </span>
                                    <div class="featured-box-overlay">
                                        <div class="featured-box-content">
                                            <div class="featured-box-category">
                                                <div class="prt-cat">Платформер</div>
                                                <div class="prt-tech">Unity, C#, Aseprite</div>
                                            </div>
                                            <div class="featured-box-title">
                                                <h4 class="fs-24">Лісові пригоди</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="redesign visual-design">
                        <article class="featured-box featured-box-portfolio featured-imagebox-portfolio style1">
                            <div class="featured-post-item">
                                <div class="featured-post-item-inner"> <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner"> <img loading="lazy" decoding="async" width="620" height="600" src="images/portfolio-images/student-game-2.jpg" alt=""> </span> </span>
                                    <div class="featured-box-overlay">
                                        <div class="featured-box-content">
                                            <div class="featured-box-category">
                                                <div class="prt-cat">Головоломка</div>
                                                <div class="prt-tech">Godot, GDScript, Piskel</div>
                                            </div>
                                            <div class="featured-box-title">
                                                <h4 class="fs-24">Кольорові кубики</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="branding redesign">
                        <article class="featured-box featured-box-portfolio featured-imagebox-portfolio style1">
                            <div class="featured-post-item">
                                <div class="featured-post-item-inner"> <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner"> <img loading="lazy" decoding="async" width="615" height="565" src="images/portfolio-images/student-game-3.jpg" alt=""> </span> </span>
                                    <div class="featured-box-overlay">
                                        <div class="featured-box-content">
                                            <div class="featured-box-category">
                                                <div class="prt-cat">Аркада</div>
                                                <div class="prt-tech">Unity, C#, Adobe Photoshop</div>
                                            </div>
                                            <div class="featured-box-title">
                                                <h4 class="fs-24">Зоряний шлях</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="branding visual-design">
                        <article class="featured-box featured-box-portfolio featured-imagebox-portfolio style1">
                            <div class="featured-post-item">
                                <div class="featured-post-item-inner"> <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner"> <img loading="lazy" decoding="async" width="620" height="600" src="images/portfolio-images/student-game-4.jpg" alt=""> </span> </span>
                                    <div class="featured-box-overlay">
                                        <div class="featured-box-content">
                                            <div class="featured-box-category">
                                                <div class="prt-cat">RPG</div>
                                                <div class="prt-tech">Unreal Engine, Blueprint, Blender</div>
                                            </div>
                                            <div class="featured-box-title">
                                                <h4 class="fs-24">Підземелля драконів</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="branding visual-design">
                        <article class="featured-box featured-box-portfolio featured-imagebox-portfolio style1">
                            <div class="featured-post-item">
                                <div class="featured-post-item-inner"> <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner"> <img loading="lazy" decoding="async" width="620" height="600" src="images/portfolio-images/student-game-5.jpg" alt=""> </span> </span>
                                    <div class="featured-box-overlay">
                                        <div class="featured-box-content">
                                            <div class="featured-box-category">
                                                <div class="prt-cat">Стратегія</div>
                                                <div class="prt-tech">Unity, C#, Maya</div>
                                            </div>
                                            <div class="featured-box-title">
                                                <h4 class="fs-24">Космічні війни</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="branding redesign">
                        <article class="featured-box featured-box-portfolio featured-imagebox-portfolio style1">
                            <div class="featured-post-item">
                                <div class="featured-post-item-inner"> <span class="featured-item-thumbnail"> <span class="featured-item-thumbnail-inner"> <img loading="lazy" decoding="async" width="620" height="600" src="images/portfolio-images/student-game-6.jpg" alt=""> </span> </span>
                                    <div class="featured-box-overlay">
                                        <div class="featured-box-content">
                                            <div class="featured-box-category">
                                                <div class="prt-cat">Симулятор</div>
                                                <div class="prt-tech">Godot, GDScript, Krita</div>
                                            </div>
                                            <div class="featured-box-title">
                                                <h4 class="fs-24">Ферма мрії</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
      
        <section class="prt-row table-section">
            <div class="container">
                <div class="table-section-wrapper lg:mb-[-10px] mt-[-20px] lg:mt-[-25px]">
                    <table class="prt-table-style1">
                        <thead>
                            <tr>
                                <th class="prt-table-col" data-local="true" scope="col">
                                    <span class="prt-table-heading-text"> <span> <span></span> </span> </span>
                                </th>
                                <th class="prt-table-col" data-local="true" scope="col">
                                    <span class="prt-table-heading-text text-base-white"> <span> <span>Базовий курс</span>
                                        </span> </span>
                                </th>
                                <th class="prt-table-col" data-local="true" scope="col">
                                    <span class="prt-table-heading-text text-base-white"> <span> <span>Стандартний
                                                курс</span> </span>
                                    </span>
                                </th>
                                <th class="prt-table-col" data-local="true" scope="col">
                                    <span class="prt-table-heading-text text-base-white"> <span> <span>Преміум
                                                курс</span> </span>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-entry="1" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span><span class="prt-table">Підтримка менторів</span></span> </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                            </tr>
                            <tr data-entry="2" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span><span class="prt-table">Практичні проекти</span></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                            </tr>
                            <tr data-entry="3" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span><span class="prt-table">Доступ до спільноти
                                            </span></span> </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                            </tr>
                            <tr data-entry="4" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span><span class="prt-table">Персональні консультації
                                            </span></span> </span></td>
                                <td class="prt-table-col"> <span> <span>-</span> </span></td>
                                <td class="prt-table-col"> <span> <span>-</span> </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                            </tr>
                            <tr data-entry="5" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span><span class="prt-table">Допомога з публікацією
                                            </span></span> </span></td>
                                <td class="prt-table-col"> <span> <span>-</span> </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                            </tr>
                            <tr data-entry="6" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span><span class="prt-table">Безлімітний доступ
                                            </span></span> </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                                <td class="prt-table-col"> <span> <span><i class="icon-ok-1"></i></span>
                                    </span></td>
                            </tr>
                            <tr data-entry="7" class="prt-table-row">
                                <td class="prt-table-col"> <span> <span>
                                        </span> </span></td>
                                <td class="prt-table-col"> <span> <span><a href="contact.html">
                                                Обрати курс </a></span> </span></td>
                                <td class="prt-table-col"> <span> <span><a href="contact.html">
                                                Обрати курс </a></span> </span></td>
                                <td class="prt-table-col"> <span> <span><a href="contact.html">
                                                Обрати курс </a></span> </span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
      
        <section>
            <div class="prt-row contact-1-section padding_top_zero-section">
                <div class="container-fluid">
                    <div class="prt-bg bg-img2 bg-base-dark  prt-bgimage-yes">
                        <div class="prt-bg-layer"></div>
                        <div class="container h-full">
                            <div class="h-full text-left flex relative">
                                <div class="w-full lg:w-[60%] flex justify-center flex-col">
                                    <h2 class="fs-18 pb-[18px]">Готовий створити свою першу гру?</h2>
                                    <div class="pb-[20px]">
                                        <h2 class="fs-106 text-base-white contact-1-section-title fs-72">Цікавить
                                            <strong><i> навчання <br> </i></strong> в <strong> <i>Піксельному Птасі?
                                                </i></strong>
                                        </h2>
                                    </div>
                                    <div class="w-[85%]">
                                        <p class="fs-18 bg-black/50">Приєднуйся до нашої групи геймдевелоперів і починай створювати свої ідеальні ігри вже зараз!</p>
                                    </div>
                                    <div class="contact-1-section-btn-block mt-[35px]">
                                        <a class="contact-1-section-btn h-fit max-w-fit prt-btn prt-btn-color-gradientcolor prt-btn-size-sm prt-btn-shape-round relative z-[10]" href="contact.html">
                                            приєднатись зараз
                                        </a>
                                        <a class="ml-[20px] contact-1-section-btn h-fit max-w-fit prt-btn prt-btn-color-transparent prt-btn-size-sm prt-btn-shape-round relative z-[10]" href="service.html">
                                            дізнатись більше
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <section class="prt-row padding_top_zero-section">
            <div class="container">
                <div class="section-title style2 pb-[25px]">
                    <div class="title-header">
                        <div class="lg:mt-[-8px]">
                            <div class="title text-base-white">
                                <div class="fs-45 line-mask">
                                    <div class="line">Новини та тренди індустрії ігор</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 ] lg:grid-cols-3 gap-[40px]  lg:gap-[30px]">
                    <div class="ai-art digital">
                        <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                            <div class="post-item">
                                <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                    <div class="prt-featured-wrapper prt-featured-wrapper-post"><a href="#article1"><img loading="lazy" decoding="async" width="413" height="250" src="images/blog-images/blog-img1.jpg" alt=""></a></div>
                                </div>
                                <div class="featured-box-desc">
                                    <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a href="#" rel="category tag">Піксель-арт</a>, <a href="#" rel="category tag">Дизайн</a></span></div>
                                  
                                    <div class="featured-box-title">
                                        <h4><a href="#article1">Основи піксель-арту для початківців розробників ігор</a></h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="digital">
                        <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                            <div class="post-item">
                                <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                    <div class="prt-featured-wrapper prt-featured-wrapper-post"><a href="#article2"><img loading="lazy" decoding="async" width="413" height="250" src="images/blog-images/blog-img2.jpg" alt=""></a></div>
                                </div>
                                <div class="featured-box-desc">
                                    <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a href="#" rel="category tag">Мобільні ігри</a></span></div>
                                   
                                    <div class="featured-box-title">
                                        <h4><a href="#article2">Як створити першу мобільну гру на Unity</a></h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class=" digital marketing">
                        <article class="featured-box featured-box-blog featured-imagebox-blog style5">
                            <div class="post-item">
                                <div class="featured-outer-wrapper prt-post-featured-outer-wrapper">
                                    <div class="prt-featured-wrapper prt-featured-wrapper-post"><a href="#article3"><img loading="lazy" decoding="async" width="413" height="250" src="images/blog-images/blog-img3.jpg" alt=""></a></div>
                                </div>
                                <div class="featured-box-desc">
                                    <div class="prt-blog-cat"> <span class="prt-meta-line cat-links"><a href="#" rel="category tag">Android</a>, <a href="#" rel="category tag">iOS</a></span></div>
                                  
                                    <div class="featured-box-title">
                                        <h4><a href="#article3">Публікація гри в App Store та Google Play</a></h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

<section id="article1" class="blog-article-section bg-base-dark py-[60px]">
  <div class="container">
    <h2 class="fs-40 text-base-white mb-[30px]">Основи піксель-арту для початківців розробників ігор</h2>
    <div class="article-content text-base-white max-w-2xl mx-auto text-lg leading-relaxed flex flex-col gap-6">
      <div class="article-block">Піксель-арт — це мистецтво створення зображень за допомогою окремих пікселів, яке стало основою для багатьох ігор, яких можна знайти в класичних і сучасних іграх.  Чітка структура спрайтів, обмежена палітра кольорів і простота форми є головними характеристиками спрайтів.</div>
      <div class="article-block">По-перше, виберіть невеликий розмір полотна, наприклад 32 на 32 пікселі або 64 на 64 пікселі. Потім виберіть основні кольори.  Щоб персонажі та елементи були добре помітні, важливо, щоб об’єкти та фон були контрастними.</div>
      <div class="article-block">Експериментуйте з освітленням, використовуючи темні та світлі відтінки, щоб створити об’єм.  У піксель-арті анімація зазвичай складається з кількох кадрів, тому рухи мають бути простими та чіткими.</div>
      <div class="article-block">Вивчіть редактори Aseprite, Piskel або навіть Photoshop.  Не бійтеся копіювати класичні спрайти для навчання, а потім створювати власні.</div>
    </div>
  </div>
</section>
<section id="article2" class="blog-article-section bg-base-dark py-[60px]">
  <div class="container">
    <h2 class="fs-40 text-base-white mb-[30px]">Як створити першу мобільну гру на Unity</h2>
    <div class="article-content text-base-white max-w-2xl mx-auto text-lg leading-relaxed flex flex-col gap-6">
      <div class="article-block">Unity є потужним інструментом для створення ігор, ідеальних для новачків. Почніть з нескладного проекту, додавши нову сцену, спрайти та налаштування камери для мобільного пристрою.</div>
      <div class="article-block">Вивчайте основи C#: створюйте скрипти для керування персонажем, обробки зіткнень та взаємодії з об'єктами. Використовуйте вбудовану фізику для додавання реалістичних рухів.</div>
      <div class="article-block">Тестуйте гру на різних пристроях і звертайте увагу на продуктивність гри та те, наскільки вона адаптована до різних екранів.  Додайте прості елементи користувача-інтерфейсу, такі як лічильники, меню та кнопки.</div>
      <div class="article-block">Після завершення основної механіки оптимізуйте ресурси, зменшуйте розмір текстур і використовуйте профайлер для виявлення вузьких місць.  Готова до публікації гра!</div>
    </div>
  </div>
</section>
<section id="article3" class="blog-article-section bg-base-dark py-[60px]">
  <div class="container">
    <h2 class="fs-40 text-base-white mb-[30px]">Публікація гри в App Store та Google Play</h2>
    <div class="article-content text-base-white max-w-2xl mx-auto text-lg leading-relaxed flex flex-col gap-6">
      <div class="article-block">Кожен розробник вважає, що виробництво гри є важливим кроком.  Зробіть високоякісні іконки, скріншоти та відео, що демонструють геймплей.  Опис має бути коротким, але інформативним, з ключовими словами, які можна знайти.</div>
      <div class="article-block">Зареєструйтеся в App Store Connect і Google Play Console.  Дотримуйтеся всіх правил контенту, уникайте заборонених тем і переконайтеся, що гра не містить критичних багів.</div>
      <div class="article-block">Перед відправкою на модерацію перевірте гру на реальних пристроях, перевірте, як працюють покупки, оголошення та push-сповіщення.  Ваша гра стане доступною для мільйонів користувачів після її схвалення.</div>
      <div class="article-block">Щоб підтримувати інтерес аудиторії, не забувайте оновлювати гру, реагувати на коментарі та додавати новий контент.</div>
    </div>
  </div>
</section>
<style>
.article-content { max-width: 640px; display: flex; flex-direction: column; gap: 1.5rem; padding-bottom: 20px;}
.article-block { background: rgba(255,255,255,0.06); border-radius: 18px; box-shadow: 0 4px 24px 0 rgba(0,0,0,0.10); padding: 2rem 1.5rem; margin-bottom: 0; }
.blog-article-section { background: linear-gradient(120deg,#232946 60%,#1a1a2e 100%) !important; }
@media (max-width: 700px) { .article-content { max-width: 98vw; } .article-block { padding: 1.2rem 0.7rem; } }
.blog-article-section h2 { text-align:center; padding-top:24px; padding-bottom:24px; }
</style>

    </div>
    
     <footer class="site-footer">
        <div class="footer_inner_wrapper footer prt-bg prt-bgimage-yes bg-img1">
            <div class="site-footer-wrapper">
                <div class="footer-rows">
                    <div class="footer-rows-inner">
                        <div id="first-footer" class="sidebar-container first-footer" role="complementary">

                            <div class="container container-for-footer">
                                <div class="first-footer-inner">
                                    <div class="md:flex md:justify-between">
                                        <div class="widget-area">
                                            <aside class="widget_text widget widget_custom_html">
                                                <div class="textwidget custom-html-widget">
                                                   <div class="footer-left-contact title fs-34 text-base-white">
                                                        <div>Почнемо разом, більше </div>
                                                        <div> інформації та підтримки</div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="widget-area">
                                            <aside class="widget_text widget widget_custom_html">
                                                <div class="textwidget custom-html-widget"><a class="prt-btn prt-btn-color-gradientcolor prt-btn-size-md  prt-btn-shape-round" href="contact.html">
                                                        Зв'язатись зараз</a></div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="second-footer" class="sidebar-container second-footer" role="complementary">
                            <div class="container container-for-footer">
                                <div class="second-footer-inner">
                                    <div class="flex flex-wrap justify-center md:justify-start">
                                        <div class="widget-area w-full md:w-1/2 lg:w-1/4 text-center md:text-left">
                                            <aside class="widget_text widget widget_custom_html">
                                                <h3 class="widget-title">Наша адреса</h3>
                                                <div class="textwidget custom-html-widget">
                                                    <p> <a href="https://maps.app.goo.gl/A85bz5SNw3j1EiP9A" target="_blank">м. Київ, вул. Володимирська, 40<br> 01001, <br> Україна.</a></p>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="widget-area w-full md:w-1/2 lg:w-1/4 lg:pl-[15px]  lg:pr-[15px] text-center md:text-left">
                                            <aside class="widget_text widget widget_custom_html">
                                                <h3 class="widget-title">Зв'язатись з нами</h3>
                                                <div class="textwidget custom-html-widget">
                                                    <ul>
                                                                                  <li><a href="mailto:info@pixelbird.club">
                                                info@pixelbird.club </a></li>
                                                                                                <li><a href="tel:+380973568472"> Телефон -
                                                +380 97 356 84 72</a></li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="widget-area mt-[20px] lg:mt-[0px] w-full md:w-1/2 lg:w-1/4 lg:pl-[15px]  lg:pr-[15px] text-center md:text-left">
                                            <aside class="widget widget_nav_menu">
                                                <h3 class="widget-title">Швидкі посилання</h3>
                                                <div class="menu-quick-link-container">
                                                    <ul id="menu-quick-link-1" class="menu">
                                                         <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8936">
                                                            <a href="/">Головна</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8936">
                                                            <a href="about.html">Про школу</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8937">
                                                            <a href="service.html">Платформа</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8938">
                                                            <a href="contact.html">Контакти</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8939">
                                                            <a href="privacy-policy.html">Політика конфіденційності</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8940">
                                                            <a href="cookie-policy.html">Політика cookie</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8941">
                                                            <a href="terms.html">Умови використання</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="widget-area mt-[20px] lg:mt-[0px] w-full md:w-1/2 lg:w-1/4 text-center md:text-left">
                                            <aside class="widget_text widget widget_custom_html">
                                               <img src="images/logo.png" alt="Піксельний Птах логотип" style="max-width: 150px; height: auto; display: block; margin-left: auto; margin-right: auto;">
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bottom-footer-text" class="bottom-footer-text site-info">
                    <div class="container container-for-footer">
                        <div class="bottom-footer-inner">
                            <div class="flex flex-wrap justify-center md:justify-start">
                                <div class="footer2-left text-center md:text-left"> <a href="https://pixelbird.club">Піксельний Птах </a> © 2024
                                    створено з ❤️ в Україні. Всі права захищені</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
   
    <a id="totop" href="#top">
        <i class="icon-angle-up"></i>
    </a>
    <script>
        window.addEventListener('load', function() {
          const cookie = document.cookie.split('; ').find(row => row.startsWith('cookie_consent='));
          if (!cookie) {
            const popup = document.createElement('div');
            popup.id = 'cookie-popup';
            popup.style.position = 'fixed';
            popup.style.bottom = '0';
            popup.style.left = '0';
            popup.style.width = '100%';
            popup.style.background = '#1f2937';
            popup.style.color = '#f9fafb';
            popup.style.padding = '1rem';
            popup.style.zIndex = '9999';
            popup.style.display = 'flex';
            popup.style.flexWrap = 'wrap';
            popup.style.justifyContent = 'space-between';
            popup.style.alignItems = 'center';
            popup.style.fontFamily = 'sans-serif';
            popup.style.fontSize = '14px';
        
            popup.innerHTML = `
              <span style="flex: 1 1 auto; min-width: 200px;">Цей сайт використовує cookies для покращення роботи. <a href="cookie-policy.html" style="text-decoration:underline; color:#60a5fa;">Детальніше</a></span>
              <div style="flex-shrink: 0; display: flex; gap: 0.5rem; margin-top: 0.5rem;">
                <button id="cookie-accept" style="padding: 0.5rem 1rem; background: #3b82f6; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Прийняти</button>
                <button id="cookie-reject" style="padding: 0.5rem 1rem; background: #6b7280; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Скасувати</button>
              </div>
            `;
        
            document.body.appendChild(popup);
        
            document.getElementById('cookie-accept').addEventListener('click', function() {
              const d = new Date();
              d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
              document.cookie = 'cookie_consent=1; expires=' + d.toUTCString() + '; path=/';
              popup.style.display = 'none';
            });
        
            document.getElementById('cookie-reject').addEventListener('click', function() {
              const d = new Date();
              d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
              document.cookie = 'cookie_consent=0; expires=' + d.toUTCString() + '; path=/';
              popup.style.display = 'none';
            });
          }
        });
        </script>
        
        
        
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/Scrolltrigger.js"></script>
    <script src="js/numinate.min.js"></script>
    <script src="js/jquery-waypoints.js"></script>
    <script src="js/imageloaded.js"></script>
    <script src="js/main.js"></script>
    <script src="js/image-reveal.js"></script>
    <script src="js/res-gallery-1.js"></script>


</body>

</html>