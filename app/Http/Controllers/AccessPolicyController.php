<?php

namespace App\Http\Controllers;

use App\Models\AccessPolicy;
use App\Models\Kps;
use App\Models\User;
use Illuminate\Http\Request;

class AccessPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('kps')->where('role', 'KPS')->orderBy('id', 'desc')->get();

        return view('KPS.index', compact('data'));
    }

    public function create_kps()
    {
        return view('KPS.tambah_kps');
    }

    public function f_create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'username' => 'required|string|max:255|unique:users,username,',
            'prodi' => 'required|string',
            'phone_number' => 'required|string|max:255',
            'password' => 'nullable|min:8|max:12',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:password|same:password'
        ]);

        $form_value = $request->post();

        $user = new User;
        $user->name = $form_value['name'];
        $user->email = $form_value['email'];
        $user->username = $form_value['username'];
        $user->phone_number = $form_value['phone_number'];
        $user->role = "KPS";
        $user->password = $form_value['password'];

        $user->save();
        $user_id = $user->id;

        $kps = new Kps;
        $kps->user_id = $user_id;
        $kps->prodi = $form_value['prodi'];
        $kps->save();

        return redirect()->route('access-policy.kps')->withSuccess('Data Added successfully.');
    }
}
