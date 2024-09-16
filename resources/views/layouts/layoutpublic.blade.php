<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <title>Laravel Opdracht</title>

</head>
<body>

<!-- header -->
<header class="w-full px-6 bg-white">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center">
        <a href="#" class="block py-6 w-full text-center md:text-left md:w-auto text-gray-600 no-underline flex justify-center items-center">
            Your Logo
        </a>
        <div class="w-full md:w-auto mb-6 md:mb-0 text-center md:text-right">
            <a href=" {{ route('login') }}" class="inline-block no-underline bg-black text-white text-sm py-2 px-3">Login</a>
        </div>
        <div class="w-full md:w-auto mb-6 md:mb-0 text-center md:text-right">
            <a href=" {{ route('register') }}" class="inline-block no-underline bg-black text-white text-sm py-2 px-3">Register</a>
        </div>
    </div>
</header>
<!-- /header -->

<!-- nav -->
<nav class="w-full bg-white md:pt-0 px-6 relative z-20 border-t border-b border-gray-300">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
        <div class="w-full md:w-1/2 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Home</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Products</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">About Us</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">News</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Contact</a>
        </div>
        <div class="w-full md:w-1/2 text-center md:text-right pb-4 md:p-0">
            <input type="search" placeholder="Search..." class="bg-gray-200 border text-sm p-1" />
        </div>
    </div>
</nav>
<!-- /nav -->

<!-- title -->
<h1 class="text-center text-xl md:text-4xl px-6 py-12 bg-white">Our Products</h1>
<!-- /title -->

@yield('content')

<!-- footer -->
<footer class="w-full bg-white px-6 border-t">
    <div class="container mx-auto max-w-4xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
        &copy;2019 Your Company. All rights reserved.
        <div class="pt-4 md:p-0 text-center md:text-right text-xs">
            <a href="#" class="text-black no-underline hover:underline">Privacy Policy</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Terms &amp; Conditions</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Contact Us</a>
        </div>
    </div>
</footer>
<!-- /footer -->


</body>
</html>
