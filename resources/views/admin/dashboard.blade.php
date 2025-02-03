@extends('admin.layout.mainlayout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- New Clients Card -->
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Projects</p>
                                <h5 class="font-weight-bolder">
                                    {{ $projects }} <!-- Dynamically display Project count -->
                                </h5>
                                
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
