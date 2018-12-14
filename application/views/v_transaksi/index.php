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
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<?php $this->load->view('shared/header'); ?>
		<!-- END: Header -->
		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<?php $this->load->view('shared/sidebar'); ?>
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
												<div class="modal hide fade" id="formTransaksi" role="dialog">
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
																		Debet / Kredit <span style="color:red">*</span> :
																	</label>
																	<div class="m-form__control col-lg-8 col-md-9 col-sm-12" style= "padding-left:0px; padding-right:10px">
																		<select class="form-control m-select2" id="slsStatus" style="width:560px" required>
																		</select>
																	</div>
																</div>
																<div class="form-group m-form__group row" id="divRekening">
																	<label class="col-form-label col-lg-3 col-sm-12">
																		Kode Rekening <span style="color:red">*</span> :
																	</label>
																	<div class="col-lg-8 col-md-9 col-sm-12" style= "padding-left:0px; padding-right:10px">
																		<select class="form-control m-select2" id="slsRekening" style="width:560px; text-align:center" required></select>
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
													<a id="btnFormModal" href="#" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-target="#formTransaksi">
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
