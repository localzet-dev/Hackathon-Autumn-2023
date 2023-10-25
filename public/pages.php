<?php

include_once "system/pages/main_page.php";
include_once "system/pages/event_edit.php";


function error_404(){
	$file = '
	<!DOCTYPE html>
	<html lang="ru">
		<!--begin::Head-->
		<head><base href="../../"/>
			<title>404</title>
			<meta charset="utf-8" />
			<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
			<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
			<!--begin::Fonts(mandatory for all pages)-->
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
			<!--end::Fonts-->
			<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
			<link href="https://hackathon.localzet.com/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
			<link href="https://hackathon.localzet.com/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
			<!--end::Global Stylesheets Bundle-->
		</head>
		<!--end::Head-->
		<!--begin::Body-->
		<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
			<!--begin::Theme mode setup on page load-->
			<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
			<!--end::Theme mode setup on page load-->
			<!--begin::Root-->
			<div class="d-flex flex-column flex-root" id="kt_app_root">
				<!--begin::Page bg image-->
				<style>body { background-image: url("assets/media/auth/bg1.jpg"); } [data-bs-theme="dark"] body { background-image: url("assets/media/auth/bg1-dark.jpg"); }</style>
				<!--end::Page bg image-->
				<!--begin::Authentication - Signup Welcome Message -->
				<div class="d-flex flex-column flex-center flex-column-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center text-center p-10">
						<!--begin::Wrapper-->
						<div class="card card-flush w-lg-650px py-5">
							<div class="card-body py-15 py-lg-20">
								<!--begin::Title-->
								<h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Oops!</h1>
								<!--end::Title-->
								<!--begin::Text-->
								<div class="fw-semibold fs-6 text-gray-500 mb-7">Страница не найдена.</div>
								<!--end::Text-->
								<!--begin::Illustration-->
								<div class="mb-3">
									<img src="https://hackathon.localzet.com/assets/media/auth/404-error.png" class="mw-100 mh-300px theme-light-show" alt="" />
									<img src="https://hackathon.localzet.com/assets/media/auth/404-error-dark.png" class="mw-100 mh-300px theme-dark-show" alt="" />
								</div>
								<!--end::Illustration-->
								<!--begin::Link-->
								<div class="mb-0">
									<a href="https://hackathon.localzet.com/" class="btn btn-sm btn-primary">Назад</a>
								</div>
								<!--end::Link-->
							</div>
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Authentication - Signup Welcome Message-->
			</div>
			<!--end::Root-->
			<!--begin::Javascript-->
			<script>var hostUrl = "assets/";</script>
			<!--begin::Global Javascript Bundle(mandatory for all pages)-->
			<script src="https://hackathon.localzet.com/assets/plugins/global/plugins.bundle.js"></script>
			<script src="https://hackathon.localzet.com/assets/js/scripts.bundle.js"></script>
			<!--end::Global Javascript Bundle-->
			<!--end::Javascript-->
		</body>
		<!--end::Body-->
	</html>';
	return $file;
}

