@include('header')
<div class="p-5 px-48">

        <div class="py-5">
            <h2 class="text-2xl font-semibold">Customers</h2>
            <p>
                <a class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900" href="/customer_add">Add New Customer</a>
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($users as $item)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <td>
                                <a href="/custom_edit/{{ $item->id }}"><button
                                        class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Edit</button></a>
                                <a href="/customer_delete/{{ $item->id }}"
                                    onclick="return confirm('Are you sure you want to delete this user?');"><button
                                        class="rounded p-2 bg-rose-800 text-white hover:bg-rose-900">Delete</button></a>
                            </td>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @include('footer')
