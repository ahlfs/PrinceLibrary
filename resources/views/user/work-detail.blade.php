<x-navbar></x-navbar>

<link rel="stylesheet" href="/assets/css/work.css">

<div class="container">

    <div class="page-content">

        <!-- ***** Work Banner Start ***** -->

        <div class="feature-banner header-text">
            
                
                @if ($data->youtube_link)
                <div class="row">
                <div class="col colku1 d-flex justify-content-center">
                    <img src="{{ asset('storage/uploads/uploaded_image/' . $data->image) }}" class="work-image"
                        alt="" style="border-radius: 23px;">
                </div>
                    <div class="col colku2">
                        <div class="thumb mx-auto d-flex justify-content-end align-content-center">
                            <iframe width="100%" height="100%" src="{{ $data->youtube_link }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                    @else
                    <div class="row d-flex justify-content-center">
                    <div class="col colku1 d-flex justify-content-center">
                        <img src="{{ asset('storage/uploads/uploaded_image/' . $data->image) }}" class="work-image"
                            alt="" style="border-radius: 23px;">
                    </div>
                </div>
                @endif




          
        </div>

        <!-- ***** Work Banner End ***** -->

        <!-- ***** Work Details Start ***** -->
        <div class="game-details">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $data->title }}</h2>
                </div>
                <div class="col-lg-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="left-info">
                                    <div class="row rowbro-50">
                                        <div class="colbro-50">
                                            <div class="left">
                                                <h4>{{ $data->title }}</h4>
                                                <span>{{ $data->category }}</span>
                                            </div>
                                        </div>
                                        <div class="colbro-50">
                                            <ul>
                                                <li><i class="fa-solid fa-rotate-right"></i>@if ($edit_date != null) {{ $edit_date }} @else No Update Yet @endif </li>
                                                <li><i class="fa-regular fa-calendar"></i> {{ $upload_date }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-info">
                                    <div class="row">

                                        <div class="col colbro-33">


                                            <p class="text"> <i class="fa-solid fa-code"></i> Source Code</p>
                                            @if ($data->github_link)
                                                <p class="status-yes"><i class="fa-regular fa-circle-check"></i> Yes</p>
                                            @else
                                                <p class="status-no"><i class="fa-regular fa-circle-xmark"></i> No</p>
                                            @endif


                                        </div>
                                        <div class="col colbro-33">


                                            <p class="text"><i class="fa-solid fa-globe"></i> Website</p>
                                            @if ($data->web_link)
                                                <p class="status-yes"><i class="fa-regular fa-circle-check"></i> Yes</p>
                                            @else
                                                <p class="status-no"><i class="fa-regular fa-circle-xmark"></i> No</p>
                                            @endif

                                        </div>
                                        <div class="col colbro-33">


                                            <p class="text"> <i class="fa fa-download"></i> Download</p>
                                            @if ($data->download_file)
                                                <p class="status-yes"><i class="fa-regular fa-circle-check"></i> Yes</p>
                                            @else
                                                <p class="status-no"><i class="fa-regular fa-circle-xmark"></i> No</p>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p>{{ $data->content }}</p>
                            </div>
                            @if ($data->github_link)
                                <div class="col-lg-12">
                                    <div class="main-border-button">
                                        <a href="{{ $data->github_link }}"><i class="fa-brands fa-github fa-xl"></i>
                                            Visit Github Repository</a>
                                    </div>
                                </div>
                            @endif
                            @if ($data->web_link)
                                <div class="col-lg-12">
                                    <div class="main-border-button">
                                        <a href="{{ $data->web_link }}"><i class="fa-solid fa-globe fa-xl"></i> Visit
                                            Website</a>
                                    </div>
                                </div>
                            @endif
                            @if ($data->download_file)
                                <div class="col-lg-12">
                                    <div class="main-border-button">
                                        <a href="/works/download/{{ $data->page_id }}"><i
                                                class="fa-solid fa-file-arrow-down fa-xl"></i> Download</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Work Details End ***** -->

    </div>

</div>

<x-footer></x-footer>
