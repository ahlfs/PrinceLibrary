<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-plus"></i> Edit For Account "{{ $data->username }}"</h1>
    </div>
    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-account/edit/submit/{{ $data->page_id }}" id="editaccount_form" enctype="multipart/form-data" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="myform-container">

            <div class="myform-modal">
                <div class="myform-modal__header">

                </div>
                <div class="myform-modal__body">
                    <div class="row">
                        <div class="col-6">
                            <div class="myform-input">
                                <label class="myform-input__label">Username</label>
                                <input class="myform-input__field" type="text" name="username" value="{{ $data->username }}" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Change Password</label>
                                <input class="myform-input__field" type="password" name="password" value="{{ old('', session('password')) }}" autocomplete="off">
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Confirm Password</label>
                                <input class="myform-input__field" type="password" name="confirmpassword" value="{{ old('', session('old_confirmpassword')) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="myform-input">
                                <label class="myform-input__label">Email</label>
                                <input class="myform-input__field" type="text" name="email" value="{{ $data->email }}" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Status</label>
                                <select class="myform-input__field" type="select" name="level">
                                    <option value="1" @if ($data->level == 1) selected @endif>Admin</option>
                                    <option value="0" @if ($data->level == 0) selected @endif>Viewer</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="myform-modal__footer mx-5">
                    <a onclick="confirmSubmit('editaccount_form', 'Are You Sure To Change ?')"><button type="button" class="myform-button myform-button--primary mx-1">Change</button></a>
                </div>
            </div>
        </div>
    </form>

</div>







<x-admin-footer></x-admin-footer>
