<?php

function landing_page(){
	
$file = '<!DOCTYPE html>

<html lang="ru" prefix="og: http://ogp.me/ns#">

<head>
	<base href="" />

	<title>Hackathon Autumn 2023</title>

	<meta charset="utf-8">

	<!-- SEO Meta -->
	<meta name="language" content="RU" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="title" content="Hackathon Autumn 2023" />
	<meta name="description"
		content="Оджетто — Быстро выводим на рынок новые продукты на готовых платформах, развиваем custom build решения в парадигме микросервисов. IT-консалтинг, разработка, дизайн, поддержка, веб-аналитика." />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Apple Meta Tags -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />

	<!-- About Creator App -->
	<meta name="owner" content="nona@localzet.com" />
	<meta name="designer" content="nona@localzet.com" />
	<meta name="author" content="NONA Team" />
	<meta name="copyright" content="NONA Team" />
	<meta name="reply-to" content="nona@localzet.com" />

	<!-- System Information -->
	<meta name="generator" content="Triangle Framework" />

	<!-- HTTP Equiv -->
	<meta http-equiv="Expires" content="60" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

  	<!-- SEO Link -->
	<link rel="canonical" href="https://hackathon.localzet.com/">
	<link rel="icon" type="image/png" href="https://oggetto.ru/favicon.png">
	<link rel="shortcut icon" type="image/png" href="https://oggetto.ru/favicon.png">

  	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&amp;display=swap">
  
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/assets/plugins/global/plugins.bundle.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/style.bundle.css" />
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-white position-relative app-blank">
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<div class="mb-0" id="home">
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
				style="background-image: url(assets/media/svg/illustrations/landing.svg)">
				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
					data-kt-sticky-offset="{default: '."'".'200px'."'".', lg: '."'".'300px'."'".'}">
					<div class="container">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center flex-equal">
								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
									id="kt_landing_menu_toggle">
									<i class="ki-duotone ki-abstract-14 fs-2hx">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</button>
								<a href="/">
									<img alt="Logo" src="https://oggetto.ru/lfs-images/oggetto-logo/inverse-logo-3x.png"
										class="logo-default h-25px h-lg-30px" />
									<img alt="Logo"
										src="https://oggetto.ru/lfs-images/oggetto-logo/logo-3x.png"
										class="logo-sticky h-20px h-lg-25px" />
								</a>
							</div>
							<div class="flex-equal text-end ms-1">
								<a href="/events/" class="btn btn-success">Войти</a>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Well-being платформа
							<br />для
							<span
								style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">проведения корпоративных мероприятий</span>
							</span>
						</h1>
					</div>
				</div>
			</div>
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
						fill="currentColor"></path>
				</svg>
			</div>
		</div>
		<div class="mb-n10 mb-lg-n20 z-index-2">
			<div class="container">
				<div class="text-center mb-17">
					<h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
						Как это работает</h3>
					<div class="fs-5 text-muted fw-bold">Мы заботимся о наших сотрудниках и стараемся уделять внимание
						не только
						материальному, но и их физическому и ментальному благополучию.
						<br />Для этого мы запустили внутренний проект под названием #oggettowellbeing.
					</div>
				</div>
				<div class="row w-100 gy-10 mb-md-20">
					<div class="col-md-4 px-5">
						<div class="text-center mb-10 mb-md-0">
							<img src="/assets/media/illustrations/sketchy-1/2.png"
								class="mh-125px mb-9" alt="" />
							<div class="d-flex flex-center mb-5">
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
								<div class="fs-5 fs-lg-3 fw-bold text-dark">Повышение продуктивности</div>
							</div>
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Cнижение уровеня стресса,
								<br />риска выгорания и поддержание
								<br />хорошего настроения у сотрудников
							</div>
						</div>
					</div>
					<div class="col-md-4 px-5">
						<div class="text-center mb-10 mb-md-0">
							<img src="/assets/media/illustrations/sketchy-1/8.png"
								class="mh-125px mb-9" alt="" />
							<div class="d-flex flex-center mb-5">
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
								<div class="fs-5 fs-lg-3 fw-bold text-dark">Повышение репутации компании</div>
							</div>
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Хорошая репутация - привлечение
								<br />лучших кадров

								<br />
							</div>
						</div>
					</div>
					<div class="col-md-4 px-5">
						<div class="text-center mb-10 mb-md-0">
							<img src="/assets/media/illustrations/sketchy-1/12.png"
								class="mh-125px mb-9" alt="" />
							<div class="d-flex flex-center mb-5">
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
								<div class="fs-5 fs-lg-3 fw-bold text-dark">Развитие корпоративной культуры</div>
							</div>
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Укрепление доверия между руководителями
								<br /> и сотрудниками, способствование построения сильной, позитивной корпоративной
								<br />культуры
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mt-sm-n10">
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
				</svg>
			</div>
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
				</svg>
			</div>
		</div>
		<div class="py-10 py-lg-20">
			<div class="container">
				<div class="text-center mb-12">
					<h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">Наши
						спикеры</h3>
					<div class="fs-5 text-muted fw-bold">Квалифицированные специалисты в таких направлениях, как:
						<br />психология, тайм-менеджмент, нутрициология, стресс-менеджмент
					</div>
				</div>
				<div class="tns tns-default" style="direction: ltr">
					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
						data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
						data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
						data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
						data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-1.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Paul Miles</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Development Lead</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-2.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Melisa Marcus</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Creative Director</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-5.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">David Nilson</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Python Expert</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-20.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Anne Clarc</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-23.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Ricky Hunt</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Art Director</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-12.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Alice Wayde</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Marketing Manager</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('."'".'assets/media/avatars/300-9.jpg'."'".')"></div>
							<div class="mb-0">
								<a href="#" class="text-dark fw-bold text-hover-primary fs-3">Carles Puyol</a>
								<div class="text-muted fs-6 fw-semibold mt-1">QA Managers</div>
							</div>
						</div>
					</div>
					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
						<i class="ki-duotone ki-left fs-2x"></i>
					</button>
					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
						<i class="ki-duotone ki-right fs-2x"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="mb-lg-n15 position-relative z-index-2">
			<div class="container">
				<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">

				</div>
			</div>
		</div>
		<div class="mt-sm-n20">
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">

				</svg>
			</div>
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
				</svg>
			</div>
		</div>
		<div class="mt-20 mb-n20 position-relative z-index-2">
			<div class="container">
				<div class="text-center mb-17">
					<h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">
						Мероприятия</h3>
					<div class="fs-5 text-muted fw-bold">Здесь вы можете посмотреть актуальные или прошедшие вебинары,
						<br />мастер-классы
					</div>
				</div>
				<div class="row g-lg-10 mb-10 mb-lg-20">
					<div class="col-lg-4">
						<div
							class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<div class="mb-7">
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
								</div>
								<div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I
									have ever used. The codes are up to tandard. The css styles are very clean. In fact
									the cleanest and the most up to standard I have ever seen.</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="/assets/media/avatars/300-1.jpg" class=""
										alt="" />
								</div>
								<div class="flex-grow-1">
									<a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div
							class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<div class="mb-7">
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
								</div>
								<div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I
									have ever used. The codes are up to tandard. The css styles are very clean. In fact
									the cleanest and the most up to standard I have ever seen.</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="/assets/media/avatars/300-2.jpg" class=""
										alt="" />
								</div>
								<div class="flex-grow-1">
									<a href="#" class="text-dark fw-bold text-hover-primary fs-6">Janya Clebert</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div
							class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<div class="mb-7">
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
								</div>
								<div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I
									have ever used. The codes are up to tandard. The css styles are very clean. In fact
									the cleanest and the most up to standard I have ever seen.</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="/assets/media/avatars/300-16.jpg" class=""
										alt="" />
								</div>
								<div class="flex-grow-1">
									<a href="#" class="text-dark fw-bold text-hover-primary fs-6">Steave Brown</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="mb-0">
		<div class="landing-curve landing-dark-color">
			<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			</svg>
		</div>
		<div class="landing-dark-bg pt-20">
			<div class="container">
			</div>
			<div class="landing-dark-separator"></div>
			<div class="container">
			</div>
		</div>
	</div>
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
	</div>
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
	<script>var hostUrl = "assets/";</script>
	<script src="/assets/plugins/global/plugins.bundle.js"></script>
	<script src="/assets/js/scripts.bundle.js"></script>
	<script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="/assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
	<script src="/assets/js/custom/landing.js"></script>
	<script src="/assets/js/custom/pages/pricing/general.js"></script>
	<script src="https://hackathon.localzet.com/assets/js/api/events.js"></script>
	<script>
		triger_api_events_get_events_list();
	</script>
</body>

</html>';
return $file;
}
?>