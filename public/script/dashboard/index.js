//Global Variable	
var rootPage = window.location.pathname.split('/')[1]
var month = new Date().getMonth();
var year = new Date().getFullYear();

var keyword = ''
var monthData = ''
var yearData = ''

//== Class Initialization
jQuery(document).ready(function () {
	Data.GetTableData("","",1)
	Button.Init();
    Control.Init();
});

var Table = {
    Neraca: function(data){
        neraca = $("#divNeraca").mDatatable({
			data: {
				type: "local",
				source: data,
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
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan",  sortable:false, textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
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
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan",  sortable:false, textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
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
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan", sortable:false, textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
			]
		});
	}	
};

var Button = {
	Init: function(){
		Button.BtnSearch();
		Button.BtnReset();
		Button.BtnLaporan();
	},
	BtnSearch: function(){
		$("#resetNeraca").on('click', function(){
			DataTable.Init("", "", 1);
		})
		$("#resetPosisi").on('click', function(){
			DataTable.Init("", "", 2);
		})
		$("#resetRL").on('click', function(){
			DataTable.Init("", "", 3);
		})
	},
	BtnReset: function(){
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
			$("#divContent").html("");
			$("#divContent").append("<?php $this->load->view(dashboard/laporanNeraca) ?>")
		})
		$("#laporanPosisi").on('click', function(){
			// Control.SearchPosisiKas();
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

		// $('.nav-tabs li a').on('click', function() {
		// 	  if(this.id == "neraca")
		// 	  	DataTable.GetData("","","",1)
		// 	  if(this.id == "posisi")
		// 	  	DataTable.GetData("","","",2)
		// 	  if(this.id == 'rl' )
		// 	  	DataTable.GetData("","","",3)
		// })
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
		monthData = $("#slsBulanNeraca").val()
		yearData = $("#tbxTahunNeraca").val();
		DataTable.GetData(keyword, monthData, yearData, 1)
    },
    SearchPosisiKas: function(){
        keyword = $("#tbxSearchPosisiAll").val()
		monthData = $("#slsBulanPosisi").val()
		yearData = $("#tbxTahunPosisi").val();
		DataTable.GetData(keyword, monthData, yearData, 2)
    },
    SearchRugiLaba: function(){
        keyword = $("#tbxSearchRLAll").val()
		monthData = $("#slsBulanRL").val()
		yearData = $("#tbxTahunRL").val();
		DataTable.GetData(keyword, monthData, yearData, 3)
	}
}

var Data = {
	Init: function(){
		Data.GetTableData();
	},
	GetTableData: function(key="", filterMonth=0, filterYear=0, type=0){
		var url = ''
		if(type == 1)
			url = '/'+rootPage+'/Rekening/ListRekening'
		if(type == 2)
			url = '/'+rootPage+'/Rekening/ListRekening'
		if(type == 3)
			url = '/'+rootPage+'/Rekening/ListRekening'

		params = {
			keyword: key,
			monthData: filterMonth,
			yearData: filterYear
		}

		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			data: {data : JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
				if(type == 1)
					Table.Neraca(data);
				if(type == 2)
					Table.PosisiKas(data);
				if(type == 3)
					Table.RugiLaba(data)
		}).fail(function(jqHXR, textStatus, errorThrown){

		})
	},
	GetDataLaporan: function(filterMonth=0, filterYear=0, type=0){
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