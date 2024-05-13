<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Models\Province;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $company = Company::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('province')
        ->with('employees')
        ->orderBy('name','asc')
        ->paginate(50);

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        //
        $data = $request->all();
        $company = Company::create($data);

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
        // $company = Company::with('province')->findOrFail($id);
        $company->load('province');
        $company->load('employees');

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
        // $company = Company::findOrFail($id);
        $company->load('province');
        $province = Province::all();

        return response()->json([
            'company' => $company,
            'province'=>$province
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
        $data = $request->all();
        // $company = Company::findOrFail($id);

        $company->update($data);

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $company = Company::findOrFail($id);

        $company->delete();

        return response()->noContent();
    }
}
