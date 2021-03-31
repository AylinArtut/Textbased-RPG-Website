$(document).ready(function() {
	/* When user is typing in an input field, my requirements are printed for him before submitting the form.
	 * After submitting the form, every required fields are checked again. I will verify data on server side with php, too.
	 */
	
	// First, I hide my error-html-elements:
	$('persoenlicheDaten_email_errorMessage').hide();
	$('persoenlicheDaten_passwort_errorMessage').hide();
	$('charakter_vorname_errorMessage').hide();	

	var persoenlicheDaten_email_errorMessage = false;
	var persoenlicheDaten_passwort_errorMessage = false;
	var charakter_vorname_errorMessage = false;
	var charakter_vorname_errorMessage2 = false;
	
	// When I leave "email"-field, after entering it, my method will be called:	
	$('#persoenlicheDaten_email').focusout(function(){
		validateEmail();
	});
		
	// When I leave "password"-field, after entering it, my method will be called:
	$('#persoenlicheDaten_passwort').focusout(function(){
		validatePassword();
	});
		
	// When I leave "charakter_vorname"-field, after entering it, my method will be called:
	$('#charakter_vorname').focusout(function(){
		validateCharacterName();
	});
	
	// ------------------------------------------------------------------------------------------------------------------------
	
	/* I have several methods for validation, 'cause maybe I want handle "email" or "password" different from other input-fields in future.
	 * I don't know what else I want to verify. First, it was important that my "required fields" aren't null & have at least 3 signs:
	 */
	function validateEmail(){					
		var inputField_Length = $('#' + 'persoenlicheDaten_email').val().length;
		if(inputField_Length < 3 || inputField_Length > 20){
			$('#' + 'persoenlicheDaten_email' + '_errorMessage').html("Das Pflichtfeld muss mindestens 3 Zeichen lang sein.");
			$('#' + 'persoenlicheDaten_email' + '_errorMessage').show();
			persoenlicheDaten_email_errorMessage = true;
		}else{
			$('#' + 'persoenlicheDaten_email' + '_errorMessage').hide();
			persoenlicheDaten_email_errorMessage = false;
		}				
	}
	
	function validatePassword(){					
		var inputField_Length = $('#' + 'persoenlicheDaten_passwort').val().length;
		if(inputField_Length < 3 || inputField_Length > 20){
			$('#' + 'persoenlicheDaten_passwort' + '_errorMessage').html("Das Pflichtfeld muss mindestens 3 Zeichen lang sein.");
			$('#' + 'persoenlicheDaten_passwort' + '_errorMessage').show();
			persoenlicheDaten_passwort_errorMessage = true;
		}else{
			$('#' + 'persoenlicheDaten_passwort' + '_errorMessage').hide();
			persoenlicheDaten_passwort_errorMessage = false;
		}				
	}
	
	function validateCharacterName(){					
		var inputField_Length = $('#' + 'charakter_vorname').val().length;
		if(inputField_Length < 3 || inputField_Length > 20){
			$('#' + 'charakter_vorname' + '_errorMessage').html("Das Pflichtfeld muss mindestens 3 Zeichen lang sein.");
			$('#' + 'charakter_vorname' + '_errorMessage').show();
			charakter_vorname_errorMessage = true;
		}else{
			$('#' + 'charakter_vorname' + '_errorMessage').hide();
			charakter_vorname_errorMessage = false;
		}				
	}
	
	// ------------------------------------------------------------------------------------------------------------------------
	
	// Here I'm using an AJAX request to check, if entered username (which is my "charakter vorname") is already taken:
	$('#charakter_vorname').blur(function(){
		var charakterVorname_username = $(this).val();
		$.ajax({
			url: "Main.php",
			method: "POST",
			data: {user_name: charakterVorname_username},
			dataType: "text",
			success: function(data){
				// It's a dirty solution, which I will improve later:
				if(data.includes("NO")){
					$('#charakter_vorname_errorMessage2').html('Charakter Vorname ist bereits vergeben.');
					charakter_vorname_errorMessage2 = true;
				}else{
					$('#charakter_vorname_errorMessage2').html('Charakter Vorname ist verfügbar.')
					charakter_vorname_errorMessage2 = false;
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
		
		if(charakter_vorname_errorMessage2 == false && charakter_vorname_errorMessage == false && persoenlicheDaten_passwort_errorMessage == false && persoenlicheDaten_email_errorMessage == false){
			return true;
		}else{
			return false;
		}
	});
});