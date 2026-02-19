// wait until DOM is ready
document.addEventListener(
  "DOMContentLoaded",
  function (event) {
    const goup = gsap.utils.toArray(".goup");
    goup.forEach((goupitem) => {
      gsap.from(goupitem, {
        y: 100,
        lazy: false,
        scrollTrigger: {
          trigger: goupitem,
          start: "top bottom", // start when top of trigger target hits 50% point of viewport
          toggleActions: "restart none none reset",
          end: "top center",
        },
        duration: 1,
        ease: "ease-in",
      });
    });

    const image = gsap.utils.toArray(".bloatimage");
    image.forEach((imageItem) => {
      gsap.from(imageItem, {
        scale: 0,
        lazy: false,
        scrollTrigger: {
          trigger: imageItem,
          start: "top bottom", // start when top of trigger target hits 50% point of viewport
          toggleActions: "restart none none reset",
          end: "top center",
        },
        duration: 1,
        ease: "ease-in",
      });
    });

    const fromleft = gsap.utils.toArray(".fromleft");
    fromleft.forEach((fromleftItem) => {
      gsap.from(fromleftItem, {
        x: -100,
        lazy: false,
        scrollTrigger: {
          trigger: fromleftItem,
          start: "top bottom", // start when top of trigger target hits 50% point of viewport
          toggleActions: "restart none none reset",
          end: "top center",
        },
        duration: 1,
        ease: "ease-in",
      });
    });

    const fromRight = gsap.utils.toArray(".fromright");
    fromRight.forEach((fromrightItem) => {
      gsap.from(fromrightItem, {
        x: 100,
        lazy: false,
        scrollTrigger: {
          trigger: fromrightItem,
          start: "top bottom", // start when top of trigger target hits 50% point of viewport
          toggleActions: "restart none none reset",
          end: "top center",
        },
        duration: 3,
        ease: "ease-in",
      });
    });

    const verticaltitles = gsap.utils.toArray(".verticalan");
    verticaltitles.forEach((vertItem) => {
      if (window.matchMedia("(max-width: 991px)").matches) {
        gsap.from(vertItem, {
          x: 100,
          lazy: false,
          scrollTrigger: {
            trigger: vertItem,
            start: "top bottom", // start when top of trigger target hits 50% point of viewport
            toggleActions: "restart none none reset",
            end: "top center",
          },
          duration: 1,
          ease: "ease-in",
        });
      }

      if (window.matchMedia("(min-width: 992px)").matches) {
        gsap.from(vertItem, {
          y: 100,
          lazy: false,
          scrollTrigger: {
            trigger: vertItem,
            start: "top bottom", // start when top of trigger target hits 50% point of viewport
            toggleActions: "restart none none reset",
            end: "top center",
          },
          duration: 1,
          ease: "ease-in",
        });
      }
    });

    const buttonsgoup = gsap.utils.toArray(".buttongoup");
    buttonsgoup.forEach((buttonItem) => {
      gsap.from(buttonItem, {
        bottom: "-50px",
        lazy: false,
        scrollTrigger: {
          trigger: buttonItem,
          start: "top bottom", // start when top of trigger target hits 50% point of viewport
          toggleActions: "restart none none reset",
          end: "top center",
        },
        duration: 1,
        ease: "ease-in",
      });
    });

    const buttonsfromright = gsap.utils.toArray(".buttonfromright");
    buttonsfromright.forEach((buttonfromRightItem) => {
      gsap.from(buttonfromRightItem, {
        right: "-50px",
        lazy: false,
        scrollTrigger: {
          trigger: buttonfromRightItem,
          start: "top bottom", // start when top of trigger target hits 50% point of viewport
          toggleActions: "restart none none reset",
          end: "top center",
        },
        duration: 1,
        ease: "ease-in",
      });
    });
  },
  false
);
// })

// usage:
// animate one by one
batch(".classhere", {
  interval: 0.1, // time window (in seconds) for batching to occur. The first callback that occurs (of its type) will start the timer, and when it elapses, any other similar callbacks for other targets will be batched into an array and fed to the callback. Default is 0.1
  batchMax: 4, // maximum batch size (targets)
  onEnter: (batch) =>
    gsap.to(batch, { autoAlpha: 1, stagger: 0.15, overwrite: true }),
  onLeave: (batch) => gsap.set(batch, { autoAlpha: 0, overwrite: true }),
  onEnterBack: (batch) =>
    gsap.to(batch, { autoAlpha: 1, stagger: 0.15, overwrite: true }),
  onLeaveBack: (batch) => gsap.set(batch, { autoAlpha: 0, overwrite: true }),
  // you can also define things like start, end, etc.
});

// the magical helper function (no longer necessary in GSAP 3.3.1 because it was added as ScrollTrigger.batch())...
function batch(targets, vars) {
  let varsCopy = {},
    interval = vars.interval || 0.1,
    proxyCallback = (type, callback) => {
      let batch = [],
        delay = gsap
          .delayedCall(interval, () => {
            callback(batch);
            batch.length = 0;
          })
          .pause();
      return (self) => {
        batch.length || delay.restart(true);
        batch.push(self.trigger);
        vars.batchMax && vars.batchMax <= batch.length && delay.progress(1);
      };
    },
    p;
  for (p in vars) {
    varsCopy[p] =
      ~p.indexOf("Enter") || ~p.indexOf("Leave")
        ? proxyCallback(p, vars[p])
        : vars[p];
  }
  gsap.utils.toArray(targets).forEach((target) => {
    let config = {};
    for (p in varsCopy) {
      config[p] = varsCopy[p];
    }
    config.trigger = target;
    ScrollTrigger.create(config);
  });
}

// const lenis = new Lenis({
//  lerp: 0.05,
// })

// lenis.on('scroll', ScrollTrigger.update)

// gsap.ticker.add((time) => {
//  lenis.raf(time * 1000)
// })
// gsap.ticker.lagSmoothing(0)
