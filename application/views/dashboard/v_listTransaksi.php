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
<?php $this->load->view('shared/head'); ?>
<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- BEGIN::Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN:Header -->
		<?php $this->load->view('shared/header'); ?>
		<!-- BEGIN::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN:Left Aside -->
			<?php $this->load->view('shared/sidebar'); ?>
			<!-- BEGIN:Content -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<div class="m-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="m-portlet">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<h3 class="m-portlet__head-text">
												Dashboard
											</h3>
										</div>
									</div>
								</div>

								<div class="m-portlet__body">
									<!--begin: Search Form -->
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-3 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<div class="m-form__group m-form__group">
															<div class="m-form__label">
																<label class="m-label m-label--single">
																	<span>
																		Digit Awal:
																	</span>
																</label>
															</div>
															<div class="m-form__control">
																<select class="form-control m-bootstrap-select" id="slsDashboard">
																	<option value="1">1   (satu)</option>
																	<option value="2">2   (dua)</option>
																	<option value="3">3   (tiga)</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select>
															</div>
														</div>
														<div class="d-md-none m--margin-bottom-10"></div>
													</div>
												</div>
											</div>
											<div class="col-xl-4 order-2 order-xl-1" style="margin-top: 13px;">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<div class="m-input-icon m-input-icon--left">
															<input type="text" class="form-control m-input" placeholder="Cari Kode Rekening" id="tbxSearchRekening">
															<span class="m-input-icon__icon m-input-icon__icon--left">
																<span>
																	<i class="la la-search"></i>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<div class="m-form__group m-form__group">
															<div class="m-form__label">
																<label class="m-label m-label--single">
																	<span>
																		Awal:
																	</span>
																</label>
															</div>
															<div class="m-form__control">
																<div class="input-group date">
																	<input type="text" class="form-control m-input datepicker" name="tbxBeginDate" id="tbxBeginDate" />
																</div>
															</div>
														</div>
														<div class="d-md-none m--margin-bottom-10"></div>
													</div>
												</div>
											</div>
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<div class="m-form__group m-form__group">
															<div class="m-form__label">
																<label class="m-label m-label--single">
																	<span>
																		Akhir:
																	</span>
																</label>
															</div>
															<div class="m-form__control">
															<div class="input-group date">
																	<input type="text" class="form-control m-input datepicker" name="tbxEndDate" id="tbxEndDate" />
																</div>
															</div>
														</div>
														<div class="d-md-none m--margin-bottom-10"></div>
													</div>
												</div>
											</div>
											<div class="col-xl-1 order-2 order-xl-1" style="padding-left: 0px; margin-top: 13px;">
												<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
													<i class="fa fa-search"></i>
												</a>
											</div>
										</div>
									</div>
									<!--end: Search Form -->
									<!--begin: Datatable -->
									<div class="m_datatable" id="divDashboard"></div>
									<!--end: Datatable -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url()?>public/script/dashboard/index.js" type="text/javascript"></script>
</body>
</html>