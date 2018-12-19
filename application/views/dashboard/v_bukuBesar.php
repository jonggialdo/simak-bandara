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
												Buku Besar
											</h3>
										</div>
									</div>
								</div>

								<div class="m-portlet__body">
									<!--begin: Search Form -->
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-6 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-6">
														<div class="m-input-icon m-input-icon--left">
															<input type="text" class="form-control m-input" placeholder="Cari Kode Rekening" id="tbxSearchBukuAll">
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
														<select class="form-control m-select2" id="slsBulanBuku"> 
														</select>
													</div>
												</div>
											</div>
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<input type="text" class="form-control m-input tahunInput" placeholder="Tahun" minlength="4" maxlength="4" id="tbxTahunBuku">
													</div>
												</div>
											</div>
											<div class=" btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="searchBuku">
													<i class="fa fa-search"></i>
												</a>
												<a href="#" class="m-btn btn btn-success" id="downloadBuku">
													<i class="fa fa-download"></i>
												</a>
											</div>
											
										</div>
									</div>
									<div class="m-content" style="padding-top:10px" id="alertBukuBesar">
										<div class="alert alert-warning m-alert--default m--align-center" role="alert" style="padding:20px;">
											<strong>
												Silakan
											</strong>
												cari transaksi sesuai nomor rekening yang diinginkan.
										</div>
									</div>
									<!--end: Search Form -->
									<!--begin: Datatable -->
									<div class="m_datatable" id="divTransaksiList"></div>
									<!--end: Datatable -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url()?>public/script/dashboard/bukuBesar.js" type="text/javascript"></script>
</body>
</html>