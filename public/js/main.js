window.onload = function ()
{
//     let craa = /^([0-9]{2})-([0-9]{4})/;
    // console.log(craa.test("09-9233"));
    console.log('holis');

    // SHOW PRODUCT THUMBNAILS

    let principal = document.querySelector('.__productImage');
    let thumbnail = document.querySelectorAll('.__thumbnails');

    for (let index = 0; index < thumbnail.length; index++) {
        let src = thumbnail[index].getAttribute('src');
        thumbnail[index].addEventListener('click', function () {
            principal.setAttribute('src', src);

            for (let index = 0; index < thumbnail.length; index++) {
                thumbnail[index].style.border = "";
                thumbnail[index].style.boxShadow = "";
            }
            thumbnail[index].style.border = "medium solid  rgb(52, 157, 118)";
            thumbnail[index].style.boxShadow = "0 0 40px -8px rgb(52, 157, 118)";
        });

    }

    // CRUD DELETE CONFIRM

    let destroyConfirm = document.querySelectorAll('#destroyConfirm');
    let destroyForm = document.querySelectorAll('#destroyForm');

    for (var i = 0; i < destroyForm.length; i++) {
        destroyForm[i].addEventListener('submit', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Esta seguro?',
                text: "Los datos borrados no se podran recuperar",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar datos!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Datos borrados!',
                        'Datos borrados correctamente',
                        'success'
                    )
                    this.submit();
                }
            });

        });
    }
    
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
    // if (document.getElementById('submit-register')){
        let sumnitButtonRegister = document.getElementById('submit-register');
    // }
    
    let passHint = document.getElementById('__passHint');
    
    let numbersRegex = /[0-9]/;
    
    let errors = {};

// ----- FIRST NAME INPUT -----

    function empty(element){
        if (element.value == ''){
            element.className = "input_change_error";
            sumnitButtonRegister.className = "submit_button_error"
            errors = {
                'empty': 'Campo Obligatorio',
            }
        }else{
            element.className = "input_change";
            sumnitButtonRegister.className = "submit_button"
        }
    }

    if (document.getElementById('first_name')){

        let firstName_input = document.getElementById('first_name');
        firstName_input.addEventListener('blur', function(){
            empty(firstName_input);
            
            if(numbersRegex.test(firstName_input.value)){
                firstName_input.className = "input_change_error";
                sumnitButtonRegister.className = "submit_button_error"
    
                errors = {
                    'first_name': 'Debe ingresar solo letras',
                }
            }
        })
    
    
        firstName_input.addEventListener('keyup', function(){
            empty(firstName_input);
    
            if (numbersRegex.test(firstName_input.value)) {
                firstName_input.className = "input_change_error";
                sumnitButtonRegister.className = "submit_button_error"
    
                errors = {
                    'first_name': 'Debe ingresar solo letras',
                }
            }
    
        })
    }

// --------------------

// ----- LAST NAME INPUT -----
    if (document.getElementById('last_name')){

        let lastName_input = document.getElementById('last_name');
        lastName_input.addEventListener('blur', function(){
            empty(lastName_input);
    
            if (numbersRegex.test(lastName_input.value)){
                lastName_input.className = "input_change_error";
                sumnitButtonRegister.className = "submit_button_error"
            }
        })
    
        lastName_input.addEventListener('keyup', function(){
            empty(lastName_input);
            if (numbersRegex.test(lastName_input.value)){
                lastName_input.className = "input_change_error";
                sumnitButtonRegister.className = "submit_button_error"
                errors = {
                    'last_name': 'Debe ingresar solo letras',
                }
            }
        })
    }
// --------------------

// ----- EMAIL INPUT -----
    if (document.getElementById('last_name')){

        let email_input = document.getElementById('last_name');
        email_input.addEventListener('blur', function(){
            empty(email_input);
    
            if(email_input.value){
            let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
                if(!regex.test(email_input.value)){
                    email_input.className = "input_change_error"
                    sumnitButtonRegister.className = "submit_button_error"
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
                    sumnitButtonRegister.className = "submit_button_error"
                    errors = {
                        'email': 'Email invalido',
                    }
                }
            }
        })
    }
// --------------------

// ----- PASSWORD INPUT -----
    if (document.getElementById('password')){
        
        let password_input = document.getElementById('password');
        password_input.style.marginBottom = "50px";
        password_input.addEventListener('blur', function(){
            empty(password_input);
    
            if(password_input.value){
                let passRegex = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/;
                if(password_input.value.length < 8 || !passRegex.test(password_input.value)){
                    password_input.className = "input_change_error"
                    sumnitButtonRegister.className = "submit_button_error"
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
                    sumnitButtonRegister.className = "submit_button_error"
                    errors = {
                        'password': 'Contraseña debil',
                    }
                }
            }
        })
    }
