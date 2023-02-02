<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Models\Category;
use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{

    public function allCategories()
    {
        return Company::latest()->paginate(10);
    }

    public function storeCategory($data)
    {
        return Company::create($data);
    }

    public function findCategory($id)
    {
        return Company::find($id);
    }

    public function updateCategory($data, $id)
    {
        $category = Company::where('id', $id)->first();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->save();
    }

    public function destroyCategory($id)
    {
        $category = Company::find($id);
        $category->delete();
    }
}
