/* login form validation*/
$( "#login" ).validate({
  rules: {
    email: {
      required: true,
      email:true
    },
    password: {
      required: true
    }

  }
});
//*Register Form Validation*/
$( "#registration" ).validate({
  rules: {
    name: {
      required: true,
      minlength : 6,
      maxlength: 20
    }
    ,email: {
      required: true,
      email:true
    },
    password: {
      required: true,
       minlength : 6
    },
    password_confirmation: {
      required: true,
      minlength : 6,
      equalTo : "#formpassword"
    }

  }
});
/*clients Form Valiadtion*/
$( ".client" ).validate({
  rules: {
    title: {
      required: true,
      minlength : 6,
      maxlengthlength: 100
    }
    ,description: {
      required: true,
       minlength : 6,
       maxlength: 300
    },
    status: {
      required: true,
      minlength : 6,
      maxlength:100
    },
    contact_phone: {
      required: true,
      digits: true,
    },
    contract_start: {
      required: true,
      date: true,
    },
    contract_end: {
      required: true,
       date: true,
    }
  }
});
/*services Form Valiadtion*/
$( ".services" ).validate({
  rules: {
    title: {
      required: true,
      minlength : 6,
      maxlength: 100
    }
    ,type: {
      required: true,
       minlength : 6,
       maxlength: 100
    },
    link: {
      required: true,
      url : true,
    },
    description: {
      required: true,
       maxlength: 300
    },
  }
});
/*if inputs fields of login form submited withour data,make input border red*/
jQuery(document).ready(function() {
    $('.login-form input[type="email"], .login-form input[type="password"]').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	$(this).find('input[type="email"], input[type="password"], input[type="checkbox"]').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    });
    
//if inputs fields of register form submited withour data,make input border red
    $('.registration-form input[type="text"], .registration-form input[type="email"],.registration-form input[type="password"], .registration-form password').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.registration-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"],input[type="email"],input[type="password"]').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
});
