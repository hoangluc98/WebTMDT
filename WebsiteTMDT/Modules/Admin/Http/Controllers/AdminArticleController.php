<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;
use App\Http\Requests\RequestArticle;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);

        if($request->name) $articles->where('a_name','like','%'.$request->name.'%');

        $articles = $articles->paginate(10);

        $viewData = [
            'articles' => $articles
        ];

        return view('admin::article.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle){
        $this->insertOrUpdate($requestArticle);

        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id){
        $article = Article::find($id);

        $viewData = [
            'article' => $article
        ];

        return view('admin::article.update',$viewData);
    }

    public function update(RequestArticle $requestArticle,$id){
        $this->insertOrUpdate($requestArticle,$id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function insertOrUpdate($requestArticle,$id=''){
        $article = new Article();

        if($id) $article = Article::find($id);

        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = $requestArticle->a_description;
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_name;

        if ($requestArticle->hasFile('avatar')){
            $file = upload_image('avatar');

            if(isset($file['name'])){
                $article->a_avatar = $file['name'];
            }
            //dd($file);
        }

        $article->save();
    }

    public function action($action,$id){
        if($action){
            $article = Article::find($id);
            $message = '';
            switch ($action) {
                case 'delete':
                    $article->delete();
                    $message = 'Xóa thành công';
                    break;

                case 'active':
                    $article->a_active = !$article->a_active;
                    $article->save();
                    $message = 'Thay đổi trạng thái thành công';
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        return redirect()->back();
    }
}
