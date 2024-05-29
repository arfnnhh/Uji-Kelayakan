<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');

        $data = ($query) ?
            User::where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->simplePaginate(5)
            : User::simplePaginate(5);

        return view('staff.user.index', compact('data', 'query'));
    }
    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required'
        ], [
            'name.min' => 'Nama user tidak boleh kurang dari 3 karakter',
            'name.required' => 'User harus memiliki nama',
            'email.required' => 'User harus memiliki email',
            'role.required' => 'User harus memiliki role'
        ]);

        $namePart = substr($request->input('name'), 0, 3);
        $emailPart = substr($request->input('email'), 0, 3);
        $combinedPassword = $namePart . $emailPart;

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($combinedPassword),
            'role' => $request->input('role')
        ]);

        return redirect()->route('staff.user.index');
    }

    public function add() {
        return view('staff.user.add');
    }


        public function edit($id)
    {
        $data = User::find($id);
        return view('staff.user.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'role' => 'required',
        ], [
            'name.min' => 'Nama user tidak boleh kurang dari 3 karakter',
            'name.required' => 'User harus memiliki nama',
            'email.required' => 'User harus memiliki email',
            'role.required' => 'User harus memiliki role'
        ]);

        if (empty($request->input('password'))) {
            $user->update($request->except(['_token', 'submit', 'password']));
        } else {
            $user->update($request->except(['_token', 'submit']));
        }

        return redirect()->route('staff.user.index');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('staff.user.index');
    }

    public function export() {
        return Excel::download(new ExportUser, 'Data User.xlsx');
    }
}
