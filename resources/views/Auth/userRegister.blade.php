@include('layouts.header')

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Welcome</h1>
            
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="{{ route('register') }}">

                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" label="User Name" placeholder="name@example.com" />
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" label="Email address" placeholder="name@example.com" />
                </div>
                <div class="input-group mb-3">
                   <input type="password" class="form-control" name="password" label="Password" placeholder="Password" />
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="conf_password" label="Confirm Password" placeholder="Password" />
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
                <hr class="my-4">
                <small class="text-muted">Already have an account? <a href="{{ route('loginPage') }}">Log In</a></small>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')