<?php

namespace App\Http\Controllers;

use App\Exports\ExportKlasifikasi;
use App\Models\Letter;
use App\Models\Letter_type;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class KlasifikasiController extends Controller
{
    public function index()
    {
        $staffCount = User::where('role', 'staff')->count();
        $teacherCount = User::where('role', 'teacher')->count();
        $letterCount = Letter::count();
        $letterTypeCount = Letter_type::count();

        return view('staff.staffDsb', [
            'staffCount' => $staffCount,
            'teacherCount' => $teacherCount,
            'letterCount' => $letterCount,
            'letterTypeCount' => $letterTypeCount,
        ]);
    }

    public function dataKls(Request $request) {
        $query = $request->input('query');

        $data = ($query) ?
            Letter_type::where('letter_code', 'like', '%' . $query . '%')
                ->orWhere('name_type', 'like', '%' . $query . '%')
                ->simplePaginate(5)
            : Letter_type::simplePaginate(5);

        return view('staff.surat.klasifikasi.index', compact('data', 'query'));
    }

    public function tambahKls() {
        return view('staff.surat.klasifikasi.tambah');
    }

    public function saveKls(Request $request) {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ], [
            'letter_code.required' => 'Klasifikasi harus memiliki kode',
            'name_type.required' => 'Klasifikasi harus memiliki nama',
        ]);

        $requestData = $request->all();
        Letter_type::Create($requestData);

        return redirect()->route('staff.surat.klasifikasi.data')->with('klsAdded', 'Berhasil menambahkan klasifikasi');
    }


    public function updateKlsSave(Request $request, $id) {
        $data = Letter_type::find($id);
        $data->update($request->except(['_token', 'submit']));

        return redirect()->route('staff.surat.klasifikasi.data')->with('typeUpdate', 'Data klasifikasi berhasil diperbarui!');
    }

    public function deleteKls($id) {
        $data = Letter_type::find($id);
        $data->delete();

        return redirect()->route('staff.surat.klasifikasi.data')->with('typeDelete', 'Data klasifikasi berhasil dihapus!');
    }

    public function exportKls() {
        return Excel::download(new ExportKlasifikasi, 'Data Klasifikasi.xlsx');
    }

    public function viewKls($id) {
        $data = Letter_type::find($id);
        $letters = $data->Letter;
        return view('staff.surat.klasifikasi.view', compact('letters', 'data'));
    }

    public function view_pdf($id) {
        $data = Letter::find($id);
        $lettertypeId = $data->letter_type_id;
        $letterType = Letter_type::find($lettertypeId);
        $pdf = PDF::loadView('export.exportPdf', compact('data', 'letterType'));
        return $pdf->stream('Surat.pdf');
    }

//    Teacher

    public function tchIndex() {
        $userid = auth()->user()->id;
        $suratCount = Letter::whereJsonContains('recipient', strval($userid))->count();

        return view('teacher.teacherDsb', compact('suratCount'));
    }


}
