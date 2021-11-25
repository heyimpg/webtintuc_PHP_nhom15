function Validator(options) {
    var obj = document.querySelector(options.object);
    if (obj) {
        obj.onsubmit = function (e) {
            if(options.form_name === 'signIn')
                signInProcess()
            if(options.form_name === 'signOut')
                signOutProcess()
            e.preventDefault();
        }
    }
}

//Validate - form Login
Validator({
    object: '#form_signIn',
    error_message: '#message_formLogin-sign_in',
    form_name: 'signIn'
}) 

//Validate - form Register
Validator({
    object: '#form_signUp',
    error_message: '#message_formLogin-sign_up',
    form_name: 'signOut'
}) 