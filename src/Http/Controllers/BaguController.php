<?php

namespace Sahib\Bagu\Http\Controllers;

use Sahib\Bagu\Models\BaguLog;
use Illuminate\Routing\Controller;

class BaguController extends Controller
{
    public function index()
    {
        return view('bagu::index');
    }

    public function records()
    {
        return BaguLog::select('id', 'level', 'message', 'created_at')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function show($id)
    {
        return BaguLog::findOrFail($id);
    }
}
