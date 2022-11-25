@include('header')
<div class="p-5 px-48">

    <div class="py-5">
        <h2 class="text-2xl font-semibold">{{ $event_details->event_name }} - Booking Form</h2>
        <h3>
            {{ $event_details->event_date }}
        </h3>
    </div>

    <form>
        @csrf
        <div class="grid grid-cols-3 gap-10">
            {{-- <div class="form-group mb-3">
                <label>Number of seats<span class="text-red-600">*</span></label>
                <input type="number" placeholder="Number of seats required" id="num_seats" class="form-control"
                    name="num_seats" required autofocus>
                @if ($errors->has('num_seats'))
                    <span class="text-danger">{{ $errors->first('num_seats') }}</span>
                @endif
            </div> --}}
            <div class="form-group mb-3">
                <label class="font-semibold">Number of seats with table<span class="text-red-600">*</span></label>
                <input type="number" placeholder="Seats with table" id="seats_with_table" class="form-control"
                    name="seats_with_table" required value="0">
                @if ($errors->has('seats_with_table'))
                    <span class="text-danger">{{ $errors->first('seats_with_table') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label class="font-semibold">Number of seats without table<span class="text-red-600">*</span></label>
                <input type="number" placeholder="Seats without table" id="seats_without_table" class="form-control"
                    name="seats_without_table" required value="0">
                @if ($errors->has('seats_without_table'))
                    <span class="text-danger">{{ $errors->first('seats_without_table') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label class="font-semibold">Number of adults<span class="text-red-600">*</span></label>
                <input type="number" placeholder="Number of adults attending" id="no_of_adults" class="form-control"
                    name="no_of_adults" required value="0">
                @if ($errors->has('no_of_adults'))
                    <span class="text-danger">{{ $errors->first('no_of_adults') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label class="font-semibold">Upload your photo for identification<span
                        class="text-red-600">*</span></label>
                <input type="file" placeholder="Upload your photo" id="photo" class="form-control" name="photo"
                    required>
                @if ($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
            </div>
        </div>

        <div class="d-grid mx-auto text-end">
            <button type="button" class="btn bg-rose-800 text-white" onclick="eventBook();event.preventDefault()">Save</button>
        </div>
    </form>
</div>
@include('footer')

<script>
    function eventBook() {
        let total_seats = Number($('#seats_without_table').val()) + Number($('#seats_with_table').val());
        console.log(total_seats, 'total');
        let events = {!! json_encode($event_details->toArray()) !!};
        console.log(events);
        console.log('photy', $('#photo').val());
        if ($('#no_of_adults').val() < 1) {
            alert('Atleast one user must be present!');
            return;
        } else if (total_seats > 8) {
            alert('Only 8 seats can be booked per user!');
            return;
        } else {
            $.ajax({
                url: "/add_attendee/" + events.id,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token: "{{ csrf_token() }}",
                    seats_with_table: $('#seats_with_table').val(),
                    seats_without_table: $('#seats_without_table').val(),
                    no_of_adults: $('#no_of_adults').val(),
                    adult_photo: $('#photo').val(),
                },
                datatype: 'JSON',
                success: function(res) {
                    window.location.href = '/custom_default';
                    console.log('success');
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    }
</script>
