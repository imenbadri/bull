@include('layouts.header')

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Log In</h1>
            
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="{{ route('login') }}">

                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" label="Email address" placeholder="name@example.com" />
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" label="Password" placeholder="Password" />
                </div>

                {{-- <div class="form-floating mb-3">
                    
                    <input class="form-control" type="email" name="email" placeholder="name@example.com"
                        value="{{ old('email') }}" required />
                    <label for="email">Email address</label>
                    <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" required />
                    <label for="password">Password</label>
                    <div class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div> --}}
                <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
                <hr class="my-4">
                
                <small class="text-muted">Don't have an account? <a href="{{ route('signup') }}">Sign
                        Up</a></small>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
