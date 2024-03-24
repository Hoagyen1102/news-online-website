<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsDetails;
use App\Models\Category;
use App\Models\Journalist;
use App\Models\Comment;

class NewsController extends Controller
{
    public function index()
    {
        $newsslides = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->limit(3)
            ->get();
        $newsright = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->offset(3)
            ->limit(5)
            ->get();
        $newsbottom_33_1 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->offset(8)
            ->limit(4)
            ->get();
        $newsbottom_33_2 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->offset(12)
            ->limit(4)
            ->get();
        $newsbottom_33_3 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->offset(16)
            ->limit(4)
            ->get();
        $newsbottom_33_67 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->offset(20)
            ->limit(6)
            ->get();
        $newsbottom_67_33 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where('News.Status_id',"10000001")
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->select('NewsDetails.*')
            ->offset(26)
            ->limit(6)
            ->get();
        $category = Category::all();
        return view ('index', ['newsslides'=>$newsslides,'newsright'=>$newsright,
                    'newsbottom_33_1'=>$newsbottom_33_1,'newsbottom_33_2'=>$newsbottom_33_2,
                    'newsbottom_33_3'=>$newsbottom_33_3,'newsbottom_33_67'=>$newsbottom_33_67,
                    'newsbottom_67_33'=>$newsbottom_67_33,'category'=>$category]);
    }
    public function introduce()
    {
        $category = Category::all();
        return view ('introduce',['category'=>$category]);
    }
    public function category($id)
    {
        $namecate = Category::where('_id',(int)$id)->first()->Name;
        $news_100 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->join('Category', 'News.Category_id', 'Category._id')
            ->where('Category._id',(int)$id)
            ->where('News.Status_id',"10000001")
            ->select('NewsDetails.*')
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->get();
        $category = Category::all();
        return view ('category', ['news_100'=>$news_100,
            'namecate'=>$namecate,'category'=>$category]);
    }

