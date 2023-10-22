<?php


function pages_main_events_edit_event($event_id)
{

	$sql = 'SELECT * FROM `events_info` WHERE `event_id` = "' . $event_id . '"';
	$g = database($sql, '*', $t = "+");
	$event_row = mysqli_fetch_array($g);

	$event_title = $event_row[1];

	if ($event_row[3] == 'online') {
		$event_type = 'checked';
	} else {
		$event_type = '';
	}

	if ($event_row[9] == 'true') {
		$is_view = 'checked';
	} else {
		$is_view = '';
	}


	$file = '
	<!DOCTYPE html>
	<html lang="ru">
	<!--begin::Head-->
	<head><base href=""/>
		<title>' . $event_title . '</title>
	' . page_element_main_html_head() . '	
	<script>window.event_id="' . $event_id . '"</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
	' . page_element_main_html_menu() . '
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
											<h3 class="fw-bold m-0">Редактор - ' . $event_title . '</h3>
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
												
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">
														<span class="">Название</span>
													</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<input type="text" onkeyup="api_event_update_data_title()" id="event_title" class="form-control form-control-lg form-control-solid" placeholder="Пример: Командообразование" value="' . $event_title . '">
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Описание меропрития</label>
													<div class="col-lg-8 fv-row fv-plugins-icon-container">
														<textarea onkeyup="api_user_update_data_description()" id="user_description" class="form-control form-control-solid" rows="3" placeholder="" name="details_description">' . $event_row[2] . '</textarea>
														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Онлайн-мероприятие</label>
													<div class="col-lg-8 fv-row">
														<div class="form-check form-check-solid form-switch form-check-custom fv-row">
															<input onclick="api_user_update_data_event_type()" ' . $event_type . ' id="user_event_type" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" >
														</div>
													</div>
												</div>
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Место или ссылка на меропритие</label>
													<div class="col-lg-8 fv-row">
														<input type="text" onkeyup="api_user_update_data_place()" id="user_place" class="form-control form-control-lg form-control-solid" placeholder="Адрес или ссылка на созвон" value="' . $event_row[4] . '">
													</div>
												</div>

												<div class="row mb-6">
													<label class="col-lg-4 col-form-label fw-semibold fs-6">Опубликованно</label>
													<div class="col-lg-8 fv-row">
														<div class="form-check form-check-solid form-switch form-check-custom fv-row">
															<input onclick="api_user_update_data_view()" ' . $is_view . ' id="user_view" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" >
														</div>
													</div>
												</div>
											</div>
											<div class="card card-flush h-xl-100">

											<div class="row">
												<div class="col-xl-4">
													<div class="card-header pt-7">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label fw-bold text-dark">Поиск</span>
														</h3>

														<div class="card-toolbar">
														<input onkeyup="triger_api_admin_users_get_users_list();" type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" id="search_user" placeholder="Фамилия, имя или email">
														</div>
													</div>
													

													<div class="card-body">
													<span class="text-gray-400 mt-1 fw-semibold fs-6">Нажмите на пользователся, чтобы добавить его на мероприятие</span>
														<div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
															<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
																<div class="d-flex flex-stack mb-3">
																	<div class="me-3">
																		<img src="/metronic8/demo1/assets/media/stock/ecommerce/210.png" class="w-50px ms-n1 me-1" alt="">
																		<a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
																	</div>
																</div>

																<div class="d-flex flex-stack">
																	<span class="text-gray-400 fw-bold">To: 
																			<a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">
																				Jason Bourne                            </a>
																		</span>
																</div>
																<!--end::Customer-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->

														</div>
													</div>
												</div>
											</div>	
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
	' . page_element_main_html_footer() . '
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
	' . page_element_main_js() . '
			</body>
			<!--end::Body-->
		</html>
	';
	return $file;
}


?>