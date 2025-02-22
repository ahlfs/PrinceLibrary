<x-navbar></x-navbar>

<link rel="stylesheet" href="/assets/css/featured.css">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Writing Details Start ***** -->
                <div class="game-details header-text">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <div class="d-flex justify-content-end">
                                    <label for="translateButton" class="switch" aria-label="Toggle Filter">
                                        <input id="translateButton" type="checkbox"/>
                                        <span>Indo</span>
                                        <span>Eng</span>
                                    </label>
                                </div>

                                <h2>{{ $data->title }}</h2>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="assets/images/details-01.jpg" alt=""
                                            style="border-radius: 23px; margin-bottom: 30px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="assets/images/details-02.jpg" alt=""
                                            style="border-radius: 23px; margin-bottom: 30px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="assets/images/details-03.jpg" alt=""
                                            style="border-radius: 23px; margin-bottom: 30px;">
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="indolang" id="indolang">{{ $data->content }}</p>

                                        <p class="englang" id="englang">{{ $data->content_english }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Writing Details End ***** -->

            </div>
        </div>
    </div>
</div>

<script>
  document.getElementById("englang").style.display = "none";
  const translateButton = document.getElementById("translateButton");
translateButton.addEventListener("change", () => {
    if (translateButton.checked) {
        document.getElementById("indolang").style.display = "none";
        document.getElementById("englang").style.display = "block";
        console.log("kuontoll");
    } else {
        document.getElementById("indolang").style.display = "block";
        document.getElementById("englang").style.display = "none";
    }
});
</script>

<x-footer></x-footer>
