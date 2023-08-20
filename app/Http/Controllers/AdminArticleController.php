<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Category;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::all();
        // dd($articles);
        return view('admin.articles', compact(['articles']));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.article.create', compact(['categories']));
    }

    public function store(ArticleStoreRequest $request)
    {
        DB::beginTransaction();
        try{
            $article = Article::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'caption' => $request->caption,
                'body' => $request->body,
                'author' => $request->author,
                'category_id' => $request->category,
                'tags' => $request->tags,
                'publish_at' => $request->publish_date,
            ]);

            $file = FileService::upload($request);
            if(!$file){
                DB::rollBack();
                return back()->with('error', 'Upload file failed.');
            }

            $article->image = $file;
            $article->save();

            DB::commit();
            return redirect()->route('admin.articles.create')->with('success', 'Upload Success.');

        }catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Upload failed.' . $e);
        }
    }
}
