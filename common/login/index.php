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

<body class="">
	<div class="overflow-hidden bg-primary w-screen h-screen relative">
		<div class="block sm:hidden card-bg bg-[url('../../src/assets/img/bg-login.svg')] bg-cover h-full w-[300%] bg-no-repeat absolute z-[1] top-0 left-0 opacity-70"></div>
	
		<div class="fixed top-4 left-0 w-full h-20 z-30 hidden sm:flex items-center entranceAlt">
			<img src="../../src/assets/img/logo_01.svg" class="logo-flair w-16 absolute left-10" alt="">
		</div>
	
		<!-- sign in -->
		<div class="c1 overflow-hidden w-full sm:w-1/2 h-full absolute left-0 flex flex-col justify-center items-center px-10 xl:px-40 z-20">
	
			<div class="si-header flex flex-col items-center mb-3 entranceAlt static z-10 ">
				<img src="../../src/assets/img/logo_01.svg" class="w-16 block sm:hidden mb-4" alt="">
				<h1 class="text-secondary text-5xl font-[Questrial]">sign in</h1>
				<h4 class="text-tertiary text-xs sm:text-sm text-left sm:text-center lg:text-base font-semibold font-[Source Sans]">Aiding those in need is now just one click away</h4>
			</div>
	
			<form method="post" id="signin" class="flex flex-col w-full h-max entranceAlt static z-10">
	
				<div class="border-2 bg-red-500 rounded w-full h-max p-2 hidden justify-center items-center mb-2">
					<p id="si_notice" class="text-primary font-semibold tracking-wider text-sm"></p>
				</div>
	
				<div class="border-b-2 border-tertiary w-full flex flex-col-reverse mb-4">
					<div class="flex w-full justify-center items-center px-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-quatenary w-6 h-6 me-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
						</svg>
	
						<input type="text" id="SI_username" placeholder="username" class="bg-transparent text-quatenary placeholder:text-tertiary focus:outline-none w-full px-2 py-1" autocomplete="off" />
					</div>
					<label for="SI_username" id="si_lbl_un" class="text-quatenary opacity-0 tracking-wider text-sm ms-10">username</label>
				</div>
	
				<div class="border-b-2 border-tertiary w-full flex flex-col-reverse mb-4">
					<div class="flex w-full justify-center items-center px-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-quatenary w-6 h-6 me-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
						</svg>
	
						<input type="password" id="SI_password" placeholder="password" class="bg-transparent text-quatenary placeholder:text-tertiary focus:outline-none w-full px-2 py-1" />
					</div>
					<label for="SI_password" id="si_lbl_pw" class="text-quatenary opacity-0 tracking-wider text-sm ms-10">password</label>
				</div>
	
				<div class="flex w-full justify-start items-center mt-2">
					<input type="checkbox" id="SI_remember" class="rounded w-4 h-4" />
					<label for="SI_remember" class="text-quatenary tracking-wider text-sm ms-5">remember me?</label>
				</div>
	
				<div class="w-full mt-10 flex flex-col gap-4">
					<button type="submit" class="bg-quatenary rounded text-primary text-xl flex justify-center items-center w-full h-max py-2 uppercase">sign in</button>
					<button type="button" class="switch bg-transparent ring-2 ring-quatenary block sm:hidden w-full text-quatenary px-4 py-2 rounded text-lg hover:bg-tertiary uppercase" disabled>sign up</button>
				</div>
			</form>
	
		</div>
	
		<!-- sign up -->
		<div class="c2 overflow-hidden w-full h-full absolute -right-full sm:right-[-50%] flex entrance">
			<div class="p-2 h-full hidden sm:w-1/2 sm:flex justify-center items-center z-10">
				<div class="main-card flex justify-center flex-col w-full h-full shadow-2xl rounded-lg overflow-hidden relative">
					<div class="card-bg bg-[url('../../src/assets/img/bg-login.svg')] bg-cover h-full w-[300%] bg-no-repeat absolute z-[1] top-0 left-0"></div>
	
					<div class="banner flex flex-col items-center justify-center z-[2] mb-5">
						<h4 class="text-tertiary text-2xl z-[2] flex font-semibold">Welcome to</h4>
						<div class="flex justify-center items-center">
							<img src="../../src/assets/img/logo_01.svg" class="logo w-16 stroke-1 stroke-alpha" alt="">
							<h1 class="logo-name text-quatenary text-6xl font-['Questrial'] font-bold tracking-tighter"><span class="text-secondary font-['Questrial']">ka</span>linga</h1>
						</div>
					</div>
	
					<div class="flex w-full justify-center align-center my-3 z-[2]">
						<button type="button" class="switch bg-quatenary text-primary px-4 py-2 rounded text-lg hover:bg-tertiary uppercase" disabled>sign up</button>
					</div>
				</div>
			</div>
	
			<div class="c2-fix flex flex-col justify-center items-center w-full sm:w-1/2 h-screen px-10 xl:px-40 gap-5 static z-10">
				<div class="su-header flex flex-col items-center opacity-0">
					<img src="../../src/assets/img/logo_01.svg" class="w-16 block sm:hidden mb-4" alt="">
					<h1 class="text-secondary text-5xl font-[Questrial]">sign up</h1>
				</div>
	
				<form action="" id="signup" method="post" class="flex flex-col w-full h-max opacity-0">
					<div class="bg-red-500 rounded w-full h-max p-2 hidden justify-center items-center mb-2">
						<p id="su_notice" class="text-primary font-semibold tracking-wider text-sm"></p>
					</div>
	
					<div class="flex gap-5 mb-3">
						<div class="border-b-2 border-quatenary w-full flex flex-col-reverse ">
							<div class="flex w-full justify-center items-center px-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 me-3 text-quatenary">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
								</svg>
	
								<input type="text" id="SU_fname" placeholder="first name" class="focus:outline-none bg-transparent w-full px-2 py-1 text-quatenary placeholder:text-tertiary" autocomplete="off" />
							</div>
							<label for="SU_fname" id="su_lbl_fn" class="opacity-0 tracking-wider text-sm text-quatenary">first name</label>
						</div>
	
						<div class="border-b-2 border-quatenary w-full flex flex-col-reverse ">
							<div class="flex w-full justify-center items-center px-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-quatenary w-6 h-6 me-3">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
								</svg>
	
								<input type="text" id="SU_lname" placeholder="last name" class="focus:outline-none w-full px-2 py-1 bg-transparent text-quatenary placeholder:text-tertiary" />
							</div>
							<label for="SU_lname" id="su_lbl_ln" class="opacity-0 tracking-wider text-sm text-quatenary">last name</label>
						</div>
					</div>
	
					<div class="border-b-2 w-full flex flex-col-reverse border-tertiary mb-3">
						<div class="flex w-full justify-center items-center px-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 me-3 text-quatenary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
							</svg>
	
							<input type="text" id="SU_username" placeholder="username" class="focus:outline-none w-full px-2 py-1 bg-transparent text-quatenary placeholder:text-tertiary" />
						</div>
						<label for="SU_username" id="su_lbl_un" class="opacity-0 tracking-wider text-sm text-quatenary">username</label>
					</div>
					<p id="un_msg" class="text-sm font-semibold tracking-wider text-err hidden">a</p>
	
					<div class="border-b-2 w-full flex flex-col-reverse border-tertiary mb-3">
						<div class="flex w-full justify-center items-center px-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 me-3 text-tertiary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
							</svg>
	
							<input type="email" id="SU_email" placeholder="email address" class="focus:outline-none w-full px-2 py-1 bg-transparent text-quatenary placeholder:text-tertiary" />
						</div>
						<label for="SU_email" id="su_lbl_em" class="opacity-0 tracking-wider text-sm text-quatenary">email address</label>
					</div>
					<p id="em_msg" class="text-sm font-semibold tracking-wider text-err hidden">invalid email. (Must be: name@example.com)</p>
	
					<div class="border-b-2 w-full flex flex-col-reverse border-tertiary mb-3">
						<div class="flex w-full justify-center items-center px-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 me-3 text-quatenary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
							</svg>
	
							<input type="password" id="SU_password" placeholder="password" class="focus:outline-none w-full px-2 py-1 bg-transparent text-quatenary placeholder:text-tertiary" />
						</div>
						<label for="SU_password" id="su_lbl_pw" class="label-password opacity-0 tracking-wider text-sm text-quatenary">password</label>
					</div>
					<p id="pw_msg" class="text-sm font-semibold tracking-wider hidden">a</p>
	
					<div class="border-b-2 border-tertiary w-full flex flex-col-reverse">
						<div class="flex w-full justify-center items-center px-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 me-3 text-quatenary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
							</svg>
	
							<input type="password" id="SU_repassword" placeholder="confirm password" class="focus:outline-none w-full px-2 py-1 bg-transparent text-quatenary placeholder:text-tertiary" />
						</div>
						<label for="SU_repassword" id="su_lbl_rpw" class="opacity-0 tracking-wider text-sm text-quatenary">confirm password</label>
					</div>
					<p id="rpw_msg" class="text-err text-sm font-semibold tracking-wider opacity-0 mb-10">a</p>
	
					<div class="w-full flex flex-col gap-4">
						<button type="submit" class="rounded text-xl flex justify-center items-center w-full h-max py-2 uppercase bg-quatenary text-primary">sign up</button>
						<button type="button" class="switch bg-transparent ring-2 ring-quatenary block sm:hidden w-full text-quatenary px-4 py-2 rounded text-lg hover:bg-tertiary uppercase" disabled>sign in</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>