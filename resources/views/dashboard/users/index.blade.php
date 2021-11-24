@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">

                            <h1>Les modérateurs</h1>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">


                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i> Accueil
                                    </a></li>
                                <li class="breadcrumb-item active">Les modérateurs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">


            <div class="card-box pb-10">

                <div class="card-header with-border box-shadow">

                    <h3 class="card-title" style="margin-bottom: 15px">Les modérateurs
                        <small>{{ $users->total() }}</small></h3>

                    <form action="{{ route('dashboard.users.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Rechercher"
                                    value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-search"></i>Rechercher</button>
                                @if (auth()
            ->user()
            ->hasPermission('create_users'))
                                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> Ajouter</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Ajouter</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="card-body">

                    @if ($users->count() > 0)

                        <table class="data-table-nosort table nowrap">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Le nom</th>
                                    <th>Le prénom</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ $user->image_path }}" style="width: 100px;" class="img-thumbnail"
                                                alt=""></td>
                                        <td>
                                           <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                    @if (auth()->user()->hasPermission('update_users'))
                                                        <a class="dropdown-item"
                                                            href="{{ route('dashboard.users.edit', $user->id) }}">
                                                            <i class="dw dw-edit2"></i> Modifier</a>
                                                    @else
                                                        <a class="dropdown-item disabled" href="#">
                                                            <i class="dw dw-edit2"></i> Modifier</a>

                                                    @endif
                                                    @if (auth()->user()->hasPermission('delete_users'))
                                                        <form id="sup-form"
                                                            action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                            method="POST" style="display: inline-block">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <a class="dropdown-item delete"
                                                                href="{{ route('dashboard.users.destroy', $user->id) }}"><i
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

                        </table><!-- end of table -->

                        {{ $users->appends(request()->query())->links() }}

                    @else

                        <h3>Aucune donnée disponible</h3>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->


        </section><!-- end of content -->


    </div><!-- end of content wrapper -->


@endsection
