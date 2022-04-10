window.addEventListener('DOMContentLoaded', event =>{
    var navbarShrink = function(){
        const navHeader = document.body.querySelector('#header');
        if(!navHeader){
            return;
        }if(window.scrollY === 0){
            navHeader.classList.remove('navbar-shrink');
        }else{
            navHeader.classList.add('navbar-shrink');
        }
    };

    navbarShrink();

    document.addEventListener('scroll',navbarShrink);
    const header = document.body.querySelector('#header');
    if(header){
        new bootstrap.ScrollSpy(document.body, {
            target: '#header',
            offset: 74,
        });
    };
})