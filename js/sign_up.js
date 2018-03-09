
function check(value) { 

	new SimpleAjax('users_info_array.php','GET','User_Name='+value,on_success,on_failure);
 } 

// add an error message as the new content of
// the element 'tooltip'and make that element visible
function on_failure(request) {
	alert("an error occured");
}

// add the result of the AJAX request as the new content
// of the element 'tooltip' and make that element visible
function on_success(request) {
	var trans = document.getElementById("CheckInfo");
	trans.style.visibility="visible";
	trans.innerHTML = request.responseText;
}

function checkUserNameEmpty(){ 
var name = document.getElementById("inputName"); 
	if(name.value.length==0){ 
	//alert("user name"); 
	name.focus(); 
	var wrong_info_obj = document.getElementById("CheckInfo");
	wrong_info_obj.style.visibility="visible";
	wrong_info_obj.innerHTML = "user name is empty";
	return false; 
	}else{return true;} 
} 

function checkPassWord(){
	var password1_obj = document.getElementById("inputPassword1");
	if(password1_obj.value.length==0){ 
		password1_obj.focus(); 

		var wrong_info_obj = document.getElementById("CheckPassWord");
		wrong_info_obj.style.visibility="visible";
		wrong_info_obj.innerHTML = "user name is empty";

		return false; 
	}else{
		return true;
	} 

	
}
function checkPassWordEnsure(){
	var password1_value = document.getElementById("inputPassword1").value;
	var password2_value = document.getElementById("inputPassword2").value;
	var wrong_info_obj = document.getElementById("CheckPassWordEnsure");
	if(password1_value!==password2_value){		
		wrong_info_obj.style.visibility="visible";
		wrong_info_obj.innerHTML = "The password ensure is not the same as password, make password same";
		document.getElementById("inputPassword2").focus();
		return false;
	}else {
		wrong_info_obj.style.visibility="hidden";
		wrong_info_obj.innerHTML = "";
		return true;}
}
function Check_Email(value) { 

	new SimpleAjax('users_info_array.php','GET','Email='+value,on_success_email,on_failure);

 } 
 function on_success_email(request) {
	var Email = document.getElementById("CheckEmail");
	Email.style.visibility="visible";
	Email.innerHTML = request.responseText;
	
}
 function Check_EmailEmpty(){
 	var Email = document.getElementById("inputEmail"); 
	if(Email.value.length==0){ 
	Email.focus(); 
	var wrong_info_obj = document.getElementById("CheckEmail");
	wrong_info_obj.style.visibility="visible";
	wrong_info_obj.innerHTML = "Email is empty";
	return false; 
	}else{return true;} 
 }
function checkpass(){
	if(checkUserNameEmpty()==false){
		return false;
	}else if(checkPassWord()==false){	
		return false;
	}else if(checkPassWordEnsure()==false){	
		return false;
	}else if(Check_EmailEmpty()==false){	
		return false;
	}else return true;

}


