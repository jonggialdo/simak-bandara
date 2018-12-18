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
			Transaction.Create();
		})
	},
	Select2: function(kodeRek=0, status=""){
		$("#slsStatus").html("<option></option>");
		if(status != ""){
			if(status == "debet"){
				$("#slsStatus").append('<option value="debet" selected>Debet</option><option value="kredit">Kredit</option>');
			}
			else{
				$("#slsStatus").append('<option value="debet">Debet</option><option value="kredit" selected>Kredit</option>');
			}
		}
		else{
			$("#slsStatus").append('<option value="debet">Debet</option><option value="kredit">Kredit</option>');
		}
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
					if(kodeRek!=0){
						if(kodeRek == item.kode_rekening){
							$("#slsRekening").append("<option value='" + item.kode_rekening  + "selected'>" + item.kode_rekening +"-"+ item.nama_kode + "</option>");
						}
					}
					else
						$("#slsRekening").append("<option value='" + item.kode_rekening  + "'>" + item.kode_rekening +"-"+ item.nama_kode + "</option>");
				})
				$("#slsRekening").select2({ placeholder: "Pilih Kode Rekening" });
			}).fail(function (jqXHR, textStatus, errorThrown) {
				Common.Alert.Error(errorThrown);
			})
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
			tglTrans: $('#tbxTglTrans').val(),
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
	Edit: function(id){
		$.ajax({
				url: '/'+rootPage+'/Transaksi/getEditTransaksi/'+id,
				type: 'GET',
		}).done(function(data, textStatus, jqXHR){
			Control.Select2(data.kodeRek, data.status);
			$('#tbxTglTrans').val(data.tgl_transaksi);
			$('#tbxNominal').val(data.nominal);
			$('#tbxKeterangan').val(data.keterangan);
			$("#formTransaksi").modal({ backdrop: "static" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
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
						var strBuilder = '<button onclick="Transaction.Edit('+ t.id +')" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Rekening"><i class="la la-edit"></i></button>\t\t\t\t\t\t';
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
