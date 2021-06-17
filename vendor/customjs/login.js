$('document').ready(function(){

$('#btn-create-user').click(function(){
    var data = $('#cad-form').serialize();

    $.ajax({
        type : 'POST',
        url  : './src/createUser.php',
        data : data,
        dataType: 'json',
        beforeSend: function()
        {	
            $("#btn-create-user").html('Validando ...');
        },
        success :  function(response){						
            if(response.codigo == "1"){	
                alert('Sucesso ao criar usuário!!')
                document.location.reload();
            }
            else{			
                alert('Erro ao criar usuário!!');
            }
        }
    });

});

$("#btn-login").click(function(){
    var data = $("#login-form").serialize();
        
    $.ajax({
        type : 'POST',
        url  : './src/login.php',
        data : data,
        dataType: 'json',
        beforeSend: function()
        {	
            $("#btn-login").html('Validando ...');
        },
        success :  function(response){						
            if(response.codigo == "1"){	
                $("#btn-login").html('Entrar');
                $("#login-alert").css('display', 'none')
                window.location.href = "./public/home.php";
            }
            else{			
                alert('Email ou senha incorretos!');
                document.location.reload();
            }
        }
    });
});

});