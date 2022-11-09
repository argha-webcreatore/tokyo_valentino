
/* Start Home Banner */
var swiper = new Swiper(".slideBanner", {
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
    reverseDirection: true,
  },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});
/* End Home Banner */


var swiper = new Swiper(".homeProd", {
  slidesPerView: 3,
  spaceBetween: 30,
  freeMode: true,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
    reverseDirection: true,
  },
  speed: 1200,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 2,
    },
    "@0.75": {
      slidesPerView: 1,
      spaceBetween: 2,
    },
    "@1.00": {
      slidesPerView: 2,
      spaceBetween: 2,
    },
    "@1.50": {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});


var swiper = new Swiper(".testimoSlide", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  speed: 1000,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
/* var options = {
    videoWidth:"100%",
    currentWidth:"100%",
    width: window.outerWidth,
    height : "auto"
  }
window.addEventListener('resize', function(event){
  var options = {
    videoWidth:"100%",
    currentWidth:"100%",
    width: window.outerWidth,
    height : "auto"
  }
  //var player = videojs('play-about', options);
}) */

  //var player = videojs('play-about', options);

/* window.addEventListener('load','resize',function(){

options.width = window.outerWidth; 
player = videojs('play-about', options);
  // console.log(window.innerWidth);
}) */

imagesLoaded( document.querySelectorAll('img'), () => {
  document.body.classList.remove('loading');
});

Array.from(document.querySelectorAll('.grid__item-img')).forEach((el) => {
  const imgs = Array.from(el.querySelectorAll('img'));
  new hoverEffect({
    parent: el,
    intensity: el.dataset.intensity || undefined,
    speedIn: el.dataset.speedin || undefined,
    speedOut: el.dataset.speedout || undefined,
    easing: el.dataset.easing || undefined,
    imagesRatio: el.dataset.imagesRatio || undefined,
    hover: el.dataset.hover || undefined,
    image1: imgs[0].getAttribute('src'),
    image2: imgs[1].getAttribute('src'),
    displacementImage: el.dataset.displacement
  });
});



var swiper = new Swiper(".storeGal", {
  slidesPerView: "auto",
  spaceBetween: 10,
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  speed: 1000,
  /* pagination: {
    el: ".swiper-pagination",
    clickable: true,
  }, */
  scrollbar: {
    el: ".swiper-scrollbar",
    hide: true,
  },
});



//var player = videojs('play-aboutVid'); 

/* player.on('pause', function() {

  // Modals are temporary by default. They dispose themselves when they are
  // closed; so, we can create a new one each time the player is paused and
  // not worry about leaving extra nodes hanging around.
  var modal = player.createModal('This is a modal!');

  // When the modal closes, resume playback.
  modal.on('modalclose', function() {
    player.play();
  });
}); */

/* var player = videojs('play-aboutVid');
var Button = videojs.getComponent('.playVid');
var button = new Button(player, {
  clickHandler: function(event) {
    videojs.log('Clicked');
  }
}); */

var player = videojs("play-aboutVid", {
  autoplay: "muted",
  fluid: true
});

$(document).on("opened", ".remodal", function() {
  console.log("Modal is opened");
  player.play("muted");
  player.muted(false); // unmute the volume
});

$(document).on("closing", ".remodal", function(e) {
  player.pause();
  player.play("pause");
  player.muted(true); // nmute the volume
  /* uncomment this if you want the video time to be reset when modal is close 
    player.currentTime('0');*/
});
