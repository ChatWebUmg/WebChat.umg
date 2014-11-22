var url = "//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"; 
document.write("<script src='"+url+"'></script>"); 
$(document).ready(function() {
	
	jQuery("[name=password_input]").attr('id','password_input');
    jQuery("[name=password_input]").attr('type','password');
});

