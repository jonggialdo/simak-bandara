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
									<div class="m-portlet__head-tools">
										<ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x m-tabs-line--right" role="tablist">
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link active" data-toggle="tab" href="#neracaTab" role="tab">
													Neraca
												</a>
											</li>
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#posisiTab" role="tab">
													Posisi Kas
												</a>
											</li>
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#rugiLabaTab" role="tab">
													Rugi/Laba
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="m-portlet__body">
									<div class="tab-content">
										<div class="m_datatable tab-pane active" id="neracaTab" role="tabpanel">
											<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
												<div class="row align-items-center">
													<div class="col-xl-3 order-2 order-xl-1" style="margin-top: 13px;">
														<div class="form-group m-form__group row align-items-center">
															<div class="col-md-12">
																<div class="m-input-icon m-input-icon--left">
																	<input type="text" class="form-control m-input" placeholder="Cari Kode Rekening" id="tbxSearchNeracaAll">
																	<span class="m-input-icon__icon m-input-icon__icon--left">
																		<span>
																			<i class="la la-search"></i>
																		</span>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-3 order-2 order-xl-1" style="margin-top: 13px;">
														<div class="form-group m-form__group row align-items-center">
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
																			<input type="text" class="form-control m-input datepicker" name="tbxBeginDate" id="tbxBeginDateNeraca" />
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
																			<input type="text" class="form-control m-input datepicker" name="tbxEndDate" id="tbxEndDateNeraca" />
																		</div>
																	</div>
																</div>
																<div class="d-md-none m--margin-bottom-10"></div>
															</div>
														</div>
													</div>
													<div class="btn-group m-btn-group--pill col-xl-2 order-2 order-xl-1" style="margin-top: 13px;">
														<a href="#" class="m-btn btn btn-primary" id="searchNeraca">
															<i class="fa fa-search"></i>
														</a>
														<a href="#" class="m-btn btn btn-danger" id="resetNeraca">
															<i class="fa fa-refresh"></i>
														</a>
														<a href="#" class="m-btn btn btn-success" id="downloadNeraca">
															<i class="fa fa-download"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="m_datatable" id="divNeraca"></div>
										</div>
										<div class="m_datatable tab-pane" id="posisiTab" role="tabpanel">
											<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
												<div class="row align-items-center">
												<div class="col-xl-3 order-2 order-xl-1" style="margin-top: 13px;">
														<div class="form-group m-form__group row align-items-center">
															<div class="col-md-12">
																<div class="m-input-icon m-input-icon--left">
																	<input type="text" class="form-control m-input" placeholder="Cari Kode Rekening" id="tbxSearchPosisiAll">
																	<span class="m-input-icon__icon m-input-icon__icon--left">
																		<span>
																			<i class="la la-search"></i>
																		</span>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-3 order-2 order-xl-1" style="margin-top: 13px;">
														<div class="form-group m-form__group row align-items-center">
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
																			<input type="text" class="form-control m-input datepicker" name="tbxBeginDate" id="tbxBeginDatePosisi" />
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
																			<input type="text" class="form-control m-input datepicker" name="tbxEndDate" id="tbxEndDatePosisi" />
																		</div>
																	</div>
																</div>
																<div class="d-md-none m--margin-bottom-10"></div>
															</div>
														</div>
													</div>
													<div class="btn-group m-btn-group--pill btn-group col-xl-2 order-2 order-xl-1" style="margin-top: 13px;">
														<a href="#" class="m-btn btn btn-primary" id="searchPosisi">
															<i class="fa fa-search"></i>
														</a>
														<a href="#" class="m-btn btn btn-danger" id="resetPosisi">
															<i class="fa fa-refresh"></i>
														</a>
														<a href="#" class="m-btn btn btn-success" id="downloadPosisi">
															<i class="fa fa-download"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="m_datatable" id="divPosisiKas"></div>
										</div>
										<div class="m_datatable tab-pane" id="rugiLabaTab" role="tabpanel">
											<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
												<div class="row align-items-center">
												<div class="col-xl-3 order-2 order-xl-1" style="margin-top: 13px;">
														<div class="form-group m-form__group row align-items-center">
															<div class="col-md-12">
																<div class="m-input-icon m-input-icon--left">
																	<input type="text" class="form-control m-input" placeholder="Cari Kode Rekening" id="tbxSearchRLAll">
																	<span class="m-input-icon__icon m-input-icon__icon--left">
																		<span>
																			<i class="la la-search"></i>
																		</span>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-3 order-2 order-xl-1" style="margin-top: 13px;">
														<div class="form-group m-form__group row align-items-center">
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
																			<input type="text" class="form-control m-input datepicker" name="tbxBeginDate" id="tbxBeginDateRL" />
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
																			<input type="text" class="form-control m-input datepicker" name="tbxEndDate" id="tbxEndDateRL" />
																		</div>
																	</div>
																</div>
																<div class="d-md-none m--margin-bottom-10"></div>
															</div>
														</div>
													</div>
													<div class="btn-group m-btn-group--pill btn-group col-xl-2 order-2 order-xl-1" style="margin-top: 13px;">
														<a href="#" class="m-btn btn btn-primary" id="searchRL">
															<i class="fa fa-search"></i>
														</a>
														<a href="#" class="m-btn btn btn-danger" id="resetRL">
															<i class="fa fa-refresh"></i>
														</a>
														<a href="#" class="m-btn btn btn-success" id="downloadRL">
															<i class="fa fa-download"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="m_datatable" id="divRugiLaba"></div>
										</div>
									</div>
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