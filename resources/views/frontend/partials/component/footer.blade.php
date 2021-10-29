@php 
$open_hour = \App\Modules\OpenHour\OpenHour::all()->take(3);
$bottom = \App\Modules\Bottom\Bottom::all()->take(1);
@endphp
  <footer class="probootstrap-footer">
    <div class="container">
      <div class="row mb-2">
        <div class="col-md-3">
          <h3 class="heading">Adress</h3>
          <p>
            <span class="icon-mail"></span> info@hclinic.asia <br>
            <span class="icon-mail"></span> hclinic.asia@gmail.com <br>
            <p>
              <i></i>021 722 8525 <br>
              <i></i>0813 1985 0022
            </p>
          </p>
        </div>
        <div class="col-md-3">
          <h3 class="heading">Head Office</h3>
            @forelse($bottom as $v)
             <p class="mb-5">{!! $v->address !!}</p>
            @empty
            <p class="mb-5">Not Set</p>
            @endforelse
          <h3 class="heading text-white">Open</h3> 
          <p>
            @forelse($open_hour as $v)
            {{$v->days}} {{$v->time}} <br>
            @empty
            Mon-Fri Not Set <br>
            Sat Not Set <br>
            Sun Not Set
            @endforelse
          </p>
        </div>
        <div class="col-md-3">
          <h3 class="heading">Quick Links</h3>
          <ul class="list-unstyled probootstrap-footer-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Department</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3 class="heading">Follow us</h3>
          <ul class="probootstrap-footer-social">
            <li><a href="https://www.twitter.com/unistemclinic"><span class="icon-twitter"></span></a></li>
            <li><a href="https://www.facebook.com/pages/Unistem-Clinic"><span class="icon-facebook"></span></a></li>
            <li><a href="https://www.instagram.com/explore/locations/352695308538893/unistem-clinic?hl=en"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <!-- END row -->
      <div class="row probootstrap-copyright">
        <div class="col-md-12">
          <p><small>&copy; 2018 All Rights Reserved. </small></p>
        </div>
      </div>
    </div>
  </footer>