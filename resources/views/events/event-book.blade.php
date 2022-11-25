@include('header')
    <div class="p-5 px-48">

        <div class="py-5">
            <h2 class="text-2xl font-semibold">Event Name - Booking Form</h2>
            <h3>
                3, June 2023
            </h3>
        </div>

        <form method="get" action="/admin/events">
            @csrf
            <div class="form-group mb-3">
                <input type="number" placeholder="Number of seats required" id="num_seats" class="form-control" name="num_seats" required
                    autofocus>
                @if ($errors->has('num_seats'))
                <span class="text-danger">{{ $errors->first('num_seats') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="number" placeholder="Seats with table" id="seats_with_table" class="form-control" name="seats_with_table" required>
                @if ($errors->has('seats_with_table'))
                <span class="text-danger">{{ $errors->first('seats_with_table') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="number" placeholder="Seats without table" id="seats_without_table" class="form-control" name="seats_without_table" required>
                @if ($errors->has('seats_without_table'))
                <span class="text-danger">{{ $errors->first('seats_without_table') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="file" placeholder="Upload your photo" id="photo" class="form-control" name="photo" required>
                @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Save</button>
            </div>
        </form>
    </div>
    @include('footer')
