jQuery(document).ready(function() {
  var form1 = $('#form_client');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        messages: {
            name:{
                minlength:'Votre nom est trop court',
                required:'Veuillez saisir votre nom'
            },
            email:{
                required:'Veuillez saisir votre adresse email',
                email:'Veuillez saisir un email valide'
            },
            amount:{
                required:'Veuillez saisir un montant',
                number:'Veuillez saisir un montant valide',
                positiveNumber:'Veuillez saisir un montant positif'
            },
            paymen_type:{
                requred:'Veuilez préciser le type de paiment'

            }


        },
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email:{
                required:true,
                email:true
            },
            amount:{
                required:true,
                number:true
            },
            paymen_type:{
                requred:true
            }

        },


        invalidHandler: function(event, validator) {
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else{
                error.insertAfter(element);
            }

        },

        highlight: function(element) {
            $(element)
                .closest('.form-group').removeClass('has-info')
                .closest('.form-group').addClass('has-error');
        },

        unhighlight: function(element) {
            $(element)
                .closest('.form-group').removeClass('has-error')
                .closest('.form-group').addClass('has-success');
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error')
                .closest('.form-group').addClass('has-success');
        },

        submitHandler: function(form) {
            success1.show();
            error1.hide();

            return true;


        }

    });
    ////////////////////////////////////////////////////////////////////////////


   var form2 = $('#invoice_form');

    var success1 = $('.alert-success', form2);

    form2.validate({





        submitHandler: function(form) {
            var length = $("#my_table > tbody > tr").length;
            console.log(length);
            for (i = 0; i < length; i++) {
                if(document.getElementById('descriptions[' + i + ']').value==""){
                    document.getElementById("errorClass2").style.display="block";

                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                }
            }

            return true;


        }

    });
});