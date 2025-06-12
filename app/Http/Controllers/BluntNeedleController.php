<?php

namespace App\Http\Controllers;

use App\BluntNeedle;
use App\Exports\BluntNeedlesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class BluntNeedleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('blunt_needles.index');
    }

    public function getData()
    {
        $records = BluntNeedle::all();

        return DataTables::of($records)
            ->addColumn('was_embedded', function ($record) {
                return $record->was_embedded ? 'YES' : 'NO';
            })
            ->addColumn('action', function ($record) {
                return '<button onclick="editForm('.$record->id.')" class="btn btn-primary btn-xs">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteData('.$record->id.')" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </button>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'employee_epf' => 'required|string|max:20',
            'job_number' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'needle_type' => 'required|string|max:50',
            'needle_size' => 'required|string|max:20',
            'machine_number' => 'required|string|max:50',
            'was_embedded' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['was_embedded'] = $request->has('was_embedded');

        BluntNeedle::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Blunt needle record added successfully',
        ]);
    }

    public function edit($id)
    {
        return BluntNeedle::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'employee_epf' => 'required|string|max:20',
            'job_number' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'needle_type' => 'required|string|max:50',
            'needle_size' => 'required|string|max:20',
            'machine_number' => 'required|string|max:50',
            'was_embedded' => 'required|boolean',
        ]);

        $record = BluntNeedle::findOrFail($id);
        $data = $request->all();
        $data['was_embedded'] = $request->has('was_embedded');

        $record->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully',
        ]);
    }

    public function destroy($id)
    {
        BluntNeedle::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully',
        ]);
    }

    public function exportPDF()
    {
        $records = BluntNeedle::all();
        $pdf = Pdf::loadView('blunt_needles.pdf', compact('records'));
        return $pdf->download('blunt_needles.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BluntNeedlesExport, 'blunt_needles.xlsx');
    }
}