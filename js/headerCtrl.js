// Requires 'sidebarLock' to work
setInterval(function() {
    let scroll = window.scrollY;
    // 'alt' is a class which will manage the logo and header appareance, from CSS.
    // if(checkIfClassExists('sidebar', 'alt')) {
    //     document.getElementById('header').classList.remove('alt');
    // } else
    if(scroll > 100) {
        document.getElementById('header').classList.add('alt');
        document.getElementById('sidebar').classList.add('topMargin');
    } else {
        document.getElementById('header').classList.remove('alt');
        document.getElementById('sidebar').classList.remove('topMargin');
    }
    return scroll;
}, 500); // Doesn't matter this little delay, plus is more CPU efficient