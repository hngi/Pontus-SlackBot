function validateForm(){
    let fullname = $('#fullname').val();
    let username = $('#username').val();
    let email = $('#email').val();
    let password = $('#password').val();

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    fullname = $.trim(fullname); 
    username = $.trim(username);
    email = $.trim(email);
    password = $.trim(password);

    if (fullname == '') {
        $('#fullname').parent().addClass('hasError')   
        $('.alert').html('Fullname cannot be empty').show();
        return false;
    }else if(username == ''){
        $('#username').parent().addClass('hasError')   
        $('.alert').html('Username cannot be empty').show();
        return false;
    }else if(!email.match(mailformat)){
       $('#email').parent().addClass('hasError')
       $('.alert').html('Email address is not valid').show();
       return false;
    }else if(password == ''){
        $('#password').parent().addClass('hasError')
        $('.alert').html('Password cannot be empty').show();
        return false;

    }else{
        $('.alert').hide();

        return true
    }



}