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


let pathArray = window.location.pathname.split('/');
let curFile = pathArray[pathArray.length - 1];

let curNav = document.querySelector('a[href="./'+ curFile +'"]');
let mainNav = curNav.closest(li)
console.log(curNav);
// kushan----------------------------------------------------------------//