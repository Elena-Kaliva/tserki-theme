/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
/* eslint-disable space-in-parens */

const heroslider = new Swiper(".section--hero .swiper", {
  // Optional parameters
  loop: true,
  grabCursor: false,
  slidesPerView: 1,
  spaceBetween: 0,
  loop: false,
  allowTouchMove: false,
  effect: "fade",

  autoplay: {
    delay: 5000,
  },
  //  autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: false,
  //  },
  //  effect: 'fade',

  // // If we need pagination
  navigation: {
    enable: false,
  },

  breakpoints: {
    1024: {},
  },
});
