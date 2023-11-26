<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>KALINGA</title>

   <link rel="stylesheet" href="../../src/extensions/output.css">
   <link rel="stylesheet" href="../../src/assets/fonts/fonts.css">
   <link rel="stylesheet" href="../../src/extensions/anim.css">

   <script src="../../src/extensions/jquery-up.js"></script>
   <script src="./index.js" type="module"></script>
   <script src="./ajax.js"></script>

</head>

<body class="tw-bg-primary tw-overflow-hidden tw-w-screen tw-h-screen tw-relative">

   <div class="tw-fixed tw-top-0 tw-left-0 tw-w-screen tw-h-20 tw-p-3 tw-z-10 entranceAlt">
      <img src="../../src/assets/img/logo_01.svg" class="logo-flair tw-w-16 tw-absolute tw-left-[3%]" alt="">
   </div>

   <div class="c1 tw-w-1/2 tw-h-full tw-absolute tw-left-0 tw-flex tw-flex-col tw-justify-center tw-items-center tw-px-10">

      <div class="si-header tw-flex tw-flex-col tw-items-center tw-mb-3 entranceAlt">
         <h1 class="tw-text-secondary tw-text-5xl tw-font-[Questrial]">sign in</h1>
         <h4 class="tw-text-tertiary tw-text-base tw-font-semibold tw-font-[Source Sans]">Aiding those in need is now just one click away</h4>
      </div>

      <form method="post" id="signin" class="tw-flex tw-flex-col tw-w-3/5 tw-h-max entranceAlt">

         <div class="tw-border-2 tw-bg-red-500 tw-rounded tw-w-full tw-h-max tw-p-2 tw-hidden tw-justify-center tw-items-center tw-mb-2">
            <p id="si_notice" class="tw-text-primary tw-font-semibold tw-tracking-wider tw-text-sm"></p>
         </div>

         <div class="tw-border-b-2 tw-border-tertiary tw-w-full tw-flex tw-flex-col-reverse tw-mb-4">

            <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-text-quatenary tw-w-6 tw-h-6 tw-me-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
               </svg>

               <input type="text" id="SI_username" placeholder="username" class="tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary focus:tw-outline-none tw-w-full tw-px-2 tw-py-1" autocomplete="off" />
            </div>
            <label for="SI_username" id="si_lbl_un" class="tw-text-quatenary tw-opacity-0 tw-tracking-wider tw-text-sm tw-ms-10">username</label>
         </div>

         <div class="tw-border-b-2 tw-border-tertiary tw-w-full tw-flex tw-flex-col-reverse tw-mb-4">

            <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-text-quatenary tw-w-6 tw-h-6 tw-me-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
               </svg>
               
               <input type="password" id="SI_password" placeholder="password" class="tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary focus:tw-outline-none tw-w-full tw-px-2 tw-py-1" />
            </div>
            <label for="SI_password" id="si_lbl_pw" class="tw-text-quatenary tw-opacity-0 tw-tracking-wider tw-text-sm tw-ms-10">password</label>
         </div>

         <div class="tw-flex w-full tw-justify-start tw-items-center tw-mt-2">
            <input type="checkbox" id="SI_remember" class="tw-rounded tw-w-4 tw-h-4" />
            <label for="SI_remember" class="tw-text-quatenary tw-tracking-wider tw-text-sm tw-ms-5">remember me?</label>
         </div>

         <div class="tw-w-full tw-mt-10">
            <button type="submit" class="tw-bg-quatenary tw-rounded tw-text-primary tw-text-xl tw-flex tw-justify-center tw-items-center tw-w-full tw-h-max tw-py-2 tw-uppercase">sign in</button>
         </div>
      </form>

   </div>

   <div class="c2 tw-w-full tw-h-full tw-absolute tw-right-[-50%] tw-flex entrance">
      <div class="tw-p-2 tw-h-full tw-w-1/2 tw-flex tw-justify-center tw-items-center">
         <div class="main-card tw-flex tw-justify-center tw-flex-col tw-w-full tw-h-full tw-shadow-2xl tw-rounded-lg tw-overflow-hidden tw-relative">
            <div class="card-bg tw-bg-[url('../../src/assets/img/bg-login.svg')] tw-bg-cover tw-h-full tw-w-[300%] tw-bg-no-repeat tw-absolute tw-z-[1] tw-top-0 tw-left-0">
            </div>

            <div class="banner tw-flex tw-flex-col tw-items-center tw-justify-center tw-z-[2] tw-mb-5">
               <h4 class="tw-text-tertiary tw-text-2xl tw-z-[2] tw-flex tw-font-semibold">Welcome to</h4>
               <div class="tw-flex tw-justify-center tw-items-center">
                  <img src="../../src/assets/img/logo_01.svg" class="logo tw-w-16 tw-stroke-1 tw-stroke-alpha" alt="">
                  <h1 class="logo-name tw-text-quatenary tw-text-6xl tw-font-['Questrial'] tw-font-bold tw-tracking-tighter"><span class="tw-text-secondary tw-font-['Questrial']">ka</span>linga</h1>
               </div>
            </div>

            <div class="tw-flex tw-w-full tw-justify-center tw-align-center tw-my-3 tw-z-[2]">
               <button id="switch" class="tw-bg-quatenary tw-text-primary tw-px-4 tw-py-2 tw-rounded tw-text-lg hover:tw-bg-tertiary tw-uppercase" disabled>sign up</button>
            </div>
         </div>
      </div>

      <div class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-w-1/2 tw-h-screen tw-px-10 tw-gap-5">
         <div class="su-header tw-flex tw-flex-col tw-items-center tw-opacity-0">
            <h1 class="tw-text-secondary tw-text-5xl tw-font-[Questrial]">sign up</h1>
         </div>

         <form action="" id="signup" method="post" class="tw-flex tw-flex-col tw-w-3/5 tw-h-max tw-opacity-0">
            <div class="tw-border-2 tw-border-beta tw-rounded tw-w-full tw-h-max tw-p-2 tw-hidden tw-justify-center tw-items-center tw-mb-2">
               <p id="su_notice" class="text-err tw-font-semibold tw-tracking-wider tw-text-sm"></p>
            </div>

            <div class="tw-flex tw-gap-5 tw-mb-5">
               <div class="tw-border-b-2 tw-border-quatenary tw-w-full tw-flex tw-flex-col-reverse ">
                  <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-w-6 tw-h-6 tw-me-3 tw-text-quatenary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                     </svg>

                     <input type="text" id="SU_fname" placeholder="first name" class="focus:tw-outline-none tw-bg-primary tw-w-full tw-px-2 tw-py-1 tw-text-quatenary placeholder:tw-text-tertiary" autocomplete="off" />
                  </div>
                  <label for="SU_fname" id="su_lbl_fn" class="tw-opacity-0 tw-tracking-wider tw-text-sm tw-text-quatenary">first name</label>
               </div>

               <div class="tw-border-b-2 tw-border-quatenary tw-w-full tw-flex tw-flex-col-reverse ">
                  <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-text-quatenary tw-w-6 tw-h-6 tw-me-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                     </svg>

                     <input type="text" id="SU_lname" placeholder="last name" class="focus:tw-outline-none tw-w-full tw-px-2 tw-py-1 tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary" />
                  </div>
                  <label for="SU_lname" id="su_lbl_ln" class="tw-opacity-0 tw-tracking-wider tw-text-sm tw-text-quatenary">last name</label>
               </div>
            </div>

            <div class="tw-border-b-2 tw-w-full tw-flex tw-flex-col-reverse tw-border-tertiary">
               <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-w-5 tw-h-5 tw-me-3 tw-text-quatenary">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                  </svg>

                  <input type="text" id="SU_username" placeholder="username" class="focus:tw-outline-none tw-w-full tw-px-2 tw-py-1 tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary" />
               </div>
               <label for="SU_username" id="su_lbl_un" class="tw-opacity-0 tw-tracking-wider tw-text-sm tw-text-quatenary">username</label>
            </div>
               <p id="un_msg" class="tw-text-sm tw-mb-3 tw-font-semibold tw-tracking-wider tw-opacity-0 tw-text-err">a</p>

            <div class="tw-border-b-2 tw-w-full tw-flex tw-flex-col-reverse tw-border-tertiary">
               <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-w-6 tw-h-6 tw-me-3 tw-text-tertiary">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                  </svg>

                  <input type="email" id="SU_email" placeholder="email address" class="focus:tw-outline-none tw-w-full tw-px-2 tw-py-1 tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary" />
               </div>
               <label for="SU_email" id="su_lbl_em" class="tw-opacity-0 tw-tracking-wider tw-text-sm tw-text-quatenary">email address</label>
            </div>
               <p id="em_msg" class="tw-text-sm tw-mb-3 tw-font-semibold tw-tracking-wider tw-opacity-0 tw-text-err">invalid email. (Must be: name@example.com)</p>

            <div class="tw-border-b-2 tw-w-full tw-flex tw-flex-col-reverse tw-border-tertiary">
               <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-w-6 tw-h-6 tw-me-3 tw-text-quatenary">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                  </svg>

                  <input type="password" id="SU_password" placeholder="password" class="focus:tw-outline-none tw-w-full tw-px-2 tw-py-1 tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary" />
               </div>
               <label for="SU_password" id="su_lbl_pw" class="label-password tw-opacity-0 tw-tracking-wider tw-text-sm tw-text-quatenary">password</label>
            </div>
               <p id="pw_msg" class="tw-text-sm tw-mb-3 font-semibold tracking-wider tw-opacity-0">a</p>

            <div class="tw-border-b-2 tw-border-tertiary tw-w-full tw-flex tw-flex-col-reverse">
               <div class="tw-flex tw-w-full tw-justify-center tw-items-center tw-px-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="tw-w-6 tw-h-6 tw-me-3 tw-text-quatenary">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                  </svg>

                  <input type="password" id="SU_repassword" placeholder="confirm password" class="focus:tw-outline-none tw-w-full tw-px-2 tw-py-1 tw-bg-primary tw-text-quatenary placeholder:tw-text-tertiary" />
               </div>
               <label for="SU_repassword" id="su_lbl_rpw" class="tw-opacity-0 tw-tracking-wider tw-text-sm tw-text-quatenary">confirm password</label>
            </div>
               <p id="rpw_msg" class="tw-text-err tw-text-sm tw-font-semibold tw-tracking-wider tw-opacity-0 tw-mb-10">a</p>

            <div class="w-full">
               <button type="submit" class="tw-rounded tw-text-xl tw-flex tw-justify-center tw-items-center tw-w-full tw-h-max tw-py-2 tw-uppercase tw-bg-quatenary tw-text-primary">sign up</button>
            </div>
         </form>
      </div>
   </div>

</body>

</html>