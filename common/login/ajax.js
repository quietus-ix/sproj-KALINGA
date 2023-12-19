$(document).ready(()=>{

   $('#signin').submit((e)=>{
      e.preventDefault();

      let un = $('#SI_username').val();
      let pw = $('#SI_password').val();

      $.ajax({
         type: "POST",
         url: "./includes/inc_signin.php",
         data: {un, pw},
         cache: false,
         dataType: "json",
         success: function(response){
            if(response.statusCode==400) {
               $('#si_notice').parent().removeClass('hidden');
               $('#si_notice').parent().addClass('flex shake');
               $('#si_notice').html(response.message);
               setTimeout(()=>{
                  $('#si_notice').parent().removeClass('flex shake');
                  $('#si_notice').parent().addClass('hidden');
               },3000);
            }
            else if(response.statusCode==200) {
               window.location.href = response.url;
            }
         }
      });
   });

   $('#signup').submit((e)=>{
      e.preventDefault();

      let fn = $('#SU_fname').val();
      let ln = $('#SU_lname').val();
      let un = $('#SU_username').val();
      let em = $('#SU_email').val();
      let pw = $('#SU_password').val();
      let rpw = $('#SU_repassword').val();

      $.ajax({
         type: "POST",
         url: "./includes/inc_signup.php",
         data: {fn, ln, un, em, pw, rpw},
         cache: false,
         dataType: "json",
         success: function(response){
            if(response.statusCode==400 && response.type==1) {
               $('#su_notice').parent().removeClass('hidden');
               $('#su_notice').parent().addClass('flex shake');
               $('#su_notice').html(response.message);
               setTimeout(()=>{
                  $('#su_notice').parent().removeClass('flex shake');
                  $('#su_notice').parent().addClass('hidden');
               },3000);
            }
            else if(response.statusCode==400 && response.type==2) {
               $('#un_msg').html(response.message);
               $('#SU_username').parent().toggleClass('border-tertiary', 'border-err');
               $('#SU_username').parent().addClass('shakeH');
               setTimeout(()=>{
                  $('#SU_username').parent().removeClass('shakeH');
               }, 400);
            }
            else if(response.statusCode==400 && response.type==3) {
               $('#un_msg').html(response.message);
               $('#SU_username').parent().toggleClass('border-tertiary', 'border-err');
               $('#SU_username').parent().addClass('shakeH');
               setTimeout(()=>{
                  $('#SU_username').parent().removeClass('shakeH');
               }, 400);
            }
            else if(response.statusCode==400 && response.type==4) {
               $('#pw_msg').removeClass('opacity-0');
               $('#pw_msg').html(response.message);
               $('#SU_password').parent().toggleClass('border-tertiary', 'border-err');
               $('#SU_password').parent().addClass('shakeH');
               setTimeout(()=>{
                  $('#SU_password').parent().removeClass('shakeH');
               }, 400);
            }
            else if(response.statusCode==400 && response.type==5) {
               $('#pw_msg, #rpw_msg').removeClass('opacity-0 text-wrng');
               $('#pw_msg, #rpw_msg').addClass('text-err');
               $('#pw_msg').html(response.message);
               $('#rpw_msg').html(response.message);
               $('#SU_password, #SU_repassword').parent().parent().removeClass('border-tertiary border-wrng');
               $('#SU_password, #SU_repassword').parent().parent().addClass('shakeH border-err');
               setTimeout(()=>{
                  $('#SU_password, #SU_repassword').parent().parent().removeClass('shakeH');
               }, 400);
            }
            else if(response.statusCode==200) {
               window.location.href = response.url;
            }
         }
      });
   });
});