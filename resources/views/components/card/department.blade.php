<div class="single_our_depertment">
    <span class="our_depertment_icon"><img src="{{ asset('front/img/icon/dep.jpeg') }}" alt=""></span>
    <h4><a href="{{ route('d.show',$deprtment->id) }}">{{ $deprtment->name }}</a></h4>
    <p class="text-warp">{{ $deprtment->description }}</p>
    <div class="alert alert-primary btn">
      <a href="{{ route('d.show',$deprtment->id) }}" >  <span class="font-monospace">Count Doctor: {{ $deprtment->doctors_count }}</span></a>
    </div>

</div>
