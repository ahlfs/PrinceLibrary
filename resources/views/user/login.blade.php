<x-navbar></x-navbar>
<link rel="stylesheet" href="/assets/css/login.css">


<div class="container">

    <div class="page-content" style="">

        <div class="row header-text">
            <div class="col-tab1">
                <div class="d-flex justify-content-center mt-4">
                    <div class="card">
                        <div class="head"><i class="fa-solid fa-robot"></i> System</div>
                        <div class="content">
                            Are you the real prince? give it a shot!
                            <br />
                            <a href="/" draggable="false">
                                <button class="button">No, Im Not, Take me back !</button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-tab2">
                <div class="d-flex">
                    <div class="form-container ">
                        <form class="form" method="post" action="{{ route('authentication') }}">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input required="" name="username" id="username" type="text" autocomplete="off"
                                    value="{{ old('', session('old_username')) }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required="" name="password" id="password" type="password"
                                    value="{{ old('', session('old_password')) }}">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="form-submit-btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>



<x-footer></x-footer>

<script>
    @if (session('failedlog'))
        Swal.fire({
            title: "Tertangkap Kau Suki 😹",
            text: "you are not the real prince afterall.",
            imageUrl: "/assets/images/tetot.jpg",
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: "Custom image",
            confirmButtonText: "Baik bang, ga lagi-lagi",
            confirmButtonColor: "#e75e8d",

        });
    @endif
</script>