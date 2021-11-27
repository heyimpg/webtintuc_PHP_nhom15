function Action(options) {
    var obj = document.querySelector(options.object);
    if (obj) {
        //submit
        obj.onsubmit = function (e) {
            if(options.form_name === 'signIn')
                signInProcess()
            if(options.form_name === 'signOut')
                signOutProcess()
            if(options.form_name === 'sendEmail') {
                sendEmailProcess();
            }
            e.preventDefault();
        }
    }
}

//Validate - form Login
Action({
    object: '#form_signIn',
    error_message: '#message_formLogin-sign_in',
    form_name: 'signIn'
}) 

//Validate - form Register
Action({
    object: '#form_signUp',
    error_message: '#message_formLogin-sign_up',
    form_name: 'signOut'
}) 

//Validate - form send Mail
Action({
    object: '#form_sendEmail',
    error_message: '#message_formEmail',
    form_name: 'sendEmail'
}) 