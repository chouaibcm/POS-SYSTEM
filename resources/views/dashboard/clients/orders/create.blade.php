@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="page-header">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">

                            <h1>Ajouter commande</h1>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i> Accueil
                                    </a></li>
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.clients.index') }}">Clients</a>
                                </li>
                                <li class="breadcrumb-item active">Ajouter commande</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-md-6">

                    <div class="card-box pb-10">

                        <div class="card-header">

                            <h3 class="card-title" style="margin-bottom: 10px">Catégories</h3>

                        </div><!-- end of box header -->

                        <div class="card-body">

                            @foreach ($categories as $category)

                                <div class="panel-group">

                                    <div class="panel panel-info">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse"
                                                    href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                            </h4>
                                        </div>

                                        <div id="{{ str_replace(' ', '-', $category->name) }}"
                                            class="panel-collapse collapse">

                                            <div class="panel-body">

                                                @if ($category->products->count() > 0)

                                                    <table class="data-table-nosort table nowrap">
                                                        <tr>
                                                            <th>Le nom</th>
                                                            <th>Le stock</th>
                                                            <th>Le prix</th>
                                                            <th>Ajouter</th>
                                                        </tr>

                                                        @foreach ($category->products as $product)
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ $product->stock }}</td>
                                                                <td>{{ number_format($product->sale_price, 2) }}</td>
                                                                <td>
                                                                    <a href="" id="product-{{ $product->id }}"
                                                                        data-name="{{ $product->name }}"
                                                                        data-id="{{ $product->id }}"
                                                                        data-price="{{ $product->sale_price }}"
                                                                        class="btn btn-success btn-sm add-product-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </table><!-- end of table -->

                                                @else
                                                    <h5>Aucune donnée disponible</h5>
                                                @endif

                                            </div><!-- end of panel body -->

                                        </div><!-- end of panel collapse -->

                                    </div><!-- end of panel primary -->

                                </div><!-- end of panel group -->

                            @endforeach

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                </div><!-- end of col -->

                <div class="col-md-6">

                    <div class="card-box pb-10">

                        <div class="card-header">

                            <h3 class="card-title">Les commandes</h3>

                        </div><!-- end of box header -->

                        <div class="card-body">

                            <form action="{{ route('dashboard.clients.orders.store', $client->id) }}" method="post">

                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                @include('partials._errors')

                                <table class="data-table-nosort table nowrap">
                                    <thead>
                                        <tr>
                                            <th>Le produits</th>
                                            <th>Quantité</th>
                                            <th>Le prix</th>
                                        </tr>
                                    </thead>

                                    <tbody class="order-list">


                                    </tbody>

                                </table><!-- end of table -->

                                <h4>Total : <span class="total-price">0</span></h4>

                                <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i
                                        class="fa fa-plus"></i> Ajouter commande</button>

                            </form>

                        </div><!-- end of box body -->

                    </div><!-- end of box -->
                    @if ($client->orders->count() > 0)



                        <div class="card-box pb-10 mt-2">

                            <div class="card-header">
                                <h5 class="card-title" style="margin-bottom: 10px">Les Commandes précédentes
                                    <small>{{ $orders->total() }}</small>
                                </h5>

                            </div><!-- end of box header -->

                            <div class="card-body">

                                @foreach ($orders as $order)


                                    <div class="dropdown">
                                        <a class=" dropdown-toggle" href="#" data-toggle="dropdown">
                                            {{ $order->created_at->toFormattedDateString() }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @foreach ($order->products as $product)
                                                <ul>
                                                    <li class="dropdown-item">{{ $product->name }}</li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                 
                                @endforeach

                                {{ $orders->links() }}

                            </div><!-- end of box body -->

                        </div><!-- end of box -->

                    @endif



                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
