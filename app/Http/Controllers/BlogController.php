<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use App\Comment;

class BlogController extends Controller
{
    public function index()
    {
    	$blogs = Blog::get();
    	return view('welcome', compact('blogs', $blogs));
    }

    public function preview_post($id)
    {

    	$blog = Blog::where('id', $id)->first();
    	$author = User::where('id', $blog->user_id)->first();
    	$comments = Comment::where('post_id', $blog->id)->get();
    	return view('preview', compact('blog',$blog, 'author', $author, 'comments', $comments));
    }

    public function addcomment(Request $request)
    {
    	$addcomment = Comment::create([
    		'visitor_name' => $request->visitor_name,
    		'comment'		=> $request->comment,
    		'post_id'		=> $request->post_id
    	]);
    	return back()->with('success', 'Comment posted');
    }

}
