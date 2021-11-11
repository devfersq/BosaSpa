$(document).ready(function(){

    $('.error').hide();

    $('#frmAutho').submit(event => {
        event.preventDefault();

        const postData = {
            username: $("#usernamelg").val(),
            password: $("#passwordlg").val()
        };

        $.ajax({
            url: 'logic/authentication/login.php',
            type: 'POST',
            dataType: 'json',
            data: postData,
            beforeSend: function(){
            }
        })
        .done(function(resp){
            if(!resp.error){
                location.href = 'app/dashboard.php';
            }else{
                $('.error').slideDown('slow');
                setTimeout(() => {
                    $('.error').slideUp('slow');
                }, 3000);
            }
        })
        .fail(function(resp){
            console.log(resp.responseText);
        });
    });

});