function pages_main_user_profile(){


	$user_id = user_id();
	$sql = 'SELECT * FROM `users` WHERE `user_id` = "'.$user_id.'"';
	$g = database($sql, '*', $t = "+");
	$user_row=mysqli_fetch_array($g);

	
	
	if ($user_row[9] == 'true'){
		$is_speaker = 'checked';
		$speaker_desc = '
		<div class="row mb-6">
			<label class="col-lg-4 col-form-label fw-semibold fs-6">О вас как специалисте</label>
			<div class="col-lg-8 fv-row fv-plugins-icon-container">
				<textarea onkeyup="api_user_update_data_speaker_desc()" id="user_speaker_desc" class="form-control form-control-solid" rows="3" placeholder="" name="details_description">'.$user_row[12].'</textarea>
				<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
			</div>
		</div>
		';
	}else{
		$is_speaker = '';
		$speaker_desc = '';
	}
	if ($user_row[10] == 'true'){
		$is_admin = 'checked';
		$readonly = '';

		$file_ln = '<input type="text" onkeyup="api_user_update_data_lastname()" id="user_lastname" class="form-control form-control-lg form-control-solid" '.$readonly.' placeholder="Иванов" value="'.$user_row[2].'">';
		$file_fn = '<input type="text" onkeyup="api_user_update_data_firstname()" id="user_firstname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Иван" '.$readonly.' value="'.$user_row[1].'">';
		$file_mn = '<input type="text" onkeyup="api_user_update_data_middlename()" id="user_middlename" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Иванович" '.$readonly.' value="'.$user_row[3].'">';
		$file_role = '<input type="text" onkeyup="api_user_update_data_role()" id="user_role" class="form-control form-control-lg form-control-solid" placeholder="Например: Специалист по созданию мемов" value="'.$user_row[6].'">';
		
	}else{
		$readonly = 'readonly style="color:#5e6278;background-color: #ffffff;"';
		$is_admin = '';

		$file_ln = '<h4 style="color:#5e6278">'.$user_row[2].'</h4>';
		$file_fn = '<h4 style="color:#5e6278">'.$user_row[1].'</h4>';
		$file_mn = '<h4 style="color:#5e6278">'.$user_row[3].'</h4>';
		$file_role = '<h4 style="color:#5e6278">'.$user_row[6].'</h4>';

	}
	if ($user_row[11] == 'true'){
		$is_auth = 'checked';
	}else{
		$is_auth = '';
	}

	if ($user_row[10] == 'true'){
		$admin_file = '
		<hr>
			<div class="row mb-12">
				
				<div class="col-lg-6 fv-row fv-plugins-icon-container">
					<label class="col-lg-4 col-form-label fw-semibold fs-6">Права доступа</label>
					<div class="d-flex align-items-center mt-4">
						<label class="form-check form-check-custom form-check-inline form-check-solid me-5">
							<input class="form-check-input" name="communication[]" onclick="api_user_update_data_is_speaker()" '.$is_speaker.' type="checkbox" value="1">
							<span class="fw-semibold ps-2 fs-6">
								Спикер
							</span>
						</label>
						<label class="form-check form-check-custom form-check-inline form-check-solid">
							<input class="form-check-input" name="communication[]" onclick="api_user_update_data_is_admin()" '.$is_admin.' type="checkbox" value="2">
							<span class="fw-semibold ps-2 fs-6">
								Администратор
							</span>
						</label>
					</div>
					<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
				</div>
				<div class="col-lg-6 fv-row fv-plugins-icon-container">
					<label class="col-lg-12 col-form-label fw-semibold fs-6">Заблокировать пользователя</label>
					<div class="col-lg-8 d-flex align-items-center">
					<br><br><br>
						<div class="form-check form-check-solid form-switch form-check-custom fv-row">
							
							<input onclick="api_user_update_data_status()" '.$is_auth.' class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" >
							<!-- checked="" -->
							<label class="form-check-label" for="allowmarketing"></label>
						</div>
					</div>
				</div>
			</div>
		';
	}else{
		$admin_file = '<hr><p>Для изменения персоональных данных, обратитесь к администратору.</p>';
	}

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Личный кабинет</title>
	'.page_element_main_html_head().'	
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
						
							<div id="kt_app_content" class="app-content  flex-column-fluid ">	
								<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Профиль пользователя</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->
								
									<!--begin::Content-->
									<div id="kt_account_settings_profile_details" class="collapse show">
										<!--begin::Form-->
										<form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Аватарка</label>
													<!--end::Label-->
								
													<!--begin::Col-->
													<div class="col-lg-8">
														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('."'".$user_row[5]."'".')">
															<!--begin::Preview existing avatar-->
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url('.$user_row[5].')"></div>
															<!--end::Preview existing avatar-->
														</div>
														<!--begin::Hint-->
														<div class="form-text">Картинка синхронизирована с google account</div>
														<!--end::Hint-->
													</div>
													<!--end::Col-->
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Фамилия</label>
													<div class="col-lg-8">
														<div class="row">
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																'.$file_ln.'
																<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Имя</label>
													<div class="col-lg-8">
														<div class="row">
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																'.$file_fn.'
																<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Отчество</label>
													<div class="col-lg-8">
														<div class="row">
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																'.$file_mn.'
																<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Должность в комании</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														'.$file_role.'
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">
														<span class="">Номер телефона</span>
													</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="tel" onkeyup="api_user_update_data_phone()" id="user_phone" class="form-control form-control-lg form-control-solid" placeholder="79999999999" value="'.$user_row[7].'">
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Ссылка как со мной связаться</label>
													<div class="col-lg-8 fv-row">
														<input type="text" onkeyup="api_user_update_data_link()" id="user_link" class="form-control form-control-lg form-control-solid" placeholder="Например ссылка на ваш vk или telegram" value="'.$user_row[8].'">
													</div>
												</div>
												'.$speaker_desc.'
												'.$admin_file.'
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid"></div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
	<script src="https://hackathon.localzet.com/assets/js/api/user.js"></script>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}

