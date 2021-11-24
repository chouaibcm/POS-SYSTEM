@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h2> Accueil </h2>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Accueil </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="content">

            <div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{ $categories_count }}</div>
								<a href="{{ route('dashboard.categories.index') }}" class="font-14 text-secondary weight-500">Les Catégories</a>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-list"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{ $products_count }}</div>
								<a href="{{ route('dashboard.products.index') }}" class="font-14 text-secondary weight-500">Les Produits</a>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-shop"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{ $clients_count }}</div>
								<a href="{{ route('dashboard.clients.index') }}" class="font-14 text-secondary weight-500">Les Client</a>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy dw dw-deal" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{ $users_count }}</div>
								<a href="{{ route('dashboard.users.index') }}" class="font-14 text-secondary weight-500">Les Modérateurs</a>
							</div>
							<div class="widget-icon">
								<div href="{{ route('dashboard.users.index') }}" class="icon" data-color="#09cc06"><i class="icon-copy dw dw-user" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- end of row -->

            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">Graphique des ventes</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div>
                <!-- /.box-body -->
            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
@push('scripts')

    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['Total'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush
