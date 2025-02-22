<x-navbar></x-navbar>


  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Writing List Start ***** -->
          <div class="live-stream header-text">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>My</em> Writing</h4>
              </div>
            </div>
            <div class="row">
              @foreach ($data as $d)
              <div class="col-lg-3 col-sm-6">
                <div class="item">
                  <a href="/featured/{{ $d->page_id }}">
                  <div class="thumb">
                    <img src="{{ asset('storage/uploads/uploaded_image/' . $d->image) }}" alt="">
                    <div class="hover-effect">
                      <div class="content">
                        <ul>
                          <li><i class="fa fa-eye"></i> {{ $d->views }}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>{{ $d->title }}</h4>
                  </div> 
                </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <!-- ***** Writing List End ***** -->  

            <!-- ***** Achievement Start ***** -->
            <div class="start-stream">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>My</em> Achievement</h4>
                </div>
                <div class="row justify-content-center">
                 
                  <div class="col-lg-4">
                    <div class="item">
                      <div class="icon">
                        <img src="assets/images/bronze-trophy.png" alt="" style="max-width: 60px; border-radius: 50%;">
                      </div>
                      <h4>3rd Place</h4>
                      <p>LKS Web Technology Tingkat Provinsi 2024</p>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="main-button">
                      <a target="_blank" href="https://github.com/ahlfs">Visit Github</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ***** Achievement End ***** -->
  


        </div>
      </div>
    </div>
  </div>
  
  <x-footer></x-footer>
