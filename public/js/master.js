window.onload = function ()
{

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
        destroyForm[i].addEventListener('submit', function(event) {
            event.preventDefault();
            let choice = confirm("Se va a eliminar el registro. Está seguro?");
            if (choice) {
                this.submit();
            }
    });
    }



}