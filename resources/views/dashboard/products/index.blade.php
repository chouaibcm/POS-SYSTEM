@extends('layouts.dashboard.app')
@section('style')

    <style>
        .fifty-chars {
            overflow: hidden;
            display: block;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* number of lines to show */
            -webkit-box-orient: vertical;
        }

    </style>

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">

                            <h1>Les produits</h1>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i> Accueil</a></li>
                                <li class="breadcrumb-item active">Les produits</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

        </section>

        <section class="content">

            <div class="card-box pb-10">
                <div class="container">

                    <div class="card-header with-border box-shadow">

                        <h3 class="card-title" style="margin-bottom: 15px">Les produits
                            <small>{{ $products->total() }}</small>
                        </h3>

                        <form action="{{ route('dashboard.products.index') }}" method="get">

                            <div class="row">

                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="Rechercher"
                                        value="{{ request()->search }}">
                                </div>

                                <div class="col-md-4">
                                    <select name="category_id" class="form-control">
                                        <option value="">Tous les catégories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                        Rechercher</button>
                                    @if (auth()
            ->user()
            ->hasPermission('create_products'))
                                        <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> Ajouter</a>
                                    @else
                                        <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Ajouter</a>
                                    @endif
                                </div>

                            </div>
                        </form><!-- end of form -->

                    </div><!-- end of box header -->

                    <div class="card-box-body pb-10">

                        @if ($products->count() > 0)

                            <table class="data-table table nowrap">

                                <thead>
                                    <tr>
                                        <th class="datatable-nosort">#</th>
                                        <th>Le nom</th>
                                        <th class="datatable-nosort">La catégorie</th>
                                        <th class="datatable-nosort">Image</th>
                                        <th>Prix de vente</th>
                                        <th>Le stoke</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td><img src="{{ $product->image_path }}" style="width: 100px"
                                                    class="img-thumbnail" alt=""></td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item"
                                                            href="{{ route('dashboard.products.show', $product->id) }}"><i
                                                                class="dw dw-eye"></i> Afficher</a>
                                                        @if (auth()->user()->hasPermission('update_products'))
                                                            <a class="dropdown-item"
                                                                href="{{ route('dashboard.products.edit', $product->id) }}">
                                                                <i class="dw dw-edit2"></i> Modifier</a>
                                                        @else
                                                            <a class="dropdown-item disabled"
                                                                href="{{ route('dashboard.products.edit', $product->id) }}">
                                                                <i class="dw dw-edit2"></i> Modifier</a>

                                                        @endif
                                                        @if (auth()->user()->hasPermission('delete_products'))
                                                        <form id="sup-form" action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                                            {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <a class="dropdown-item delete" href="{{ route('dashboard.products.destroy', $product->id) }}"><i class="dw dw-delete-3"></i>
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
                                </tbody>

                            </table><!-- end of table -->

                            {{ $products->appends(request()->query())->links() }}

                        @else

                            <h2>Aucune donnée disponible</h2>

                        @endif

                    </div><!-- end of box body -->

                </div>


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
