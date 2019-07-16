
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

    function empty(element){
        if (element.value == ''){
            element.className = "input_change_error"
            console.log('error');
        }else{
            element.className = "input_change"
        }
    }

    let firstName_input = document.getElementById('first_name');
    firstName_input.addEventListener('blur', function(){
        empty(firstName_input);
        
        if(!isNaN(firstName_input.value)){
            firstName_input.className = "input_change_error"
        }
    })


    firstName_input.addEventListener('keyup', function(){
        empty(firstName_input);
    })
        firstName_input.addEventListener('keyup', function(){
        if(!isNaN(firstName_input.value)){
            firstName_input.className = "input_change_error"
        }
    })
// --------------------

// ----- LAST NAME INPUT -----

    let lastName_input = document.getElementById('last_name');
    lastName_input.addEventListener('blur', function(){
        empty(lastName_input);

        if(!isNaN(lastName_input.value)){
            lastName_input.className = "input_change_error"
        }
    })

    lastName_input.addEventListener('keyup', function(){
        empty(lastName_input);
        if(!isNaN(lastName_input.value)){
            lastName_input.className = "input_change_error"
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
            }
        }
    })

    email_input.addEventListener('keyup', function(){
        empty(email_input);

        if(email_input.value){
        let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
            if(!regex.test(email_input.value)){
                email_input.className = "input_change_error"
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
            }
        }
    })

    password_input.addEventListener('keyup', function(){
        empty(password_input);

        if(password_input.value){
            let passRegex = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/;
            console.log(!passRegex.test(password_input.value));

            if(password_input.value.length < 8 || !passRegex.test(password_input.value)){
                console.log('entreeeeee');
                password_input.className = "input_change_error"
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
            }
        }
    })

    passwordConfirm_input.addEventListener('keyup', function(){
        empty(passwordConfirm_input);

        if(passwordConfirm_input.value){
            if(passwordConfirm_input.value != password_input.value){
                passwordConfirm_input.className = "input_change_error"
            }
        }
    })
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

    function sendRegistrationForm(e) {
        e.preventDefault()

        // 
    }

    let form = document.getElementById('register-form')

    form.addEventListener('submit', sendRegistrationForm)
    
}  