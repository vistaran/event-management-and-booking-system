@include('header')
    <div class="p-5 px-48">

        <div class="py-5">
            <h2 class="text-2xl font-semibold">Add Customer</h2>
            <p>
                <a href="/custom_default" class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Back</a>
            </p>
        </div>

        <form method="post" action="/admin/add_customer">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Name" id="name" class="form-control" name="name" required
                    autofocus>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="passowrd" class="form-control" name="passowrd" required>
                @if ($errors->has('passowrd'))
                <span class="text-danger">{{ $errors->first('passowrd') }}</span>
                @endif
            </div>

            <div class="d-grid mx-auto text-end ">
                <button type="submit" class="btn bg-rose-800 text-white">Save</button>
            </div>
        </form>
    </div>
    @include('footer')
