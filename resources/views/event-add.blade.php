@include('header')
    <div class="p-5 px-48">

        <div class="py-5">
            <h2 class="text-2xl font-semibold">Add New Event</h2>
            <p>
                <button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Back</button>
            </p>
        </div>

        <form method="get" action="/admin/events">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Event Name" id="event_name" class="form-control" name="event_name" required
                    autofocus>
                @if ($errors->has('event_name'))
                <span class="text-danger">{{ $errors->first('event_name') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Max Seats" id="max_seats" class="form-control" name="max_seats" required>
                @if ($errors->has('max_seats'))
                <span class="text-danger">{{ $errors->first('max_seats') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="text" placeholder="Cost Per Ticket" id="cost_per_ticket" class="form-control" name="cost_per_ticket" required>
                @if ($errors->has('cost_per_ticket'))
                <span class="text-danger">{{ $errors->first('cost_per_ticket') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="date" placeholder="Event Date" id="event_date" class="form-control" name="event_date" required>
                @if ($errors->has('event_date'))
                <span class="text-danger">{{ $errors->first('event_date') }}</span>
                @endif
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Save</button>
            </div>
        </form>
    </div>
    @include('footer')
