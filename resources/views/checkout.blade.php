@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Lista de productos -->
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Producto</th>
                            <th style="width:10%">Precio</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['precio'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-4 hidden-xs">
                                            <img src="{{ asset('/storage/' . $details['imagen']) }}" width="100" height="100" class="img-responsive"/>
                                        </div>
                                        <div class="col-sm-8">
                                            <h4 class="nomargin">{{ $details['nombre'] }}</h4>
                                            <p>Cantidad: {{ $details['quantity'] }}</p>
                                            <!-- Puedes mostrar más detalles del producto aquí si es necesario -->
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ $details['precio'] }}</td>
                                <td data-th="Subtotal" class="text-center">${{ $details['precio'] * $details['quantity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-right"><h3><strong>Total</strong></h3></td>
                            <td class="text-center"><h3><strong>${{ $total }}</strong></h3></td>
                        </tr>
                    </tfoot>
                </table>
                <a href="{{ route('cart') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Modificar el Carrito</a>
        </div>
        <div class="col-md-6">
            <!-- Formulario de pago -->
            <h3>Datos de Pago</h3>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre_tarjeta">Nombre en la tarjeta</label>
                    <input type="text" name="nombre_tarjeta" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_tarjeta">Número de tarjeta</label>
                    <input type="text" name="numero_tarjeta" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_vencimiento">Fecha de vencimiento</label>
                    <input type="text" name="fecha_vencimiento" class="form-control" placeholder="MM/AA" required>
                </div>
                <div class="form-group">
                    <label for="codigo_seguridad">Código de seguridad (CVV/CVC)</label>
                    <input type="text" name="codigo_seguridad" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cantidad_cuotas">Cantidad de cuotas</label>
                    <select name="cantidad_cuotas" class="form-control" required>
                        <option value="1">3 cuotas</option>
                        <option value="2">6 cuotas</option>
                        <option value="3">9 cuotas</option>
                        <option value="3">12 cuotas</option>
                        <!-- Agrega más opciones según las cuotas disponibles -->
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-money"></i> Procesar Pago</button>
            </form>
        </div>
    </div>
</div>
<hr class="mt-5">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: `{{ route('update_cart') }}`,
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Quieres eliminar el producto del carrito?")) {
            $.ajax({
                url: `{{ route('remove_from_cart') }}`,
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
