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
                        <form class="form">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input required="" name="username" id="email" type="text" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required="" name="password" id="password" type="password">
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
