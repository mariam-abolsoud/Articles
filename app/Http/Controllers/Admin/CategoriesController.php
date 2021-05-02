<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grid_data  = category::paginate(10);
        $output = [
                    'grid_data'=> $grid_data,
                    'cat_active_class' => 'm-menu__item--active',
                    'categories' => true
                  ];
        
        return view('Admin.CRUD.categories.categories_grid')->with($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $output = [
            'page_title' => 'Add Category',
            'page_route' => route('Categories.store'),
            'cat_active_class' => 'm-menu__item--active',
            'categories' => true
            ];
        
        return view('Admin.CRUD.categories.categories_form')->with($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        Category::create([
                'title' => $request->title,
                
                ]);
        
        return redirect()->back()->with(['success'=> 'row added sussfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row_data  = Category::findOrFail($id);
        
        $output = [
            'category_data' => $row_data,
            'page_title' => 'Edit Category'.$row_data->title,
            'page_route' => route('Categories.update', $id),
            'cat_active_class' => 'm-menu__item--active',
            'categories' => true
            ];
        
        return view('Admin.CRUD.categories.categories_form')->with($output);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $data = Category::findOrFail($id);
        
        $data->update([
                'title' => $request->title,
                
                ]);
        
        return redirect()->back()->with(['success'=> 'row updated sussfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        
        return redirect()->back()->with(['success'=>'row deleted successfully']);
    }
}
