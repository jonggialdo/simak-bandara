//Global Variable	
var rootPage = window.location.pathname.split('/')[1]
var keyword = ""
var start = ""
var end = ""

//== Class Initialization
jQuery(document).ready(function () {
    DataTable.Init();
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
			sortable: true,
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
				{
					field: "id", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/'+rootPage+'/Rekening/editRekening/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Rekening"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="/'+rootPage+'/Rekening/Delete/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Rekening"><i class="la la-trash"></i></a>';
						return strBuilder;
					}
				},
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan", textAlign: "center" },
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
			sortable: true,
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
				{
					field: "id", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/'+rootPage+'/Rekening/editRekening/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Rekening"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="/'+rootPage+'/Rekening/Delete/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Rekening"><i class="la la-trash"></i></a>';
						return strBuilder;
					}
				},
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan", textAlign: "center" },
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
			sortable: true,
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
				{
					field: "id", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/'+rootPage+'/Rekening/editRekening/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Rekening"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="/'+rootPage+'/Rekening/Delete/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Rekening"><i class="la la-trash"></i></a>';
						return strBuilder;
					}
				},
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
			]
        });
    }
}

var Control = {
    Init: function(){
        Control.BootstrapDatepicker();
		Control.Input();
		Control.Button();
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
		// $("#tbxSearchNeracaAll").keyup(function(event){
        //     if(event.keyCode == 13){
        //         Control.SearchNeraca();
        //     }
        // });
        // $("#tbxSearchPosisiAll").keyup(function(event){
        //     if(event.keyCode == 13){
        //         Control.SearchPosisiKas();
        //     }
        // });
        // $("#tbxSearchRLAll").keyup(function(event){
        //     if(event.keyCode == 13){
        //         Control.SearchRugiLaba();
        //     }
		// })
	},
	Button: function(){
		$("#searchNeraca").on('click', function(){
			Control.SearchNeraca()
		})
		$("#searchPosisi").on('click', function(){
			Control.SearchPosisiKas();
		})
		$("#searchRL").on('click', function(){
			Control.SearchRugiLaba();
		})

		$("#resetNeraca").on('click', function(){
			DataTable.Init("", "", "", 1);
		})
		$("#resetPosisi").on('click', function(){
			DataTable.Init("", "", "", 2);
		})
		$("#resetRL").on('click', function(){
			DataTable.Init("", "", "", 3);
		})
	},
    SearchNeraca: function(){
		keyword = $("#tbxSearchNeracaAll").val()
		start = $("#tbxBeginDateNeraca").val()
		end = $("#tbxEndDateNeraca").val();
		DataTable.GetData(keyword, start, end, 1)
    },
    SearchPosisiKas: function(){
        keyword = $("#tbxSearchPosisiAll").val()
		start = $("#tbxBeginDatePosisi").val()
		end = $("#tbxEndDatePosisi").val();
		DataTable.GetData(keyword, start, end, 2)
    },
    SearchRugiLaba: function(){
        keyword = $("#tbxSearchRLAll").val()
		start = $("#tbxBeginDateRL").val()
		end = $("#tbxEndDateRL").val();
		DataTable.GetData(keyword, start, end, 3)
    }
}

var DataTable = {
	Init: function(){
		DataTable.GetData();
	},
	GetData: function(key="", sDate="", eDate="", type=0){
		params = {
			keyword: key,
			startDate: sDate,
			endDate: eDate
		}
		$.ajax({
			url: '/'+rootPage+'/Rekening/ListRekening',
			type: 'GET',
			dataType: 'json',
			data: {data : JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
			if(type == 0){
				Table.Neraca(data);
				Table.PosisiKas(data);
				Table.RugiLaba(data);
			}
			else if(type == 1){
				Table.Neraca(data);
			}
			else if(type == 2){
				Table.PosisiKas(data);
			}
			else if(type == 3){
				Table.RugiLaba(data);
			}
		}).fail(function(jqHXR, textStatus, errorThrown){

		})
	}
}