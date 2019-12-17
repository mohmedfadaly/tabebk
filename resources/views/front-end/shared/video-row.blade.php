
 <!-- offers_area_start -->
 <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>الفديوهات</h3>
                        <p>فديوهات طبي نقدمها لكم لكي تستفيدوا منها </p>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($Video as $Video)
            <div class="col-xl-4 col-md-6 col-lg-4">
            @include('front-end.shared.video-card')
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- offers_area_end -->