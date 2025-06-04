<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'submitted')->get();

        return view('pages.account-request.index', [
            'users' => $users
        ]);
    }

    public function approve(Request $request, $id)
    {
        $for = $request->input('for');

        $user = User::findOrFail($id);

        $user->status = $for == 'approve' ? 'approved' : 'rejected';
        $user->save();

        return back()->with('success', $for == 'approve' ? 'Berhasil menyetujui akun' : 'Berhasil menolak akun');
    }
}
