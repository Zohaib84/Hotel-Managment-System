<!-- header inner -->
<div class="header">
   <div class="container">
      <div class="row align-items-center">
       
 
         <div class="col-md-12">
            <nav class="navigation navbar navbar-expand-md navbar-dark justify-content-end">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('our_rooms')}}">OUR Rooms</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('hotel_gallary')}}">Gallery</a>
                     </li>
                    
                    <li class="nav-item" style="padding-right: 10px">
                        <a class="nav-link" href="{{url('contact_us')}}">Contact US</a>
                    </li>
                    

                     @if (Route::has('login'))
                         @auth
                         <x-app-layout></x-app-layout>
                         @else
                             <li class="nav-item">
                                 <a style="back" class="btn btn-custom-login" href="{{ route('login') }}">Login</a>
                             </li>
                             @if (Route::has('register'))
                                 <li class="nav-item">
                                     <a class="btn btn-custom-register" href="{{ route('register') }}">Register</a>
                                 </li>
                             @endif
                         @endauth
                     @endif
                  </ul>
               </div>
            </nav>
         </div>
      </div>
  
   </div>

</div>
