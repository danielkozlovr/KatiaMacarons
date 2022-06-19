var bt = document.querySelector('#hiperligacao');
var bt2 = document.querySelector('#a');
var login =  document.querySelector('.login');
var registo =  document.querySelector('.registo');

bt.addEventListener('click', function(){
    if(login.style.display === "none")
    {
        login.style.display = 'block';
    }
    else{
        login.style.display = 'none';
        registo.style.display = 'block';

    }
})

bt2.addEventListener('click', function(){
    if(registo.style.display === "none")
    {
        registo.style.display = 'block';
    }
    else{
        registo.style.display = 'none';
        login.style.display = 'block';

    }
})