<x-admin-navbar></x-admin-navbar>
<link rel="stylesheet" href="/admin_assets/css/admin-message.css">
<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-chart-simple"></i> Statistic</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Admin Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataAdmin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Writing Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataWriting }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-scroll fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Work Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataWork }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-screwdriver-wrench fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Message Sent</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($dataMessage) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($dataMessage) > 0)
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-envelope"></i> Message</h1>
        </div>
    @endif

    <div class="d-flex">
        @foreach ($dataMessage as $d)
            <div class="mx-3 mt-3">
                <div class="notifications-container">
                    <div class="success">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <div class="success-prompt-wrap">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="success-prompt-heading">Message !</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="success-prompt-heading">{{ $d->send_date }}</p>
                                    </div>
                                </div>
                                <p class="success-prompt-heading">{{ $d->sender_name }}<br>{{ $d->sender_email }}</p>
                                <div class="success-prompt-prompt">
                                    <p>{{ $d->sender_message }}</p>
                                </div>
                                <div class="success-button-container">
                                    <button onclick="confirmAction('/dashboard/delete-message/', '{{ $d->id }}', 'Delete Message From : {{ $d->sender_name }} ?')" type="button" class="success-button-main"><i class="fa-solid fa-trash"></i> Delete</button>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>


<x-admin-footer></x-admin-footer>
