<x-admin-navbar></x-admin-navbar>

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-plus"></i> Add Work Post</h1>
    </div>

    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/work/add" id="addwork_form" enctype="multipart/form-data" method="post">
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
                                <input class="myform-input__field" type="text" name="title" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Content</label>
                                <textarea class="myform-input__field myform-input__field--textarea" name="content"></textarea>

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Category</label>
                                <input class="myform-input__field" type="text" name="category" autocomplete="off">

                            </div>
                        </div>
                        <div class="colform-50">
                            <div class="myform-input">
                                <label class="myform-input__label">Github Link</label>
                                <input class="myform-input__field" type="text" name="github_link" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Website Link</label>
                                <input class="myform-input__field" type="text" name="web_link" autocomplete="off">

                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Youtube Link (Embed)</label>
                                <input class="myform-input__field" type="text" name="youtube_link" autocomplete="off">
                            </div>
                            <div class="myform-input">
                                <label class="myform-input__label">Download File</label>
                                <input class="myform-input__field" type="file" name="fileku">
                            </div>
                        </div>
                    </div>
                    <div class="myform-input">
                        <label class="myform-input__label" for="imageku">Image</label>
                        <input type="file" id="filepondku" name="imageku" />
                    </div>
                </div>
                <div class="myform-modal__footer mx-5">
                    <a onclick="confirmSubmit('addwork_form', 'Are You Sure To Post This?')" ><button type="button" class="myform-button myform-button--primary">Upload</button></a>
                </div>
            </div>
        </div>






    </form>

    @if (count($data) > 0)
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-bars-progress"></i> Manage Work Post</h1>
    </div>
    @endif
 

    @foreach ($data as $d)
    <div class="myform-container">

        <div class="myform-modal">
            <div class="myform-modal__header">

            </div>
            <div class="myform-modal__body">
                <div class="row">

                    <div class="colform-50">
                        <div class="myform-input">
                            <label class="myform-input__label">Title</label>
                            <input class="myform-input__field" type="text" value="{{ $d->title }}"  disabled>

                        </div>
                        <div class="myform-input">
                            <label class="myform-input__label">Content</label>
                            <textarea class="myform-input__field myform-input__field--textarea" disabled>{{ $d->content }}</textarea>

                        </div>
                        <div class="myform-input">
                            <label class="myform-input__label">Category</label>
                            <input class="myform-input__field" type="text" value="{{ $d->category }}" disabled>

                        </div>
                        <div class="myform-input mt-3">
                            <label class="myform-input__label">Download File</label>
                            
                            <div class="d-flex text-lowercase">
                                @if ($d->download_file)
                                <i class="fa-solid fa-file"></i>
                                <p class="mx-1">{{ $d->download_file }}</p>
                                @else
                                <i class="fa-solid fa-xmark"></i>
                                <p class="mx-1">Empty</p>
                                @endif
                            </div>
                            

                        </div>
                    </div>
                    <div class="colform-50">
                        <div class="myform-input">
                            <label class="myform-input__label">Github Link</label>
                            <input class="myform-input__field" type="text" value="{{ $d->github_link }}" disabled>

                        </div>
                        <div class="myform-input">
                            <label class="myform-input__label">Website Link</label>
                            <input class="myform-input__field" type="text" value="{{ $d->web_link }}" disabled>

                        </div>
                        <div class="myform-input">
                            <label class="myform-input__label">Youtube Link (Embed)</label>
                            <input class="myform-input__field" type="text" value="{{ $d->youtube_link }}" disabled>
                        </div>

                        <div class="myform-input">
                            <div class="d-flex">
                            <label class="myform-input__label">Image</label>
                            <img class="mx-3 work-image-edit" src="{{ asset('storage/uploads/uploaded_image/' . $d->image) }}">
                        </div>
                        

                        </div>

                    </div>
                </div>
                
                
            </div>
            <div class="myform-modal__footer mx-1">
                <a href="/manage-page/work/edit/{{ $d->page_id }}"><button type="submit" class="myform-button myform-button--primary mx-1"><i class="fa-solid fa-pencil"></i> Edit</button></a>
                <a onclick="confirmAction('/manage-page/work/delete/', '{{ $d->page_id }}', 'Are You Sure To Delete {{ $d->title }} ?')"><button type="submit" class="myform-button myform-button--red mx-1"><i class="fa-solid fa-trash"></i> Delete</button></a>
            </div>
        </div>
    </div>
    @endforeach

</div>





<x-admin-footer></x-admin-footer>
