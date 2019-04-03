/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addUserForm = $("#addUser");
	
	var validator = addUserForm.validate({
		
		rules:{
			fname :{ required : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			password : { required : true },
			cpassword : {required : true, equalTo: "#password"},
			mobile : { required : true, digits : true },
			role : { required : true, selected : true}
		},
		messages:{
			fname :{ required : "Data harus di isi" },
			email : { required : "Data harus di isi", email : "Please enter valid email address", remote : "Email already taken" },
			password : { required : "Data harus di isi" },
			cpassword : {required : "Data harus di isi", equalTo: "Please enter same password" },
			mobile : { required : "Data harus di isi", digits : "Please enter numbers only" },
			role : { required : "Data harus di isi", selected : "Please select atleast one option" }
		}
	});
});
