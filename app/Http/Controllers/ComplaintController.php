<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('resident_id', Auth::user()->resident->id)->paginate(5);

        return view('pages.complaint.index', compact('complaints'));
    }

    public function create()
    {
        return view('pages.complaint.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'content' => ['required', 'min:5', 'max:200'],
            'photo_proof' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048']

        ]);

        $complaint = new Complaint();
        $complaint->resident_id = Auth::user()->resident->id;
        $complaint->title = $request->input('title');
        $complaint->content = $request->input('content');

        if ($request->hasFile('photo_proof')) {
            $filePath = $request->file('photo_proof')->store('public/uploads');
            $complaint->photo_proof = $filePath;
        }

        $complaint->save();
        return redirect('/complaint')->with('success', 'Berhasil membuat aduan');
    }
}
