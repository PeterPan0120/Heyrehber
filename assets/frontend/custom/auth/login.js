$(document).ready(function(){

    $(".form-login").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "/auth/do_login",
            data: $(this).serialize(),
            type: 'post',
            success:function(res){
                console.log(res);
                if(res['status']=="success"){
                    console.log(res);
                    var role = res['role'];
                    if(role == 0)
                        window.location.href="/admin/dashboard";
                    else if(role == 3)
                        window.location.href="/agency/dashboard";
                    else if(role == 4)
                        window.location.href="/guide/dashboard";
                }
                else{
                    swal("Incorrect!", "Incorrect username or password. Please try again.", "warning");
                }
            }
        });
    });
    $(".form-login-forgot").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "/auth/do_login_forgot",
            data: $(this).serialize(),
            type: 'post',
            success:function(res){
                if(res['status']=="success"){
                    var role = res['role'];
                    if(role == 0)
                        window.location.href="/admin/dashboard";
                    else if(role == 1)
                        window.location.href="/agency/dashboard";
                    else if(role == 2)
                        window.location.href="/guide/dashboard";
                }
            }
        });
    });
});