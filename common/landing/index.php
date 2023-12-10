<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>KALINGA</title>

   <link rel="stylesheet" href="../../src/extensions/output.css">
   <link rel="stylesheet" href="../../src/extensions/anim.css">
   <link rel="stylesheet" href="../../src/assets/fonts/fonts.css">

   <script src="../../src/extensions/jquery-up.js"></script>
</head>

<body class="overflow-hidden bg-primary">
   <!-- nav that shows on scroll -->
   <div class="nav-container fixed top-0 z-30 flex justify-center items-center w-screen">
      <div class="nav bg-primary w-screen h-min flex justify-center items-center rounded shadow-lg py-2 px-5">
         <div class="flex cursor-pointer">
            <img src="../../src/assets/img/logo_01.svg" class="nav-logo w-11" alt="">
            <h1 class="nav-logo-name text-5xl font-['Questrial'] text-delta tracking-tighter">
               <span class="font-['Questrial'] text-secondary">ka</span>linga
            </h1>
         </div>
         <div>

            <button class="font-['Source Sans'] uppercase text-sm font-bold border-4 rounded p-1 sm:p-2 border-quatenary hover:bg-quatenary text-quatenary hover:text-quatenary">sign
               in
            </button>
         </div>
      </div>
   </div>

   <div class="screen bg-primary flex items-center justify-center h-screen w-screen relative z-10">

      <div class="logo-container flex flex-col items-center w-2/3 absolute z-20">
         <div class="flex items-center h-20">
            <img src="../../src/assets/img/logo_01.svg" class="logo w-14 md:w-20" alt="">
            <h1 class="logo-name text-6xl md:text-8xl font-['Questrial'] text-quatenary tracking-tighter">
               <span class="text-secondary font-['Questrial']">ka</span>linga
            </h1>
         </div>

         <div class="sisu-buttons flex w-2/3 justify-center mt-10">
            <div class="signin flex w-max uppercase justify-center cursor-pointer font-['Source Sans'] text-lg font-bold border-4 rounded py-1 px-2 border-quatenary hover:bg-quatenary hover:text-primary">
               <h3>sign in</h3>
            </div>
         </div>
      </div>

      <ul class="clutter z-10">
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
      </ul>

   </div>

   <div class="aboutus-container bg-[url('../../src/assets/img/bg.svg')] flex bg-cover h-screen w-screen gap-10 justify-center items-center relative z-0 p-5">
      <h1 class="flex flex-col w-max gap-4 font-bold text-primary text-right font-['Questrial'] text-7xl">
         <div>About</div>
         <div>this</div>
         <div>project</div>
      </h1>

      <p class="anchor-a text-primary text-justify w-2/3 text-xl">Esse
         incididunt sit tempor ea incididunt eu exercitation laboris reprehenderit minim exercitation veniam. Velit
         eiusmod laboris deserunt laborum aliquip elit. Nulla nostrud minim ea laboris mollit irure culpa amet. Fugiat
         est voluptate culpa consectetur. Commodo consequat ex id laboris aliqua aliquip eu enim incididunt cillum
         incididunt magna sit. Est ex fugiat irure nostrud nostrud nostrud commodo ea velit.</p>
   </div>

   <script src="./index.js"></script>
</body>

</html>