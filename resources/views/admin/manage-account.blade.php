<x-admin-navbar></x-admin-navbar>
<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
   <div class="d-flex">
    <a class="accept fw-bold mx-3" href="/manage-account/add">
        <span class="fw-bold text-uppercase"><i class="fa-solid fa-plus"></i> Add Account</span>
    </a>
</div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5  ">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-gear"></i> Manage Account</h1>
    </div>
    <div class="d-flex mt-3 manage-acc">
    @foreach ($data as $d)
        <div class="cookie-card mt-3 mx-3">
            <div class="row">
                <div class="col-6">
                    <span class="title text-uppercase">
                        <div class="d-flex manage-acc">
                        @if ($d->level == 1)
                            <span class="badge badge-primary"><i class="fa-solid fa-crown"></i> ADMIN</span>
                        @elseif ($d->level == 0)
                            <span class="badge badge-secondary"><i class="fa-solid fa-eye"></i> VIEWER</span>
                        @endif
                        @if ($d->username == session()->get('username')) <span class="badge badge-success mx-1"><i class="fa-solid fa-desktop"></i> SESSION</span> @endif
                    </div>
                        <p class="fw-bold">
                            {{ $d->username }}
                        </p>
                    </span>
                </div>
                <div class="col-6">
                    <div class="actions d-flex justify-content-end manage-acc-button">
                        <a class="accept" href="/manage-account/edit/{{ $d->page_id }}">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        <a onclick="confirmAction('/manage-account/delete/', '{{ $d->page_id }}', 'Delete Account : {{ $d->username }} ?')" class="accept-red">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    <div class="actions d-flex justify-content-end">
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach</div>

</div>







<x-admin-footer></x-admin-footer>
