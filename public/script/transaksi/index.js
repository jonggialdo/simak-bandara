var rootPage = window.location.pathname.split('/')[1]

//== Class Initialization
jQuery(document).ready(function () {
	Table.Init($("#tbxID").val());
	Control.Init();
});

var Control = {
	Init: function () {
		Control.BootstrapDatepicker();
		Control.Modal();
		Control.Select2();
	},
	BootstrapDatepicker: function () {
		$(".datepicker").datepicker({
			format: 'dd-M-yyyy',
			todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
				leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
			}
		})
	},
	Modal: function(){
		$("#btnFormModal").on("click", function(){
			$("#divRekening").hide();
			$("#formTransaksi").modal({ backdrop: "static" });
		});

		$("#btnBatal").on("click", function(){
			Control.Select2();
			$("#slsRekening").val("");
			$("#slsStatus").val("");
			$('#tbxTglTrans').val("");
			$('#tbxNominal').val("");
			$('#tbxKeterangan').val("");
		});

		$("#btnAddDetailTr").on("click", function(){
			var link = "Create";
			Transaction.Create(link);
		})
	},
	Select2: function(){
		$("#slsStatus").html("<option></option>");
		$("#slsStatus").append('<option value="debet">Debet</option><option value="kredit">Kredit</option>');
		$("#slsStatus").select2({placeholder: "Pilih Tipe Rekening", minimumResultsForSearch: Infinity});
		$("#slsStatus").on("change", function(){
			$("#divRekening").show();
			$.ajax({
				url: '/'+rootPage+'/Rekening/ListRekening',
				type: "GET",
				dataType: 'json',
			}).done(function (data, textStatus, jqXHR) {
				$("#slsRekening").html("<option></option>");
				$.each(data.data, function (i, item) {
					$("#slsRekening").append("<option value='" + item.kode_rekening  + "'>" + item.kode_rekening +"-"+ item.nama_kode + "</option>");
				})
				$("#slsRekening").select2({ placeholder: "Pilih Kode Rekening" });
			}).fail(function (jqXHR, textStatus, errorThrown) {
				Common.Alert.Error(errorThrown);
			})
		})
	},
	Select2Edit: function(status="", kodeRek=0){
		$("#slsStatusEdit").html("<option></option>");
		if(status != ""){
			console.log(status);
			if(status == "debet"){
				$("#slsStatusEdit").append('<option value="debet" selected>Debet</option><option value="kredit">Kredit</option>');
			}
			else if(status == "kredit"){
				$("#slsStatusEdit").append('<option value="kredit" selected>Kredit</option><option value="debet">Debet</option>');
			}
		}
		else{
			$("#slsStatusEdit").append('<option value="debet">Debet</option><option value="kredit">Kredit</option>');
		}
		$("#slsStatusEdit").select2({placeholder: "Pilih Tipe Rekening", minimumResultsForSearch: Infinity});
		$.ajax({
			url: '/'+rootPage+'/Rekening/ListRekening',
			type: "GET",
			dataType: 'json',
		}).done(function (data, textStatus, jqXHR) {
			$("#slsRekeningEdit").html("<option></option>");
			console.log(kodeRek);
			$.each(data.data, function (i, item) {
				if(kodeRek!=0){
					if(kodeRek == item.kode_rekening){
						$("#slsRekeningEdit").append("<option value='" + item.kode_rekening  + "selected'>" + item.kode_rekening +"-"+ item.nama_kode + "</option>");
					}
				}
				else
					$("#slsRekeningEdit").append("<option value='" + item.kode_rekening  + "'>" + item.kode_rekening +"-"+ item.nama_kode + "</option>");
			})
			$("#slsRekeningEdit").select2({ placeholder: "Pilih Kode Rekening" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	},
	ButtonConfirm: function(){
		var btnConf = $("#btnConfirm");
		var params ={
			id: $("#tbxID").val(),
		}
		console.log(params);
		btnConf.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
		$.ajax({
			url: '/'+rootPage+'/Transaksi/konfirmasiTransaksi',
			type: 'POST',
			dataType: 'json',
			data: {data: JSON.stringify(params)}
	}).done(function(data, textStatus, jqXHR){
		Common.Alert.PromptRedirect("Berhasil Konfirmasi Transaksi", '/simak-bandara/dashboard/Transaksi');
		btnConf.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btnConf.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		})
	}
}

var Transaction = {
	Create: function(){
		var btn = $('#btnAddDetailTr');
		var params = {
			id: $("#tbxID").val(),
			kodeRek: $('#slsRekening').val(),
			status: $('#slsStatus').val(),
			tgl_transaksi: $('#tbxTglTrans').val(),
			nominal: $('#tbxNominal').val(),
			keterangan: $('#tbxKeterangan').val(),
		}
		console.log(params);
		btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

		$.ajax({
				url: '/'+rootPage+'/Transaksi/Create',
				type: 'POST',
				dataType: 'json',
				data: {data: JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
				$("#divListTransaksi").mDatatable('reload');
				Control.Select2();
				$("#slsRekening").val("");
				$("#slsStatus").val("");
				$('#tbxTglTrans').val("");
				$('#tbxNominal').val("");
				$('#tbxKeterangan').val("");
				$("#formTransaksi").modal("toggle");
				Table.Init(data.id);
				$("#btnConfirm").on("click", function(){
					Control.ButtonConfirm();
				})
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
			})
	},
	Edit: function(id){
		var btn = $('#btnEditDetailTr');
		var params = {
			id: $("#tbxID").val(),
			kodeRek: $('#slsRekeningEdit').val(),
			status: $('#slsStatusEdit').val(),
			tgl_transaksi: $('#tbxTglTransEdit').val(),
			nominal: $('#tbxNominalEdit').val(),
			keterangan: $('#tbxKeteranganEdit').val(),
		}
		console.log(params);
		btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
				
		$.ajax({
				url: '/'+rootPage+'/Transaksi/editTransaksi/'+id,
				type: 'POST',
				dataType: 'json',
				data: {data: JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
				$("#divListTransaksi").mDatatable('reload');
				Control.Select2();
				$("#slsRekening").val("");
				$("#slsStatus").val("");
				$('#tbxTglTrans').val("");
				$('#tbxNominal').val("");
				$('#tbxKeterangan').val("");
				$("#formTransaksi").modal("toggle");
				Table.Init(data.id);
				$("#btnConfirm").on("click", function(){
					Control.ButtonConfirm();
				})
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
			})
	},
	Delete: function(id){
		$.ajax({
			url: '/'+rootPage+'/Transaksi/hapusTransaksi/'+id,
			type: 'DELETE',
		}).done(function(data, textStatus, jqXHR){
			$("#divListTransaksi").mDatatable('reload');
			Table.Init(data.id);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	},
	ModalEdit: function(id){
		$.ajax({
				url: '/'+rootPage+'/Transaksi/getEditTransaksi/'+id,
				type: 'GET',
				dataType: 'json',
		}).done(function(data, textStatus, jqXHR){
			Control.Select2Edit(data.status, data.kodeRek);
			$('#tbxTglTransEdit').val(data.tgl_transaksi);
			$('#tbxNominalEdit').val(data.nominal);
			$('#tbxKeteranganEdit').val(data.keterangan);
			$("#formTransaksiEdit").modal({ backdrop: "static" });
			$("#btnEditDetailTr").on("click", function(){
				Transaction.Edit(data.id);
			})
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			})
	},
}

var Table = {
	Init: function (id) {
		t = $("#divListTransaksi").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: '/'+rootPage+'/transaksi/ListTransaksiInput/'+id, //<?=site_url()?>/controller/fungsi/parameter
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: true,
					webstorage: true
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			sortable: true,
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
			},
			search: {
				input: $("#tbxSearchTransaksi")
			},
			columns: [
				{
					field: "id", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<button onclick="Transaction.ModalEdit('+ t.id +')" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Rekening"><i class="la la-edit"></i></button>\t\t\t\t\t\t';
						strBuilder += '<button onclick="Transaction.Delete('+ t.id +')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Rekening"><i class="la la-trash"></i></button>';
						return strBuilder;
					}
				},
				{ field: "kodeRek", title: "Kode Rekening", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "tgl_transaksi", title: "Tgl Transaksi", textAlign: "center" },
				{ field: "nominal", title: "Nominal", textAlign: "center" },
				{ field: "keterangan", title: "Keterangan", textAlign: "center" },
			]
		});
	}
}
