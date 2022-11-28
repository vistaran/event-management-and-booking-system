@include('header')
<div class="p-1 px-48">

    <div class="py-5 flex justify-between">
        <h2 class="text-2xl font-semibold">My Events</h2>
        <p>
            <a href="javascript:history.back()"><button
                    class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Back</button></a>
        </p>
    </div>

    {{-- <div>
            <ul class="gallery">
                <li class=""><img src="/images/event.jpg"></li>
                <li class=""><img src="/images/ladies.jpg"></li>
                <li class=""><img src="/images/spring.jpg"></li>
            </ul>
        </div> --}}
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Event Name</th>
                <th scope="col">Date</th>
                <th scope="col">Seats with table</th>
                <th scope="col">Seats without table</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $item)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $item->event_name }}</td>
                    <td>{{ $item->event_date }}</td>
                    <td>{{ $item->seats_booked_table }}</td>
                    <td>{{ $item->seats_booked_without_table }}</td>
                    <td>${{ number_format($item->ticket_price, 2) }}/person</td>
                    <td>
                        <a href="/custom_booked_edit/{{ $item->id }}"><button
                                class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Edit booking</button></a>
                        <a href="/custom_booked_delete/{{ $item->id }}"
                            onclick="return confirm('Are you sure you want to cancel this booking?');"><button
                                class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Cancel booking</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('footer')

<script>
    let events = {!! json_encode($events->toArray()) !!};
    console.log(events);
</script>
