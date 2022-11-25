<html>
<!-- CSS only -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <p class="text-2xl font-serif"><a href="/">Book your tickets</a></p>
                <input class="border border-gray-100 rounded text-sm p-1 w-72" placeholder="Search for events">
            </div>
            <div class="grid grid-cols-2">

                @auth
                    <p>
                        <a>{{ auth()->user()->name }}</a>
                    </p>
                    <p class="">
                        <a href="/custom_default">Customers</a>
                    </p>
                    <p>
                        <a href="/signout">Logout</a>
                    </p>
                @else
                    <p class="">
                        <a href="/login">Login</a>
                    </p>
                    <p class="">
                        <a href="/registration">Register</a>
                    </p>
                @endauth
                
            </div>
        </div>
    </header>
