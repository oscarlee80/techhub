@extends ('layouts/master')
@section ('title')
Preguntas Frecuentes
@endsection
@section ('content')
<div class="container-fluid">
    <section class="row  text-left __QUS_container">
        <article class="col-12  ">
            <legend>
                <h1>Preguntas Frecuentes</h1>
            </legend>
            <br>
            <div class="p-r">
                <p class="__pregunta" tabindex="0">
                    ¿Como puedo contactar con atención al cliente?
                </p>
                <p class="__respuesta">
                    Para ponerte en contacto con nuestro servicio de atención al cliente puedes llamarnos al 43425961 de Lunes a Viernes de 08:00 a 18:00 hs
                </p>
            </div>
            <br>
            <div class="p-r">
                <p class="__pregunta" tabindex="0">
                    ¿Donde puedo encontrar información sobre ofertas especiales?
                </p>
                <p class="__respuesta">
                    Cada "página de producto" muestra, el precio, y en su caso, promociones aplicables.
                </p>
            </div>


            <br>
            <div class="p-r">
                <p class="__pregunta" tabindex="0">
                    ¿Como pago las compras realizadas en la tienda online?
                </p>
                <div class="__respuesta">
                    <p>
                        Durante el proceso de compra podrás hacer uso de los siguientes métodos de pago para poder realizar tu pedido:
                    </p>
                    <ul>
                        <li>Tarjeta VISA, Mastercard o American Express</li>
                        <li>MercadoPago</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="p-r">
                <p class="__pregunta" tabindex="0">
                    ¿Puedo financiar mi compra?
                </p>
                <p class="__respuesta">
                    Si, en la tienda online. Siempre que se cumplan los requisitos establecidos por la entidad financiera para cada importe, los clientes pueden establecer sus pagos a través de cómodas cuotas. Puedes encontrar toda la información relativa a la financiación y el proceso en <a href="https://www.hipervinculo.com">Cuotas</a>
                </p>
            </div>

            <br>
            <div class="p-r">
                <p class="__pregunta" tabindex="0" tabindex="0">
                    ¿Como puedo comprobar el estado de mi pedido?
                </p>
                <p class="__respuesta">
                    Puedes comprobar el estado de tu pedido a través de la web o el móvil. Inicia sesión en la tienda online de dirígete a "Mis pedidos" para comprobar los datos de tu pedido.
                </p>
            </div>

            <br>

            <div class="p-r">
                <p class="__pregunta" tabindex="0">
                    ¿Como puedo cancelar o modificar un pedido?
                </p>
                <div class="__respuesta">
                    <p>
                        Puedes cancelar tu pedido si no se ha iniciado el proceso de preparación en nuestro almacén. Para ello,sólo tienes que seguir los siguientes pasos.
                    </p>
                    <ol>
                        <li>Ir a mis pedidos</li>
                        <li>Inicia sesión con tu cuenta</li>
                        <li>Haz click en "cancelar"</li>
                    </ol>
                </div>
            </div>

            <br>
            <div class="otrasPreguntas">
                <form class="__form_otrasPreguntas" action="" method="POST">
                    <label>
                        Otras Preguntas
                    </label>
                    <textarea id="textarea" name="new_questions" id="vaciones" cols="50"></textarea>
                    <button class="btn-buttom btn-primary" type="submit">Enviar</button>
                </form>
            </div>

        </article>
    </section>
</div>

@endsection