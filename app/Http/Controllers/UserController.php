<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function update_profile(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        $user = User::findOrFail($userId);
        $user->name = $request->input('name');
        $user->save();

        return back()->with('success', 'Berhasil mengubah data profile');
    }

    public function change_password_view()
    {
        return view('pages.profile.change-password');
    }

    public function change_password(Request $request, $userId)
    {
        $request->validate([
            'old_password' => 'required|min:5',
            'new_password' => 'required|min:5',
        ]);

        $user = User::findOrFail($userId);

        $oldPasswordIsValid = Hash::check($request->input('old_password'), $user->password);

        if ($oldPasswordIsValid) {
            $user->password = $request->input('new_password');
            $user->save();
            return back()->with('success', 'Berhasil mengubah password');
        }

        return back()->with('error', 'Gagal mengubah password, password lama tidak valid');
    }
}
