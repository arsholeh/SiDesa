<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index()
    {
        $resident = Resident::all();
        return view('pages.resident.index', [
            'residents' => $resident
        ]);
    }
}
