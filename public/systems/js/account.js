//TODO : Its a Completed Code
var keyOfPassword = document.getElementById('js_password_input');
keyOfPassword.addEventListener('keyup', function() {
    if(this.value.length <= 7 || this.value.length >= 20) {
        document.getElementById('form__text').innerHTML = "Minimum 8 characters";
        return false;
    } else {
        document.getElementById('form__text').innerHTML = "";
    }
});


// Event onclick show password
var btnShowPassword = document.getElementById('js__show_password');
var hide = document.getElementById("js_password_input");

btnShowPassword.addEventListener('click', function() {
    if(hide.type === 'password') {
        hide.type = 'text';
        this.src = 'https://static.thenounproject.com/png/777494-200.png';
    } else {
        hide.type = 'password';
        this.src = 'https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png';
    }
});
