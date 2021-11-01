function checkIfClassExists(id, classToFind) {
    const classes = document.getElementById(id).classList;
    for(let i = 0;i < classes.length;i++) {
        if(classes[i] == classToFind)
            return true;
    }
    return false;
}