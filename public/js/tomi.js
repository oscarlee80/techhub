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
    console.log(cartQuantity());

    productsHover = () =>
    {
        const products = document.querySelectorAll('.__itemoferta')

        Array.from(products).forEach(function(element){
            element.addEventListener('mouseover', function () {
                let description = element.querySelector('.__textoofertas').style.display="block";                
            })
            element.addEventListener('mouseout', function () {
                let description = element.querySelector('.__textoofertas').style.display = "none";
            })
        })
    }

    console.log(productsHover());

    
}  