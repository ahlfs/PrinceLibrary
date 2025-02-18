<!-- Footer -->
</div>
<!-- End of Main Content -->

<footer class="sticky-footer bg-custom-black">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/admin_assets/vendor/jquery/jquery.min.js"></script>
<script src="/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/admin_assets/js/sb-admin-2.min.js"></script>


{{-- Custom --}}
<script src="/admin_assets/js/main.js"></script>
<script src="/assets/js/sweetalert.js"></script>

<script src="/admin_assets/js/filepond.js"></script>
<script src="/admin_assets/js/filepond-imagepreview.js"></script>

<script>
    const logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to logout?",
            imageUrl: "/assets/images/berpikir.jpg",
            imageWidth: 200,
            imageHeight: 200,
            imageAlt: "Custom image",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/logout';
            }
        })
    });

    FilePond.registerPlugin(FilePondPluginImagePreview);
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="filepondku"]');

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

    @if (session('postsuccess'))
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('postsuccess') }}"
        });
    @endif

    @if (session('postfailed'))
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "error",
            title: "{{ session('postfailed') }}"
        });
    @endif

    function confirmAction(targetUrl, id, text) {
        const finalUrl = targetUrl + id;
        Swal.fire({
            icon: "question",
            text: text,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            scrollbarPadding: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = finalUrl; // Redirect to delete URL if confirmed
            }
            else {
                console.log('pp');
            }
        });
    }

    function confirmSubmit(formId, text) {
        Swal.fire({
            icon: "question",
            text: text,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            scrollbarPadding: false,
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById(formId);
                if (form) {
                    form.submit();
                } else {
                    console.error("Form with ID '" + formId + "' not found.");
                    // Atau tampilkan pesan error kepada user
                    Swal.fire("Error", "Form Not Found.", "error");
                }
            }

        });
    }
</script>

</body>

</html>
