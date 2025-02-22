<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-plus"></i> Edit For Writing Post "{{ $data->title }}"</h1>
    </div>

    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/writing/edit/submit/{{ $data->page_id }}" id="editwriting_form"
        enctype="multipart/form-data" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="myform-container">

            <div class="myform-modal">
                <div class="myform-modal__header">

                </div>
                <div class="myform-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="myform-input">
                                <label class="myform-input__label">Title</label>
                                <input class="myform-input__field" type="text" name="title"
                                    value="{{ $data->title }}" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Content (Indonesia)</label>
                                <textarea class="myform-input__field myform-input__field--textarea" name="content">{{ $data->content }}</textarea>
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Content (English)</label>
                                <textarea class="myform-input__field myform-input__field--textarea" name="content_english">{{ $data->content_english }}</textarea>
                            </div>
                        </div>
                        <div class="colform-50 mt-3">
                            <div class="myform-input">
                                <div class="d-flex">
                                    <label class="myform-input__label">Current Image</label>
                                    <img class="mx-3 work-image-edit"
                                        src="{{ asset('storage/uploads/uploaded_image/' . $data->image) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="myform-input">
                                <label class="myform-input__label" for="imageku">Image</label>
                                <input type="file" id="filepondku" name="imageku" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="myform-modal__footer mx-5">
                    <a onclick="confirmSubmit('editwriting_form', 'Are You Sure To Change ?')"><button type="button"
                            class="myform-button myform-button--primary mx-1">Change</button></a>
                </div>
            </div>
        </div>
    </form>

</div>

<x-admin-footer></x-admin-footer>
