<x-navbar></x-navbar>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Banner Start ***** -->
                <div class="main-banner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="header-text">
                                <h6>Ryōiki Tenkai</h6>
                                <h6>Welcome To My Domain</h6>
                                <h4><em>Browse</em> All My Works</h4>

                                <div class="main-button">
                                    <a href="/works">Get In Touch!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Banner End ***** -->

                <!-- ***** Who Am i Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Who</em> Am I ?</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-card-2"><img src="/assets/images/aku6.jpg"
                                            class="img img-responsive">
                                        <div class="profile-name">Prince Al</div>
                                    </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="about-text go-to">
                                        <h3 class="dark-color">Muhamad Alamsyah Ahlul Firdaus</h3>
                                        <h6 class="theme-color lead">A Fullstack Developer
                                        </h6>
                                        <p>I’m on a mission to create software solutions to real-world challenges. I’m
                                            always investigating the massive terrain of technology, from AI and machine
                                            learning to web development.</p>
                                        <div class="row about-list">
                                            <div class="col-md-8">
                                                <div class="media">
                                                    <label><i class="fa-brands fa-github"></i> Github</label>
                                                    <p>ahlfs</p>
                                                </div>
                                                <div class="media">
                                                    <label><i class="fa-solid fa-code"></i> Mastery</label>
                                                    <p>PHP, Javascript, Python</p>
                                                </div>
                                                <div class="media">
                                                    <label><i class="fa-solid fa-earth-asia"></i> Residence</label>
                                                    <p>Indonesia</p>
                                                </div>
                                                <div class="media">
                                                    <label><i class="fa-solid fa-heart"></i> Interest</label>
                                                    <p>Technology, Psychology, History</p>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="loader mt-5">
                                                    <div class="box1"></div>
                                                    <div class="box2"></div>
                                                    <div class="box3"></div>
                                                </div>
                                            </div>
                                            <ul class="social-icons justify-content-center align-items-center mt-4">
                                                <a target="_blank" href="https://www.instagram.com/ahlfs_">
                                                    <li class="instagram"><i class="fa-brands fa-instagram"></i></li>
                                                </a>
                                                <a target="_blank"
                                                    href="https://www.facebook.com/profile.php?id=100081067495764">
                                                    <li class="facebook"><i class="fa-brands fa-facebook"></i></li>
                                                </a>
                                                <a target="_blank"
                                                    href="https://www.linkedin.com/in/muhamad-alamsyah-ahlul-firdaus-b3652128b/">
                                                    <li class="linkedin"><i class="fa-brands fa-linkedin-in"></i></li>
                                                </a>
                                                <a target="_blank" href="https://github.com/ahlfs">
                                                    <li class="github"><i class="fa-brands fa-github-alt"></i></li>
                                                </a>
                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Who Am I End ***** -->


                <!-- ***** Send Message Start ***** -->
                <div class="gaming-library">

                    <div class="heading-section">
                        <h4><em>Send</em> Message</h4>
                    </div>

                    <form class="form" action="/email-send" method="post">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="notification">
                            <div class="notititle">Send as Anonymous <i class="fa-solid fa-masks-theater"></i></div>
                            <div class="notibody">
                                <label for="anonymousButton">
                                    <input id="anonymousButton" name="anonymous" value="on" type="checkbox">
                                    <div class="check-bg">
                                        <span class="check-span"></span>
                                    </div>
                                </label>

                            </div>
                        </div>

                        <div class="group mt-4" id="formNameMessage">
                            <input placeholder="" type="text" id="nameku" name="name" required autocomplete="off">
                            <label for="nameku">Name</label>
                        </div>
                        <div class="group" id="formEmailMessage">
                            <input placeholder="" type="email" id="emailku" name="email" required autocomplete="off">
                            <label for="emailku">Email</label>
                        </div>
                        <div class="group" id="formMessage">
                            <textarea placeholder="" id="comment" name="messageku" rows="5" required="" autocomplete="off"></textarea>
                            <label for="messageku">Message</label>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button class="buttonSubmit" type="submit"><i class="fa-solid fa-paper-plane"></i>
                            Send</button>
                        </div>
                    </form>




                </div>
                <!-- ***** Send Message End ***** -->


                <!-- ***** Other Website Start ***** -->
                <div class="gaming-library">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>My Other</em> Website</h4>
                        </div>
                        <div class="item">
                            <ul>
                                @foreach ($data as $d)
                                <div class="row">
                                    
                                    <div class="colweb-2 d-flex justify-content-center">
                                        <li class="web-image-section "><img src="{{ asset('storage/uploads/uploaded_image/' . $d->web_image) }}" alt=""></li>
                                            </div>
                                            <div class="colweb-7">
                                        <li class="web-name-section">
                                            <h4>{{ $d->web_name }}</h4><span>Social Media</span>
                                        </li>
                                        <li class="web-status-section">
                                            <h4>Status</h4>
                                            @if ($d->status == 1)
                                            <span><i class="fa-solid fa-circle-check" style="color: green"></i> Active</span>
                                            @else
                                            <span><i class="fa-solid fa-circle-xmark" style="color: red"></i> Deactive</span>
                                            @endif
                                        </li>
                                    </div>
                                    @if ($d->status == 1)
                                    <div class="colweb-3">
                                        <li>
                                            <div class="main-border-button web-visit-section"><a target="_blank"
                                                    href="https://www.melodica.my.id">Visit</a>
                                            </div>
                                        </li>
                                    </div>
                                    
                                    @endif
                                </div>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="main-button">
                            <a href="/featured">View My Projects</a>
                        </div>
                    </div>
                </div>
                <!-- ***** Other Website End ***** -->
            </div>
        </div>
    </div>
</div>

<script>
    const anonymousButton = document.getElementById("anonymousButton");
    const nameInput = document.getElementById("nameku"); // Ambil elemen input name
    const emailInput = document.getElementById("emailku"); // Ambil elemen input email
anonymousButton.addEventListener("change", () => {
    if (anonymousButton.checked) {
        document.getElementById("formNameMessage").style.display = "none";
        document.getElementById("formEmailMessage").style.display = "none";
        nameInput.required = false; // Gunakan langsung properti required
        emailInput.required = false; // Gunakan langsung properti required
        document.getElementById("formMessage").classList.add("mt-4");
    } else if (!anonymousButton.checked) {
        document.getElementById("formNameMessage").style.display = "block";
        document.getElementById("formEmailMessage").style.display = "block";
        nameInput.required = true; // Gunakan langsung properti required
        emailInput.required = true; // Gunakan langsung properti required
        document.getElementById("formMessage").classList.remove("mt-4");
    }
});
</script>

<x-footer></x-footer>
