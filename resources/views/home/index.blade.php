@extends('main')

@section('content')
@php
    $recentActivities = App\Http\Controllers\Controller::getRecentActivities();
@endphp
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Sales <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Revenue <span>| This Month</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>$3,264</h6>
                                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Customers <span>| This Year</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1244</h6>
                                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Recent Activity <span>| Latest 20</span></h5>
                    <div class="activity">
                        @if ($recentActivities->count() > 0)
                        @foreach ($recentActivities as $activity)
                        <div class="activity-item row border-bottom border-primary">
                            <div class="activity-content">
                                <p>
                                    <div>
                                        <strong>{{ $activity->title }} by </strong>
                                        <span class="fst-italic fw-bold text-primary">{{ $activity->user->name }}</span>
                                    </div>
                                    <div><span class="fst-italic">{{ $activity->content }}</span></div>
                                </p>
                                <p>
                                    <div>
                                        <span class="float-start badge rounded-pill text-bg-{{ $activity->bs_colour }}">{{ $activity->component }}</span>
                                        <span class="float-end">{{ $activity->created_at->diffForHumans() }}</span>
                                    </div>
                                </p>
                            </div>
                        </div><!-- End activity item-->
                        @endforeach
                        @endif
                    </div>
                </div>
            </div><!-- End Recent Activity -->
        </div><!-- End Right side columns -->
    </div>
</section>

@endsection
