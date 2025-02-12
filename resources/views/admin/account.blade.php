<x-admin-navbar></x-admin-navbar>

                <!-- Begin Page Content -->
                <div class="page-content mx-3">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-gear"></i> Manage Account</h1>
                    </div>
                    @foreach ($admin as $a)
                    <div class="cookie-card">
                        
                        <span class="title text-uppercase"><i class="fa-solid fa-crown"></i> {{ $a->username }}</span>
                        <div class="actions d-flex justify-content-end">
                            <button class="accept">
                                <i class="fa-solid fa-gear"></i> Manage
                            </button>
                        </div>
                    </div>
                    @endforeach

                </div>



                    

           

            <x-admin-footer></x-admin-footer>

            