@extends('layouts.dashboard.app')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- categories--}}
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-bag"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">@lang('site.categories')</span>
                        <span class="info-box-number">{{ $categories_count }}</span>
                      </div>
                      <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box -->
                  </div>
                 {{-- <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $categories_count }}</h3>

                            <p>@lang('site.categories')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
 --}}
                {{--products--}}
               {{--  <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $products_count }}</h3>

                            <p>@lang('site.products')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">@lang('site.products') </span>
                        <span class="info-box-number">{{ $products_count }}</span>
                      </div>
                      <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box -->
                  </div>


                {{--clients--}}
                {{-- <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $clients_count }}</h3>

                            <p>@lang('site.clients')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
 --}}
 <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">@lang('site.clients') </span>
        <span class="info-box-number">{{ $clients_count }}</span>
      </div>
      <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <!-- /.info-box -->
  </div>

                {{--users--}}
                {{-- <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $users_count }}</h3>

                            <p>@lang('site.users')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
 --}}
 <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">@lang('site.users') </span>
        <span class="info-box-number">{{ $users_count }}</span>
      </div>
      <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <!-- /.info-box -->
  </div>


            </div><!-- end of row -->

            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">Sales Graph</h3>
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
            labels: ['@lang('site.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush
