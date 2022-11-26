@include('header')
<div class="p-1 px-48">

    <div class="py-5">
        <h2 class="text-2xl font-semibold">Events List</h2>
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
                <th scope="col">Number of seats available</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $item)
                @if ($item->show_event)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $item->event_name }}</td>
                        <td>{{ $item->event_date }}</td>
                        <td>{{ $item->available_seats }}</td>
                        <td>${{ number_format($item->ticket_price, 2) }}</td>
                        <td>
                            <a href="/book-event/{{ $item->id }}"><button
                                    class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Book
                                    now</button></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@include('footer')
