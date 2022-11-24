<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function default()
    {
        return view('customer.custom-default');
    }

    public function add_events(){
        return view('event-add');
    }

    public function book_events() {
        return view('event-book');
    }
}
