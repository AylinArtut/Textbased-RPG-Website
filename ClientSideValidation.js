$(document).ready(function() {
	/* When user is typing in an input field, my requirements are printed for him before submitting the form.
	 * After submitting the form, every required fields are checked again. I will verify data on server side with php, too.
	 */
	
	// First, I hide my error-html-elements:
	$('email_errorMessage').hide();
	$('password_errorMessage').hide();
    $('username_errorMessage').hide();

    var email_errorMessage = false;
	var password_errorMessage = false;
	var username_errorMessage = false;
	var username_errorMessage2 = false;
	
	// When I leave "email"-field, after entering it, my method will be called:	
	$('#email').focusout(function(){
		validateEmail();
	});
		
	// When I leave "password"-field, after entering it, my method will be called:
	$('#password').focusout(function(){
		validatePassword();
	});
		
	// When I leave "username"-field, after entering it, my method will be called:
	$('#username').focusout(function(){
		validateCharacterName();
	});
	
	// ------------------------------------------------------------------------------------------------------------------------
	
	/* I have several methods for validation, 'cause maybe I want handle "email" or "password" different from other input-fields in future.
	 * I don't know what else I want to verify. First, it was important that my "required fields" aren't null & have at least 3 signs:
	 */
	function validateEmail(){					
		var inputField_Length = $('#email').val().length;
		if(inputField_Length < 3 || inputField_Length > 20){
			$('#' + 'email_errorMessage').html("Das Pflichtfeld muss mindestens 3 Zeichen lang sein.").show();
			email_errorMessage = true;
		}else{
			$('#' + 'email_errorMessage').hide();
			email_errorMessage = false;
		}				
	}
	
	function validatePassword(){					
		var inputField_Length = $('#password').val().length;
		if(inputField_Length < 3 || inputField_Length > 20){
			$('#' + 'password_errorMessage').html("Das Pflichtfeld muss mindestens 3 Zeichen lang sein.").show();
			password_errorMessage = true;
		}else{
			$('#' + 'password_errorMessage').hide();
			password_errorMessage = false;
		}				
	}
	
	function validateCharacterName(){
		var inputField_Length = $('#username').val().length;
		if(inputField_Length < 3 || inputField_Length > 20){
			$('#' + 'username_errorMessage').html("Das Pflichtfeld muss mindestens 3 Zeichen lang sein.").show();
		}else{
			$('#' + 'username_errorMessage').hide();
            username_errorMessage = false;
		}				
	}

	// ------------------------------------------------------------------------------------------------------------------------
	
	// Here I'm using an AJAX request to check, if entered username is already taken:
	$('#username').blur(function(){
		var username = $(this).val();
		$.ajax({
			url: "Main.php",
			method: "POST",
			data: {user_name: username},
			dataType: "text",
			success: function(data){
				// It's a dirty solution, which I will improve later:
				if(data.includes("NO")){
					$('#username_errorMessage2').html('Benutzername ist bereits vergeben.');
                    username_errorMessage2 = true;
				}else{
					$('#username_errorMessage2').html('Benutzername ist verfügbar.');
                    username_errorMessage2 = false;
				}
			}
		});
	});
	
	// ------------------------------------------------------------------------------------------------------------------------
	
	// When there's still an error message, the form will not be send:
	$('#registration_formular').submit(function(){		
		validateEmail();
		validatePassword();
		validateCharacterName();
		
		if(username_errorMessage2 == false && username_errorMessage == false && password_errorMessage == false && email_errorMessage == false){
			return true;
		}else{
			return false;
		}
	});
});