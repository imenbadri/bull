
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta_discription->value ?? '' }}@stack('meta')" />
    @foreach (config('bull.public.global.css') as $item)
        <link rel="stylesheet" crossorigin="anonymous" href="{{ $item }}">
    @endforeach
    <title>Home Page</title>
</head>

<body class="py-0">
    <!-- Header -->
    <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                        <a href="/" class="nav-link text-secondary">
                            Home
                        </a>
                        </li>
                        
                        <li>
                        <a href="{{ route('list')}}" class="nav-link text-white">
                            Links
                        </a>
                        </li>
                        
                    </ul>
                    @if(!\Auth::check())
                    <div class="px-3 py-2">
                        <div class="container d-flex flex-wrap ">

                            <div class="text-end">
                                <a class="btn btn-outline-primary me-1" href="{{ route('loginPage') }}">Login</a>
                                <a class="btn btn-outline-warning" href="{{ route('signup') }}">Sign-up</a>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                </div>
            </div>
        </div>
    </header>
