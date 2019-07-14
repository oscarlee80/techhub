window.onload = ()=>
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

    // function validateLoginRegister()
    // {
        function holaHola()
        {
            console.log('la concha de tu puta madreeeeeeee');
            if(!element.value){
                element.className = "input_change_error"
            }else{
                element.className = "input_change"
            }
        }
    // }
   

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