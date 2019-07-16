
window.onload = function ()
{
    // UPDATE PRODUCT QUANTITY IN CART

    cartQuantity = () =>
    {
        const className = document.querySelectorAll('.product_quantity')

        Array.from(className).forEach(function(element) {
            element.addEventListener('change', function(){
                const id = element.getAttribute('product_id')
                const form = element.parentElement.submit()
            })
        })
    }

    cartQuantity();

    // DISPLAY DESCRIPTION ON PRODUCT'S CARD

    productsHover = () =>
    {
        const products = document.querySelectorAll('.__cards')

        Array.from(products).forEach(function(element){
            element.addEventListener('mouseover', function () {
                let description = element.querySelector('.__textoofertas').style.display="flex";
                let price = element.querySelector('.__comprar').style.position="unset"
            })
            element.addEventListener('mouseout', function () {
                let description = element.querySelector('.__textoofertas').style.display = "none";
                let price = element.querySelector('.__comprar').style.position = "absolute"

            })
        })
    }

    productsHover()

    // LOGIN & REGISTER VALIDATION

// ----- FIRST NAME INPUT -----

    function validateFirstName(txt) {

    }

    function addErrorClass(el, cn = '') {
        el.className.classList.toggle(cn)
    }

    let numbersRegex = /[0-9]/;

    let errors = {};

    // console.log(errors);

    function empty(element){
        if (element.value == ''){
            element.className = "input_change_error"
            errors = {
                'empty': 'Campo Obligatorio',
            }
        }else{
            element.className = "input_change"
        }
    }


    let firstName_input = document.getElementById('first_name');
    firstName_input.addEventListener('blur', function(){
        empty(firstName_input);
        
        if(numbersRegex.test(firstName_input.value)){
            firstName_input.className = "input_change_error"

            errors = {
                'first_name': 'Debe ingresar solo letras',
            }
        }
    })


    firstName_input.addEventListener('keyup', function(){
        empty(firstName_input);

        if (numbersRegex.test(firstName_input.value)) {
            firstName_input.className = "input_change_error"

            errors = {
                'first_name': 'Debe ingresar solo letras',
            }
        }

    })

// --------------------

// ----- LAST NAME INPUT -----

    let lastName_input = document.getElementById('last_name');
    lastName_input.addEventListener('blur', function(){
        empty(lastName_input);

        if (numbersRegex.test(lastName_input.value)){
            lastName_input.className = "input_change_error"
        }
    })

    lastName_input.addEventListener('keyup', function(){
        empty(lastName_input);
        if (numbersRegex.test(lastName_input.value)){
            lastName_input.className = "input_change_error"
            errors = {
                'last_name': 'Debe ingresar solo letras',
            }
        }
    })
// --------------------

// ----- EMAIL INPUT -----
    
    let email_input = document.getElementById('email');
    email_input.addEventListener('blur', function(){
        empty(email_input);

        if(email_input.value){
        let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
            if(!regex.test(email_input.value)){
                email_input.className = "input_change_error"
                errors = {
                    'email': 'Email invalido',
                }
            }
        }
    })

    email_input.addEventListener('keyup', function(){
        empty(email_input);

        if(email_input.value){
        let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
            if(!regex.test(email_input.value)){
                email_input.className = "input_change_error"
                errors = {
                    'email': 'Email invalido',
                }
            }
        }
    })
// --------------------

// ----- PASSWORD INPUT -----
    
    let password_input = document.getElementById('password');
    password_input.addEventListener('blur', function(){
        empty(password_input);

        if(password_input.value){
            let passRegex = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/;
            if(password_input.value.length < 8 || !passRegex.test(password_input.value)){
                password_input.className = "input_change_error"
                errors = {
                    'password': 'Contraseña debil',
                }
            }
        }
    })

    password_input.addEventListener('keyup', function(){
        empty(password_input);

        if(password_input.value){
            let passRegex = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/;

            if(password_input.value.length < 8 || !passRegex.test(password_input.value)){
                password_input.className = "input_change_error"
                errors = {
                    'password': 'Contraseña debil',
                }
            }
        }
    })
// --------------------

// ----- PASSWORD CONFIRM INPUT -----
    let passwordConfirm_input = document.getElementById('password_confirmation');
    passwordConfirm_input.addEventListener('blur', function(){
        empty(passwordConfirm_input);

        if(passwordConfirm_input.value){
            if(passwordConfirm_input.value != password_input.value){
                passwordConfirm_input.className = "input_change_error"
                errors = {
                    'password_confirm': 'Contraseñas no coinciden',
                }
            }
        }
    })

    passwordConfirm_input.addEventListener('keyup', function(){
        empty(passwordConfirm_input);

        if(passwordConfirm_input.value){
            if(passwordConfirm_input.value != password_input.value){
                passwordConfirm_input.className = "input_change_error"
                errors = {
                    'password_confirm': 'Contraseñas no coinciden',
                }
            }
        }
        
    })
// --------------------

// ENVIO DE FORMULARIO


    let register_form = document.getElementById('register-form')

    register_form.addEventListener('submit', sendRegistrationForm);

    function sendRegistrationForm(e) {
        e.preventDefault()
        error_class = document.getElementsByClassName("input_change_error");
        if (error_class.length == 0) {
            register_form.submit();
        }
    }
 // --------------------

//    SHOW FILE NAME INSIDE INPUT FILE

    let input_file = document.getElementById('file');
    let file_name = document.getElementById('fileUpload_name');

    input_file.addEventListener( 'change', showFileName );

    function showFileName( event ) {

        let input = event.srcElement;
        let fileName = input.files[0].name;
        file_name.innerHTML = fileName
    }

    
}  