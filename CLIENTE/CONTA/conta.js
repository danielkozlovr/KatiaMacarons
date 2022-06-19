var cemail = document.querySelector('#mostrar_esconder');
var email =  document.querySelector('.email');

cemail.addEventListener('click', function(){
    if(email.style.display === "block")
    {
        email.style.display = 'none';
    }
    else{
        email.style.display = 'block';
    }
})

var cemail2 = document.querySelector('#mostrar_esconder2');
var pass =  document.querySelector('.pass');

cemail2.addEventListener('click', function(){
    if(pass.style.display === "block")
    {
        pass.style.display = 'none';
    }
    else{
        pass.style.display = 'block';
    }
})