@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="page-header">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h1>Les clients</h1>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i> Accueil
                                    </a></li>
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.clients.index') }}"> Les
                                        clients</a></li>
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

                    <form action="{{ route('dashboard.clients.update', $client->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>Le nom</label>
                            <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                        </div>

                        @for ($i = 0; $i < 2; $i++)
                            <div class="form-group">
                                <label>Numéro de télephone</label>
                                <input type="text" name="phone[]" class="form-control"
                                    value="{{ $client->phone[$i] ?? '' }}">
                            </div>
                        @endfor

                        <div class="form-group">
                            <label>L'adresse</label>
                            <textarea name="address" class="form-control">{{ $client->address }}</textarea>
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
