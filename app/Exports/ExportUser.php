<?php

namespace App\Exports;

use App\Models\Letter;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportUser implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view():View
    {
        $data = User::all();
        return view('export.userTable', compact('data'));
    }
}
