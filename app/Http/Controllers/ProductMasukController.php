<?php

namespace App\Http\Controllers;

use App\ProductMasuk;
use App\Exports\ProductMasukExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ProductMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('product_masuk.index');
    }

    public function apiProductsIn()
    {
        $products = ProductMasuk::all();

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

        ProductMasuk::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product masuk record added successfully',
        ]);
    }

    public function edit($id)
    {
        return ProductMasuk::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = ProductMasuk::findOrFail($id);
        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully',
        ]);
    }

    public function destroy($id)
    {
        ProductMasuk::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully',
        ]);
    }

    public function exportProductMasukAll()
    {
        $products = ProductMasuk::all();
        $pdf = Pdf::loadView('product_masuk.pdf', compact('products'));
        return $pdf->download('product_masuk_all.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductMasukExport, 'product_masuk_all.xlsx');
    }
}