<div class="col-lg-3 col-sm-12">
    <div class="single_feature">
        <div class="single_feature_part">
            <span class="single_feature_icon"><img src="{{ asset('front/img/icon/feature_1.svg') }}" alt=""></span>
            <h4>{{ $service->service_name }}</h4>
            <h5 class="text-primary"><a >{{ $service->department->name }}</a></h5>
            <p>{{ $service->discription }}</p>

            <p class="text-success">${{$service->service_charge}}</p>
        </div>
    </div>
</div>
