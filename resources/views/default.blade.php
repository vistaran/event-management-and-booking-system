@include('header')
    <div class="p-5 px-48">

        <div class="py-5">
            <h2 class="text-2xl font-semibold">Upcoming Events</h2>
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
                    <th scope="col">Number of seats available</th>
                    <th scope="col">Ticket Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $item)

                @endforeach
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>20</td>
                    <td>20.00</td>
                    <td>
                        <button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Book now</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>10</td>
                    <td>10.00</td>
                    <td>
                        <a href="/book-event"><button class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Book now</button></a>
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
                </tr>
            </tbody>
        </table>
    </div>
    @include('footer')
