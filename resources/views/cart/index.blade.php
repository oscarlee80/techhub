@extends('layouts.onlyNav')

@section('title')
    TechHub | Cart
@endsection

@section('content')
    <table>
   	<thead>
       	<tr>
           	<th>Product</th>
           	{{-- <th>Qty</th> --}}
           	<th>Price</th>
           	{{-- <th>Subtotal</th> --}}
       	</tr>
   	</thead>

   	<tbody>

   		@foreach($products as $product)
        
       		<tr>
           		<td>
               		<p><strong>{{$product['title']}}</strong></p>
           		</td>
           		{{-- <td><input type="text" value=""></td> Esto es para la cantidad --}}
           		<td>{{$product['price']}}</td>
                   {{-- <td>Total de la fila</td> --}}
                <td>
                    <a class="btn btn-outline-danger " role="button" href={{url('cart/remove/' . $product['id'])}}>Quitar Producto</a>
                </td>
       		</tr>

        @endforeach
            <tr>
                <a class="btn btn-outline-danger " role="button" href={{url('cart/flush')}}>Vaciar Carrito</a>
            </tr>
   	</tbody>
   	
   	<tfoot>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Subtotal</td>
   			<td></td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Tax</td>
   			<td></td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Total</td>
   			<td></td>
   		</tr>
   	</tfoot>
</table>
@endsection