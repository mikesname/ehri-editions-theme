jQuery(function ($) {

  /**
   * If the button's target is visible, set it to
   * be selected, set it's icon to a 'X', and ensure
   * the target's corresponding body class is on the
   * body element
   *
   * @param elem the button element
   */
  function resetMenuButtonState(elem) {
    var $item = $(elem),
        $icon = $item.find(".material-icons"),
        active = $($item.data("target")).is(":visible");
    $item.toggleClass("selected", active);
    $icon.text(active ? "close" : $icon.data("text"));
    $("body").toggleClass($item.data("class"), active);
  }

  var mobileWidth = 930,
      $body = $("body");

  // In desktop mode the visibility of the menu
  // is controlled by the element's corresponding
  // button is clicked, ensure that class is added
  // and other menu button's classes removed.
  $(".nav-bar-button").click(function (e) {
    e.preventDefault();
    var $this = $(this),
        cls = $this.data("class"),
        $target = $($this.data("target"));
    $body.toggleClass(cls, 400);
    $(".nav-bar-button").not($this).each(function (i, elem) {
      $body.removeClass($(elem).data("class"));
    })
  });
  $(".nav-bar-back").click(function (e) {
    $(".nav-bar-button").each(function (i, elem) {
      $body.removeClass($(elem).data("class"));
    })
  });

  // Set mobile menu state according to body class...
  $(".nav-bar-mobile-button").each(function (i, elem) {
    resetMenuButtonState(elem);
  }).click(function (e) {
    e.preventDefault();
    var $this = $(this);
    $($this.data("target")).toggle(!$this.hasClass("selected"));
    resetMenuButtonState(this);

    // Close other menu(s)...
    $(".nav-bar-mobile-button").not($this).each(function (i, elem) {
      $($(elem).data("target")).hide();
      resetMenuButtonState(elem);
    });
  });

  // Toggle the facet list expandion when the toggle is clicked.
  $("#nav-bar-limit-toggle").click(function (e) {
    var $this = $(this),
        $target = $($this.data("target")),
        active = $target.is(":visible");
    $this
        .find("#nav-bar-limit-expand")
        .text(active ? "keyboard_arrow_down" : "keyboard_arrow_up");
    $target.toggle(!active);
  });

  // In the unlikely event of resizing the mobile page, reset
  // visibility of some elements that may have been set by JS
  $(window).resize(function () {
    if (window.outerWidth > mobileWidth) {
      $(".nav-bar").removeAttr("style");
      $("#nav-bar-limit-search").removeAttr("style");
    } else {
      $(".nav-bar-mobile-button").each(function (i, elem) {
        resetMenuButtonState(elem);
      });
    }
  })

  // Neatline map behaviour
  var $neatlineMapDefault = 0;
  var $neatlineMapType = 0;
  var $neatlineMapTypeResized = 0;
  $('.neatline-control').each(function () {
    if ($(this).text() === 'large') {
      $neatlineMapType = "exhibit-map-large";
      $neatlineMapTypeResized = "exhibit-map-large-resized";
    } else if ($(this).text() === 'wide') {
      $neatlineMapType = "exhibit-map-wide";
      $neatlineMapTypeResized = "exhibit-map-wide-resized";
    } else if ($(this).text() === 'default') {
      $neatlineMapType = "exhibit-map-default";
      $neatlineMapTypeResized = "exhibit-map-default";
    }
  });
  if ($(".exhibit-block.exhibit-map-default")[0]) {
    $neatlineMapDefault = 1;
  } else {
    $neatlineMapDefault = 0;
  }

  $("#nav-bar-button-menu").click(function () {
    if ($("#nav-bar-menu").css("display") == 'none') {
      if (!$('body').hasClass('search')) {
        if ($(window).width() > 1180) {
          if ($neatlineMapDefault == 0) {
            $("#neatline-map").attr('class', $neatlineMapTypeResized);
          }
        }
      }
    } else {
      if ($neatlineMapDefault == 0) {
        $("#neatline-map").attr('class', $neatlineMapType);
      }
    }
  });

  $("#nav-bar-menu-back").click(function () {
    if ($neatlineMapDefault == 0) {
      $("#neatline-map").attr('class', $neatlineMapType);
    }
  });

  $("#nav-bar-button-search").click(function () {
    if ($("#nav-bar-search").css("display") == 'none') {
      if (!$('body').hasClass('search')) {
        if ($(window).width() > 1180) {
          if ($neatlineMapDefault == 0) {
            $("#neatline-map").attr('class', $neatlineMapTypeResized);
          }
        }
      }
    } else {
      if ($neatlineMapDefault == 0) {
        $("#neatline-map").attr('class', $neatlineMapType);
      }
    }
  });

  $("#nav-bar-search-back").click(function () {
    if ($neatlineMapDefault == 0) {
      $("#neatline-map").attr('class', $neatlineMapType);
    }
  });

  $(window).resize(function () {
    if ($(window).width() < 1180) {
      if ($neatlineMapDefault == 0) {
        $("#neatline-map").attr('class', $neatlineMapTypeResized);
      }
    }
  });

  /* DESKTOP */
  /* DESKTOP:menu */

  // /* check the neatline map */
  // var $neatlineMapDefault = 0;
  // var $neatlineMapType = 0;
  // $('.neatline-control').each(function () {
  //   if ($(this).text() === 'large') {
  //     $neatlineMapType = "exhibit-map-large";
  //     $neatlineMapTypeResized = "exhibit-map-large-resized";
  //   } else if ($(this).text() === 'wide') {
  //     $neatlineMapType = "exhibit-map-wide";
  //     $neatlineMapTypeResized = "exhibit-map-wide-resized";
  //   } else if ($(this).text() === 'default') {
  //     $neatlineMapType = "exhibit-map-default";
  //     $neatlineMapTypeResized = "exhibit-map-default";
  //   }
  // });
  // if ($(".exhibit-block.exhibit-map-default")[0]) {
  //   $neatlineMapDefault = 1;
  // } else {
  //   $neatlineMapDefault = 0;
  // }
//
//   $("#nav-bar-button-menu").click(function () {
//     if ($("#nav-bar-menu").css("display") == 'none') {
//       if ($("#nav-bar-search").css("display") == 'none') {
//         $("#nav-bar-menu").show("slide", function () {
//         });
//         $("#nav-bar-search").hide("slide", function () {
//         });
//       } else {
//         $("#nav-bar-menu").show();
//         $("#nav-bar-search").hide();
//       }
//       $("body").addClass('exhibits').removeClass("search");
//       if (!$('body').hasClass('search')) {
//         if ($(window).width() > 1180) {
//           //$("#container").animate({'margin-left': '240px'}, 400);
//           //$("#footer").animate({'margin-left': '240px'}, 400);
//           $("#home-map").attr('class', 'home-map-resized');
//           if ($neatlineMapDefault == 0) {
//             $("#neatline-map").attr('class', $neatlineMapTypeResized);
//           }
//           $("#nav-bar-menu").attr('class', 'nav-bar-menu');
//         } else {
//           $("#nav-bar-menu").attr('class', 'nav-bar-menu-shadow');
//         }
//       } else {
//         $("#nav-bar-menu").attr('class', 'nav-bar-menu');
//         //$("#container").animate({'margin-left': '240px'}, 400);
//         //$("#footer").animate({'margin-left': '240px'}, 400);
//       }
//     } else {
//       $("#nav-bar-search").hide("slide");
//       $("#nav-bar-menu").hide("slide");
//       $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
//       $("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
//       $("#container").animate({'margin-left': '0'}, 400);
//       $("#footer").animate({'margin-left': '0'}, 400);
//       $("#home-map").attr('class', 'home-map');
//       if ($neatlineMapDefault == 0) {
//         $("#neatline-map").attr('class', $neatlineMapType);
//       }
//     }
//   });
//
//   $("#nav-bar-menu-back").click(function () {
//     $("#nav-bar-menu").hide("slide", function () {
//     });
//     $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
//     $("#container").animate({'margin-left': '0'}, 400);
//     $("#footer").animate({'margin-left': '0'}, 400);
//     $("#home-map").attr('class', 'home-map');
//     if ($neatlineMapDefault == 0) {
//       $("#neatline-map").attr('class', $neatlineMapType);
//     }
//   });
//
//   /* DESKTOP:search */
//   $("#nav-bar-button-search").click(function () {
//     $("#nav-bar-limit-search").css('display', 'block');
//     $("#nav-bar-limit-expand").css('display', 'none');
//     $("#nav-bar-limit-shrink").css('display', 'none');
//     if ($("#nav-bar-search").css("display") == 'none') {
//       if ($("#nav-bar-menu").css("display") == 'none') {
//         $("#nav-bar-search").show("slide", function () {
//         });
//         $("#nav-bar-menu").hide("slide", function () {
//         });
//       } else {
//         $("#nav-bar-search").show(0, function () {
//         });
//         $("#nav-bar-menu").hide(0, function () {
//         });
//       }
//       $("body").addClass('search').removeClass("exhibits");
//       $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
//       if (!$('body').hasClass('search')) {
//         if ($(window).width() > 1180) {
//           $("#container").animate({'margin-left': '240px'}, 400);
//           $("#footer").animate({'margin-left': '240px'}, 400);
//           $("#home-map").attr('class', 'home-map-resized');
//           if ($neatlineMapDefault == 0) {
//             $("#neatline-map").attr('class', $neatlineMapTypeResized);
//           }
//           $("#nav-bar-search").attr('class', 'nav-bar-search');
//         } else {
//           $("#nav-bar-search").attr('class', 'nav-bar-search-shadow');
//         }
//       } else {
//         $("#nav-bar-search").attr('class', 'nav-bar-search');
//         $("#container").animate({'margin-left': '240px'}, 400);
//         $("#footer").animate({'margin-left': '240px'}, 400);
//       }
//     } else {
//       $("#nav-bar-menu").hide("", function () {
//       });
//       $("#nav-bar-search").hide("slide", function () {
//       });
//       $("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
//       $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
//       $("#container").animate({'margin-left': '0'}, 400);
//       $("#footer").animate({'margin-left': '0'}, 400);
//       $("#home-map").attr('class', 'home-map');
//       if ($neatlineMapDefault == 0) {
//         $("#neatline-map").attr('class', $neatlineMapType);
//       }
//     }
//   });
//   $("#nav-bar-search-back").click(function () {
//     $("#nav-bar-search").hide("slide", function () {
//     });
//     $("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
//     $("#container").animate({'margin-left': '0'}, 400);
//     $("#footer").animate({'margin-left': '0'}, 400);
//     $("#home-map").attr('class', 'home-map');
//     if ($neatlineMapDefault == 0) {
//       $("#neatline-map").attr('class', $neatlineMapType);
//     }
//   });
//
//   /* MOBILE */
//   /* MOBILE:menu */
//   $("#nav-bar-mobile-button-menu").click(function () {
//     if ($("#nav-bar-menu").css("display") == 'none') {
//       $("#nav-bar-mobile-icon-menu").text('close');
//       $("#nav-bar-mobile-icon-menu").css('font-size', '36px');
//       $("#nav-bar-mobile-icon-menu").css('margin-top', '7px');
//       if ($("#nav-bar-search").css("display") == 'none') {
//         $("#nav-bar-menu").show(0, function () {
//         });
//         $("#nav-bar-search").hide(0, function () {
//         });
//       } else {
//         $("#nav-bar-menu").show(0, function () {
//         });
//         $("#nav-bar-search").hide(0, function () {
//         });
//       }
//       $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu-selected');
//       $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
//       $("#header-image").hide(0, function () {
//       });
//
//     } else {
//       $("#nav-bar-mobile-icon-menu").text('menu');
//       $("#nav-bar-mobile-icon-menu").css('font-size', '48px');
//       $("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
//       $("#nav-bar-search").hide(0, function () {
//       });
//       $("#nav-bar-menu").hide(0, function () {
//       });
//       $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
//       $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
//       $("#header-image").show(0, function () {
//       });
//     }
//     $("#nav-bar-mobile-icon-search").text('search');
//   });
//
//   /* MOBILE:search */
//   $("#nav-bar-mobile-button-search").click(function () {
//     if ($("#nav-bar-search").css("display") == 'none') {
//       $("#nav-bar-mobile-icon-search").text('close');
//       if ($("#nav-bar-menu").css("display") == 'none') {
//         $("#nav-bar-search").show(0, function () {
//         });
//         $("#nav-bar-menu").hide(0, function () {
//         });
//       } else {
//         $("#nav-bar-search").show(0, function () {
//         });
//         $("#nav-bar-menu").hide(0, function () {
//         });
//       }
//       $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
//       $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
//       $("#header-image").hide(0, function () {
//       });
//
//     } else {
//       $("#nav-bar-mobile-icon-search").text('search');
//       $("#nav-bar-menu").hide(0, function () {
//       });
//       $("#nav-bar-search").hide(0, function () {
//       });
//       $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
//       $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
//       $("#header-image").show(0, function () {
//       });
//     }
//     $("#nav-bar-mobile-icon-menu").text('menu');
//     $("#nav-bar-mobile-icon-menu").css('font-size', '48px');
//     $("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
//   });
//
//   /* MOBILE:search menu expand */
//   $("#nav-bar-limit-toggle").click(function () {
//     if ($(window).width() < 930) {
//       if ($("#nav-bar-limit-expand").css('display') == 'none') {
//         $("#nav-bar-limit-search").css('display', 'none');
//         $("#nav-bar-limit-shrink").css('display', 'none');
//         $("#nav-bar-limit-expand").css('display', 'inline');
//       } else {
//         $("#nav-bar-limit-search").css('display', 'block');
//         $("#nav-bar-limit-shrink").css('display', 'inline');
//         $("#nav-bar-limit-expand").css('display', 'none');
//       }
//     }
//   });
//
//   if ($(window).width() < 930) {
//     $("#nav-bar-limit-search").css('display', 'none');
//     $("#nav-bar-limit-shrink").css('display', 'none');
//     $("#nav-bar-limit-expand").css('display', 'inline');
//   }
// });
//
// $(window).resize(function () {
//   if ($(window).width() < 1180) {
//     if ($(window).width() > 930) {
//       if ($("#nav-bar-menu").is(":visible")) {
//         if ($("body").hasClass("search")) {
//           $("#nav-bar-menu").hide(0, function () {
//           });
//           $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
//         } else {
//           $("#nav-bar-menu").hide("slide", function () {
//           });
//           $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
//           $("#container").animate({'margin-left': '0'}, 400);
//           $("#footer").animate({'margin-left': '0'}, 400);
//         }
//       }
//       $("#home-map").attr('class', 'home-map');
//       if ($neatlineMapDefault == 0) {
//         $("#neatline-map").attr('class', $neatlineMapTypeResized);
//       }
//       $("#nav-bar-mobile-icon-search").text('search');
//       $("#nav-bar-mobile-icon-menu").text('menu');
//       $("#nav-bar-mobile-icon-menu").css('font-size', '48px');
//       $("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
//       $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
//       $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
//     } else {
//       if ($('body').hasClass('search')) {
//         $("#nav-bar-search").show(0, function () {
//         });
//         $("#nav-bar-mobile-icon-search").text('close');
//         $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
//         $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
//         $("#nav-bar-mobile-icon-menu").text('menu');
//         $("#nav-bar-mobile-icon-menu").css('font-size', '48px');
//         $("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
//       }
//     }
//   }
//
//   if ($(window).width() > 930) {
//     $("#header-image").show(0, function () {
//     });
//     $("#nav-bar-limit-toggle").css('cursor', 'default');
//     $("#nav-bar-limit-search").css('display', 'block');
//     $("#nav-bar-limit-shrink").css('display', 'none');
//     $("#nav-bar-limit-expand").css('display', 'none');
//     if ($('body').hasClass('search')) {
//       $("#container").css('margin-left', '240px');
//       $("#footer").css('margin-left', '240px');
//     } else {
//       $("#nav-bar-search").hide("slide", function () {
//       });
//       $("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
//       $("#container").animate({'margin-left': '0'}, 0);
//       $("#footer").animate({'margin-left': '0'}, 0);
//     }
//   } else {
//     $("#nav-bar-limit-toggle").css('cursor', 'pointer');
//     $("#nav-bar-limit-search").css('display', 'none');
//     $("#nav-bar-limit-shrink").css('display', 'none');
//     $("#nav-bar-limit-expand").css('display', 'inline');
//     $("#container").css('margin-left', '0px');
//     $("#footer").css('margin-left', '0px');
//   }
});
