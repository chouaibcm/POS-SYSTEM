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
                                            class="fa fa-dashboard"></i> Accueil
                                    </a></li>
                                <li class="breadcrumb-item "><a href="{{ route('dashboard.products.index') }}"> Les
                                        Produits</a></li>
                                <li class="breadcrumb-item active">Détail du produit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="product-detail-wrap mb-30">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pd-20 card-box">
                            <h4 class="mb-20 pt-20">Image de produit:</h4>
                        <div class="product-slider slider-arrow">
                            <div class="product-slide">
                                <img src="{{ $product->image_path }}" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            @php
                            foreach($categories as $category){
                                if ($product->category_id == $category->id) {
                                    $cat= $category->name;
                                }
                            }
                            @endphp
                            <h4 class="mb-10 pt-20">Catégorie: {{ $cat}}</h4>
                            <h4 class="mb-20 pt-20">Le nom: {{ $product->name }}</h4>
                            <p><h5>discription:</h5> </p>
                            <p>{!! $product->description !!}</p>
                            <div class="price pt-20">
                                <p><h5>Prix d'achat: </h5> {{ $product->purchase_price }} DA</p>
                                <p><h5>Prix de vent: </h5> {{ $product->sale_price }} DA</p>                                
                                <p><h5>Pourcentage de profit %: </h5> {{ $product->profit_percent }} %</p>                                
                                <p><h5>Le stock: </h5> {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
