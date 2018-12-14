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
												List Rekening
											</h3>
										</div>
									</div>
								</div>

								<div class="m-portlet__body">
									<!--begin: Search Form -->
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-8 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<!-- <div class="col-md-5">
														<div class="m-form__group m-form__group--inline">
															<div class="m-form__label">
																<label class="m-label m-label--single">
																	<span>
																		Kode Awal
																	</span>
																</label>
															</div>
															<div class="m-form__control">
																<select class="form-control m-bootstrap-select" id="slsDigitAwalRek"></select>
															</div>
														</div>
														<div class="d-md-none m--margin-bottom-10"></div>
													</div> -->
													<div class="col-md-5">
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
											<div class="col-xl-4 order-1 order-xl-2 m--align-right">
												<a href="<?php echo base_url('/Rekening/tambahRekening') ?>" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
													<span>
														<i class="fa fa-plus"></i>
														<span>
															Tambah Rekening
														</span>
													</span>
												</a>
												<div class="m-separator m-separator--dashed d-xl-none"></div>
											</div>
										</div>
									</div>
									<!--end: Search Form -->
									<!--begin: Datatable -->
									<div class="m_datatable" id="divRekeningList"></div>
									<!--end: Datatable -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="#" type="text/javascript"></script>
</body>
</html>