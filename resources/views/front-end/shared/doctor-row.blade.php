<div class="expert_doctors_area">
<div class="row">
<div class="col-xl-12">
<div class="expert_active owl-carousel">
    @foreach($User as $User)
        <div class="col-lg-4">
            @include('front-end.shared.doctor-card')
        </div>
    @endforeach
</div>
</div>
</div>
</div>
