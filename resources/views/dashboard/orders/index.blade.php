@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">

                            <h1>
                                Les commandes (<small>{{ $orders->total() }}</small>)
                            </h1>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i>Accueil</a></li>
                                <li class="breadcrumb-item active">Les commandes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card-box pb-10">

                <div class="card-header">

                    <h3 class="card-title" style="margin-bottom: 10px">Les Commandes</h3>

                    <form action="{{ route('dashboard.orders.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="Rechercher"
                                    value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                    Rechercher</button>
                            </div>

                        </div><!-- end of row -->

                    </form><!-- end of form -->

                </div><!-- end of box header -->

                @if ($orders->count() > 0)

                    <div class="card-body table-responsive">

                        <table class="data-table-nosort table nowrap">
                            <tr>
                                <th>Le nom de client</th>
                                <th>Le prix</th>
                                {{-- <th>@lang('site.status')</th> --}}
                                <th>La date d'ajout</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->client->name }}</td>
                                    <td>{{ number_format($order->total_price, 2) }}</td>
                                    {{-- <td> --}}
                                    {{-- <button --}}
                                    {{-- data-status="@lang('site.' . $order->status)" --}}
                                    {{-- data-url="{{ route('dashboard.orders.update_status', $order->id) }}" --}}
                                    {{-- data-method="put" --}}
                                    {{-- data-available-status='["@lang('site.processing')", "@lang('site.finished') "]' --}}
                                    {{-- class="order-status-btn btn {{ $order->status == 'processing' ? 'btn-warning' : 'btn-success disabled' }} btn-sm" --}}
                                    {{-- > --}}
                                    {{-- @lang('site.' . $order->status) --}}
                                    {{-- </button> --}}
                                    {{-- </td> --}}
                                    <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.orders.products', $order->id) }}"><i
                                                        class="dw dw-eye"></i> Facture</a>
                                                @if (auth()->user()->hasPermission('update_orders'))
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.clients.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}">
                                                        <i class="dw dw-edit2"></i> Modifier</a>
                                                @else
                                                    <a class="dropdown-item disabled"
                                                        href="#">
                                                        <i class="dw dw-edit2"></i> Modifier</a>

                                                @endif
                                                @if (auth()->user()->hasPermission('delete_products'))
                                                <form id="sup-form" action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <a class="dropdown-item delete" href="{{ route('dashboard.orders.destroy', $order->id) }}"><i class="dw dw-delete-3"></i>
                                                    Supprimer</a>
                                                    </form>
                                                @else
                                                <a class="dropdown-item disabled" href="#"><i class="dw dw-delete-3"></i>
                                                    Supprimer</a>
                                                @endif
                                            </div>
                                        </div>  

                                    </td>

                                </tr>

                            @endforeach

                        </table><!-- end of table -->

                        {{ $orders->appends(request()->query())->links() }}

                    </div>

                @else

                    <div class="card-body">
                        <h3>Aucune donnée disponible</h3>
                    </div>

                @endif

            </div><!-- end of box -->

    </div><!-- end of col -->

    </section><!-- end of content section -->

    </div><!-- end of content wrapper -->

@endsection
