@include('header')
    <div class="p-1 px-48">

        <div class="py-5 flex justify-between">
            <h2 class="text-2xl font-semibold">Update Customer: {{ $user->name }}</h2>
            <p>
                <a href="javascript:history.back()"><button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Back</button></a>
            </p>
        </div>

        <form method="post" action="/admin/update_customer/{{ $id }}">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="form-group mb-3">
                    <input type="text" placeholder="Name" id="name" class="form-control" name="name" required
                        autofocus value="{{ $user->name }}">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="email" placeholder="Email" id="email" class="form-control" name="email" required value="{{ $user->email }}">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="d-grid mx-auto text-end ">
                <button type="submit" class="btn bg-rose-800 text-white">Save</button>
            </div>
        </form>
    </div>
    @include('footer')
