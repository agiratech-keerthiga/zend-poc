
    // Setup form validation on the #register-form element
    $(function() {
        // $("#register_form").submit(function(){
        //     alert("Submitted");
        // });
  
    // Setup form validation on the #register-form element
    $("#register_form").validate({
    
        // Specify the validation rules
        rules: {
            firstname: "required",
            lastname: "required",
            password: {
                required: true,
                minlength: 5
            },
            confirmpassword: {
                required: true,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
        },
        
        // Specify the validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirmpassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#login_form").validate({
    
        // Specify the validation rules
        rules: {
            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
        },
        
        // Specify the validation error messages
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });
     // $("#edit_form").validate();
     // $("#forgot_form").validate();

  });