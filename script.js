// function to open/close nav
// function toggleNav(){
//   // if nav is open, close it
//   if($("nav").is(":visible")){
//     $("nav").fadeOut();
//     $("button").removeClass("menu");
//   }
//   // if nav is closed, open it
//   else{
//     $("button").addClass("menu");
//     $("nav").fadeIn().css('display', 'flex');
//   }
// }

// // when clicking + or ☰ button
// $("button").click(function(){
//   // when clicking ☰ button, open nav
//   if($("header").hasClass("open")){
//     toggleNav();
//   }
//   // when clicking + button, open header
//   else{
//     $("header").addClass("open");
//   }
// });

// // close nav
// $("#nav-close").click(function(){
//   toggleNav();
// });

// // scroll to sections
// $("nav li").click(function(){
//   // get index of clicked li and select according section
//   var index = $(this).index();
//   var target = $("content section").eq(index);
  
//   toggleNav();
  
//   $('html,body').delay(300).animate({
//     scrollTop: target.offset().top
//   }, 500);
// });

// Domino Dreams JS
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml10 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml10 .letter',
    rotateY: [-90, 0],
    duration: 1300,
    delay: (el, i) => 45 * i
  }).add({
    targets: '.ml10',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });


// #### to fetch location need to fetch weather function too ####
  const city = document.querySelector("#city")

const colors = 
 {
}

function findMyCoordinates() {
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition((position) => {
      getWeather(position.coords.latitude, position.coords.longitude)
    },
    (err) => { 
      alert(err.message)
    })
  } else {
    alert("Geolocation is not supported by your browser")
  }
}

function getWeather(lat, lon){
  const endpoint = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=imperial&appid=16a2314e91b166c8c3c5b3c33539f22b`;

  fetch(endpoint)

  .then(response => {
    if (response.status !== 200) throw Error(response.statusText);
    return response.json();
  })
  .then(data => {
    console.log(data)
    getCity(data.name)
  })
  .catch(error => console.log(error));
}

function getBackgroundColor(temp){
  const keys = Object.keys(colors).sort((a, b) => a - b)
  let color = ""
  if(temp <= -60){
    color = colors[keys[0]]
  } else if(temp >= 120) {
    color = colors[keys[keys.length - 1]]
  } else {
    for(let i = 0; i < keys.length; i++){
      if(temp >= keys[i] && temp < keys[i + 1])
        color = colors[keys[i]]  
    }
  } 
  document.body.style.background = `radial-gradient(ellipse at center, ${color} 0%, #000000 100%)`
}

function getCity(cityName){
  city.textContent = cityName
}

window.onload = function(){
  findMyCoordinates()
}