function pages_main_events(){

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Мероприятия</title>
	'.page_element_main_html_head().'	
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Список мероприятий</h1>
										<!--end::Title-->	
									</div>
									<!--end::Page title-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<div id="kt_app_content" class="app-content  flex-column-fluid ">
								<div id="kt_app_content_container" class="app-container  container-xxl ">
									<div class="card">
										<div class="card-body p-lg-20 pb-lg-0">
											<div class="mb-17">
												<div class="d-flex flex-stack mb-5">
													<div class="form-check form-check-solid form-switch form-check-custom fv-row">		
														<label class="col-lg-8  fw-semibold fs-6">Только мои</label>						
														<input style="margin-left:5px;" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" >
														<!-- checked="" -->
														<label class="form-check-label" for="allowmarketing"></label>
													</div>
													<a href="#" class="btn btn-sm btn-primary">Создать</a>
												</div>
												<div class="separator separator-dashed mb-9"></div>
												
												<div class="row g-10" id="block_data">
													
													
												</div>
											</div>
											<!--end::Section-->

										</div>
										<!--end::Body-->
									</div>
									<!--end::Post card-->
								</div>
								<!--end::Content container-->
							</div>
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
	<script src="https://hackathon.localzet.com/assets/js/api/events.js"></script>
	<script>
		triger_api_events_get_events_list();
	</script>

					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}

function pages_main_event_view($event_id){
	$user_id = user_id();
	$sql = 'SELECT * FROM `events_info` WHERE `event_id` = "'.$event_id.'"';
	$g = database($sql, '', '+');
	$event_row=mysqli_fetch_array($g);

	$sql = 'SELECT `status` FROM `events_members` WHERE `event_id` = "'.$event_id.'" AND `user_id` = "'.$user_id.'"';
    $status = database($sql, 'status');

	if ($status == 'true'){
		$btn = '<a onclick="api_events_user_member()" class="btn btn-sm btn-danger">Отписаться</a>';
	}else{
		$btn = '<a onclick="api_events_user_member()" class="btn btn-sm btn-primary">Записаться</a>';
	}

	$sql = 'SELECT COUNT(*), COUNT(`is_speaker`) FROM `events_members` WHERE `event_id` = "'.$event_id.'"';
	$g = database($sql, '', $t='+');
	$count_p=mysqli_fetch_array($g);
	$speakers = '';
	if ($count_p[1] != '0'){
		$sql = 'SELECT users.user_id, users.firstname, users.lastname, users.img_url, users.speaker_desc FROM users, events_members WHERE users.user_id = events_members.user_id AND events_members.event_id = "'.$event_id.'" AND events_members.is_speaker = "true"';
		$g = database($sql, '', $t='+');
		
		while($speaker=mysqli_fetch_array($g)){
			$url = 'https://hackathon.localzet.com/usesr/'.$speaker[0];
			$speakers = $speakers.'
			<div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-5 mb-14">
				<div class="text-center flex-shrink-0 me-7 me-lg-13">
					<div class="symbol symbol-70px symbol-circle mb-2">
						<img src="'.$speaker[3].'" class="" alt="">
					</div>
					
				</div>
				<div class="mb-0 fs-6">
					<div class="mb-0">
							<a href="'.$url.'" class="text-gray-700 fw-bold text-hover-primary">'.$speaker[2].' '.$speaker[1].'</a>
					</div>
					<div class="text-muted fw-semibold lh-lg mb-2">
						'.$speaker[4].'	
					</div>
				</div>
			</div>
			';
		}
	}

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head>
		<title>'.$event_row[1].'</title>
	'.page_element_main_html_head().'	
	<script>window.event_id="'.$event_id.'"</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Пост</h1>
										<!--end::Title-->	
									</div>
									<!--end::Page title-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<div id="kt_app_content" class="app-content  flex-column-fluid ">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container  container-xxl ">
									<!--begin::Post card-->
									<div class="card">
										<!--begin::Body-->
										<div class="card-body p-lg-20 pb-lg-0">
											<div class="d-flex flex-column flex-xl-row">
												<div class="flex-lg-row-fluid me-xl-15">
													<div class="mb-17">
														<div class="mb-8">
															<div class="d-flex flex-wrap mb-6">
																<div class="me-9 my-1">
																	<i class="ki-duotone ki-time text-primary fs-2 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
																	<span class="fw-bold text-gray-400">'.$event_row[7].'</span>
																</div>
															</div>
															<div class="d-flex flex-wrap mb-6">
																<div class="me-9 my-1">
																<i class="ki-duotone ki-geolocation text-primary fs-2 me-1"> <span class="path1"></span> <span class="path2"></span> </i>
																	<span class="fw-bold text-gray-400">'.$event_row[4].'</span>
																</div>
															</div>
															<a href="#" class="text-dark text-hover-primary fs-2 fw-bold">'.$event_row[1].'</a>
															<div class="overlay mt-8">
																<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('.$event_row[5].')">
																</div>
															</div>
														</div>

														<div class="fs-5 fw-semibold text-gray-600">
															<p class="mb-8">'.$event_row[2].'</p>
														</div>

														'.$speakers.'
														<!--end::Block-->
														'.$btn.'
													</div>
													<!--end::Post content-->

												</div>
											</div>
											<!--end::Layout-->

											

										</div>
										<!--end::Body-->
									</div>
									<!--end::Post card-->
								</div>
								<!--end::Content container-->
							</div>
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
	<script src="https://hackathon.localzet.com/assets/js/api/events.js"></script>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}

