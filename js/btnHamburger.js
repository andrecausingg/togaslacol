const buttonHamburger = document.querySelector("#buttonHamburger");
const overlay = document.querySelector(".overlay");

buttonHamburger.addEventListener('click', function(){

    if(buttonHamburger.classList.contains('open')){
        buttonHamburger.classList.remove('open');
        overlay.style.display = ("none");
    }else{
        buttonHamburger.classList.add('open');
        overlay.style.display = ("block");
    }

});


console.log("hello world!");




