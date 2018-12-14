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

                            <!--begin::Portlet-->
                            <div class="m-portlet">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                Ubah Kode Rekening
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form class="m-form m-form--fit m-form--label-align-right" id="formEditRekening">

                                    <div class="m-form__content">
                                        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="msgEditFail">
                                            <div class="m-alert__icon">
                                                <i class="la la-warning"></i>
                                            </div>
                                            <div class="m-alert__text">
                                                Maaf, tolong periksa kembali kolom isian anda
                                            </div>
                                            <div class="m-alert__close">
                                                <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php foreach($data as $d){ ?>
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">
                                                Kode Rekening
                                                <strong style="color:red">*</strong>:
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control m-input" minlength='5' maxlength="5" name="tbxKodeRekening" id="tbxKodeRekening" value="<?php echo $d->kode_rekening?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">
                                                Nama Rekening
                                                <strong style="color:red" ;>*</strong>:
                                            </label>
                                            <div class="col-lg-6">
                                            <input type="text" id="tbxNamaKode" class="form-control m-input" maxlength="100" name="tbxNamaKode" value="<?php echo $d->nama_kode?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">
                                                Status Rekening
                                                <strong style="color:red" ;>*</strong>:
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="slsStatusRekening" id="slsStatusRekening" style="margin-top:5px" required>   
                                                    <!-- <option value='debet'>Debit</option>
                                                    <option value='kredit'>Kredit</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" value="<?php echo $d->id?>">
                                    <input type="hidden" id="statusRek" value="<?php echo $d->status; }?>">
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-9 ml-lg-auto">
                                                    <button onclick="JavaScript: window.history.back(1); return false;" class="btn btn-secondary">
                                                        Batal
                                                    </button>
                                                    <button id="btnEditRek" class="btn btn-success">
                                                        Ubah
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <script src="<?php echo base_url()?>public/script/Common.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/script/rekening/edit.js" type="text/javascript"></script>
</body>
</html>
