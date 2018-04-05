<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * @var Company
     */
    protected $company;

    /**
     * CompanyController constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company->with('address')->paginate(20);

        if($companies->count() < 1) {
            return response()->json()->setStatusCode(404);
        }

        return response()->json([
            'total' => $companies->count(),
            'page' => $companies->currentPage(),
            'companies' => $companies->toArray()['data'],
        ])->setStatusCode(200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->company->find($id);

        if(is_null($company)) {
            return response()->json()->setStatusCode(404);
        }

        $result = $company->toArray();
        $result['address'] = $company->address()->get()->toArray()[0];

        return response()->json([
            'total' => count($company),
            'company' => $result,
        ])->setStatusCode(200);
    }
}
