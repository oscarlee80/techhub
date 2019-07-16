window.onload = function ()
{
    let principal = document.querySelector('.__productImage');
    let thumbnail = document.querySelectorAll('.__thumbnails');
    
    for (let index = 0; index < thumbnail.length; index++) {
        let src = thumbnail[index].getAttribute('src');
        thumbnail[index].addEventListener('click', function () {
            principal.setAttribute('src', src);
            thumbnail[index].style.border = "thin solid  rgb(52, 157, 118)";
        });
        
    }
}