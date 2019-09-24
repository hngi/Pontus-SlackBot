function validateForm(){
    let username = $('#username').val();
    let password = $('#password').val();

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    
     username = $.trim(username);
     password = $.trim(password);

    if(username == ''){
        $('#username').parent().addClass('hasError')   
        $('.alert').html('Username cannot be empty').show();
        return false;
    }else if(!username.match(mailformat)){
       $('#username').parent().addClass('hasError')
       $('.alert').html('Username is not valid').show();
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