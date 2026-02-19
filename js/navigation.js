/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const siteNavigation = document.getElementById("site-navigation");
  if (!siteNavigation) return;

  const button = document.getElementById("menu-toggle");
  if (!button) return;

  const menu = siteNavigation.getElementsByTagName("ul")[0];
  if (!menu) {
    button.style.display = "none";
    return;
  }

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");
    button.classList.toggle("open");
    const expanded = button.getAttribute("aria-expanded") === "true";
    button.setAttribute("aria-expanded", expanded ? "false" : "true");

    document.body.classList.toggle("no-scroll", !expanded);
  });


  // Κλείσιμο του μενού όταν γίνεται κλικ εκτός navigation
  document.addEventListener("click", function (event) {
    const masthead = document.getElementById("masthead");
    if (!masthead.contains(event.target)) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
      button.classList.remove("open");
      document.body.classList.remove("no-scroll");
    }
  });

window.addEventListener('DOMContentLoaded', () => {
  // Έλεγχος αν είμαστε στην αρχική
    const header = document.getElementById('masthead');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('fixed');
      } else {
        header.classList.remove('fixed');
      }
    });
  });

  // Εστίαση για links με υπομενού
  const links = menu.getElementsByTagName("a");
  const linksWithChildren = menu.querySelectorAll(
    ".menu-item-has-children > a, .page_item_has_children > a"
  );

  for (const link of links) {
    link.addEventListener("focus", toggleFocus, true);
    link.addEventListener("blur", toggleFocus, true);
  }

  for (const link of linksWithChildren) {
    link.addEventListener("touchstart", toggleFocus, false);
  }

  function toggleFocus(event) {
    if (event.type === "focus" || event.type === "blur") {
      let self = this;
      while (!self.classList.contains("nav-menu")) {
        if (self.tagName.toLowerCase() === "li") {
          self.classList.toggle("focus");
        }
        self = self.parentNode;
      }
    }

    if (event.type === "touchstart") {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const item of menuItem.parentNode.children) {
        if (menuItem !== item) {
          item.classList.remove("focus");
        }
      }
      menuItem.classList.toggle("focus");
    }
  }
})();

   // Σύνδεσμοι Google Maps με τα καταστήματα:
var googleMapsLinks = [
  "https://www.google.com/maps?q=37.08529425249912,25.15479753576374",
  "https://www.google.com/maps?q=37.12414186962461,25.236421824320157"
];

// Σύνδεσμοι Google Maps με τα καταστήματα:
var googleMapsLinks = [
  "https://www.google.com/maps/place/Tserki+Paroikia/@37.0852826,25.1499228,16z/data=!3m1!4b1!4m6!3m5!1s0x1498710f6cffcae1:0xea6944b6febda91c!8m2!3d37.0852784!4d25.1547937!16s%2Fg%2F11c1ncxmtv?entry=ttu&g_ep=EgoyMDI1MDUxNS4wIKXMDSoASAFQAw%3D%3D", // Tserki Paroikia
  "https://www.google.com/maps/place/Tserki+Naousa/@37.1239579,25.2315402,17z/data=!3m1!4b1!4m6!3m5!1s0x1498750073c6b359:0x33c3c453c61a59ec!8m2!3d37.1239537!4d25.2364111!16s%2Fg%2F11vr0p3zc2?entry=ttu&g_ep=EgoyMDI1MDUxNS4wIKXMDSoASAFQAw%3D%3D"  // Tserki Naousa
];

// Δημιουργία του χάρτη
var map = L.map('map', {
  zoomControl: true,
  scrollWheelZoom: true,
  dragging: true,
  tap: true,
  touchZoom: true
}).setView([37.105, 25.195], 13); // Κεντρική θέση και zoom επίπεδο

// Base layer
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
  attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
  subdomains: 'abcd',
  maxZoom: 20
}).addTo(map);

// Custom icon
var customIcon = L.icon({
  iconUrl: "/wp-content/themes/zazatserki/img/location-pin.png",
  iconSize: [40, 40],
  iconAnchor: [16, 32],
  popupAnchor: [0, -32]
});

// Συντεταγμένες για τα markers
var coords = [
  [37.08529425249912, 25.15479753576374],  // Tserki Paroikia
  [37.12414186962461, 25.236421824320157]  // Tserki Naousa
];

// Markers
L.marker(coords[0], { icon: customIcon }).addTo(map)
  .bindPopup("<b>Tserki Paroikia</b><br><a href='" + googleMapsLinks[0] + "' target='_blank'>Click here!</a>")
  .openPopup();

L.marker(coords[1], { icon: customIcon }).addTo(map)
  .bindPopup("<b>Tserki Naousa</b><br><a href='" + googleMapsLinks[1] + "' target='_blank'>Click here!</a>");

// Εξασφαλίζουμε ότι ο χάρτης ταιριάζει στις συντεταγμένες των markers με κάποια padding
map.fitBounds(coords, { padding: [50, 50], maxZoom: 15 });

// ✅ Απελευθέρωση χάρτη από "κλείδωμα"
map.setMaxBounds(null); // Αυτή η γραμμή επιτρέπει την ελεύθερη κίνηση στον χάρτη




// CHANGE: Ενεργοποίηση Swiper.js μόνο αν η οθόνη είναι κάτω από 1024px
document.addEventListener("DOMContentLoaded", function () {
  let swiper;

  function initSwiper() {
    if (window.innerWidth < 1024) {
      if (!swiper) {
        swiper = new Swiper(".swiper-container", {
          slidesPerView: 1,
          spaceBetween: 10,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          grabCursor: true,
        });
      }
    } else {
      if (swiper) {
        swiper.destroy(true, true);
        swiper = null;
      }
    }
  }

  initSwiper();
  window.addEventListener("resize", initSwiper);
});    



function reset_acf_metabox_position() {
  // Επαναφορά θέσης για σελίδες
  delete_user_meta( get_current_user_id(), 'meta-box-order_page' );
  // Επαναφορά θέσης για custom post types (αν υπάρχουν)
  // delete_user_meta( get_current_user_id(), 'meta-box-order_το_slug_του_cpt' );
}


add_action( 'admin_init', 'reset_acf_metabox_position' );

document.addEventListener('DOMContentLoaded', function () {
  const isTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

  if (isTouch) {
    const items = document.querySelectorAll('.category-item');

    items.forEach(item => {
      let active = false;
      item.addEventListener('click', function (e) {
        if (active) return;

        e.preventDefault();
        items.forEach(i => i.classList.remove('overlay-active'));
        item.classList.add('overlay-active');
        active = true;

        document.addEventListener('click', function outsideClick(event) {
          if (!item.contains(event.target)) {
            item.classList.remove('overlay-active');
            active = false;
            document.removeEventListener('click', outsideClick);
          }
        });
      });
    });
  }
});


//Swiper slider Background 
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll('.swiper-slide');

  slides.forEach(slide => {
    const img = slide.querySelector('.first-image');
    if (img) {
      slide.style.backgroundImage = `url('${img.src}')`;
      slide.style.backgroundSize = 'cover';
      slide.style.backgroundPosition = 'center';
      img.style.display = 'none';
    }
  });
});