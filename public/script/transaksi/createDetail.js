var rootPage = window.location.pathname.split('/')[1]
jQuery(document).ready(function () {
	Control.Init();
	Form.Init();
});

var Control = {
	Init: function () {
		Control.BootstrapDatepicker();
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
	Select2: function(){
		$.ajax({
			url: '/'+rootPage+'/Rekening/ListRekening',
			type: "GET",
			dataType: 'json',
		}).done(function (data, textStatus, jqXHR) {
			console.log(data);
			$("#slsRekening").html("<option></option>");
			$.each(data, function (i, item) {
				$("#slsRekening").append("<option value='" + item.kode_rekening  + "'>" + item.kode_rekening +"-"+ item.nama_kode + "</option>");
			})
			$("#slsRekening").select2({ placeholder: "Pilih Kode Rekening" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	},
}

var Form = {
	Init: function(){
		Form.Check();
	},
	Check: function () {
		$("#formDebKre").validate({
			invalidHandler: function (e, r) {
				var i = $("#msgDebKreFail");
				i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
			},
			submitHandler: function (e) {
				Transaction();
			}
		})
	},
}

var Transaction = function(){
    var btn = $('#btnAddDetailTr');
    var params = {
		kodeDeb: $('#tbxKodeDebet').val(),
		kodeKre: $('#tbxKodeKredit').val(),
		tglTrans: $('#tbxTglTrans').val(),
		nominalDeb: $('#tbxNominalDebet').val(),
		nominalKre: $('#tbxNominalKredit').val(),
		uraianDeb: $('#tbxUraianDebet').val(),
		uraianKre: $('#tbxUraianKredit').val(),
    }

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

	console.log(params);

    $.ajax({
        url: '/'+rootPage+'/Transaksi/Create',
        type: 'POST',
        dataType: 'json',
        data: {data: JSON.stringify(params)}
    })
    .done(function(data, textStatus, jqXHR){
        Common.Alert.SuccessRoute("Berhasil Menambahkan Transaksi Baru", '/simak-bandara/transaksi');
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
}
