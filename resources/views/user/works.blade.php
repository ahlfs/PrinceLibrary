<x-navbar></x-navbar>



  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

        

          <!-- ***** Other Start ***** -->
          <div class="other-games header-text">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>My</em> Works</h4>
                </div>
              </div>
              @foreach ($data as $d)
                
      
              <div class="col-lg-6">
                <div class="item">
                  <a href="/works/{{ $d->page_id }}">
                  <img src="{{ asset('storage/uploads/uploaded_image/' . $d->image) }}" alt="" class="templatemo-item">
                  <h4>{{ $d->title }}</h4><span>Click To View</span></a>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
          <!-- ***** Other End ***** -->

          

        </div>
      </div>
    </div>
  </div>
  
  <x-footer></x-footer>
