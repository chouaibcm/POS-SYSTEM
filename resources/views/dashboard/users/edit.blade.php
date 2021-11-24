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
                                <li class="breadcrumb-item active">Modifier</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card-box pb-10">

                <div class="card-header">
                    <h3 class="card-title">Modifier</h3>
                </div><!-- end of box header -->

                <div class="card-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.users.update', $user->id) }}" method="post"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>Le nom</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>Le prénom</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $user->image_path }}" style="width: 100px" class="img-thumbnail image-preview"
                                alt="">
                        </div>

                        <div class="form-group">
                            <label>Les permissions</label>
                            <div class="tab">

                                @php
                                    $models = ['users', 'categories', 'products', 'clients', 'orders'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs customtab">
                                    @foreach ($models as $index => $model)
                                        <li class="nav-item"><a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content pb-20">

                                    @foreach ($models as $index => $model)

                                        <div class="tab-pane fade{{ $index == 0 ? 'show active' : '' }}"
                                            id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                {{-- create_users --}}
                                                <label><input type="checkbox" name="permissions[]"
                                                        {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }}
                                                        value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->

                            </div><!-- end of nav tabs -->

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
