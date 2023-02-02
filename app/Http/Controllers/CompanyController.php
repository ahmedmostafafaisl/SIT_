<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyController extends Controller
{

private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

       public function index()
    {
        $companies =  $this->companyRepository->allCategories();

       return $companies;
    }

    // public function index()
    // {
    //     $companies = Company::all();
    //     return $companies;
    // }

        public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->companyRepository->storeCategory($data);

  return response()->json([
            'message' => 'Company Added Successfully',
        ]);    }


    // public function store(Request $request)
    // {
    //     $employee = Company::create([
    //          'name'=>$request->name,
    //          'email'=>$request->email,
    //         'website'=>$request->website,
    //     ]);
    //       return response()->json([
    //         'message' => 'Company Added Successfully',
    //     ]);
    // }


    public function show(Company $company)
    {
         return response()->json([
            'company' => $company,
        ]);

    }

  public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->companyRepository->updateCategory($request->all(), $id);

 return response()->json([
            'message' => 'Company Data Updated',
        ]);    }

    // public function update(Request $request, Company $company)
    // {
    //      $company->update($request->all());
    //     return response()->json([
    //         'message' => 'Company Data Updated',
    //     ]);
    // }


       public function destroy($id)
    {
        $this->companyRepository->destroyCategory($id);

          return response()->json([
            'message' => 'Company Deleted Successfully',
        ]);
    }

    // public function destroy(Company $company)
    // {
    //  $company->delete();
    //     return response()->json([
    //         'message' => 'Company Deleted Successfully',
    //     ]);
    // }
}