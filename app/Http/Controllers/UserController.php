<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'for' => ['required', Rule::in(['approve', 'reject'])]
        ]);

        $for = $request->input('for');

        $user = User::findOrFail($id);

        $user->status = $for == 'approve' ? 'approved' : 'rejected';
        $user->save();

        return back()->with('success', $for == 'approve' ? 'Berhasil menyetujui akun' : 'Berhasil menolak akun');
    }

    public function account_list()
    {
        $users = User::where('role_id', 2)->where('status', '!=', 'submitted')->get();

        return view('pages.account-list.index', [
            'users' => $users
        ]);
    }

    public function account_list_status(Request $request, $id)
    {
        $request->validate([
            'for' => ['required', Rule::in(['activate', 'deactivate'])]
        ]);
        $for = $request->input('for');

        $user = User::findOrFail($id);

        $user->status = $for == 'activate' ? 'approved' : 'rejected';
        $user->save();

        if ($for == 'activate') {
            return back()->with('success', 'Berhasil mengaktifkan akun');
        } elseif ($for == 'deactivate') {
            return back()->with('success', 'Berhasil menonaktifkan akun');
        }
    }

    public function profile_view()
    {
        return view('pages.profile.index');
    }
}
