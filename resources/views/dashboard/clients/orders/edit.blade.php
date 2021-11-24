@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="page-header">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h2>Modifier une commande</h2>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i> Accueil</a></li>
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.clients.index') }}">Les
                                        Clients</a></li>
                                <li class="breadcrumb-item active">Modifier une commande</u></li>
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

                            <h3 class="card-title" style="margin-bottom: 10px">@lang('site.categories')</h3>

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
                                                                <td>{{ $product->sale_price }}</td>
                                                                <td>
                                                                    <a href="" id="product-{{ $product->id }}"
                                                                        data-name="{{ $product->name }}"
                                                                        data-id="{{ $product->id }}"
                                                                        data-price="{{ $product->sale_price }}"
                                                                        class="btn {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'btn-default disabled' : 'btn-success add-product-btn' }} btn-sm">
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

                            <h3 class="card-title">@lang('site.orders')</h3>

                        </div><!-- end of box header -->

                        <div class="card-body">

                            @include('partials._errors')

                            <form
                                action="{{ route('dashboard.clients.orders.update', ['order' => $order->id, 'client' => $client->id]) }}"
                                method="post">

                                {{ csrf_field() }}
                                {{ method_field('put') }}

                                <table class="data-table-nosort table nowrap">
                                    <thead>
                                        <tr>
                                            <th>Le pruduit</th>
                                            <th>La quantité</th>
                                            <th>Le prix</th>
                                        </tr>
                                    </thead>

                                    <tbody class="order-list">

                                        @foreach ($order->products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td><input type="number" name="products[{{ $product->id }}][quantity]"
                                                        data-price="{{ number_format($product->sale_price, 2) }}"
                                                        class="form-control input-sm product-quantity" min="1"
                                                        value="{{ $product->pivot->quantity }}"></td>
                                                <td class="product-price">
                                                    {{ number_format($product->sale_price * $product->pivot->quantity, 2) }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm remove-product-btn"
                                                        data-id="{{ $product->id }}"><span
                                                            class="fa fa-trash"></span></button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table><!-- end of table -->

                                <h4>Total : <span class="total-price">{{ number_format($order->total_price, 2) }}</span>
                                </h4>

                                <button class="btn btn-primary btn-block" id="form-btn"><i class="fa fa-edit"></i> Modifier
                                    la commande</button>

                            </form><!-- end of form -->

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                    @if ($client->orders->count() > 0)

                        <div class="card-box pb-10 mt-2">

                            <div class="card-header">

                                <h3 class="card-title" style="margin-bottom: 10px">Les commandes précédentes
                                    <small>{{ $orders->total() }}</small>
                                </h3>

                            </div><!-- end of box header -->

                            <div class="card-body">

                                @foreach ($orders as $order)

                                    <div class="panel-group">

                                        <div class="panel panel-success">

                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse"
                                                        href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toFormattedDateString() }}</a>
                                                </h4>
                                            </div>

                                            <div id="{{ $order->created_at->format('d-m-Y-s') }}"
                                                class="panel-collapse collapse">

                                                <div class="panel-body">

                                                    <ul class="list-group">
                                                        @foreach ($order->products as $product)
                                                            <li class="list-group-item">{{ $product->name }}</li>
                                                        @endforeach
                                                    </ul>

                                                </div><!-- end of panel body -->

                                            </div><!-- end of panel collapse -->

                                        </div><!-- end of panel primary -->

                                    </div><!-- end of panel group -->

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
