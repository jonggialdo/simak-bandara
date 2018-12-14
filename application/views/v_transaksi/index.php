<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>
		SIMAK Bandara
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: { "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"] },
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<!--begin::Page Vendors -->
	<link href="<?php echo base_url()?>public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="<?php echo base_url()?>public/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>public/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url()?>public/assets/demo/default/media/img/logo/favicon.ico" />
	<!--butuh icon-->
</head>
<!-- end::Head -->
<!-- end::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="index.html" class="m-brand__logo-wrapper">
									<img alt="" src="<?php echo base_url()?>public/assets/demo/default/media/img/logo/logo_default_dark.png" />
									<!--butuh logo-->
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Header Menu Toggler -->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>
								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>
					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<!-- BEGIN: Horizontal Menu -->
						<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
							<i class="la la-close"></i>
						</button>
						<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
							<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
								<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1"
								 aria-haspopup="true">
									<div class="d-flex align-items-center">
										<div class="mr-auto">
											<h3 class="m-subheader__title ">
												SIMAK Bandara
											</h3>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- END: Horizontal Menu -->
						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
									 m-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__userpic">
												<img src="<?php echo base_url()?>public/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="" />
											</span>
											<span class="m-topbar__username m--hide">
												Nick
											</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url()?>public/assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
													<div class="m-card-user m-card-user--skin-dark">
														<div class="m-card-user__pic">
															<img src="<?php echo base_url()?>public/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt="" />
														</div>
														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">
																Mark Andre
															</span>
															<a href="" class="m-card-user__email m--font-weight-300 m-link">
																mark.andre@gmail.com
															</a>
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">
																	Section
																</span>
															</li>
															<li class="m-nav__item">
																<a href="header/profile.html" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-profile-1"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">
																				My Profile
																			</span>
																			<span class="m-nav__link-badge">
																				<span class="m-badge m-badge--success">
																					2
																				</span>
																			</span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="header/profile.html" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-share"></i>
																	<span class="m-nav__link-text">
																		Activity
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="header/profile.html" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-chat-1"></i>
																	<span class="m-nav__link-text">
																		Messages
																	</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit"></li>
															<li class="m-nav__item">
																<a href="header/profile.html" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-info"></i>
																	<span class="m-nav__link-text">
																		FAQ
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="header/profile.html" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																	<span class="m-nav__link-text">
																		Support
																	</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit"></li>
															<li class="m-nav__item">
																<a href="snippets/pages/user/login-1.html" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																	Logout
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>
		<!-- END: Header -->
		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
				<i class="la la-close"></i>
			</button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
				<!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0"
				 m-menu-dropdown-timeout="500">
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item  m-menu__item" aria-haspopup="true">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-graphic-2"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Neraca
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item  m-menu__item" aria-haspopup="true">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-diagram"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Rugi / Laba
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item  m-menu__item" aria-haspopup="true">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-coins"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Posisi Kas
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
							<a href="<?php echo base_url('/rekening') ?>" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-book"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Rekening
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item  m-menu__item" aria-haspopup="true">
							<a href="<?php echo base_url('/transaksi/tambahTransaksi') ?>" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-cart"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Transaksi
										</span>
									</span>
								</span>
							</a>
						</li>
						<!-- <li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Components
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li> -->
					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<div class="m-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="m-portlet">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<h3 class="m-portlet__head-text">
												List Transaksi
											</h3>
										</div>
									</div>
								</div>

								<div class="m-portlet__body">
									<!--begin: Search Form -->
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-7 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-5">
														<div class="m-input-icon m-input-icon--left">
															<input type="text" class="form-control m-input" placeholder="Cari Kode Transaksi" id="tbxSearchTransaksi">
															<span class="m-input-icon__icon m-input-icon__icon--left">
																<span>
																	<i class="la la-search"></i>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-5 order-1 order-xl-2 m--align-right row">
												<div class="modal fade" id="formTransaksi" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">
																	Tambah Transaksi
																</h5>
															</div>
															<div class="modal-body">
																<div class="form-group m-form__group row">
																	<label class="col-form-label col-lg-3 col-sm-12">
																		Kode Rekening <span style="color:red">*</span> :
																	</label>
																	<div class="col-lg-8 col-md-9 col-sm-12" style= "padding-left:0px; padding-right:10px">
																		<select class="form-control m-select2" id="slsRekening" style="width:560px; text-align:center" required></select>
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-form-label col-lg-3 col-sm-12">
																		Status <span style="color:red">*</span> :
																	</label>
																	<div class="m-form__control col-lg-8 col-md-9 col-sm-12" style= "padding-left:0px; padding-right:10px">
																		<select class="form-control m-select2" id="slsStatus" style="width:560px" required>
																		</select>
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-form-label col-lg-3 col-sm-12">
																		Tanggal Transaksi<span style= "color:red">*</span> :
																	</label>
																	<div class="col-lg-9 col-md-9 col-sm-12" style= "padding-left:0px; padding-right:25px">
																		<div class="input-group date">
																			<input type="text" class="form-control m-input datepicker" placeholder="Tanggal Transaksi" name="tbxTglTrans" id="tbxTglTrans" required />
																			<div class="input-group-append">
																				<span class="input-group-text">
																					<i class="la la-calendar"></i>
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-form-label col-lg-3 col-sm-12">
																		Nominal<span style= "color:red" ;>*</span> :
																	</label>
																	<div class="col-lg-9 col-md-9 col-sm-12 m-input-icon m-input-icon--right" style= "padding-left:0px; padding-right:25px">
																		<div class="input-group date">
																		<input type="text" class="form-control m-input" placeholder="Nominal (Rp)" name="tbxNominal" id="tbxNominal" required/>
																			<div class="input-group-append">
																				<span class="input-group-text">
																					<i class="la la-dollar"></i>
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-form-label col-lg-3 col-sm-12">
																		Keterangan <span style="color:red">*</span> :
																	</label>
																	<div class="col-lg-9 col-md-9 col-sm-12" style= "padding-left:0px; padding-right:25px">
																		<textarea class="form-control" placeholder="Keterangan" name="tbxKeterangan" id="tbxKeterangan" required></textarea>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" id="btnBatal" data-dismiss="modal">
																	Batal
																</button>
																<button type="button" class="btn btn-success" id="btnAddDetailTr">
																	Tambah
																</button>
															</div>
														</div>
													</div>
												</div>
												<div style="display:inline-block">
													<a id="btnConfirm" href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
														<span>
															<i class="fa fa-check"></i>
															<span>
																Konfirmasi
															</span>
														</span>
													</a>
													<a id="btnFormModal" href="#" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#formTransaksi">
														<span>
															<i class="fa fa-plus"></i>
															<span>
																Tambah Transaksi
															</span>
														</span>
													</a>
												</div>
												<div class="m-separator m-separator--dashed d-xl-none"></div>
											</div>
										</div>
									</div>
									<!--end: Search Form -->
									<!--begin: Datatable -->
									<div class="m_datatable" id="divListTransaksi"></div>
									<!--end: Datatable -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
		<!-- begin::Quick Sidebar -->

		<!-- end::Quick Sidebar -->
		<!-- begin::Quick Nav -->
		<!--begin::Base Scripts -->
		<script src="<?php echo base_url()?>public/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>public/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Vendors -->
		<script src="<?php echo base_url()?>public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->
		<!--begin::Page Snippets -->
		<script src="<?php echo base_url()?>public/assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->

		<script src="<?php echo base_url()?>public/script/Common.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>public/script/transaksi/index.js" type="text/javascript"></script>
<?php foreach ($id as $key) {?>
	<input type="hidden" value="<?php echo $key['id'] ?>" id="tbxID" />
	</body>
<?php }?>

<!-- end::Body -->

</html>
