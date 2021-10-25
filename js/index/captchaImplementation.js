let num1 = 0;
let num2 = 0;

captchaOnInput('captcha');

function checkFormData() {
    const subject = document.getElementById('subject').value;
    const name = document.getElementById('name').value;
    const telephone = document.getElementById('telephone').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    let success = true;
    if( subject === undefined || subject == 'Asunto') {
        success = false;
        document.getElementById('subject').classList.add('error');
    } 
    if( name.split(' ').length < 2 ) {
        success = false;
        document.getElementById('name').classList.add('error');
    }
    if( telephone.length < 8 ) {
        success = false;
        document.getElementById('telephone').classList.add('error');
    } 
    if( !checkEmail(email) ) {
        success = false;
        document.getElementById('email').classList.add('error');
    }
    if( message.split(' ').length < 5 ) {
        success = false;
        document.getElementById('message').classList.add('error');
    }
    // Si el Asunto está seteado, 'name' tiene al menos un nombre y apellido, el teléfono tiene al menos 8 caracteres, el email es válido y el mensaje tiene más de 5 palabras => Se considera formulario válido
    return success;
}

function checkForm(formId) {
    const captchaResult = checkCaptcha('captcha', num1+num2);
    if(captchaResult) {
        const formStatus = checkFormData('contactHomePage'); // Check if the fields of the form are fullfilled
        if(formStatus) {
            document.getElementById(formId).submit();
        } else {
            captchaOnInput('captcha'); // Re-new captcha's math
            alert('Revisá los campos incorrectos, marcados en rojo.');
        }
    } else {
        captchaOnInput('captcha'); // Re-new captcha's math
        alert('Por favor, resolvé el ejercicio matemático para comprobar que no sos un robot.')
    }
}