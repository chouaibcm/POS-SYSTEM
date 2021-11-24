@extends('layouts.dashboard.app')

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
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.welcome') }}"><i
                                            class="fa fa-dashboard"></i>Accueil
                                    </a></li>
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.products.index') }}"> Les
                                        produits</a></li>
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

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>Les categoriés</label>
                            <select name="category_id" class="form-control">
                                <option value="">Tous les categoriés</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Le nom</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control ckeditor"></textarea>
                        </div>



                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/product_images/default.png') }}" style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>Prix d'achat</label>
                            <input type="number" name="purchase_price" step="0.01" class="form-control"
                                value="{{ old('purchase_price') }}">
                        </div>

                        <div class="form-group">
                            <label>Prix de vente</label>
                            <input type="number" name="sale_price" step="0.01" class="form-control"
                                value="{{ old('sale_price') }}">
                        </div>

                        <div class="form-group">
                            <label>Le stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
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
