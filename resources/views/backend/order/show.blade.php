@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Order       <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>#</th>
            <th>Número de pedido.</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Cantidad.</th>
            <th>Cargar</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>${{$order->shipping->price}}</td>
            <td>${{number_format($order->total_amount,2)}}</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">NUEVO</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">PROCESANDO</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">ENTREGADO</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">INFORMACIÓN DEL PEDIDO</h4>
              <table class="table">
                    <tr class="">
                        <td>Número de orden</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Fecha del pedido</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Cantidad</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Estado del pedido</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>Cargo de envío</td>
                        <td> : $ {{$order->shipping->price}}</td>
                    </tr>
                    <tr>
                      <td>Coupon</td>
                      <td> : $ {{number_format($order->coupon,2)}}</td>
                    </tr>
                    <tr>
                        <td>Monto Total</td>
                        <td> : $ {{number_format($order->total_amount,2)}}</td>
                    </tr>
                    <tr>
                        <!-- <td>Payment Method</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td> -->
                        <td>Método de pago</td>
                        <td> : 
                            @if($order->payment_method == 'cod')
                                Contra reembolso
                            @elseif($order->payment_method == 'paypal')
                                Paypal
                            @elseif($order->payment_method == 'cardpay')
                                Pago con tarjeta
                            @endif
                        </td>

                    </tr>
                    <!-- <tr>
                        <td>Payment Status</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr> -->
                    <tr>
                      <td>Estado de pago</td>
                      <td> : 
                          @if($order->payment_status == 'paid')
                              <span class="badge badge-success">Pagado</span>
                          @elseif($order->payment_status == 'unpaid')
                              <span class="badge badge-danger">No pagado</span>
                          @else
                              {{$order->payment_status}}
                          @endif
                      </td>
                  </tr>

              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">INFORMACIÓN DE ENVÍO</h4>
              <table class="table">
                    <tr class="">
                        <td>Nombre completo</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Número de teléfono.</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>DIRECCIÓN</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>País</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Código postal</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
