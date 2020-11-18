@extends('cv.layout.app')

@section('content')
<style>
main{
  height: 100%;
  margin: 0;
}

.bgimg {
  /* background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg'); */
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
  color: white;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
  color: white;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: white;
}

hr {
  margin: auto;
  width: 40%;
  color: white;
}
</style>

<main>

<div class="bgimg" >
    <img src="https://www.w3schools.com/w3images/forestbridge.jpg" alt="">
  <div class="topleft" style="color: white">
    <p>Logo</p>
  </div>
  <div class="middle" style="color: white">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo" style="font-size:30px"></p>
  </div>
  <div class="bottomleft" style="color: white">
    <p>Some text</p>
  </div>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Nov 22, 2020 15:37:25").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</main>

@endsection