// --------------------

// ----- PASSWORD CONFIRM INPUT -----
    if (document.getElementById('password_confirmation')){

        let passwordConfirm_input = document.getElementById('password_confirmation');
        passwordConfirm_input.addEventListener('blur', function(){
            empty(passwordConfirm_input);
    
            if(passwordConfirm_input.value){
                if(passwordConfirm_input.value != password_input.value){
                    passwordConfirm_input.className = "input_change_error"
                    sumnitButtonRegister.className = "submit_button_error"
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
                    sumnitButtonRegister.className = "submit_button_error"
                    errors = {
                        'password_confirm': 'Contraseñas no coinciden',
                    }
                }
            }
            
        })
    }
// --------------------
// ----- CARD NUMBER INPUT -----
    if (document.getElementById('card_number')){

        let cardNumber_input = document.getElementById('card_number');
        cardNumber_input.addEventListener('blud', function(){
            empty(cardNumber_input);

            if (cardNumber_input.value.length != 16 || !numbersRegex.test(cardNumber_input.value)){
                cardNumber_input.className = "input_change_error"
            }
        })

        cardNumber_input.addEventListener('keyup', function () {
            empty(cardNumber_input);

            if (cardNumber_input.value.length != 16 || !numbersRegex.test(cardNumber_input.value)) {
                cardNumber_input.className = "input_change_error"
            }
        })
    }

// --------------------

// ----- CARD EXPIRED DATE INPUT -----

    if (document.querySelector('#expired_date')){

        let expiredDate_input = document.querySelector('#expired_date');
        expiredDate_input.addEventListener('blur', function(){
            empty(expiredDate_input);
    
            let expiredFormat = /^([0-9]{2})-([0-9]{4})/;
    
            if (expiredDate_input.value.length > 7 || !expiredFormat.test(expiredDate_input.value)){
                expiredDate_input.className = "input_change_error"
                sumnitButtonRegister.className = "submit_button_error"
            }
    
        })

        expiredDate_input.addEventListener('keyup', function () {
            empty(expiredDate_input);

            let expiredFormat = /^([0-9]{2})-([0-9]{4}?)/;

            if (expiredDate_input.value.length > 7 || !expiredFormat.test(expiredDate_input.value)) {
                expiredDate_input.className = "input_change_error"
                sumnitButtonRegister.className = "submit_button_error"
            }

        })
    }
// --------------------

// ----- CARD CVV INPUT -----

    if(document.getElementById('cvv')){

        let cvvCard_input = document.getElementById('cvv');
        cvvCard_input.addEventListener('blur', function () {
            empty(cvvCard_input);

            if (!(cvvCard_input.value.length > 2 && cvvCard_input.value.length < 5) || !numbersRegex.test(cvvCard_input.value)) {
                cvvCard_input.className = "input_change_error"
                sumnitButtonRegister.className = "submit_button_error"
            }

        })

        cvvCard_input.addEventListener('keyup', function () {
            empty(cvvCard_input);

            if (!(cvvCard_input.value.length > 2 && cvvCard_input.value.length < 5) || !numbersRegex.test(cvvCard_input.value)) {
                cvvCard_input.className = "input_change_error"
                sumnitButtonRegister.className = "submit_button_error"
            }

        })
    }

// --------------------

// ENVIO DE FORMULARIO
    if (document.getElementById('register-form')){

        let register_form = document.getElementById('register-form');

        register_form.addEventListener('submit', sendRegistrationForm);
        function sendRegistrationForm(e) {
            e.preventDefault()
            error_class = document.getElementsByClassName("input_change_error");
            if (error_class.length == 0) {
                register_form.submit();
            }
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Porfavor, verifique los datos ingresados.'
            })
        }
    }

    if (document.getElementById('payment-form')) {

        let payment_form = document.getElementById('payment-form');

        payment_form.addEventListener('submit', sendPaymentForm);
        function sendPaymentForm(e) {
            e.preventDefault()
            error_class = document.getElementsByClassName("input_change_error");
            if (error_class.length == 0) {
                payment_form.submit();
            }
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Porfavor, verifique los datos ingresados.'
            })
        }
    }


    

 // --------------------

//    SHOW FILE NAME INSIDE INPUT FILE
    if (document.getElementById('file') && document.getElementById('fileUpload_name')){
        
        let input_file = document.getElementById('file');
        let file_name = document.getElementById('fileUpload_name');
    
        input_file.addEventListener( 'change', showFileName );
    }

    function showFileName( event ) {

        let input = event.srcElement;
        let fileName = input.files[0].name;
        file_name.innerHTML = fileName
    }

    
}  