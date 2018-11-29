var rootPage = window.location.pathname.split('/')[1]

jQuery(document).ready(function () {
    Form.Init();
});

var Form = {
	Init: function () {
		$("#formEditTransaksi").validate({
			invalidHandler: function (e, r) {
				var i = $("#msgEditFail");
				i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
			},
			submitHandler: function (e) {
				Transaction();
			}
		})
	}
}

var Transaction = function(){
    var btn = $('#btnEditTr');
    var params = {
		kodeDeb: $('#tbxKodeDebet').val(),
		kodeKre: $('#tbxKodeKredit').val(),
		tglTrans: $('#tbxTglTrans').val(),
		uraianDeb: $('#tbxUraianDebet').val(),
		uraianKre: $('#tbxUraianKredit').val(),
		nominalDeb: $('#tbxNominalDebet').val(),
		nominalKre: $('#tbxNominalKredit').val()
    }

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    var data = $("#formEditRekening").serialize();

    // $.ajax({
    //     url: '/'+rootPage+'/Rekening/Update',
    //     type: 'POST',
    //     data: data
    // })
    // .done(function(data, textStatus, jqXHR){
    //     Common.Alert.SuccessRoute("Berhasil Menambahkan Rekening Baru", '/simak-bandara/Rekening');
	// 	btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	// }).fail(function (jqXHR, textStatus, errorThrown) {
	// 	Common.Alert.Error(errorThrown);
	// 	btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	// })
}
