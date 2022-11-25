@include('header')
<div class="p-5 px-48">

    <div class="py-5">
        <h2 class="text-2xl font-semibold">Manage Events</h2>
        <p>
            <a class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900" href="/admin/add-event">Add New Event</a>
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
                <th scope="col">Date & Time</th>
                <th scope="col">Total number of seats</th>
                <th scope="col">Available seats</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->event_name }}</td>
                    <td>{{ $item->event_date }}</td>
                    <td>{{ $item->no_of_seats }}</td>
                    <td>{{ $item->available_seats }}</td>
                    <td>{{ $item->ticket_price }}</td>
                    <td>
                        <a href="/admin/edit_event/{{ $item->id }}"><button
                                class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Edit</button></a>
                        <a href="/admin/event_delete/{{ $item->id }}"
                            onclick="return confirm('Are you sure you want to delete this event?');"><button
                                class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Delete</button></a>
                        @if ($item->show_event == 1)
                            <a href="/admin/show_event/{{ $item->id }}"><button
                                    class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Hide</button></a>
                        @else
                            <a href="/admin/show_event/{{ $item->id }}"><button
                                    class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Unhide</button></a>
                        @endif

                    </td>
                </tr>
            @endforeach
            {{-- <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>10</td>
                <td>10.00</td>
                <td>
                    <button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Book now</button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>15</td>
                <td>15.00</td>
                <td>
                    <button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Book now</button>
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
@include('footer')

<script>
    let events = {!! json_encode($events->toArray()) !!};
    console.log(events);
</script>
