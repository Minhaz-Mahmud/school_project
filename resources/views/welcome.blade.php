<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


@if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
        <a href="{{ route('home') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            HOME
        </a>
        <!-- Add more navigation links for authenticated users if needed -->
        <a href="{{ route('logout') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            LOGOUT
        </a>
    </nav>
@else
    <nav class="-mx-3 flex flex-1 justify-end">
        <a href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in as Student
        </a>
        <a href="{{ route('a_login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in as Admin
        </a>
    </nav>
@endif



<br>
@if (Route::has('login'))
    <p>Login route exists</p>
@else
    <p>Login route does not exist</p>
@endif


</body>
</html>