<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportSurat implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view():View
    {
        $data = Letter::all();
        return view('export.suratTable', compact('data'));
    }
}
