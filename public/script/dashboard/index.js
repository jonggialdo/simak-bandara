//Global Variable	
var rootPage = window.location.pathname.split('/')[1]
var month = new Date().getMonth();
var year = new Date().getFullYear();

//== Class Initialization
jQuery(document).ready(function () {
	Button.Init();
	Control.Init();
	$('#divDokPosisiKas').hide();
	$('#divDokRugiLaba').hide();
});

var Table = {
    Neraca: function(data){
        neraca = $("#divNeraca").mDatatable({
			data: {
				type: "local",
				source: data,
				pageSize: 10,
				saveState: {
					cookie: false,
					webstorage: false
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
            },
            // search: {
			// 	input: $("#tbxSearchNeraca")
			// },
			columns: [
				{ field: "TanggalTransaksi", title: "Tgl Transaksi", textAlign: "center", template: function(e){ return Common.Format.Date(e.TanggalTransaksi);}},
				{ field: "Uraian", title: "Uraian", sortable:false, textAlign: "center" },
				{ field: "NomorRekening", title: "Rekening", textAlign: "center" },
				{ field: "Debet", title: "Debet", textAlign: "center"},
				{ field: "Kredit", title: "Kredit", textAlign: "center"}
			]
        });
    },
    PosisiKas: function(data){
        posisiKas = $("#divPosisiKas").mDatatable({
			data: {
				type: "local",
				source:data,
				pageSize: 10,
				saveState: {
					cookie: false,
					webstorage: false
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
            },
            // search: {
			// 	input: $("#tbxSearchPosisi")
			// },
			columns: [
				{ field: "TanggalTransaksi", title: "Tgl Transaksi", textAlign: "center", template: function(e){ return Common.Format.Date(e.TanggalTransaksi);} },
				{ field: "Uraian", title: "Uraian", sortable:false, textAlign: "center" },
				{ field: "NomorRekening", title: "Rekening", textAlign: "center" },
				{ field: "Debet", title: "Debet", textAlign: "center"},
				{ field: "Kredit", title: "Kredit", textAlign: "center"}
			]
		});
    },
    RugiLaba: function(data){
        rugiLaba = $("#divRugiLaba").mDatatable({
			data: {
				type: "local",
				source: data,
				pageSize: 10,
				saveState: {
					cookie: false,
					webstorage: false
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
            },
            // search: {
			// 	input: $("#tbxSearchRugiLaba")
			// },
			columns: [
				{ field: "TanggalTransaksi", title: "Tgl Transaksi", textAlign: "center", template: function(e){ return Common.Format.Date(e.TanggalTransaksi);}},
				{ field: "Uraian", title: "Uraian", sortable:false, textAlign: "center" },
				{ field: "NomorRekening", title: "Rekening", textAlign: "center" },
				{ field: "Debet", title: "Debet", textAlign: "center"},
				{ field: "Kredit", title: "Kredit", textAlign: "center"}
			]
		});
	}	
};

var Button = {
	Init: function(){
		Button.BtnSearch();
		Button.BtnReset();
		// Button.BtnLaporan();
	},
	BtnReset: function(){
		$("#resetNeraca").on('click', function(){
			$("#tbxSearchNeracaAll").val("")
			Control.SearchNeraca();
		})
		$("#resetPosisi").on('click', function(){
			$("#tbxSearchPosisiAll").val("")
			Control.SearchPosisiKas()
		})
		$("#resetRL").on('click', function(){
			$("#tbxSearchRLAll").val("")
			Control.SearchRugiLaba();
		})
	},
	BtnSearch: function(){
		$("#searchNeraca").on('click', function(){
			Control.SearchNeraca()
		})
		$("#searchPosisi").on('click', function(){
			Control.SearchPosisiKas();
		})
		$("#searchRL").on('click', function(){
			Control.SearchRugiLaba();
		})
	},
	BtnLaporan: function(){
		$("#laporanNeraca").on('click', function(){
		})
		$("#laporanPosisi").on('click', function(){
			// $("#divDokPosisiKas").show();
		})
		$("#laporanRL").on('click', function(){
			// Control.SearchRugiLaba();
		})
	}
};

var Control = {
    Init: function(){
        Control.BootstrapDatepicker();
		Control.Input();
		Control.Select2();

		Data.GetTableData("", month+1, year, 'neraca');
		Data.GetTableData("", month+1, year, 'posisiKas');
		Data.GetTableData("", month+1, year, 'rugiLaba');
	},
    BootstrapDatepicker: function () {
		$(".datepicker").datepicker({
			format: 'dd-M-yyyy',
			todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
				leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
			}
		})
	},
	Input: function(){
		$("#tbxSearchNeracaAll").keyup(function(event){
            if(event.keyCode == 13){
                Control.SearchNeraca();
            }
        });
        $("#tbxSearchPosisiAll").keyup(function(event){
            if(event.keyCode == 13){
                Control.SearchPosisiKas();
            }
        });
        $("#tbxSearchRLAll").keyup(function(event){
            if(event.keyCode == 13){
                Control.SearchRugiLaba();
            }
		})
	},
	Select2: function(){
		var sls = $(".m-select2");
		var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		var i = 0;
		for (i = 0; i < 12; i++) {
			var value = i + 1;
			if (i == month) {
				sls.append("<option value='" + value + "' selected>" + monthNames[i] + "</option>");
			}
			else
				sls.append("<option value='" + value + "' >" + monthNames[i] + "</option>");
		}
		sls.selectpicker("refresh");
		$(".m-select2").selectpicker('refresh');

		$("#tbxTahunNeraca").val(year);
		$("#tbxTahunPosisi").val(year);
		$("#tbxTahunRL").val(year);
	},
    SearchNeraca: function(){
		keyword = $("#tbxSearchNeracaAll").val()
		monthData = parseInt($("#slsBulanNeraca").val())
		yearData = parseInt($("#tbxTahunNeraca").val())
		Data.GetTableData(keyword, monthData, yearData, 'neraca')
    },
    SearchPosisiKas: function(){
        keyword = $("#tbxSearchPosisiAll").val()
		monthData = parseInt($("#slsBulanPosisi").val())
		yearData = parseInt($("#tbxTahunPosisi").val())
		Data.GetTableData(keyword, monthData, yearData, 'posisiKas')
    },
    SearchRugiLaba: function(){
        keyword = $("#tbxSearchRLAll")
		monthData = parseInt($("#slsBulanRL").val())
		yearData =parseInt($("#tbxTahunRL").val())
		Data.GetTableData(keyword, monthData, yearData, 'rugiLaba')
		
	}
}

var Data = {
	GetTableData: function(key, filterMonth, filterYear, tipe){
		params = {
			tipeDashboard: tipe,
			keyword: key,
			month: filterMonth,
			year: filterYear
		}

		$.ajax({
			url: '/'+rootPage+'/Dashboard/searchDashboard',
			type: 'POST',
			dataType: 'json',
			data: {data : JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
				if(tipe == 'neraca'){
					$("#divNeraca").mDatatable('destroy')
					Table.Neraca(data);
				}
				else if(tipe == 'posisiKas'){
					$("#divPosisiKas").mDatatable('destroy')
					Table.PosisiKas(data);
				}
				else if(tipe == 'rugiLaba'){
					$("#divRugiLaba").mDatatable('destroy')
					Table.RugiLaba(data)
				}
		}).fail(function(jqHXR, textStatus, errorThrown){

		})
	},
	GetDataLaporan: function(filterMonth, filterYear, tipe){
		
		
		params = {
			monthData: filterMonth,
			yearData: filterYear
		}
		$.ajax({
			url: '/'+rootPage+'/Rekening/ListRekening',
			type: 'GET',
			dataType: 'json',
			data: {data : JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
				Table.Neraca(data);
		}).fail(function(jqHXR, textStatus, errorThrown){

		})
	},
}