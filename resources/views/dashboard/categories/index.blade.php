@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h2>Les Catégories (<small>{{ $categories->total() }}</small>)</h2>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}"><i
                                        class="fa fa-dashboard"></i> Accueil
                                </a></li>
                            <li class="breadcrumb-item active">Les Catégories</li>
                        </ol>
                    </nav>
                </div>
            </div>


            <section class="content">

                <div class="card-box pb-10">
                    <form action="{{ route('dashboard.categories.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 mb-20 pd-20">
                                <input type="text" name="search" class="form-control search-input" placeholder="Rechercher"
                                    value="{{ request()->search }}">
                            </div>
                            <div class="col-md-5 col-sm-12 mb-20 pd-20">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i>Chercher</button>
                                @if (auth()->user()->hasPermission('create_categories'))
                                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-info"><i
                                            class="fa fa-plus"></i>Ajouter</a>
                                @else
                                    <a href="#" class="btn btn-info disabled"><i class="fa fa-plus"></i>
                                        @lang('site.add')</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    @if ($categories->count() > 0)
                        <table class="data-table-nosort table nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="table-plus">Le nom complet</th>
                                    <th>Les produits comptent</th>
                                    <th>Les produits connexes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->products->count() }}</td>
                                        <td><a href="{{ route('dashboard.products.index', ['category_id' => $category->id]) }}"
                                                class="btn btn-info btn-sm">Les produits connexes</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                    @if (auth()->user()->hasPermission('update_categories'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('dashboard.categories.edit', $category->id) }}">
                                                            <i class="dw dw-edit2"></i> Modifier</a>
                                                    @else
                                                        <a class="dropdown-item disabled" href="#">
                                                            <i class="dw dw-edit2"></i> Modifier</a>

                                                    @endif
                                                    @if (auth()->user()->hasPermission('delete_categories'))
                                                        <form id="sup-form"
                                                            action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                                            method="POST" style="display: inline-block">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <a class="dropdown-item delete"
                                                                href="{{ route('dashboard.categories.destroy', $category->id) }}"><i
                                                                    class="dw dw-delete-3"></i>
                                                                Supprimer</a>
                                                        </form>
                                                    @else
                                                        <a class="dropdown-item disabled" href="#"><i
                                                                class="dw dw-delete-3"></i>
                                                            Supprimer</a>
                                                    @endif
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->appends(request()->query())->links() }}
                    @else

                        <h2>Aucune donnée disponible</h2>

                    @endif
                </div>
                <!-- end of box -->

            </section><!-- end of content -->

        </div><!-- end of content wrapper -->


    @endsection