    public function search(Request $request){

        $search = $request->get('search');
        $search = trim(strip_tags($search));
        $listsearch=[];
        $count=0;
        if ($search!=""){
            $listsearch = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->where("NewsDetails.Title", "like", "%".$search."%")
            ->where('News.Status_id',"10000001")
            ->select('NewsDetails.*')
            ->get();
            $count = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->join('Category', 'News.Category_id', '=', 'Category._id')
            ->where('News.Status_id',"10000001")
            ->where("NewsDetails.Title", "like", "%".$search."%")->count();
        }
        $category = Category::all();
        return view ('search', [
            'listsearch'=>$listsearch,'count'=>$count,
            'category'=>$category,'search'=>$search]);
    }
    public function content($id)
    {
        $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->join('Journalist', 'News.Journalist_id', 'Journalist._id')
            ->where('NewsDetails.News_id',(int)$id)
            ->select('NewsDetails.*','Journalist.Fullname','News.Category_id')
            ->first();
        $news_33 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->join('Category', 'News.Category_id', 'Category._id')
            ->where('Category._id',$news->Category_id)
            ->where('News._id', '!=' ,$news->_id)
            ->where('News.Status_id',"10000001")
            ->select('NewsDetails.*')
            ->orderBy('NewsDetails.Views', 'desc')
            ->orderBy('NewsDetails.Created_at', 'desc')
            ->limit(6)
            ->get();
        $comment = Comment::join('News', 'Comment.News_id', '=', 'News._id')
                ->join('User', 'Comment.User_id', '=', 'User._id')
                ->where('Comment.News_id', $news->_id)
                ->select('User.*','Comment.*')
                ->get();
        $upviews = NewsDetails::where('News_id',(int)$id)->first();
        $upviews->Views = $upviews->Views + 1;
        $upviews->save();
        $category = Category::all();
        return view ('content', ['news'=>$news,
                    'news_33'=>$news_33,'category'=>$category,
                    'comment'=>$comment]);
    }
    public function create()
    {
        $category = Category::all();
        return view ('createnews', ['category'=>$category]);
    }
    public function checkcreate(Request $request)
    {
        $news = new News([
            'Category_id' => $request->get('category'),
            'Journalist_id' => session('account')->_id,
            'Admin_id' => 0,
            'Status_id' => 10000000
        ]);
        $news->save();
        $NewsDetails = new NewsDetails([
            'News_id' => $news->_id,
            'Title' => $request->get('title'),
            'Content' => $request->get('content'),
            'Image' => $request->get('image'),
            'Views' => 0,
            'Reply' => ''
        ]);
        $NewsDetails->save();
        return redirect ('/newsofjournalist/'.session('account')->_id);
    }
    public function edit($id)
    {
        $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
        ->join('Category', 'Category._id', 'News.Category_id')
        ->where('NewsDetails.News_id',(int)$id)
        ->select('NewsDetails.*','Category.Name as CategoryName','Category._id as CategoryId')
        ->first();
        $category = Category::where('Name','not like',$news->CategoryName)->get();
        return view ('editnews', ['category'=>$category,'news'=>$news]);
    }
    public function checkedit(Request $request)
    {
        $news = News::where('News._id',$request->get('id'))->first();
        $newsdetails = NewsDetails::where('News_id',$request->get('id'))->first();

        if($request->get('title')) $newsdetails->Title = $request->get('title');
        if($request->get('content')) $newsdetails->Content = $request->get('content');
        if($request->get('image')) $newsdetails->Image = $request->get('image');
        $newsdetails->Reply = "";

        if($request->get('category')) $news->Category_id = $request->get('category');
        $news->Status_id = 10000000;
        $news->save();
        $newsdetails->save();
        return redirect('/newsofjournalist/'.session('account')->_id);
    }
    public function list($id)
    {
        if($id==10000001){
            $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
                ->join('Journalist', 'News.Journalist_id', 'Journalist._id')
                ->join('Admin', 'News.Admin_id', 'Admin._id')
                ->join('Category', 'News.Category_id', 'Category._id')
                ->where('News.Status_id',(int)$id)
                ->select('NewsDetails.*','Journalist.Fullname as Journalistname',
                        'Admin.Fullname as Adminname','Category.Name as Categoryname')
                ->orderBy('News._id', 'asc')
                ->get();
        }else{
            $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
                ->join('Journalist', 'News.Journalist_id', 'Journalist._id')
                ->join('Category', 'News.Category_id', 'Category._id')
                ->where('News.Status_id',(int)$id)
                ->select('NewsDetails.*','Journalist.Fullname as Journalistname',
                        'Category.Name as Categoryname')
                ->orderBy('News._id', 'asc')
                ->get();
        }
        $category = Category::all();
        return view ('listnews', ['news'=>$news,'category'=>$category,'id'=>$id]);
    }
    public function detailsstatus($id)
    {
        $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->join('Journalist', 'News.Journalist_id', 'Journalist._id')
            ->where('News._id',(int)$id)
            ->select('NewsDetails.*','Journalist.Fullname','News.Status_id as Statusid')
            ->first();
        $category = Category::all();
        return view ('detailsstatus', ['news'=>$news,'category'=>$category]);
    }
    public function newsofjournalist($id)
    {
        $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
            ->join('Journalist', 'News.Journalist_id', 'Journalist._id')
            ->join('Category', 'News.Category_id', 'Category._id')
            ->join('Status', 'News.Status_id', 'Status._id')
            ->where('News.Journalist_id',(int)$id)
            ->select('NewsDetails.*','Journalist.Fullname','Category.Name as Categoryname',
                    'Status._id as Statusid','Status.Name as Statusname')
            ->orderBy('News._id', 'asc')
            ->get();
        $category = Category::all();
        return view ('newsofjournalist', ['news'=>$news,'category'=>$category,'id'=>$id]);
    }
    public function deletenews($id)
    {
        $news = News::where('_id',$id)->delete();
        $newsdetails = NewsDetails::where('News_id',$id)->delete();
        $category = Category::all();
        return redirect ()->back();
    }
    public function pushnews($id)
    {
        $news = News::where('_id',$id)->first();
        $news->Status_id = "10000001";
        $news->Admin_id = session('account')->_id;
        $news->save();
        $category = Category::all();
        return redirect('/listnews/10000000');
    }
    public function checkrejected(Request $request)
    {
        $news = News::where('_id',$request->get('id'))->first();
        $newsdetails = NewsDetails::where('_id',$request->get('id'))->first();
        $news->Status_id = "10000002";
        $newsdetails->Reply = $request->get('reply');
        $news->save();
        $newsdetails->save();
        $category = Category::all();
        return redirect('/listnews/10000000');
    }
}
