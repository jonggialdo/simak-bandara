var rootPage = window.location.pathname.split('/')[1]

//== Class Initialization
jQuery(document).ready(function () {
	Control.Init();
	// DataTable.GetData();
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
				{ field: "TanggalTransaksi", title: "Tgl Transaksi", textAlign: "center", template: function(e){ return Common.Format.Date(e.TanggalTransaksi);}},
				{ field: "Uraian", title: "Uraian", sortable:false, textAlign: "center" },
				{ field: "NomorRekening", title: "Rekening", textAlign: "center" },
				{ field: "Debet", title: "Debet", textAlign: "center"},
				{ field: "Kredit", title: "Kredit", textAlign: "center"}
			]
		})
	}
}

var Button = {
	Init: function(){
		$("#searchTrx").on('click', function(){
			Control.SearchTrx()
		})
		$("#resetTrx").on('click', function(){
			DataTable.GetData();
		})
	},
};

var Control = {
    Init: function(){
		Control.BootstrapDatepicker();
		Control.Input();
		Control.SearchTrx();
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
        $("#tbxSearchRekeningAll").keyup(function(event){
            if(event.keyCode == 13){
                Control.SearchTrx();
            }
		})
	},
	SearchTrx: function(){
		keyword = $("#tbxSearchRekeningAll").val()
		start = $("#tbxBeginDate").val()
		end = $("#tbxEndDate").val()
		DataTable.GetData(keyword, start, end)
    },
}

var DataTable = {
	GetData: function(key, sDate, eDate){
		params = {
			keyword: key,
			startDate: sDate,
			endDate: eDate
		}
		
		$.ajax({
			url: '/'+rootPage+'/Dashboard/searchListTransaksi',
			type: 'POST',
			dataType: 'json',
			data: {data : JSON.stringify(params)}
		}).done(function(data, textStatus, jqXHR){
			$("#divTrx").mDatatable('destroy')
			Table.Init(data);
		}).fail(function(jqHXR, textStatus, errorThrown){
			
		})
	}
}