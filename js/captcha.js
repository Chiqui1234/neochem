function captchaOnCanvas(id, body) {
    // Generate captcha in a canvas (not readable by bots)
    let canvas = document.getElementById(id);
    let ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.font = 'normal 18px Arial';
    ctx.textAlign = 'left';
    ctx. textBaseline = 'middle';
    ctx.fillStyle = '#fff';  // a color name or by using rgb/rgba/hex values
    ctx.fillText(body, 0, 10); // text and position
}

function checkCaptcha(id, realResult) {
    // Check if the user's response is identicall to 'realResult'
    const answer = parseInt(document.getElementById(id).value);
    console.log(answer, realResult);
    if(answer == realResult)
        return true;
    return false;
}

function captchaOnInput(id) {
    // Starts the captcha (embeded in form)
    num1 = Math.round(Math.random() * (8)) + 1;
    num2 = Math.round(Math.random() * (8)) + 1;
    document.getElementById(id).placeholder = `¿Cuánto es ${num1} + ${num2}?`;
    document.getElementById(id).value = '';
}

// Deprecated
function toggleCaptchaWindow() {
    const isActive = document.getElementById('captchaWindow').classList[0] == 'active';
    num1 = Math.round(Math.random() * (8)) + 1;
    num2 = Math.round(Math.random() * (8)) + 1;
    canvas('question', `${num1} + ${num2}`);
    if(isActive) {
        document.getElementById('captchaWindow').classList.remove('active');
    } else {
        document.getElementById('captchaWindow').classList.add('active');
    }
}