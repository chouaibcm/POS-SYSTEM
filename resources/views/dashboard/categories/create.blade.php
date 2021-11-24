@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="page-header">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h1>Les Catégories</h1>
                        </div>

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i> Accueil
                                    </a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">
                                    Catégories</a></li>
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

                    <form action="{{ route('dashboard.categories.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>Le nom de catégorie</label>
                            <input type="text" name="name" class="form-control" value="">
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
