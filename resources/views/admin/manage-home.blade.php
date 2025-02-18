<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-plus"></i> Add Home Post</h1>
    </div>
    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/home/add" enctype="multipart/form-data" method="post">
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
                                <input class="myform-input__field" type="text" name="web_name" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Category</label>
                                <input class="myform-input__field" type="text" name="category" autocomplete="off">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="myform-input">
                                <label class="myform-input__label">Web Link</label>
                                <input class="myform-input__field" type="text" name="web_link" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Status</label>
                                <select class="myform-input__field" type="select" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Deactive</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="myform-input">
                                <label class="myform-input__label" for="filepondku">Image</label>
                                <input type="file" id="filepondku" name="imageku" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="myform-modal__footer">
                    <button type="submit" class="myform-button myform-button--primary">Upload</button>
                </div>
            </div>
        </div>
    </form>

    @if (count($data) > 0)
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-bars-progress"></i> Manage Home Post</h1>
    </div>
    @endif

    @foreach ($data as $d)
        <div class="myform-container">

            <div class="myform-modal">
                <div class="myform-modal__body">
                    <div class="row">
                        <div class="col-6">

                            <div class="myform-input">
                                <label class="myform-input__label">Web Name</label>
                                <input class="myform-input__field" type="text" value="{{ $d->web_name }}" disabled>

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Category</label>
                                <input class="myform-input__field" type="text" value="{{ $d->category }}" disabled>

                            </div>

                            <div class="myform-input">
                                <div class="d-flex">
                                    <label class="myform-input__label">Image</label>
                                    <img class="mx-3 work-image-edit"
                                        src="{{ asset('storage/uploads/uploaded_image/' . $d->web_image) }}">
                                </div>
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="myform-input">
                                <label class="myform-input__label">Web Link</label>
                                <input class="myform-input__field" type="text" value="{{ $d->web_link }}" disabled>

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Status</label>
                                <select class="myform-input__field" type="select" disabled>
                                    <option @if ($d->status == 1) selected @endif>Active</option>
                                    <option @if ($d->status == 0) selected @endif>Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="myform-modal__footer mx-1">
                    <a href="/manage-page/home/edit/{{ $d->page_id }}"><button type="submit"
                            class="myform-button myform-button--primary mx-1"><i class="fa-solid fa-pencil"></i>
                            Edit</button></a>
                    <a
                        onclick="confirmAction('/manage-page/home/delete/', '{{ $d->page_id }}', 'Are You Sure To Delete {{ $d->web_name }} ?')"><button
                            type="submit" class="myform-button myform-button--red mx-1"><i
                                class="fa-solid fa-trash"></i> Delete</button></a>
                </div>
            </div>
        </div>
    @endforeach




</div>








<x-admin-footer></x-admin-footer>
