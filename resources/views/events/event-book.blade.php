@include('header')
<div class="p-1 px-48">

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
            <button type="button" class="btn bg-rose-800 text-white"
                onclick="eventBook();event.preventDefault()">Save</button>
        </div>
    </form>
</div>
@include('footer')

<script type="text/javascript">
    console.log($('#photo').val());

    let events = {!! json_encode($event_details->toArray()) !!};

    function eventBook() {
        let total_seats = Number($('#seats_without_table').val()) + Number($('#seats_with_table').val());
        console.log(total_seats, 'total');
        console.log(events);
        console.log('photy', $('#photo').val());
        if ($('#no_of_adults').val() < 1) {
            alert('Atleast one adult must be present!');
            return;
        } else if (events.available_seats < total_seats) {
            alert('Only ' + events.available_seats + ' seats are available.');
        } else if (total_seats > 8) {
            alert('Only 8 seats can be booked per user!');
            return;
        } else if ($('#photo').val() == '') {
            alert('Please upload one adult photo to proceed.');
            return
        } else {
            $.ajax({
                url: "/add_attendee/" + events.id,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token: "{{ csrf_token() }}",
                    seats_with_table: Number($('#seats_with_table').val()),
                    seats_without_table: Number($('#seats_without_table').val()),
                    no_of_adults: Number($('#no_of_adults').val()),
                    adult_photo: $('#photo').val(),
                },
                datatype: 'html',
                success: function(res) {
                    window.location.href = '/list_events';
                    console.log(res);
                    openWin();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    }
    // openWin()

    function openWin() {
        console.log('open');

        var win = window.open('', '', 'width=300,height=150');
        win.document.write(`
          <!DOCTYPE html>
          <html lang="en">
          <style>
            .text-align {
              margin-top: 0.5rem;
              margin-bottom: 0.5rem;
              text-align: left
            }

          p {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
          }

          .m-0 {
            margin-top: 0;
            margin-bottom: 0;
          }

          .font-bold {
            font-weight: bold;
          }
          .tax:before, .tax:after {
            content: "";
            flex: 1 1;
            border-bottom: 1px dashed #000;
            margin: auto;
          }

          .tax {
            display: flex;
            flex-direction: row;
          }

          .grid-container {
            display: grid;
            grid-template-columns: auto auto;
          }
          body {
            font-size: 10px;
            font-family: Consolas,monaco,monospace;
          }
          .font-11 {
            font-size: 11px;
          }
    }

      </style>
        <body>
          <p class="text-align"></p>
          <h2 class="text-align">Christmas Special</h2>
          <h1 class="text-align m-0">` + events.event_name + `</h1>

            <h2 class="m-0"><span class="font-bold">` + events.event_date + ` </span></h2>
            <div class="grid-container">
                <h4 class="text-align font-11">Seats with table:` + $('#seats_with_table').val() + `</h4>
                <h4 class="text-align font-11">Seats without table:` + $('#seats_without_table').val() + `</h4>
                </div>
                <h4 class="font-11 text-align" style="margin:0">Tickect Price</h4>
                <h1 class="text-align" style="margin:0">$` + events.ticket_price + `/person</h1>
        </body>
      </html>
      `);

        setTimeout(function() {
            win.document.close();
            win.focus();
            win.print();
            win.close();
        }, 1000);


        // setTimeout(() => {
        //     myWindow.document.close();
        //     myWindow.focus();
        //     myWindow.print();
        //     myWindow.close();
        // });
    }
</script>
