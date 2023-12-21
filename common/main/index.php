<?php
     require_once '../php/dbh_inc.php';
     session_start();

     if (!isset($_SESSION['sessionID'])) {
          header("Location: ../login/index.php");
          session_abort();
     exit;
     }

     $_SESSION['activated'] = false;
?>

<!DOCTYPE html>
<html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>KALINGA</title>

          <link rel="stylesheet" href="../../src/extensions/output.css">
          <link rel="stylesheet" href="../../src/extensions/anim.css">
          <link rel="stylesheet" href="../../src/assets/fonts/fonts.css">
          <link rel="stylesheet" href="./index.css">

          <script src="../../node_modules/alpinejs/dist/cdn.js" defer></script>
          <script src="../../src/extensions/jquery-up.js"></script>

          <link rel="stylesheet" href="../../src/extensions/datatables/datatables.css" />
          <script src="../../src/extensions/datatables/datatables.js"></script>
          <script src="../../node_modules/echarts/dist/echarts.js"></script>

          <script src="index.js" type="module"></script>
          <script src="./dashboard.js" type="module"></script>
          <script src="./inventory.js" type="module"></script>
          <script src="./category.js" type="module"></script>
     </head>

     <body class="w-screen h-screen flex flex-col bg-primary">

          <header class="flex h-[10%] items-center border-b border-primaryfd entranceHeader relative z-10">
               <div id="navExpand" class="w-[6%] h-full flex justify-center items-center cursor-pointer">
                    <svg id="navExpand_icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512" class="w-7 h-7">
                         <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
                    </svg>
               </div>

               <div class="w-[70%] h-full flex items-center ps-5">
                    <img src="../../src/assets/img/logo_01.svg" class="w-9" alt="">
                    <h1 id="brandText" class="text-4xl font-bold font-[Questrial] text-secondary">ka<span class="font-[Questrial] text-quatenary">linga</span></h1>
               </div>

               <div class="w-[24%] h-full flex gap-5 justify-end items-center text-lg pe-8">
                    <div x-data="{ isOpen: false }" class="relative inline-block ">

                         <button @click="isOpen = !isOpen" class="relative z-10 flex items-center p-2 text-sm text-primary bg-quatenary border border-transparent rounded-md focus:border-secondary focus:ring-opacity-40 focus:ring-secondary focus:ring focus:outline-none">
                              <span class="mx-1 text-lg">
                              <?php
                                   $id = $_SESSION['sessionID'];
                                   $que = mysqli_query($conn, "SELECT * FROM tb_user WHERE usr_id='$id'");
                                   $sel = mysqli_fetch_array($que);
                                   echo $sel['usr_fname'];
                              ?>
                              </span>
                              <svg class="w-4 h-4 mx-1 text-primary" viewBox="0 0 128 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                              </svg>
                         </button>

                         <div x-show="isOpen" 
                              @click.away="isOpen = false"
                              x-transition:enter="transition ease-out duration-100"
                              x-transition:enter-start="opacity-0 scale-90"
                              x-transition:enter-end="opacity-100 scale-100"
                              x-transition:leave="transition ease-in duration-100"
                              x-transition:leave-start="opacity-100 scale-100"
                              x-transition:leave-end="opacity-0 scale-90"
                              class="absolute right-0 z-20 w-56 pt-2 mt-2 overflow-hidden origin-top-right bg-primary rounded-md shadow-xl">

                              <a href="#" class="flex items-center p-3 mt-2 text-sm transition-colors duration-300 transform hover:bg-gray-100 cursor-default">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-quatenary me-3" viewBox="0 0 512 512">
                                        <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                                   </svg>

                                   <div class="mx-1">
                                        <h1 class="text-sm font-semibold text-quatenary capitalize"><?php echo $sel['usr_fname'].' '.$sel['usr_lname'];?></h1>
                                        <p class="text-sm text-tertiary lowercase"><?php echo $sel['usr_email'];?></p>
                                   </div>
                              </a>

                              <hr class="border-gray-300">

                              <!-- TODO: view profile with capability to edit profile settings, including authentication -->
                              <a href="#" class="flex items-center px-4 py-3 text-base text-quatenary capitalize transition-colors duration-300 transform hover:bg-gray-200">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-quatenary me-3" viewBox="0 0 576 512">
                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                                   </svg>  
                                   view profile
                              </a>

                              <a href="#" class="flex items-center px-4 py-3 text-base text-quatenary capitalize transition-colors duration-300 transform hover:bg-gray-200">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 384 512" class="w-5 h-5 me-3">
                                        <path d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"/>
                                   </svg>
                                   toggle dark mode
                              </a>

                              <hr class="border-gray-300">

                              <a href="../php/logout.php" class="flex items-center px-4 py-3 text-base text-tertiary capitalize transition-colors duration-300 transform hover:bg-gray-200">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 me-3">
                                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                                   </svg>
                                   Sign Out
                              </a>
                         </div>
                    </div>
               </div>
          </header>

          <section class="flex h-[90%]">
               <nav class="flex flex-col justify-between h-full w-[6%] border-e border-primaryfd entranceNav">
                    <div class="tabs flex flex-col w-full items-center">

                         <div id="nav_dashboard" class="w-full flex relative py-4 cursor-pointer hover:bg-primaryfd gap-3 active-nav">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 ms-7">
                                   <path stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                              </svg>
                              <a class="nav-label absolute left-[30%] hidden text-xl">Dashboard</a>
                         </div>

                         <div id="nav_inventory" class="w-full flex relative py-4 cursor-pointer hover:bg-primaryfd gap-3">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="w-7 h-7 ms-7">
                                   <path d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/>
                              </svg>
                              <a class="nav-label absolute left-[30%] hidden text-xl">Inventory</a>
                         </div>
                    </div>

                    <div class="flex flex-col w-full items-center">

                         <div id="nav_settings" class="w-full flex relative py-4 cursor-pointer hover:bg-primaryfd">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="w-7 h-7 ms-7">
                                   <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/>
                              </svg>
                              <a class="nav-label absolute left-[30%] hidden text-xl">Settings</a>
                         </div>

                         <div id="nav_faq" class="w-full flex relative py-4 cursor-pointer hover:bg-primaryfd">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="w-7 h-7 ms-7">
                                   <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                              </svg>
                              <a class="nav-label absolute left-[30%] hidden text-xl">FAQ</a>
                         </div>

                    </div>
               </nav>

               <main class="h-full w-[94%]">

               </main>
          </section>

     <!-- alert success -->
     <div id="alert_success" class="hidden w-full max-w-sm overflow-hidden bg-primary rounded-lg shadow-md absolute right-4 top-4 z-50 opacity-0">
          <div class="flex items-center justify-center w-12 bg-emerald-500">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>

          </div>

          <div class="px-4 py-2 -mx-3">
               <div class="mx-3">
                    <span class="font-semibold text-emerald-500">Success</span>
                    <p id="alert_success_text" class="text-sm text-quatenary">a</p>
               </div>
          </div>
     </div>
     <!-- alert warning -->
     <div id="alert_warning" class="hidden w-full max-w-sm overflow-hidden bg-primary rounded-lg shadow-md absolute right-4 top-4 z-50 opacity-0">
          <div class="flex items-center justify-center w-12 bg-wrng">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
               </svg>
          </div>

          <div class="px-4 py-2 -mx-3">
               <div class="mx-3">
                    <span class="font-semibold text-wrng">Warning</span>
                    <p id="alert_warning_text" class="text-sm text-quatenary">a</p>
               </div>
          </div>
     </div>
     </body>
</html>