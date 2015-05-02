
$(document).ready(function() {     
    populateCountries("country", "state");
    
    //hide postalcode if Canada is not selected
    $('#postalcode').addClass("valid").parent().hide();
    $('#country').on('change', function() {
        if(this.value == 'Canada') {
            $('#postalcode').val("").removeClass("invalid").removeClass("valid").parent().show();
        }else{
            $('#postalcode').val("").removeClass("invalid").addClass("valid").parent().hide();
            $("span", $('#postalcode').parent()).removeClass("error_show").addClass("error");
        }
    });

    //Validate name
    $('#fullname').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    //Validate email
    $('#email').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });
    
    //Validate postalcode
    $('#postalcode').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]$/;
        var is_postalcode=re.test(input.val());
        if(is_postalcode){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    //on submit check required fields
    $("#contact_submit button").click(function(event){
        var form_data=$("#contact").serializeArray();
        var error_free=true;
        for (var input in form_data){
            var element=$("#"+form_data[input]['name']);
            if(element.hasClass("validate")) {
                var valid=element.hasClass("valid");
                var error_element=$("span", element.parent());
                if (!valid){
                    error_element.removeClass("error").addClass("error_show"); error_free=false;
                }
                else{
                    error_element.removeClass("error_show").addClass("error");
                }
            }
        }
        if (!error_free){
            event.preventDefault(); 
        }
        /*else{
            alert('No errors: Form will be submitted');
        }*/

    }
    );
});