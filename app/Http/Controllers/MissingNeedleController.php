<?php

namespace App\Http\Controllers;

use App\Exports\MissingNeedlesExport;
use App\MissingNeedle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class MissingNeedleController extends Controller
{
    // Remove apiMissingNeedles() and api() methods, keep only getData()
    public function getData()
    {
        $records = MissingNeedle::select([
            'id',
            'date',
            'employee_epf',
            'section',
            'broke_time',
            'release_time',
            'request_letter',
            'created_at',
            'updated_at'
        ]);

        return DataTables::of($records)
            ->addColumn('request_letter', function ($record) {
                return $record->request_letter
                    ? '<a href="' . asset('storage/' . $record->request_letter) . '" target="_blank" class="btn btn-info btn-xs">View</a>'
                    : 'N/A';
            })
            ->addColumn('action', function ($record) {
                return '<button onclick="editForm(' . $record->id . ')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</button> ' .
                    '<button onclick="deleteData(' . $record->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>';
            })
            ->rawColumns(['request_letter', 'action'])
            ->toJson();
    }

    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('missing_needles.index');
        return response()->json(['message' => 'Working!']);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'date' => 'required|date',
    //         'employee_epf' => 'required|string|max:255',
    //         'section' => 'required|string|max:255',
    //         'broke_time' => 'required',
    //         'release_time' => 'nullable',
    //         'request_letter' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
    //     ]);

    //     $data = $request->except(['_token', 'request_letter']);

    //     if ($request->hasFile('request_letter')) {
    //         $path = $request->file('request_letter')->store('request_letters', 'public');
    //         $data['request_letter'] = $path;
    //     }

    //     MissingNeedle::create($data);

    //     // return response()->json([
    //     //     'success' => true,
    //     //     'message' => 'Missing needle record added successfully',
    //     // ]);

    //     return redirect()->route('missing-needles.index')
    //                      ->with('success', 'Record added successfully');
    // }

    // public function edit($id)
    // {
    //     $record = MissingNeedle::find($id);
    //     return $record;
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'employee_epf' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'broke_time' => 'required',
            'release_time' => 'nullable',
            'request_letter' => 'nullable|file|mimes:pdf,jpg,jpeg,png,txt',
        ]);

        $record = MissingNeedle::findOrFail($id);
        $data = $request->except('request_letter');

        if ($request->hasFile('request_letter')) {
            if ($record->request_letter) {
                \Storage::disk('public')->delete($record->request_letter);
            }
            $path = $request->file('request_letter')->store('request_letters', 'public');
            $data['request_letter'] = $path;
        }

        $record->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $record = MissingNeedle::findOrFail($id);

        if ($record->request_letter) {
            \Storage::disk('public')->delete($record->request_letter);
        }

        $record->delete();

        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully',
        ]);
    }

    public function apiMissingNeedles()
    {
        $records = MissingNeedle::select([
            'id',
            'date',
            'employee_epf',
            'section',
            'broke_time',
            'release_time',
            'request_letter',
            'created_at',
            'updated_at'
        ]);

        return DataTables::of($records)
            ->addColumn('request_letter', function ($record) {
                return $record->request_letter
                    ? '<a href="' . asset('storage/' . $record->request_letter) . '" target="_blank" class="btn btn-info btn-xs">View</a>'
                    : 'N/A';
            })
            ->addColumn('action', function ($record) {
                return '<button onclick="editForm(' . $record->id . ')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</button> ' .
                    '<button onclick="deleteData(' . $record->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>';
            })
            ->rawColumns(['request_letter', 'action'])
            ->toJson();
    }

    public function api()
    {
        return Datatables::of(MissingNeedle::query())
            ->addColumn('action', function ($model) {
                // Return action buttons HTML here
            })
            ->make(true);
    }

    public function exportPDF()
    {
        $records = MissingNeedle::all();
        $pdf = Pdf::loadView('missing_needles.pdf', compact('records'));
        return $pdf->download('missing_needles.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new MissingNeedlesExport, 'missing_needles.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'employee_epf' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'broke_time' => 'required',
            'release_time' => 'nullable',
            'request_letter' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $data = $request->except(['_token', 'request_letter']);

        if ($request->hasFile('request_letter')) {
            $path = $request->file('request_letter')->store('request_letters', 'public');
            $data['request_letter'] = $path;
        }

        MissingNeedle::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Missing needle record added successfully',
        ]);
    }

    public function edit($id)
    {
        $record = MissingNeedle::findOrFail($id);
        return response()->json($record);
    }
}
