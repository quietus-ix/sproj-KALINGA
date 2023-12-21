$(document).ready(function () {
  $(this).scrollTop(0);
  $(".logo").addClass("pop");
  $(".logo-name").hide();
  $(".sisu-buttons").hide();
  $(".nav-container").hide();

  setTimeout(() => {
    $(".logo").removeClass("pop");
    $(".logo-name").show(500);

    setTimeout(() => {
      $("body").removeClass("overflow-hidden");
      $("body").addClass("overflow-x-hidden");
      $(".sisu-buttons").slideDown();
      $(".clutter").addClass("circles");
    }, 1100);
  }, 2100);

  $(window).scroll(function () {
    var hT = $(".anchor-a").offset().top,
      hH = $(".anchor-a").outerHeight(),
      wH = $(window).height(),
      wS = $(this).scrollTop();
    if (wS > hT + hH - wH && hT > wS && wS + wH > hT + hH) {
      $(".nav-container").fadeIn();
    }
  });

  $(window).scroll(function () {
    var hT = $(".sisu-buttons").offset().top,
      hH = $(".sisu-buttons").outerHeight(),
      wH = $(window).height(),
      wS = $(this).scrollTop();
    if (wS > hT + hH - wH && hT > wS && wS + wH > hT + hH) {
      $(".nav-container").fadeOut();
      $("body").addClass("wow");
    }
  });

  $(".signin").click(function () {
    $(".logo-name").hide(500);
    $(".sisu-buttons").hide(500);
    $(".logo").addClass("popReverse");
    $(".clutter").addClass("zoom");
    setTimeout(() => {
      window.location.href = "../login/index.php";
    }, 2100);
  });
});
