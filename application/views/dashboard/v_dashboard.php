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
				<div class="m-content" id="divContent">
					<div class="m-portlet m-portlet--tabs">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Dashboard
									</h3>
								</div>
							</div>
							<div class="m-portlet__head-tools">
								<ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x m-tabs-line--right">
									<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link active" data-toggle="tab" id="neraca" data-target="#neracaTab" role="tab">
											Neraca
										</a>
									</li>
									<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" id="posisi" data-target="#posisiTab" role="tab">
											Posisi Kas
										</a>
									</li>
									<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" id="rl" data-target="#rugiLabaTab" role="tab">
											Rugi/Laba
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="m-portlet__body">
							<div class="tab-content">
								<div class="tab-pane active" id="neracaTab" role="tabpanel">
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-3 order-2 order-xl-1">
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
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<select class="form-control m-select2" id="slsBulanNeraca">
														</select>
													</div>
												</div>
											</div>
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-left">
													<div class="col-md-12">
														<input type="text" class="form-control m-input" placeholder="Tahun" minlength="4" maxlength="4" id="tbxTahunNeraca">
													</div>
												</div>
											</div>
											<div class=" btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="searchNeraca">
													<i class="fa fa-search"></i>
												</a>
												<a href="#" class="m-btn btn btn-danger" id="resetNeraca">
													<i class="fa fa-refresh"></i>
												</a>
											</div>
											<div class="col-xl-1 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
												</div>
											</div>
											<div class="btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="laporanNeraca">
													<i class="fa fa-file-text-o"></i>
												</a>
												<a href="#" class="m-btn btn btn-success" id="downloadNeraca">
													<i class="fa fa-download"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="m_datatable" id="divNeraca"></div>
								</div>
								<div class="tab-pane" id="posisiTab" role="tabpanel">
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-3 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<div class="m-input-icon m-input-icon--left">
															<input type="text" class="form-control m-input tahunInput" placeholder="Cari Kode Rekening" id="tbxSearchPosisiAll">
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
														<select class="form-control m-select2" id="slsBulanPosisi">
														</select>
													</div>
												</div>
											</div>
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-left">
													<div class="col-md-12">
														<input type="text" class="form-control m-input tahunInput" placeholder="Tahun" minlength="4" maxlength="4"
														 id="tbxTahunPosisi">
													</div>
												</div>
											</div>
											<div class=" btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="searchPosisi">
													<i class="fa fa-search"></i>
												</a>
												<a href="#" class="m-btn btn btn-danger" id="resetPosisi">
													<i class="fa fa-refresh"></i>
												</a>
											</div>
											<div class="col-xl-1 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
												</div>
											</div>
											<div class="btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="laporanPosisi">
													<i class="fa fa-file-text-o"></i>
												</a>
												<a href="#" class="m-btn btn btn-success" id="downloadPosisi">
													<i class="fa fa-download"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="m_datatable" id="divPosisiKas"></div>
								</div>
								<div class="tab-pane" id="rugiLabaTab" role="tabpanel">
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-xl-3 order-2 order-xl-1">
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
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<select class="form-control m-select2" id="slsBulanRL">
														</select>
													</div>
												</div>
											</div>
											<div class="col-xl-2 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-12">
														<input type="text" class="form-control m-input tahunInput" placeholder="Tahun" minlength="4" maxlength="4"
														 id="tbxTahunRL">
													</div>
												</div>
											</div>
											<div class=" btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="searchRL">
													<i class="fa fa-search"></i>
												</a>
												<a href="#" class="m-btn btn btn-danger" id="resetRL">
													<i class="fa fa-refresh"></i>
												</a>
											</div>
											<div class="col-xl-1 order-2 order-xl-1">
												<div class="form-group m-form__group row align-items-center">
												</div>
											</div>
											<div class="btn-group col-xl-2 order-2 order-xl-1">
												<a href="#" class="m-btn btn btn-primary" id="laporanRL">
													<i class="fa fa-file-text-o"></i>
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

					<div class="row" id="divDokPosisiKas">
						<div class="col-lg-12 m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Laporan Perubahan Posisi Kas
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="row">
									<p class="col-lg-6">Saldo Awal : </p>
									<p class="col-lg-6" id="hasilSaldoAwal">6000000</p>
								</div>
								<div class="row">
									<p class="col-lg-6">Penambahan <small>(jumlah kredit jurnal umum)</small> : </p>
									<p class="col-lg-6" id="hasilPenambahan">6000000</p>
								</div>
								<div class="row">
									<p class="col-lg-6"> </p>
									<p class="col-lg-6">____________ +</p>
								</div>
								<div class="row">
									<p class="col-lg-6"> </p>
									<p class="col-lg-6" id="totalAwal">12000000</p>
								</div>
								<div class="row">
									<p class="col-lg-6">Pengurangan <small>(jumlah debit jurnal umum)</small> : </p>
									<p class="col-lg-6" id="hasilPenambahan">6000000</p>
								</div>
								<div class="row">
									<p class="col-lg-6"> </p>
									<p class="col-lg-6">____________ -</p>
								</div>
								<div class="row">
									<b class="col-lg-6">Saldo Akhir : </b>
									<b class="col-lg-6" id="hasilSaldoAwal">6000000</b>
								</div>
								<!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. -->
							</div>
						</div>
					</div>

					<div class="row" id="divDokRugiLaba">
						<div class="col-lg-12 m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Rugi / Laba
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="row">
									<p class="col-lg-6">Pendapatan : </p>
									<p class="col-lg-6" id="hasilPendapatan">6000000</p>
								</div>
								<div class="row">
									<ul>
										<li>test</li>
										<li>test1</li>
									</ul>
								</div>
								<div class="row">
									<p class="col-lg-6">Harga Pokok Pendapatan : </p>
									<p class="col-lg-6" id="hasilPokokPendapatan">6000000</p>
								</div>
								<div class="row">
									<ul>
										<li>test</li>
										<li>test1</li>
									</ul>
								</div>
								<div class="row">
									<p class="col-lg-6"> </p>
									<p class="col-lg-6">____________ -</p>
								</div>
								<div class="row">
									<p class="col-lg-6">Laba Kotor : </p>
									<p class="col-lg-6" id="hasilLabaKotor">12000000</p>
								</div>
								<div class="row">
									<p class="col-lg-6">Pengurangan <small>(jumlah debit jurnal umum)</small> : </p>
									<p class="col-lg-6" id="hasilPenambahan">6000000</p>
								</div>
								<div class="row">
									<p class="col-lg-6"> </p>
									<p class="col-lg-6">____________ -</p>
								</div>
								<div class="row">
									<b class="col-lg-6">Saldo Akhir : </b>
									<b class="col-lg-6" id="hasilSaldoAwal">6000000</b>
								</div>
								<!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. -->
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