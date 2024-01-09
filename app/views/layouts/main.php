<?php

use kingston\icarus\Application;

use kingstonenterprises\app\models\User;

if (!Application::isGuest()) {
	$user = new User;
	$user = $user->findOne([
		'id' => Application::$app->session->get('user')
	]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="/img/favicon.ico">
	<link rel="stylesheet" href="/css/tailwind.css" />
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 p-0 bg-violet-500">
	<!-- <nav class="m-0 p-3 flex flex-row justify-between text-yellow-400 text-2xl font-bold underline">
		<div>
			<a href="/">Home</a>
		</div>
		<div>
			<ul class="flex flex-row justify-around">

				<?php if (Application::isGuest()) : ?>
					<li class="mx-2">
						<a href="/auth/login/">Login</a>
					</li>
					<li class="mx-2">
						<a href="/auth/register/">Register</a>
					</li>
				<?php else : ?>
					<li class="mx-2">
						<a href="/dashboard">
							<?php echo $user->getDisplayName() ?>
						</a>
					</li>
					<li class="mx-2">
						<a href="/auth/logout">
							Logout
						</a>
					</li>


				<?php endif; ?>
			</ul>
		</div>
	</nav> -->

	<nav class="flex items-center justify-between flex-wrap bg-violet-950 p-6">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
			<span class="font-semibold text-xl tracking-tight">

				<a href="/">CPM</a>
			</span>
		</div>
		<div class="block lg:hidden">
			<button class="flex items-center px-3 py-2 border rounded text-violet-200 border-violet-400 hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
				</svg>
			</button>
		</div>
		<div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
			<div class="text-sm lg:flex-grow">
      <!-- <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-violet-200 hover:text-white mr-4">
        Docs
      </a>
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-violet-200 hover:text-white mr-4">
        Examples
      </a>
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-violet-200 hover:text-white">
        Blog
      </a> -->
    </div>
			<div>
				<?php if (Application::isGuest()) : ?>
					<a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-violet-500 hover:bg-white mt-4 lg:mt-0" href="/auth/login/">Login</a>
					<a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-violet-500 hover:bg-white mt-4 lg:mt-0" href="/auth/register/">Register</a>
				<?php else : ?>
					<a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-violet-500 hover:bg-white mt-4 lg:mt-0" href="/dashboard">
						<?php echo $user->getDisplayName() ?>
					</a>
					<a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-violet-500 hover:bg-white mt-4 lg:mt-0" href="/auth/logout">
						Logout
					</a>


				<?php endif; ?>
			</div>
		</div>
	</nav>

	<?php if (Application::$app->session->getFlash('success')) : ?>
		<div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
			<p><?php echo Application::$app->session->getFlash('success') ?></p>
		</div>
	<?php elseif (Application::$app->session->getFlash('warning')) : ?>
		<div class="bg-orange-100 rounded-lg py-5 px-6 mb-4 text-base text-orange-700" role="alert">
			<p><?php echo Application::$app->session->getFlash('warning') ?></p>
		</div>
	<?php endif; ?>
	{{content}}
</body>

</html>