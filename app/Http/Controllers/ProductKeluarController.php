<?php

namespace App\Http\Controllers;

use App\ProductKeluar;
use App\Exports\ProductKeluarExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ProductKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('product_keluar.index');
    }

    public function apiProductsOut()
    {
        $products = ProductKeluar::all();

        return DataTables::of($products)
            ->addColumn('action', function ($product) {
                return '<button onclick="editForm('.$product->id.')" class="btn btn-primary btn-xs">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteData('.$product->id.')" class="btn btn-danger btn-xs">
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
            'item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        ProductKeluar::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product keluar record added successfully',
        ]);
    }

    public function edit($id)
    {
        return ProductKeluar::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = ProductKeluar::findOrFail($id);
        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully',
        ]);
    }

    public function destroy($id)
    {
        ProductKeluar::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully',
        ]);
    }

    public function exportProductKeluarAll()
    {
        $products = ProductKeluar::all();
        $pdf = Pdf::loadView('product_keluar.pdf', compact('products'));
        return $pdf->download('product_keluar_all.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductKeluarExport, 'product_keluar_all.xlsx');
    }
}
