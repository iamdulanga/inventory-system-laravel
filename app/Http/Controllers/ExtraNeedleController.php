<?php

namespace App\Http\Controllers;

use App\ExtraNeedle;
use App\Exports\ExtraNeedlesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ExtraNeedleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('extra_needles.index');
    }

    public function getData()
    {
        $records = ExtraNeedle::all();

        return DataTables::of($records)
            ->addColumn('unique_identifier', function ($record) {
                return $record->unique_identifier;
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
            'retrieved_date' => 'required|date',
            'needle_type' => 'required|string|max:50',
            'needle_size' => 'required|string|max:20',
            'machine_number' => 'required|string|max:50',
            'submitted_epf' => 'required|string|max:20',
            'section_submitted' => 'required|string|max:50',
            'delivery_date' => 'required|date',
            'retrieved_epf' => 'required|string|max:20',
            'section_retrieved' => 'required|string|max:50',
        ]);

        ExtraNeedle::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Extra needle record added successfully',
        ]);
    }

    public function edit($id)
    {
        return ExtraNeedle::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'retrieved_date' => 'required|date',
            'needle_type' => 'required|string|max:50',
            'needle_size' => 'required|string|max:20',
            'machine_number' => 'required|string|max:50',
            'submitted_epf' => 'required|string|max:20',
            'section_submitted' => 'required|string|max:50',
            'delivery_date' => 'required|date',
            'retrieved_epf' => 'required|string|max:20',
            'section_retrieved' => 'required|string|max:50',
        ]);

        $record = ExtraNeedle::findOrFail($id);
        $record->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully',
        ]);
    }

    public function destroy($id)
    {
        ExtraNeedle::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully',
        ]);
    }

    public function exportPDF()
    {
        $records = ExtraNeedle::all();
        $pdf = Pdf::loadView('extra_needles.pdf', compact('records'));
        return $pdf->download('extra_needles.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ExtraNeedlesExport, 'extra_needles.xlsx');
    }
}