<!-- CSS only -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<style>
    .px-48 {
        padding-left: 12rem !important;
        padding-right: 12rem !important;
    }
</style>

<body>
    <header>
        <div class="flex justify-between px-44 pt-3 text-xl bg-rose-800 py-3 text-white font-semibold">
            <div class="flex gap-6">
                <p class="text-2xl font-serif">Book your tickets</p>
                <input class="border border-gray-100 rounded text-sm p-1 w-72" placeholder="Search for events">
            </div>
            <div class="grid grid-cols-2">
                <p class="">
                    <a href="/login">Login</a>
                </p>
                <p class="">
                    <a href="/register">Register</a>
                </p>
            </div>
        </div>
    </header>
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
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script></script>
