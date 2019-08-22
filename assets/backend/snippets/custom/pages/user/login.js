$(document).ready(function(){
    $(".form-login").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "/auth/do_login",
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