// Requires 'sidebarLock' to work
// if TRUE, the logo behaviour depends of the sidebar
setInterval(function() {
    let scroll = window.scrollY;
    // 'alt' is a class which will manage the logo and header appareance, from CSS.
    if(document.getElementById('sidebar').classList.length > 0) {
        document.getElementById('header').classList.remove('alt');
    } else if(scroll > 100) {
        document.getElementById('header').classList.add('alt');
    }
    else {
        document.getElementById('header').classList.remove('alt');
    }
    return scroll;
}, 500); // Doesn't matter this little delay, plus is more CPU efficient