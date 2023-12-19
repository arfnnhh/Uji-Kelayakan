<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportSuratTeacher implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view():View
    {
        $id = auth()->user()->id;

        $data = Letter::whereJsonContains('recipient', strval($id))->get();

        return view('export.suratTable', compact('data'));
    }
}

