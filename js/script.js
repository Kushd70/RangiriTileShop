var sidebarIsOpen = true;




toggleBtn.addEventListener( 'click',(event) =>{
    event.preventDefault();

    if(sidebarIsOpen){

    dashboard_sidebar.style.width = '20%';
    dashboard_sidebar.style.transition = '0.5s all';
    dashboard_content_container.style.width ='90%';
    dashboard_logo.style.fontsize = '40px';
    userimage.style.width = '40px';

    menuicons = document.getElementsByClassName('menuText');
    for(var i=0; i<menuicons.length; i++){
        menuicons[i].style.display ='none';
    }
    document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
    sidebarIsOpen = false;
    }

    else{
        
    dashboard_sidebar.style.width = '30%';
    dashboard_content_container.style.width ='80%';
    dashboard_logo.style.fontsize = '80px';
    userimage.style.width = '80px';

    menuicons = document.getElementsByClassName('menuText');
    for(var i=0; i<menuicons.length; i++){
        menuicons[i].style.display ='inline-block';
    }
    document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'normal';
    sidebarIsOpen = true;
    }
    
});

// kushan -------------------------------------------------------------//

// Submenu show and hide function..
document.addEventListener('click', function(e){
    let clickedEl = e.target;

    if(clickedEl.classList.contains('showHideSubMenu')){
        let targetMenu = clickedEl.dataset.submenu;
        
        if(targetMenu != undefined){
            document.getElementById(targetMenu).style.height = '100%';
        }
    }
});

document.log(document.querySelectorAll('.liMainMenu_link'));
alert("hi");
// kushan----------------------------------------------------------------//