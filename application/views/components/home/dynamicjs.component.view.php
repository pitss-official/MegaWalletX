<?php
namespace Frontend;
use Middleware\Auth;
?>
<script>
    const checkLogin=()=> {
        var login = <?= (integer)Auth::isAuthenticated() ?>;
        if(login)location.replace('<?= env('home') ?>');
    }
    const tryLogin=()=>{
        $('#login-username').removeClass('has-val-error');
        $('#login-password').removeClass('has-val-error');
        document.getElementById("login-error-message").innerHTML="";
        axios.post('/process/login',{
            userName:$("#login-username").val(),
            password:$("#login-password").val(),
        }).then(response=>{
            let data=response.data;
            if(data.result=="success")location.replace(data.url);
            else{
                $("#login-username").addClass('has-val-error');
                $("#login-password").addClass('has-val-error');
                document.getElementById("login-error-message").innerHTML=data.message;
            }
        })
    }
    const processRegister=()=>{
        let data={};
        let form= $('#register-form :input');
        form.each((index,element)=>{data[element.name]=element.value})
        axios.post('/process/register',data).then(response=>{
            //todo frontend validation requests
            let data=response.data;
            if(data.result=="success")location.replace(data.url);
        })
    }
</script>