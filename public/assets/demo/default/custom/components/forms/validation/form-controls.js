var FormControls= {
    init:function() {
        $("#m_form_1").validate( {
            rules: {
                email: {
                    required: !0, email: !0, minlength: 10
                }
                , url: {
                    required: !0
                }
                , digits: {
                    required: !0, digits: !0
                }
                , creditcard: {
                    required: !0, creditcard: !0
                }
                , phone: {
                    required: !0, phoneUS: !0
                }
                , option: {
                    required: !0
                }
                , options: {
                    required: !0, minlength: 2, maxlength: 4
                }
                , memo: {
                    required: !0, minlength: 10, maxlength: 100
                }
                , checkbox: {
                    required: !0
                }
                , checkboxes: {
                    required: !0, minlength: 1, maxlength: 2
                }
                , radio: {
                    required: !0
                }
            }
            , invalidHandler:function(e, r) {
                var i=$("#m_form_1_msg");
                i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
            }
            , submitHandler:function(e) {}
        }
        ),
        $("#m_form_2").validate( {
            rules: {
                email: {
                    required: !0, email: !0
                }
                , url: {
                    required: !0
                }
                , digits: {
                    required: !0, digits: !0
                }
                , creditcard: {
                    required: !0, creditcard: !0
                }
                , phone: {
                    required: !0, phoneUS: !0
                }
                , option: {
                    required: !0
                }
                , options: {
                    required: !0, minlength: 2, maxlength: 4
                }
                , memo: {
                    required: !0, minlength: 10, maxlength: 100
                }
                , checkbox: {
                    required: !0
                }
                , checkboxes: {
                    required: !0, minlength: 1, maxlength: 2
                }
                , radio: {
                    required: !0
                }
            }
            , invalidHandler:function(e, r) {
                mApp.scrollTo("#m_form_2"), swal( {
                    title: "", text: "There are some errors in your submission. Please correct them.", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                }
                )
            }
            , submitHandler:function(e) {}
        }
        ),
        $("#m_form_3").validate( {
            rules: {
                billing_card_name: {
                    required: !0
                }
                , billing_card_number: {
                    required: !0, creditcard: !0
                }
                , billing_card_exp_month: {
                    required: !0
                }
                , billing_card_exp_year: {
                    required: !0
                }
                , billing_card_cvv: {
                    required: !0, minlength: 2, maxlength: 3
                }
                , billing_address_1: {
                    required: !0
                }
                , billing_address_2: {}
                , billing_city: {
                    required: !0
                }
                , billing_state: {
                    required: !0
                }
                , billing_zip: {
                    required: !0, number: !0
                }
                , billing_delivery: {
                    required: !0
                }
            }
            , invalidHandler:function(e, r) {
                mApp.scrollTo("#m_form_3"), swal( {
                    title: "", text: "There are some errors in your submission. Please correct them.", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                }
                )
            }
            , submitHandler:function(e) {
                return swal( {
                    title: "", text: "Form validation passed. All good!", type: "success", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                }
                ), !1
            }
        }
        )
    }
}

;
jQuery(document).ready(function() {
    FormControls.init()
}

);