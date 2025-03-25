<script src="{{ asset('PublicArea/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/jquery-migrate-3.4.1.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/Scrolltrigger.js') }}"></script>
<script src="{{ asset('PublicArea/js/Splittext.js') }}"></script>
<script src="{{ asset('PublicArea/js/cursor.js') }}"></script>
<script src="{{ asset('PublicArea/js/gsap.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/gsap-animation.js') }}"></script>
<script src="{{ asset('PublicArea/js/jquery-validate.js') }}"></script>
<script src="{{ asset('PublicArea/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('PublicArea/js/slick.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/jquery-waypoints.js') }}"></script>
<script src="{{ asset('PublicArea/js/numinate.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/imagesloaded.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/circle-progress.min.js') }}"></script>
<script src="{{ asset('PublicArea/js/main.js') }}"></script>
<script src="{{ asset('PublicArea/js/aos.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRxCvC_tYnWNUso0oJf-YAmRQVkh8204s&callback=initMap" async defer></script>










<script>
AOS.init({
    offset: 0,
    duration: 400,
    delay:0,
    once: true,
});
</script>
@if (session('success'))
  <script>
      toastr.success("{{ session('success') }}", '', {
          closeButton: true,
          progressBar: true,
          positionClass: 'toast-top-right'
      });
  </script>
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
      <script>
          toastr.error("{{ $error }}", '', {
              closeButton: true,
              progressBar: true,
              positionClass: 'toast-top-right'
          });
      </script>
  @endforeach
@endif

@if (session('error'))
  <script>
      toastr.error("{{ session('error') }}", '', {
          closeButton: true,
          progressBar: true,
          positionClass: 'toast-top-right'
      });
  </script>
@endif

<script>
    (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="Xl5zA67p23P1uM4ArOLC4";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
    </script>

    <script>
        const crypto = require('crypto');

const secret = '7q03ccdemo6o6incly3tejr7xtrpndu5'; // Your verification secret key
const userId = current_user.id // A string UUID to identify your user

const hash = crypto.createHmac('sha256', secret).update(userId).digest('hex');
    </script>



@stack('js')



