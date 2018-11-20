var rootPage = window.location.pathname.split('/')[1]

jQuery(document).ready(function () {
    Form.Init();
});

var Form = {
	Init: function () {
		$("#formNewRekening").validate({
			invalidHandler: function (e, r) {
				var i = $("#msgRekeningFail");
				i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
			},
			submitHandler: function (e) {
				Transaction();
			}
		})
	}
}

var Transaction = function(){
    var btn = $('#btnAddRek');
    var params = {
        kode: $('#tbxKodeRekening').val(),
        nama: $('#tbxNamaKode').val(),
        status: $('#slsStatusRekening').val()
    }

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    var data = $("#formNewRekening").serialize();
    console.log(data);

    $.ajax({
        url: '/'+rootPage+'/Rekening/Create',
        type: 'POST',
        data: data
    })
    .done(function(data, textStatus, jqXHR){
        Common.Alert.SuccessRoute("Berhasil Menambahkan Rekening Baru", '/simak-bandara/Rekening');
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
}