@model List<TeamMate.Domain.Models.vwSITPlan>

@{
    ViewBag.Title = "Management SIT";
    Layout = "~/Views/Shared/_Layout.cshtml";
}

<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Document Version @ViewBag.DocVer
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form" id="formRepeater">

                    <div class="m-form__content">
                        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="msgFail">
                            <div class="m-alert__icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="m-alert__text">
                                Oh sorry! Please check your form project again :).
                            </div>
                            <div class="m-alert__close">
                                <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-sm-12">
                                    <label>Kode - Nama Rekening</label>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-sm-2">
                                    <label>Status</label>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Tgl Transaksi</label>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Nominal</label>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Keterangan</label>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-sm-1">
                                    <label>Delete</label>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                            </div>
                            <div id="formDetailTrans">
                                <div class="form-group m-form__group row">
                                    <div data-repeater-list="" class="col-lg-12 ui-sortable">
                                        <div data-repeater-item class="form-group m-form__group align-items-center" style="display:none">
                                            <div class="form-group m-form__group row align-items-center">
                                                <div class="col-sm-12">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__control">
                                                            <select class="form-control m-select2" placeholder="Kode - Nama Rekening" name="slsRekening" id="slsRekening" required></select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__control">
                                                            <select class="form-control m-select2" placeholder="Status" name="slsStatus" id="slsStatus" required></select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__control">
                                                            <input type="text" class="form-control m-input datepicker" placeholder="Tgl Transaksi" name="tbxTglTrans" id="tbxTglTrans" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="m-form__group--inline">
                                                        <div class="m-form__control">
                                                            <input type="number" class="form-control m-input" placeholder="Nominal" name="tbxNominal" id="tbxNominal" required> </input>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="m-form__group m-form__group--inline">
                                                        <div class="m-form__control">
                                                            <textarea type="text" class="form-control m-input" placeholder="Keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none m--margin-bottom-10"></div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a data-repeater-delete="" href="#" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill">
                                                        <i class="la la-trash-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6" style="padding-left: 5px;">
                                        <label for="inputFile" class="btn btn btn-sm m-btn m-btn--icon m-btn--pill">
                                            <span>
                                                <input id="inputFile" type="file" />
                                            </span>
                                        </label>
                                    </div>
                                    <div class="m--align-right col-lg 6">
                                        <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>
                                                    Add
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="modal hide fade" id="SITDone" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="titleSIT">
                                            SIT Done
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group m-form__group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">
                                                Remark <span style="color:red">*</span> :
                                            </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <textarea class="summernote" name="tbxRemark" id="tbxRemark" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-success" id="btnSubmitModal">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <a href="/BugTracker/" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" id="btnSaveDraft" class="btn btn-primary">
                                        Save as Draft
                                    </button>
                                    <button type="submit" id="btnSubmit" class="btn btn-success">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        @*new column*@

    </div>
</div>

<input type="hidden" id="inptSITProjectID" value="@ViewBag.SITProjectID" />
<input type="hidden" id="inptTaskID" value="@ViewBag.TaskID" />
<script src="@Url.Content("~/Scripts/bugtracker/create.js")" type="text/javascript"></script>
<script src="@Url.Content("~/Scripts/issuance/draggable.js")" type="text/javascript"></script>

