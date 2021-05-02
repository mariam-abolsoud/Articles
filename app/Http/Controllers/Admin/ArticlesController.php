<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticlesRequest;
use App\Traits\ImageUploading;

class ArticlesController extends Controller
{
    use ImageUploading;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $grid_data  = Article::with('category')->paginate(10);
        $output = [
                    'grid_data'=> $grid_data,
                    'articles_atcive_class' => 'm-menu__item--active',
                    'articles'=> true
                  ];
        
        return view('Admin.CRUD.articles.articles_grid')->with($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::get();
        
        $output = [
            'categories' => $cats,
            'page_title' => 'Add Article',
            'page_route' => route('Articles.store'),
            'articles_atcive_class' => 'm-menu__item--active',
            'articles'=> true
        ];
        
        return view('Admin.CRUD.articles.articles_form')->with($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        //
        
        $file_name = $this->UploadImage($request->image, 'articles');
        Article::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $file_name
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
        //
        $row_data = Article::findOrFail($id);
        $cats = Category::get();
        
        
        $output = [
            'categories' => $cats,
            'article_data' => $row_data,
            'page_title' => 'Edit Article: '.$row_data->title,
            'page_route' => route('Articles.update', $id),
            'articles_atcive_class' => 'm-menu__item--active',
            'articles'=> true
            ];
        
        return view('Admin.CRUD.articles.articles_form')->with($output);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, $id)
    {
        $article_data = Article::findOrFail($id);
        if($request->hasFile('image'))
        {
            $file_name = $this->UploadImage($request->image, 'articles');
        }
        else
        {
            $file_name = $article_data->image;
        }
        
        $article_data->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $file_name
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
        //
        $article_data = Article::findOrFail($id);
        $article_data->delete();
        
        return redirect()->back()->with(['success'=>'row deleted successfully']);
    }
}
