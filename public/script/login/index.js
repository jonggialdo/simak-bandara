//== Class Initialization
jQuery(document).ready(function () {
    Login.init();
});

//== Class Definition
var Login = function () {

    var login = $('#divLogin');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        mUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }

    //== Private Functions
    var handleSignInFormSubmit = function() {
        $('#btnSubmit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            // Transaction
            var params = {
                UserID: $("#tbxUserID").val(),
                Password: $("#tbxPassword").val()
            }

            $.ajax({
                url: '/Login/Login',
                type: 'POST',
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(params),
                cache: false
            }).done(function (data, textStatus, jqXHR) {
                btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);

                if (data.ErrorType > 0) {
                    showErrorMsg(form, 'danger', data.ErrorMessage);
                } else {
                    window.location.href = '/Dashboard';
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                showErrorMsg(form, 'danger', 'Error on System!');
            })
        });
    }

    //== Public Functions
    return {
        init: function() {
            handleSignInFormSubmit();
        }
    };
}();
