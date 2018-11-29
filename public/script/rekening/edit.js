var rootPage = window.location.pathname.split('/')[1]
var id = $('#id').val()

jQuery(document).ready(function () {
    Control.Init();
    Form.Init();
});

var Control = {
    Init: function(){
        Control.Select2();
    },
    Select2: function(){
        var sls = $("#slsStatusRekening")
        sls.html("")
        if($("#statusRek").val()=='debet'){
            sls.append("<option value='debet' selected>Debit</option> <option value='kredit'>Kredit</option>")
        }
        else if($("#statusRek").val()=='kredit'){
            sls.append("<option value='debet'>Debit</option> <option value='kredit' selected>Kredit</option>")
        }
    }
}

var Form = {
	Init: function () {
		$("#formEditRekening").validate({
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
    var btn = $('#btnEditRek');
    var params = {
        kode: $('#tbxKodeRekening').val(),
        nama: $('#tbxNamaKode').val(),
        status: $('#slsStatusRekening').val(),
        id: $('#id').val()
    }

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    $.ajax({
        url: '/'+rootPage+'/Rekening/Update',
        type: 'POST',
        data: {data : JSON.stringify(params)}
    })
    .done(function(data, textStatus, jqXHR){
        Common.Alert.SuccessRoute("Berhasil Mengubah Rekening", '/simak-bandara/Rekening');
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
}