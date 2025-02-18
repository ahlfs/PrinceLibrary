<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-wrench"></i> Manage Home Page</h1>
    </div>
    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/home/edit/submit/{{ $data->page_id }}" id="edithome_form" enctype="multipart/form-data" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="myform-container">

            <div class="myform-modal">
                <div class="myform-modal__header">

                </div>
                <div class="myform-modal__body">
                    <div class="row">
                        <div class="col-6">
                            <div class="myform-input">
                                <label class="myform-input__label">Web Name</label>
                                <input class="myform-input__field" type="text" name="web_name" value="{{ $data->web_name }}" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Category</label>
                                <input class="myform-input__field" type="text" name="category" value="{{ $data->category }}" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <div class="d-flex">
                                    <label class="myform-input__label">Current Image</label>
                                    <img class="mx-3 work-image-edit"
                                        src="{{ asset('storage/uploads/uploaded_image/' . $data->web_image) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="myform-input">
                                <label class="myform-input__label">Web Link</label>
                                <input class="myform-input__field" type="text" name="web_link" value="{{ $data->web_link }}" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Status</label>
                                <select class="myform-input__field" type="select" name="status">
                                    <option value="1" @if ($data->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($data->status == 0) selected @endif>Deactive</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="myform-input">
                                <label class="myform-input__label" for="filepondku">New Image</label>
                                <input type="file" id="filepondku" name="imageku" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="myform-modal__footer mx-5">
                    <a onclick="confirmSubmit('edithome_form', 'Are You Sure To Change ?')"><button type="button" class="myform-button myform-button--primary mx-1">Change</button></a>
                </div>
            </div>
        </div>
    </form>

</div>







<x-admin-footer></x-admin-footer>
