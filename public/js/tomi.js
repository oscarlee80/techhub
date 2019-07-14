window.onload = ()=>
{
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

    productsHover = () =>
    {
        const products = document.querySelectorAll('.__cards')
        // console.log(products);
        

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



    // ddsvds
    // sdf
    // sf
    // dsf
    // dsf

    
}  