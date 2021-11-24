@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <!-- header of facture -->
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h2>Facture de la commande </h2>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}"><i
                                        class="fa fa-dashboard"></i> Acceil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">Les commandes</a>
                            </li>
                            <li class="breadcrumb-item active">Facture</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="card-box pb-10">
                    <div class="card-header pb-10">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 pd-20">
                                <h3 class="box-title" style="margin-bottom: 10px">Facture</h3>
                            </div>
                        </div>
                    </div><!-- end of box header -->

                    <div class="card-body table-responsive pb-10">

                        <div id="print-area">
                            <div class="invoice-wrap">
                                <div class="invoice-box">
                                    <div class="invoice-header">
                                        <div class="logo text-center">
                                            <img src="vendors/images/deskapp-logo.png" alt="">
                                        </div>
                                    </div>
                                    <h4 class="text-center mb-30 weight-600 pb-30">FACTURE</h4>
                                    <div class="row pb-30">
                                        <div class="col-md-6">
                                            <h5 class="mb-15">{{$order->client->name}}</h5>
                                            <p class="font-14 mb-5">Adresse : <strong class="weight-600">{{$order->client->address}}</strong></p>
                                            <p class="font-14 mb-5">Telephone : <strong class="weight-600">{{ is_array($order->client->phone) ? implode($order->client->phone, '-') : $order->client->phone }}</strong></p>
                                            <p class="font-14 mb-5">Date d'ordre: <strong class="weight-600">{{$order->created_at->format('d-m-Y')}}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-right">
                                                <p class="font-14 mb-5">Your Name </p>
                                                <p class="font-14 mb-5">Your Address</p>
                                                <p class="font-14 mb-5">City</p>
                                                <p class="font-14 mb-5">Postcode</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-desc pb-30">
                                        <div class="invoice-desc-head clearfix">
                                            <div class="invoice-sub">Nom de produit</div>
                                            <div class="invoice-rate">Quantite</div>
                                            <div class="invoice-subtotal">Prix</div>
                                        </div>
                                        <div class="invoice-desc-body">
                                            <ul>
                                                @foreach ($products as $product)
                                                <li class="clearfix">
                                                    <div class="invoice-sub">{{ $product->name }}</div>
                                                    <div class="invoice-rate">{{ $product->pivot->quantity }}</div>
                                                    <div class="invoice-subtotal"><span class="weight-600">{{ number_format($product->pivot->quantity * $product->sale_price, 2) }}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="invoice-desc-footer">
                                            <div class="invoice-desc-head clearfix">
                                                <div class="invoice-sub">Client</div>
                                                <div class="invoice-rate">Date d'ordre</div>
                                                <div class="invoice-subtotal">Total</div>
                                            </div>
                                            <div class="invoice-desc-body">
                                                <ul>
                                                    <li class="clearfix">
                                                        <div class="invoice-sub">
                                                            <p class="font-14 mb-5"><strong
                                                                    class="weight-600">{{$order->client->name}}</strong></p>
                                                        </div>
                                                        <div class="invoice-rate font-20 weight-600">{{$order->created_at->format('d-m-Y')}}</div>
                                                        <div class="invoice-subtotal"><span
                                                                class="weight-600 font-24 text-danger">{{ number_format($order->total_price, 2) }}</span></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-center pb-20">Merci!!</h4>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i>
                            Imprimer
                    </div>
            </div>
        </section>
    </div>
@endsection
