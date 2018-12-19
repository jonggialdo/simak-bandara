//Global Variable	
var rootPage = window.location.pathname.split('/')[1]
var month = new Date().getMonth();
var year = new Date().getFullYear();

jQuery(document).ready(function () {
   $("#divTransaksiList").hide();
   Control.Init();
   Button.Init();
});

var Button = {
	Init: function(){
      $("#searchBuku").on('click', function(){
			Control.SearchBuku()
      })
	},
};

var Control = {
   Init: function(){
      Control.BootstrapDatepicker();
      Control.Input();
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
   Input: function(){
      $("#tbxSearchBukuAll").keyup(function(event){
            if(event.keyCode == 13){
               Control.SearchBuku();
            }
         });
   },
   Select2: function(){
      var sls = $("#slsBulanBuku");
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
      $("#slsBulanBuku").selectpicker('refresh');

      $("#tbxTahunBuku").val(year);
   },
   SearchBuku: function(){
      keyword = $("#tbxSearchBukuAll").val()
      monthData = $("#slsBulanBuku").val()
      yearData = $("#tbxTahunBuku").val();
      Data.GetTableData(keyword, monthData, yearData, 'bukuBesar')
      $("#divTransaksiList").show();
   }
};

var Table = {
   BukuBesar: function(data){
      neraca = $("#divTransaksiList").mDatatable({
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
         { field: "TanggalTransaksi", title: "Tgl Transaksi", textAlign: "center", template: function(e){ return Common.Format.Date(e.TanggalTransaksi);}},
         { field: "Uraian", title: "Uraian", sortable:false, textAlign: "center" },
         { field: "NomorRekening", title: "Rekening", textAlign: "center" },
         { field: "Debet", title: "Debet", textAlign: "center"},
         { field: "Kredit", title: "Kredit", textAlign: "center"}
        ]
      });
  }	
};

var Data = {
	Init: function(){
		Data.GetTableData();
	},
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
            $("#divTransaksiList").mDatatable('destroy')
            Table.BukuBesar(data)
            $('#alertBukuBesar').hide();
		}).fail(function(jqHXR, textStatus, errorThrown){

		})
	}
}