function emailChar(str) {
  const spec = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return spec.test(str);
}

function unChar(str) {
  const spec = /^[a-zA-z0-9]*$/;
  return spec.test(str);
}

$(document).ready(() => {
  let clicked = false;

  setTimeout(() => {
    $(".c2").removeClass("entrance");
    $(".si-header, .logo-flair, #signin").removeClass("entranceAlt");
    $(".switch").removeAttr("disabled");
  }, 1300);

  $(".switch").click(() => {
    if (!clicked) {
      $(".c2").addClass("c2SlideToLeft");

      $(".card-bg").addClass("slideToRight");

      $(".logo-flair").addClass("floatToRight");

      $(".si-header, #signin").addClass("fadeOutLeft");

      $("#signup, .su-header").addClass("fadeInLeft");

      setTimeout(() => {
        $(".c2").css("right", "0%");
        $(".c2").removeClass("c2SlideToLeft");

        $(".card-bg").css("transform", "translateX(-50%)");
        $(".card-bg").removeClass("slideToRight");

        $(".logo-flair").css("left", "92%");
        $(".logo-flair").removeClass("left-[3%]");
        $(".logo-flair").removeClass("floatToRight");

        $(".si-header, #signin").css("opacity", "0");
        $(".si-header, #signin").removeClass("fadeOutLeft");

        $(".su-header, #signup").css("opacity", "1");
        $("#signup, .su-header").removeClass("fadeInLeft");

        $(".switch").html("sign in");
      }, 600);

      clicked = true;
    } else {
      $(".c2").addClass("c2SlideToRight");

      $(".card-bg").addClass("slideToLeft");

      $(".logo-flair").addClass("floatToLeft");

      $(".si-header, #signin").addClass("fadeInRight");

      $("#signup, .su-header").addClass("fadeOut");

      setTimeout(() => {
        $(".c2").css("right", "-50%");
        $(".c2").removeClass("c2SlideToRight");

        $(".card-bg").css("transform", "translateX(0)");
        $(".card-bg").removeClass("slideToLeft");

        // removes class floatToLeft after anim
        $(".logo-flair").removeClass("floatToLeft");
        $(".logo-flair").css("left", "3%");

        $(".si-header, #signin").css("opacity", "1");
        $(".si-header, #signin").removeClass("fadeInRight");

        $(".su-header, #signup").css("opacity", "0");
        $("#signup, .su-header").removeClass("fadeOut");

        $(".switch").html("sign up");
      }, 600);

      clicked = false;
    }
  });

  let SI_unHasVal;
  let SI_pwHasVal;

  $("#SI_username").keyup(() => {
    SI_unHasVal = $("#SI_username").val();
    if (SI_unHasVal.length >= 1) {
      $("#si_lbl_un").addClass("inputShow");
      $("#si_lbl_un").removeClass("opacity-0 inputHide");
    } else {
      $("#si_lbl_un").removeClass("inputShow");
      $("#si_lbl_un").addClass("opacity-0 inputHide");
    }
  });

  $("#SI_password").keyup(() => {
    SI_pwHasVal = $("#SI_password").val();
    if (SI_pwHasVal.length >= 1) {
      $("#si_lbl_pw").addClass("inputShow");
      $("#si_lbl_pw").removeClass("opacity-0 inputHide");
    } else {
      $("#si_lbl_pw").removeClass("inputShow");
      $("#si_lbl_pw").addClass("opacity-0 inputHide");
    }
  });

  let SU_fnHasVal;
  let SU_lnHasVal;
  let SU_unHasVal;
  let SU_emHasVal;
  let SU_pwHasVal;
  let SU_rpwHasVal;

  $("#SU_fname").keyup(() => {
    SU_fnHasVal = $("#SU_fname").val();
    if (SU_fnHasVal.length >= 1) {
      $("#su_lbl_fn").addClass("inputShow");
      $("#su_lbl_fn").removeClass("opacity-0 inputHide");
    } else {
      $("#su_lbl_fn").removeClass("inputShow");
      $("#su_lbl_fn").addClass("opacity-0 inputHide");
    }
  });

  $("#SU_lname").keyup(() => {
    SU_lnHasVal = $("#SU_lname").val();
    if (SU_lnHasVal.length >= 1) {
      $("#su_lbl_ln").addClass("inputShow");
      $("#su_lbl_ln").removeClass("opacity-0 inputHide");
    } else {
      $("#su_lbl_ln").removeClass("inputShow");
      $("#su_lbl_ln").addClass("opacity-0 inputHide");
    }
  });

  $("#SU_username").keyup(() => {
    SU_unHasVal = $("#SU_username").val();
    if (SU_unHasVal.length >= 1) {
      $("#su_lbl_un").addClass("inputShow");
      $("#su_lbl_un").removeClass("opacity-0 inputHide");
    } else {
      $("#su_lbl_un").removeClass("inputShow");
      $("#su_lbl_un").addClass("opacity-0 inputHide");
    }

    if (!unChar(SU_unHasVal)) {
      $("#un_msg").show();
      $("#SU_username").parent().parent().removeClass("border-gamma");
      $("#SU_username").parent().parent().addClass("border-err");
      $("#un_msg").html("username must not contain special symbols");
    } else if (SU_unHasVal.length < 5) {
      $("#un_msg").show();
      $("#SU_username").parent().parent().removeClass("border-gamma");
      $("#SU_username").parent().parent().addClass("border-err");
      $("#un_msg").html("username must be 5 characters long");
    } else {
      $("#un_msg").hide();
      $("#SU_username").parent().parent().removeClass("border-err");
      $("#SU_username").parent().parent().addClass("border-tertiary");
    }
  });

  $("#SU_email").keyup(() => {
    SU_emHasVal = $("#SU_email").val();
    if (SU_emHasVal.length >= 1) {
      $("#su_lbl_em").addClass("inputShow");
      $("#su_lbl_em").removeClass("opacity-0 inputHide");
    } else {
      $("#su_lbl_em").removeClass("inputShow");
      $("#su_lbl_em").addClass("opacity-0 inputHide");
    }

    if (!emailChar(SU_emHasVal)) {
      $("#em_msg").show();
      $("#SU_email").parent().parent().removeClass("border-tertiary");
      $("#SU_email").parent().parent().addClass("border-err");
    } else {
      $("#em_msg").hide();
      $("#SU_email").parent().parent().removeClass("border-err");
      $("#SU_email").parent().parent().addClass("border-tertiary");
    }
  });

  $("#SU_password").keyup(() => {
    SU_pwHasVal = $("#SU_password").val();
    if (SU_pwHasVal.length >= 1) {
      $("#su_lbl_pw").addClass("inputShow");
      $("#su_lbl_pw").removeClass("opacity-0 inputHide");
    } else {
      $("#su_lbl_pw").removeClass("inputShow");
      $("#su_lbl_pw").addClass("opacity-0 inputHide");
    }

    if (SU_pwHasVal.length < 4) {
      $("#pw_msg").html("password too weak");
      $("#pw_msg").removeClass("text-wrng").addClass("text-err");
      $("#pw_msg").show();
      $("#SU_password")
        .parent()
        .parent()
        .removeClass("border-tertiary border-wrng");
      $("#SU_password").parent().parent().addClass("border-err");
    } else if (SU_pwHasVal.length < 10) {
      $("#pw_msg").html("somewhat weak password");
      $("#pw_msg").removeClass("text-err").addClass("text-wrng");
      $("#pw_msg").show();
      $("#SU_password").parent().parent().removeClass("border-err");
      $("#SU_password").parent().parent().addClass("border-wrng");
    } else {
      $("#pw_msg").addClass("text-err");
      $("#pw_msg").removeClass("text-wrng");
      $("#pw_msg").hide();
      $("#SU_password").parent().parent().removeClass("border-err border-wrng");
      $("#SU_password").parent().parent().addClass("border-tertiary");
    }
  });

  $("#SU_repassword").keyup(() => {
    SU_rpwHasVal = $("#SU_repassword").val();
    if (SU_rpwHasVal.length >= 1) {
      $("#su_lbl_rpw").addClass("inputShow");
      $("#su_lbl_rpw").removeClass("opacity-0 inputHide");
    } else {
      $("#su_lbl_rpw").removeClass("inputShow");
      $("#su_lbl_rpw").addClass("opacity-0 inputHide");
    }
  });
});
