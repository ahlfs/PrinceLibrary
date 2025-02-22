<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-plus"></i> Add Writing Post</h1>
    </div>

    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/writing/add" enctype="multipart/form-data" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="myform-container">

            <div class="myform-modal">
                <div class="myform-modal__header">

                </div>
                <div class="myform-modal__body">
                    <div class="myform-input">
                        <label class="myform-input__label">Title</label>
                        <input class="myform-input__field" type="text" name="title" autocomplete="off">

                    </div>
                    <div class="myform-input">
                        <label class="myform-input__label">Content (Indonesia)</label>
                        <textarea class="myform-input__field myform-input__field--textarea" name="content"></textarea>
                    </div>
                    <div class="myform-input">
                        <label class="myform-input__label">Content (English)</label>
                        <textarea class="myform-input__field myform-input__field--textarea" name="content_english"></textarea>
                    </div>
                    <div class="myform-input">
                        <label class="myform-input__label" for="imageku">Image</label>
                        <input type="file" id="filepondku" name="imageku" />

                    </div>
                </div>
                <div class="myform-modal__footer mx-5">
                    <button type="submit" class="myform-button myform-button--primary">Upload</button>
                </div>
            </div>
        </div>
    </form>

    @if (count($data) > 0)
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-bars-progress"></i> Manage Writing Post</h1>
    </div>
    @endif


    @foreach ($data as $d)
        <div class="myform-container">

            <div class="myform-modal">



                <div class="myform-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="myform-input">
                                <label class="myform-input__label">Title</label>
                                <input class="myform-input__field" type="text" name="title" autocomplete="off"
                                    value="{{ $d->title }}" disabled>

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Content (Indonesia)</label>
                                <textarea class="myform-input__field myform-input__field--textarea" name="content" disabled>{{ $d->content }}</textarea>
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Content (English)</label>
                                <textarea class="myform-input__field myform-input__field--textarea" name="content_english" disabled>{{ $d->content_english }}</textarea>
                            </div>
                        </div>
                        <div class="colform-50 mt-3">
                            <div class="myform-input">
                                <div class="d-flex">
                                    <label class="myform-input__label">Image</label>
                                    <img class="mx-3 work-image-edit"
                                        src="{{ asset('storage/uploads/uploaded_image/' . $d->image) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="myform-modal__footer mx-1">
                    <a href="/manage-page/writing/edit/{{ $d->page_id }}"><button type="submit"
                            class="myform-button myform-button--primary mx-1"><i class="fa-solid fa-pencil"></i>
                            Edit</button></a>
                    <a
                        onclick="confirmAction('/manage-page/writing/delete/', '{{ $d->page_id }}', 'Are You Sure To Delete {{ $d->title }} ?')"><button
                            type="submit" class="myform-button myform-button--red mx-1"><i
                                class="fa-solid fa-trash"></i> Delete</button></a>
                </div>
            </div>
        </div>
    @endforeach

</div>

<x-admin-footer></x-admin-footer>
