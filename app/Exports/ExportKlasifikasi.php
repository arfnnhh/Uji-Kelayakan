<?php

namespace App\Exports;

use App\Models\Letter_type;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportKlasifikasi implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $data = Letter_type::all();
        return view('export.klsTable', compact('data'));
    }
}
