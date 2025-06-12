<?php

namespace App\Http\Controllers;

use App\BrokenNeedle;
use App\Exports\BrokenNeedlesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class BrokenNeedleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('broken_needles.index');
    }

    public function getData()
    {
        $records = BrokenNeedle::all();

        return DataTables::of($records)
            ->addColumn('all_parts_traced', function ($record) {
                return $record->all_parts_traced ? 'YES' : 'NO';
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
            'all_parts_traced' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['all_parts_traced'] = $request->has('all_parts_traced');

        BrokenNeedle::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Broken needle record added successfully',
        ]);
    }

    public function edit($id)
    {
        return BrokenNeedle::findOrFail($id);
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
            'all_parts_traced' => 'required|boolean',
        ]);

        $record = BrokenNeedle::findOrFail($id);
        $data = $request->all();
        $data['all_parts_traced'] = $request->has('all_parts_traced');

        $record->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully',
        ]);
    }

    public function destroy($id)
    {
        BrokenNeedle::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully',
        ]);
    }

    public function exportPDF()
    {
        $records = BrokenNeedle::all();
        $pdf = Pdf::loadView('broken_needles.pdf', compact('records'));
        return $pdf->download('broken_needles.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BrokenNeedlesExport, 'broken_needles.xlsx');
    }
}