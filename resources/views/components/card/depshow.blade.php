<div class="single_blog_item">
    <div class="single_blog_img">
        <img src="{{asset ('front/img/doctor/doctor_1.png') }}" alt="doctor">
        <div class="social_icon">
            <ul>
                <li><a href="#"> <i class="ti-facebook"></i> </a></li>
                <li><a href="#"> <i class="ti-twitter-alt"></i> </a></li>
                <li><a href="#"> <i class="ti-instagram"></i> </a></li>
                <li><a href="#"> <i class="ti-skype"></i> </a></li>
            </ul>
        </div>
        <p class="text-start">{{ $doctor->department->name }}</p>
    </div>
    <div class="single_text">
        <div class="single_blog_text">
            <p></p>
              <h3>D{{ $doctor->name }}</h3>
            <p>Specialization : {{ $doctor->specialization }}</p>
        </div>
    </div>

</div>
