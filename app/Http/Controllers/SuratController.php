<?php

namespace App\Http\Controllers;

use App\Exports\ExportKlasifikasi;
use App\Exports\ExportSurat;
use App\Exports\ExportSuratTeacher;
use App\Models\Letter;
use App\Models\Letter_type;
use App\Models\Result;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Maatwebsite\Excel\Facades\Excel;

class SuratController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');

        $data = ($query) ?
            Letter::where('letter_perihal', 'like', '%' . $query . '%')
                ->orWhere('recipient', 'like', '%' . $query . '%')
                ->orWhere('notulis', 'like', '%' . $query . '%')
                ->with('letter_type')
                ->get()
            : Letter::with('letter_type')
            ->simplePaginate(5);

        return view('staff.surat.index', compact('data', 'query'));
    }

    public function tambahSurat() {
        $letterTypes = Letter_type::all();
        $teacherList = User::where('role', '=', 'teacher')->get();
        return view('staff.surat.tambah', compact('letterTypes', 'teacherList'));
    }

    public function tambahSuratSave(Request $request) {
        $request->validate([
            'letter_type_id' => 'required',
            'letter_perihal' => 'required',
            'recipient' => 'required',
            'content' => 'required',
            'notulis' => 'required',
        ]);

        if($request->file('attachment')){
            $file= $request->file('attachment');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path(), $filename);
            $data = $request->all();
            $data['attachment']= $filename;
        } else {
            $data = $request->all();
        }


        Letter::Create($data);
        return redirect()->route('staff.surat.data')->with('suratAdded', 'Berhasil menambahkan surat');
    }

    public function tchSuratData(Request $request)
    {
        $id = auth()->user()->id;
        $query = $request->input('query');

        $dataQuery = Letter::whereJsonContains('recipient', strval($id));

        // Apply search conditions if $query is present
        if (isset($query)) {
            $dataQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('letter_perihal', 'like', '%' . $query . '%')
                    ->orWhere('recipient', 'like', '%' . $query . '%')
                    ->orWhere('notulis', 'like', '%' . $query . '%');
            });
        }

        $data = $dataQuery->simplePaginate(5);

        $access = $data->contains('notulis', $id);

        return view('staff.surat.index', compact('data', 'access'));
    }

    public function exportExcelTch() {
        return Excel::download(new ExportSuratTeacher, 'Data Surat.xlsx');
    }

    public function exportSuratExc() {
        return Excel::download(new ExportSurat, 'Data Surat.xlsx');
    }

    public function addHasil($id) {
        $data = Letter::find($id);
        $teacherList = User::where('role', '=', 'teacher')->get();
        return view('teacher.notulen.result', compact('data', 'teacherList'));
    }

    public function hasilSuratSave(Request $request, $id) {
        $request->validate([
            'notes' => 'required',
            'presence_recipients' => 'required',
        ]);

        $data = $request->all();
        $data['letter_id'] = $id;

        Result::Create($data);
        return redirect()->route('teacher.surat.data');
    }

    public function hasilSuratView($id) {
        $dataR = Result::where('letter_id', '=', $id)->first();
        $dataS = Letter::find($id);

        return view('teacher.notulen.resultView', compact('dataR', 'dataS'));
    }


}