function pages_main_no_dashboard(){

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Личный кабинет</title>
	'.page_element_main_html_head().'	
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Личный кабитен</h1>
										<!--end::Title-->	
									</div>
									<!--end::Page title-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid"></div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}

function pages_main_admin_users(){

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Пользователи</title>
	'.page_element_main_html_head().'	
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Управление -> Пользователи</h1>
										<!--end::Title-->	
									</div>
									<!--end::Page title-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content  flex-column-fluid ">

								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container  container-xxl ">
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">

											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
													<input onkeyup="triger_api_admin_users_get_users_list();" type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" id="search_user" placeholder="Фамилия, имя или email">
												</div>
												<!--end::Search-->
											</div>

										</div>

										<div class="card-body py-4">

											<div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
														<thead>
															<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
																<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 276.906px;">Фамилия имя</th>
																<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 162.055px;">Спикер</th>
																<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Last login: activate to sort column ascending" style="width: 162.055px;">Администратор</th>
															</tr>
														</thead>
														<tbody class="text-gray-600 fw-semibold" id="block_data">

															
														</tbody>
													</table>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
	<script src="https://hackathon.localzet.com/assets/js/api/admin_users.js"></script>
	<script>
	triger_api_admin_users_get_users_list();
	</script>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}

function pages_main_admin_users_view_user($user_id){

	$sql = 'SELECT * FROM `users` WHERE `user_id` = "'.$user_id.'"';
	$g = database($sql, '*', $t = "+");
	$user_row=mysqli_fetch_array($g);

	
	
	if ($user_row[9] == 'true'){
		$is_speaker = 'checked';
		$speaker_desc = '
		<div class="row mb-6">
			<label class="col-lg-4 col-form-label fw-semibold fs-6">О вас как специалисте</label>
			<div class="col-lg-8 fv-row fv-plugins-icon-container">
				<textarea onkeyup="api_user_update_data_speaker_desc()" id="user_speaker_desc" class="form-control form-control-solid" rows="3" placeholder="" name="details_description">'.$user_row[12].'</textarea>
				<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
			</div>
		</div>
		';
	}else{
		$is_speaker = '';
		$speaker_desc = '';
	}
	if ($user_row[10] == 'true'){
		$is_admin = 'checked';
		$readonly = '';

		$file_ln = '<input type="text" onkeyup="api_user_update_data_lastname()" id="user_lastname" class="form-control form-control-lg form-control-solid" '.$readonly.' placeholder="Иванов" value="'.$user_row[2].'">';
		$file_fn = '<input type="text" onkeyup="api_user_update_data_firstname()" id="user_firstname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Иван" '.$readonly.' value="'.$user_row[1].'">';
		$file_mn = '<input type="text" onkeyup="api_user_update_data_middlename()" id="user_middlename" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Иванович" '.$readonly.' value="'.$user_row[3].'">';
		$file_role = '<input type="text" onkeyup="api_user_update_data_role()" id="user_role" class="form-control form-control-lg form-control-solid" placeholder="Например: Специалист по созданию мемов" value="'.$user_row[6].'">';
		
	}else{
		$readonly = 'readonly style="color:#5e6278;background-color: #ffffff;"';
		$is_admin = '';

		$file_ln = '<h4 style="color:#5e6278">'.$user_row[2].'</h4>';
		$file_fn = '<h4 style="color:#5e6278">'.$user_row[1].'</h4>';
		$file_mn = '<h4 style="color:#5e6278">'.$user_row[3].'</h4>';
		$file_role = '<h4 style="color:#5e6278">'.$user_row[6].'</h4>';

	}
	if ($user_row[11] == 'true'){
		$is_auth = 'checked';
	}else{
		$is_auth = '';
	}

	if (true){
		$admin_file = '
		<hr>
			<div class="row mb-12">
				
				<div class="col-lg-6 fv-row fv-plugins-icon-container">
					<label class="col-lg-4 col-form-label fw-semibold fs-6">Права доступа</label>
					<div class="d-flex align-items-center mt-4">
						<label class="form-check form-check-custom form-check-inline form-check-solid me-5">
							<input class="form-check-input" name="communication[]" onclick="api_user_update_data_is_speaker()" '.$is_speaker.' type="checkbox" value="1">
							<span class="fw-semibold ps-2 fs-6">
								Спикер
							</span>
						</label>
						<label class="form-check form-check-custom form-check-inline form-check-solid">
							<input class="form-check-input" name="communication[]" onclick="api_user_update_data_is_admin()" '.$is_admin.' type="checkbox" value="2">
							<span class="fw-semibold ps-2 fs-6">
								Администратор
							</span>
						</label>
					</div>
					<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
				</div>
				<div class="col-lg-6 fv-row fv-plugins-icon-container">
					<label class="col-lg-12 col-form-label fw-semibold fs-6">Заблокировать пользователя</label>
					<div class="col-lg-8 d-flex align-items-center">
					<br><br><br>
						<div class="form-check form-check-solid form-switch form-check-custom fv-row">
							
							<input onclick="api_user_update_data_status()" '.$is_auth.' class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" >
							<!-- checked="" -->
							<label class="form-check-label" for="allowmarketing"></label>
						</div>
					</div>
				</div>
			</div>
		';
	}else{
		$admin_file = '<hr><p>Для изменения персоональных данных, обратитесь к администратору.</p>';
	}

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>'.$user_row[1].' '.$user_row[2].'</title>
	'.page_element_main_html_head().'	
	<script>window.select_user_id="'.$user_id.'"</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
						
							<div id="kt_app_content" class="app-content  flex-column-fluid ">	
								<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Профиль пользователя</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->
								
									<!--begin::Content-->
									<div id="kt_account_settings_profile_details" class="collapse show">
										<!--begin::Form-->
										<form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Аватарка</label>
													<!--end::Label-->
								
													<!--begin::Col-->
													<div class="col-lg-8">
														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('."'".$user_row[5]."'".')">
															<!--begin::Preview existing avatar-->
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url('.$user_row[5].')"></div>
															<!--end::Preview existing avatar-->
														</div>
														<!--begin::Hint-->
														<div class="form-text">Картинка синхронизирована с google account</div>
														<!--end::Hint-->
													</div>
													<!--end::Col-->
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Фамилия</label>
													<div class="col-lg-8">
														<div class="row">
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																'.$file_ln.'
																<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Имя</label>
													<div class="col-lg-8">
														<div class="row">
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																'.$file_fn.'
																<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Отчество</label>
													<div class="col-lg-8">
														<div class="row">
															<div class="col-lg-6 fv-row fv-plugins-icon-container">
																'.$file_mn.'
																<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Должность в комании</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														'.$file_role.'
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">
														<span class="">Номер телефона</span>
													</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="tel" onkeyup="api_user_update_data_phone()" id="user_phone" class="form-control form-control-lg form-control-solid" placeholder="79999999999" value="'.$user_row[7].'">
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Ссылка как со мной связаться</label>
													<div class="col-lg-8 fv-row">
														<input type="text" onkeyup="api_user_update_data_link()" id="user_link" class="form-control form-control-lg form-control-solid" placeholder="Например ссылка на ваш vk или telegram" value="'.$user_row[8].'">
													</div>
												</div>
												'.$speaker_desc.'
												'.$admin_file.'
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid"></div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
	<script src="https://hackathon.localzet.com/assets/js/api/admin_users.js"></script>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}


function pages_main_events_add(){


	$img_url = 'https://exesfull.com/img/10.ico';

	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Новое мероприятия</title>
	'.page_element_main_html_head().'
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	'.page_element_main_html_menu().'
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
						
							<div id="kt_app_content" class="app-content  flex-column-fluid ">	
								<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Новое мероприятие</h3>
										</div>
										<!--end::Card title-->
									</div>

									<div id="kt_account_settings_profile_details" class="collapse show">
										<!--begin::Form-->
										<form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">
														<span class="">Название</span>
													</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="text" onkeyup="start_to_create_event();" id="start_to_create_event_item" class="form-control form-control-lg form-control-solid" placeholder="Пример: Agile в команде" value="">
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
											</div>
											<div class="card-footer d-flex justify-content-end py-6 px-9" id="create_button_place">
												
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid"></div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
	'.page_element_main_html_footer().'
	<script src="https://hackathon.localzet.com/assets/js/api/event_edit.js"></script>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		</div>
	'.page_element_main_js().'
			</body>
			<!--end::Body-->
		</html>
	';
    return $file;
}





?>