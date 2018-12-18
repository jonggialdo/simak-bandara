var rootPage = window.location.pathname.split('/')[1]

//== Class Initialization
jQuery(document).ready(function () {
	Control.Init();
	DataTable.GetData();
});

var Table = {
	Init: function (data) {
		t = $("#divTrx").mDatatable({
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
		})
	}
}

var Control = {
    Init: function(){
        Control.BootstrapDatepicker();
    },
    BootstrapDatepicker: function () {
		$(".datepicker").datepicker({
			format: 'dd-M-yyyy',
			todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
				leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
			}
		})
	},
	Button: function(){
		$("#searchTrx").on('click', function(){
			Control.SearchTrx()
		})
		$("#resetTrx").on('click', function(){
			DataTable.GetData();
		})
	},
	Input: function(){
        // $("#tbxSearchRekeningAll").keyup(function(event){
        //     if(event.keyCode == 13){
        //         Control.SearchTrx();
        //     }
		// })
	},
	SearchTrx: function(){
		keyword = $("#tbxSearchRekeningAll").val()
		start = $("#tbxBeginDate").val()
		end = $("#tbxEndDate").val();
		DataTable.GetData(keyword, start, end)
    },
}

var DataTable = {
	GetData: function(key="", sDate="", eDate=""){
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
			Table.Init(data);
		}).fail(function(jqHXR, textStatus, errorThrown){

		})
	}
}