<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Journalist;
use App\Models\Comment;
use App\Models\Category;
use App\Models\News;

class CommentController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view ('/', ['category'=>$category]);
    }
    public function add(Request $request)
    {
        $comment = new Comment([
            'User_id' => session('account')->_id,
            'News_id' => $request->get('News_id'),
            'Content' => $request->get('comment')
        ]);
        $comment->save();
        return redirect('/content/'.$request->get('News_id'));
    }
    public function delete($id)
    {
        $News_id = Comment::where('_id',(int)$id)->first()->News_id;
        Comment::where('_id',(int)$id)->delete();
        return redirect('/content/'.$News_id);
    }
    public function editcomment($id)
    {
        $editcmt = Comment::where('_id',(int)$id)->first();
        $news = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
                ->join('Journalist', 'News.Journalist_id', 'Journalist._id')
                ->where('NewsDetails.News_id',$editcmt->News_id)
                ->select('NewsDetails.*','Journalist.Fullname','News.Category_id')
                ->first();
        $news_33 = News::join('NewsDetails', 'News._id', 'NewsDetails.News_id')
                ->join('Category', 'News.Category_id', 'Category._id')
                ->where('Category._id',$news->Category_id)
                ->where('News._id', '!=' ,$news->_id)
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
        $category = Category::all();
        return view('editcomment', ['category'=>$category,
                    'news'=>$news, 'news_33'=>$news_33,
                    'comment'=>$comment,'editcmt'=>$editcmt]);
    }
    public function checkeditcomment(Request $request)
    {
        $editcmt = Comment::where('_id',(int)$request->get('id'))->first();
        $editcmt->Content = $request->get('editcmt');
        $editcmt->save();
        return redirect('/content/'.$request->get('News_id'));
    }
}
