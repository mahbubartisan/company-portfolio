
<!-- Services Section -->

<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row">
          @foreach ($services as $service)
 
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">
                <img src="{{ asset($service->image) }}" alt="" style="width=100; height=100 ">
              <i class="bx bxl-dribbble"></i>
            </div>
            <h4><a href="">{{ $service->title }}</a></h4>
            <p>{{ $service->description }}</p>
          </div>
        </div>
             
        @endforeach

      </div>

    </div>
  </section><!-- End Services Section -->

  @endsection