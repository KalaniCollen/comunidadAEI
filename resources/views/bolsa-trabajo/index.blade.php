@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/bolsa.css')}}">
@endsection
@section('content')
    <div id="cartgrid">
        <table id="cart-table">

    <tbody><tr class="heading">
    <th>Trabajo</th>
    <th>descripcion</th>
    <th>Salario</th>
    <th>Direccion</th>
    <th>Telefono</th>
    </tr>

    {{-- <tr class="cart-row gray" data-orderlineid="02e9151d-24b4-46ca-8e9f-a4d000adbd83">
        <td class="product-info" width="45%">
            <div class="wrap">
                <div class="small-4 columns item-thumb"><a href=""><img src="" alt="95T Achieve Treadmill"></a></div>
                <div class="small-8 columns description">
                    <div class="item-name">
                        <a href="">
                            Soporte Tecnico

                        </a>
                    </div>
                        <div class="item-num">
        <span class="item-num-sku">Con experiencia</span>
    </div>

                    <div class="availability">
                            <span class="instock">de 22-30 años</span>

                    </div>
                </div>
            </div>
        </td>
        <td class="quantity">
            <div class="wrap">
                <div class="item-qty">
                    <span class="instock">AEI</span>
                </div>

            </div>
        </td>
        <td class="price">
            <div class="wrap">
                <div class="price">
                            <span class="price">$3,599.00 semanales</span>
                </div>
            </div>
        </td>
        <td class="subtotal">
            <div class="wrap">
                <div class="price">
                        <div class="item-subtotal">
                                    Av. Año de Juárez 308, Granjas San Antonio, 09070 Ciudad de México, CDMX</div>
                </div>
            </div>
        </td>
        <td class="remove">
            <div class="wrap">
                    <div class="remove">
                        55-34-23-45-65
                    </div>
            </div>
        </td>
    </tr> --}}
@foreach ($bolsas as $key => $bolsa)
    <tr class="cart-row gray" data-orderlineid="02e9151d-24b4-46ca-8e9f-a4d000adbd83">

    <td class="product-info" width="45%">
        <div class="wrap">
            <div class="small-4 columns item-thumb"><a href=""><img src="img/DefaultEmpresa.png" alt="95T Achieve Treadmill" style="width: 36px;">{{ $bolsa->empresa }}</a></div>
            <div class="small-8 columns description">
                <div class="item-name">
                    <a href="">
                        {{ $bolsa->nombre }}

                    </a>
                </div>
                    <div class="item-num">
    <span class="item-num-sku">Con experiencia</span>
</div>

                {{-- <div class="availability">
                        <span class="instock">de 22-30 años</span>

                </div> --}}
            </div>
        </div>
    </td>
    <td class="quantity">
        <div class="wrap">
            <div class="item-qty">
                <span class="instock">{{ $bolsa->descripcion }}</span>
            </div>

        </div>
    </td>
    <td class="price">
        <div class="wrap">
            <div class="price">
                        <span class="price">${{ $bolsa->salario }}</span>
            </div>
        </div>
    </td>
    <td class="subtotal">
        <div class="wrap">
            <div class="price">
                    <div class="item-subtotal">
                                {{ $bolsa->direccion }}
                                </div>
            </div>
        </div>
    </td>
    <td class="remove">
        <div class="wrap">
                <div class="remove">
                    {{ $bolsa->telefono }}
                </div>
        </div>
    </td>
</tr>
@endforeach

        </tbody></table>
    </div>
@endsection
