@include('header')
    <div class="p-1 px-48">

        <div class="py-5 flex justify-between">
            <h2 class="text-2xl font-semibold">Add New Event</h2>
            <p>
                <a href="javascript:history.back()"><button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Back</button></a>
            </p>
        </div>

        <form method="post" action="/admin/add_event">
            @csrf
            <div class="grid grid-cols-2 gap-5">

                <div class="form-group mb-3">
                    <label>Event name<span class="text-red-600">*</span></label>
                    <input type="text" placeholder="Event Name" id="event_name" class="form-control" name="event_name" required
                        autofocus>
                    @if ($errors->has('event_name'))
                    <span class="text-danger">{{ $errors->first('event_name') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label>Max Seats<span class="text-red-600">*</span></label>
                    <input type="text" placeholder="Max Seats" id="no_of_seats" class="form-control" name="no_of_seats" required>
                    @if ($errors->has('no_of_seats'))
                    <span class="text-danger">{{ $errors->first('no_of_seats') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label>Cost Per Ticket<span class="text-red-600">*</span></label>
                    <input type="text" placeholder="Cost Per Ticket" id="ticket_price" class="form-control" name="ticket_price" required>
                    @if ($errors->has('ticket_price'))
                    <span class="text-danger">{{ $errors->first('ticket_price') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label>Event Date<span class="text-red-600">*</span></label>
                    <input type="date" placeholder="Event Date" id="event_date" class="form-control" name="event_date" required>
                    @if ($errors->has('event_date'))
                    <span class="text-danger">{{ $errors->first('event_date') }}</span>
                    @endif
                </div>
            </div>

            <div class="d-grid mx-auto text-end ">
                <button type="submit" class="btn bg-rose-800 text-white">Save</button>
            </div>
        </form>
    </div>
    @include('footer')
