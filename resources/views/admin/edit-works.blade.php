<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-plus"></i> Edit For Work Post "{{ $data->title }}"</h1>
    </div>

    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/work/edit/submit/{{ $data->page_id }}" id="editwork_form" enctype="multipart/form-data" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="myform-container">

            <div class="myform-modal">
                <div class="myform-modal__header">

                </div>
                <div class="myform-modal__body">
                    <div class="row">

                        <div class="colform-50">
                            <div class="myform-input">
                                <label class="myform-input__label">Title</label>
                                <input class="myform-input__field" type="text" value="{{ $data->title }}" name="title">
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Content</label>
                                <textarea class="myform-input__field myform-input__field--textarea" name="content">{{ $data->content }}</textarea>
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Category</label>
                                <input class="myform-input__field" type="text" value="{{ $data->category }}" name="category">
                            </div>
                            <div class="myform-input">
                                <div class="d-flex">
                                <label class="myform-input__label">Current Image</label>
                                <img class="mx-3 work-image-edit" src="{{ asset('storage/uploads/uploaded_image/' . $data->image) }}">
                                </div>
                            </div>
                        </div>
                        <div class="colform-50">
                            <div class="myform-input">
                                <label class="myform-input__label">Github Link</label>
                                <input class="myform-input__field" type="text" value="{{ $data->github_link }}" name="github_link">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Website Link</label>
                                <input class="myform-input__field" type="text" value="{{ $data->web_link }}" name="web_link">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Youtube Link (Embed)</label>
                                <input class="myform-input__field" type="text" value="{{ $data->youtube_link }}" name="youtube_link">
                            </div>
                            <div class="myform-input mt-3">
                                <label class="myform-input__label">Current Download File</label>
                                
                                <div class="d-flex text-lowercase">
                                    @if ($data->download_file)
                                    <i class="fa-solid fa-file"></i>
                                    <p class="mx-1">{{ $data->download_file }}</p>
                                    @else
                                    <i class="fa-solid fa-xmark"></i>
                                    <p class="mx-1">Empty</p>
                                    @endif
                                </div>
                                
    
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">New Download File</label>
                                <input class="myform-input__field" type="file" name="fileku">
                            </div>
                        </div>
                    </div>
                    <div class="myform-input">
                        <label class="myform-input__label" for="imageku">New Image</label>
                        <input type="file" id="filepondku" name="imageku" />
                    </div>
                </div>
                <div class="myform-modal__footer mx-5">
                    <a onclick="confirmSubmit('editwork_form', 'Are You Sure To Change ?')"><button type="button" class="myform-button myform-button--primary mx-1">Change</button></a>
                </div>
            </div>
        </div>
    </form>


</div>





<x-admin-footer></x-admin-footer>
