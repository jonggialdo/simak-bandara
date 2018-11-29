var rootPage = window.location.pathname.split('/')[1]
$(".formKredit").hide();
$("#sendData").hide();
jQuery(document).ready(function () {
	Control.Init();
	$("#btnDebet").on("click",function(){
		$(".formDebet").hide();
		$("#btnPertama").hide();
		$(".formKredit").show();
		$("#sendData").show();
	})
	Form.Init();
});

var Control = {
	Init: function () {
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
}

var Form = {
	Init: function () {
		$("#formNewTransaksi").validate({
			invalidHandler: function (e, r) {
				var i = $("#msgTransaksiFail");
				i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
			},
			submitHandler: function (e) {
				Transaction();
			}
		})
	}
}

var Transaction = function(){
    var btn = $('#btnAddTr');
    var params = {
		kodeDeb: $('#tbxKodeDebet').val(),
		kodeKre: $('#tbxKodeKredit').val(),
		tglTransDeb: $('#tbxTglTransDebet').val(),
		tglTransKre: $('#tbxTglTransKredit').val(),
		nominalDeb: $('#tbxNominalDebet').val(),
		nominalKre: $('#tbxNominalKredit').val(),
		uraianDeb: $('#tbxUraianDebet').val(),
		uraianKre: $('#tbxUraianKredit').val(),
    }

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

	console.log(JSON.stringify(params))

    $.ajax({
        url: '/'+rootPage+'/Transaksi/Create',
        type: 'POST',
        dataType: 'json',
        data: {data: JSON.stringify(params)}
    })
    .done(function(data, textStatus, jqXHR){
        Common.Alert.SuccessRoute("Berhasil Menambahkan Rekening Baru", '/simak-bandara/transaksi');
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
}
