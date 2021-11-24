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
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.users.index') }}"> Les
                                        modérateurs</a></li>
                                <li class="breadcrumb-item active">Ajouter</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card-box pb-10">

                <div class="card-header">
                    <h3 class="card-title">Ajouter</h3>
                </div><!-- end of box header -->

                <div class="card-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>Le nom</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        </div>

                        <div class="form-group">
                            <label>Le prénom</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="" value="" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/user_images/default.png') }}" style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>Mot de pass</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Confirmation de mot de pass</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Les permissions</label>
                            <div class="tab">

                                @php

                                    $models = ['users', 'categories', 'products', 'clients', 'orders'];

                                @endphp

                                <ul class="nav nav-tabs customtab">
                                    @foreach ($models as $index => $model)
                                        <li class="nav-item"><a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content pb-20 ">
                                    @foreach ($models as $index => $model)
                                        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="{{ $model }}">

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="permissions[]"
                                                        value="create_{{ $model }}"> Ajouter
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]"
                                                        value="read_{{ $model }}">Afficher
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]"
                                                        value="update_{{ $model }}"> Modifier
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]"
                                                        value="delete_{{ $model }}">Supprimer
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach

                                </div><!-- end of tab content -->

                            </div><!-- end of nav tabs -->

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
