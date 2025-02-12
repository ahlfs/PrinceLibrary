<x-admin-navbar></x-admin-navbar>

<link href="/admin_assets/css/filepond.css" rel="stylesheet" />

<link rel="stylesheet" href="/admin_assets/css/admin-form.css">

<!-- Begin Page Content -->
<div class="page-content mx-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100"><i class="fa-solid fa-wrench"></i> Manage Featured Page</h1>
    </div>

    <!-- From Uiverse.io by Admin12121 -->
    <form action="/manage-page/featured/add" enctype="multipart/form-data" method="post">
        @csrf <!-- {{ csrf_field() }} -->
    <div class="myform-container">

        <div class="myform-modal">
            <div class="myform-modal__header">

            </div>
            <div class="myform-modal__body">
                <div class="myform-input">
                    <label class="myform-input__label">Title</label>
                    <input class="myform-input__field" type="text" name="title">
                    <p class="myform-input__description">The title must contain a maximum of 32 characters</p>
                </div>
                <div class="myform-input">
                    <label class="myform-input__label">Description</label>
                    <textarea class="myform-input__field myform-input__field--textarea" name="content"></textarea>
                    <p class="myform-input__description">Give your project a good description so everyone know what's it
                        for
                    </p>
                </div>
                <div class="myform-input">
                    <label class="myform-input__label" for="imageku">Image</label>
                    <input type="file" id="imageku" name="imageku" />

                </div>
            </div>
            <div class="myform-modal__footer mx-5">
                <button type="submit" class="myform-button myform-button--primary">Upload</button>
            </div>
        </div>
    </div>
    </form>

</div>





<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="imageku"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: '/temporary/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },


        }
    });
</script>

<x-admin-footer></x-admin-footer>
