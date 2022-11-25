<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function default()
    {
        $users = User::where('is_admin', 0)->get();
        return view('customer.custom-default', ['users' => $users]);
    }

    public function add_events(){
        return view('event-add');
    }

    public function book_events() {
        return view('event-book');
    }

    public function add_customer() {
        return view('customer.customer-add');
    }

    public function edit_customer($id) {
        $user = User::where('id', $id)->first();
        return view('customer.customer-edit', ['id' => $id, 'user' => $user]);
    }

    public function save_customer(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('customer_default');
    }

    public function update_customer(Request $request, $id) {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('customer_default');
    }

    public function customer_delete($id)
    {
        $event = User::where('id', $id)->delete($id);
        return redirect()->route('customer_default');
    }
}
