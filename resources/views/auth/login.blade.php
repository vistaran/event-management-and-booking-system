@include('header')
<main class="login-form my-auto py-24">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body text-sm">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="">Email<span class="text-red-600">*</span></label>

                                <input type="text" placeholder="Email" id="email" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="">Password<span class="text-red-600">*</span></label>

                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <p class="text-sm text-end pb-2 text-gray-600"><a href="/registration">Not yet registered?
                                    Click here to register.</a></p>
                            <div class="d-grid mx-auto text-end">
                                <button type="submit" class="btn bg-rose-800 text-white">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer')
