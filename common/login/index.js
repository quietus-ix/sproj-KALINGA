function emailChar(str) {
   const spec = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
   return spec.test(str);
}

function unChar(str) {
   const spec = /^[a-zA-z0-9]*$/;
   return spec.test(str);
}

$(document).ready(()=>{

   var clicked = false; 

   setTimeout(()=>{ 
      $('.c2').removeClass('entrance');
      $('.si-header, .logo-flair, #signin').removeClass('entranceAlt');
      $('#switch').removeAttr('disabled');
   },1300);

   $('#switch').click(()=>{

      if(!clicked) {

         $('.c2').addClass('c2SlideToLeft');

         $('.card-bg').addClass('slideToRight');

         $('.logo-flair').addClass('floatToRight');

         $('.si-header, #signin').addClass('fadeOutLeft');

         $('#signup, .su-header').addClass('fadeInLeft');
         
         setTimeout(()=>{
            $('.c2').css("right", "0%");
            $('.c2').removeClass('c2SlideToLeft');

            $('.card-bg').css("transform", "translateX(-50%)");
               $('.card-bg').removeClass('slideToRight');

            $('.logo-flair').css('left', '92%');
               $('.logo-flair').removeClass('tw-left-[3%]');
               $('.logo-flair').removeClass('floatToRight');

            $('.si-header, #signin').css('opacity', '0');
            $('.si-header, #signin').removeClass('fadeOutLeft');

            $('.su-header, #signup').css('opacity', '1');
            $('#signup, .su-header').removeClass('fadeInLeft');

            $('#switch').html("sign in");
         },600);

         clicked = true;

      }
      else {

         $('.c2').addClass('c2SlideToRight');

         $('.card-bg').addClass('slideToLeft');

         $('.logo-flair').addClass('floatToLeft');

         $('.si-header, #signin').addClass('fadeInRight');

         $('#signup, .su-header').addClass('fadeOut');
         
         setTimeout(()=>{
            $('.c2').css("right", "-50%");
            $('.c2').removeClass('c2SlideToRight');
            
            $('.card-bg').css("transform", "translateX(0)");
            $('.card-bg').removeClass('slideToLeft');

            // removes class floatToLeft after anim
            $('.logo-flair').removeClass('floatToLeft');
            $('.logo-flair').css('left', '3%');

            $('.si-header, #signin').css('opacity', '1');
            $('.si-header, #signin').removeClass('fadeInRight');

            $('.su-header, #signup').css('opacity', '0');
            $('#signup, .su-header').removeClass('fadeOut');            

            $('#switch').html("sign up");
         },600);

         clicked = false;

      }
   });

   var SI_unHasVal;
   var SI_pwHasVal;

   $('#SI_username').keyup(()=>{
      SI_unHasVal = $('#SI_username').val();
      if(SI_unHasVal.length >= 1) {
         $('#si_lbl_un').addClass('inputShow');
         $('#si_lbl_un').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#si_lbl_un').removeClass('inputShow');
         $('#si_lbl_un').addClass('tw-opacity-0 inputHide');
      }
   });

   $('#SI_password').keyup(()=>{
      SI_pwHasVal = $('#SI_password').val();
      if(SI_pwHasVal.length >= 1) {
         $('#si_lbl_pw').addClass('inputShow');
         $('#si_lbl_pw').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#si_lbl_pw').removeClass('inputShow');
         $('#si_lbl_pw').addClass('tw-opacity-0 inputHide');
      }
   });

   var SU_fnHasVal;
   var SU_lnHasVal;
   var SU_unHasVal;
   var SU_emHasVal;
   var SU_pwHasVal;
   var SU_rpwHasVal;

   $('#SU_fname').keyup(()=>{
      SU_fnHasVal = $('#SU_fname').val();
      if(SU_fnHasVal.length >= 1) {
         $('#su_lbl_fn').addClass('inputShow');
         $('#su_lbl_fn').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#su_lbl_fn').removeClass('inputShow');
         $('#su_lbl_fn').addClass('tw-opacity-0 inputHide');
      }
   });

   $('#SU_lname').keyup(()=>{
      SU_lnHasVal = $('#SU_lname').val();
      if(SU_lnHasVal.length >= 1) {
         $('#su_lbl_ln').addClass('inputShow');
         $('#su_lbl_ln').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#su_lbl_ln').removeClass('inputShow');
         $('#su_lbl_ln').addClass('tw-opacity-0 inputHide');
      }
   });

   $('#SU_username').keyup(()=>{
      SU_unHasVal = $('#SU_username').val();
      if(SU_unHasVal.length >= 1) {
         $('#su_lbl_un').addClass('inputShow');
         $('#su_lbl_un').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#su_lbl_un').removeClass('inputShow');
         $('#su_lbl_un').addClass('tw-opacity-0 inputHide');
      }
      
      if(!unChar(SU_unHasVal)) {
         $('#un_msg').removeClass('tw-opacity-0');
         $('#SU_username').parent().parent().removeClass('border-gamma');
         $('#SU_username').parent().parent().addClass('tw-border-err');
         $('#un_msg').html('username must not contain special symbols');
      }
      else if(SU_unHasVal.length < 5) {
         $('#un_msg').removeClass('tw-opacity-0');
         $('#SU_username').parent().parent().removeClass('border-gamma');
         $('#SU_username').parent().parent().addClass('tw-border-err');
         $('#un_msg').html('username must be 5 characters long');
      }
      else {
         $('#un_msg').addClass('tw-opacity-0');
         $('#SU_username').parent().parent().removeClass('tw-border-err');
         $('#SU_username').parent().parent().addClass('tw-border-tertiary');
      }
   });

   $('#SU_email').keyup(()=>{
      SU_emHasVal = $('#SU_email').val();
      if(SU_emHasVal.length >= 1) {
         $('#su_lbl_em').addClass('inputShow');
         $('#su_lbl_em').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#su_lbl_em').removeClass('inputShow');
         $('#su_lbl_em').addClass('tw-opacity-0 inputHide');
      }

      if(!emailChar(SU_emHasVal)) {
         $('#em_msg').removeClass("tw-opacity-0");
         $('#SU_email').parent().parent().removeClass('tw-border-tertiary');
         $('#SU_email').parent().parent().addClass('tw-border-err');
      }
      else {
         $('#em_msg').addClass("tw-opacity-0");
         $('#SU_email').parent().parent().removeClass('tw-border-err');
         $('#SU_email').parent().parent().addClass('tw-border-tertiary');
      }
   });

   $('#SU_password').keyup(()=>{
      SU_pwHasVal = $('#SU_password').val();
      if(SU_pwHasVal.length >= 1) {
         $('#su_lbl_pw').addClass('inputShow');
         $('#su_lbl_pw').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#su_lbl_pw').removeClass('inputShow');
         $('#su_lbl_pw').addClass('tw-opacity-0 inputHide');
      }

      if(SU_pwHasVal.length < 4) {
         $('#pw_msg').html("password too weak");
         $('#pw_msg').removeClass("tw-opacity-0 tw-text-wrng");
         $('#pw_msg').addClass("tw-text-err");
         $('#SU_password').parent().parent().removeClass('tw-border-tertiary tw-border-wrng');
         $('#SU_password').parent().parent().addClass('tw-border-err');
      }
      else if (SU_pwHasVal.length < 10) {
         $('#pw_msg').html("somewhat weak password");
         $('#pw_msg').removeClass("tw-opacity-0 tw-text-err");
         $('#pw_msg').addClass("tw-text-wrng");
         $('#SU_password').parent().parent().removeClass('tw-border-err');
         $('#SU_password').parent().parent().addClass('tw-border-wrng');
      }
      else {
         $('#pw_msg').addClass("tw-opacity-0 tw-text-err");
         $('#pw_msg').removeClass("tw-text-wrng");
         $('#SU_password').parent().parent().removeClass('tw-border-err tw-border-wrng');
         $('#SU_password').parent().parent().addClass('tw-border-tertiary');
      }
   });

   $('#SU_repassword').keyup(()=>{
      SU_rpwHasVal = $('#SU_repassword').val();
      if(SU_rpwHasVal.length >= 1) {
         $('#su_lbl_rpw').addClass('inputShow');
         $('#su_lbl_rpw').removeClass('tw-opacity-0 inputHide');
      }
      else {
         $('#su_lbl_rpw').removeClass('inputShow');
         $('#su_lbl_rpw').addClass('tw-opacity-0 inputHide');
      }
   });
});