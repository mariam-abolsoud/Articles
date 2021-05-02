<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Article_comment;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    
    public function index(Request $request)
    {
        
        $cats = Category::get();
        
        if($request->category_id != 0)
        {
            $articles = Article::where('category_id', $request->category_id)->get();
        }
        else
        {
            $articles = Article::get();
        }
        
        
        $output = [
            'categories' => $cats,
            'articles'   => $articles,
            'selected_cat' => $request->category_id
        ];
        return view('Front.home')->with($output);
    }
    
    public function article_details($article_id)
    {
        $row_data = Article::with('category')->findOrFail($article_id);
        
        $output = [
            'row_data'   => $row_data
        ];
        
        return view('Front.article_details')->with($output);
        
    }
    
    public function add_comment(Request $request)
    {
        $validator = Validator::make($request->All(), [
                'name'       => 'required',
                'comment'    => 'required',
                'article_id' => 'required'
            ]);
        
        
        if ($validator->fails()) {
            $status  = 'fail';
            $message = 'please add all required data';
        }
        else
        {
            Article_comment::create([
                'article_id' => $request->article_id,
                'name'       => $request->name,
                'comment'    => $request->comment
            ]);
            
            $status = 'success';
            $message = 'Thank you, we successfully  recieved your comment';
        }
        
         return response(['status'=>$status, 'message'=>$message]);
    }
}
