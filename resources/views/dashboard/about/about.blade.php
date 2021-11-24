@extends('layouts.dashboard.app')

@section('content')

<div class="min-height-200px">
    <div class="container pd-0">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title text-center">
                        <h2>A propos des fondateurs</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-directory-list">
            <ul class="row">
                <div class="col-md-3"></div>
                <li class="col-md-6">
                    <div class="contact-directory-box">
                        <div class="contact-dire-info text-center">
                            <div class="contact-avatar">
                                <span>
                                <img src="{{asset('uploads/about/2.JPG')}}" alt="">
                                </span>
                            </div>
                            <div class="contact-name">
                                <h4>Zeghoum Chouaib</h4>
                                <p>Full Stuck Web Developer </p>
                                <div class="work text-success"><i class="ion-android-person"></i> Freelancer</div>
                            </div>
                            <div class="contact-skill">
                                <span class="badge badge-pill">Laravel</span>
                                <span class="badge badge-pill">Bootstrap</span>
                                <span class="badge badge-pill">Javascript</span>
                            </div>
                        </div>
                        <div class="view-contact">
                            <a href="#">chochouaib@gmail.com</a>
                        </div>
                    </div>
                </li>
                <div class="col-md-3"></div>
            </ul>
        </div>
    </div>
</div>


@endsection
