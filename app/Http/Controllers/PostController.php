<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use DB;
class PostController extends Controller
{
    function addPost(Request $req){
        $title = $req->input('title');
        $description = $req->input('description');
        $auth_object= $id = Auth::user();
        $auth_id= $id = Auth::id();
        //echo $auth_id;
        $data = array(
            "title"=>$title,
            "author_id"=>$auth_id,
            "description"=>$description,
            "created_at"=> date("Y-m-d H:i:s"),
            "updated_at"=> date("Y-m-d H:i:s")
        );

        DB::table('posts')->insert($data);
        echo "<script>alert('Post inserted !')</script>";
        //return view('add');
        return redirect('/posts');
    }

    function getPosts(){
        
        //$data = DB::table('posts')->get();
        $data=DB::table('posts')->latest()->paginate(4);
        //print_r($data);
        return view('posts',compact('data')); 
    }

    function getFullPost($id){
        $postid=$id;
        //get user id if logged in for editing purpose
        $auth_id= $id = Auth::id();
        $singlePost = DB::table('posts')->where('id', $postid)->first();
        $author_id = $singlePost->author_id;
        $authorQuery = DB::table('users')->select('name')->where('id', $author_id)->get();
        $author=$authorQuery[0]->name;
        return view('singlePost',compact('singlePost','auth_id','author')); 
    }

    function deletePost(Request $req){
        $postId= $req->id;
        $confirm = DB::table('posts')->where('id', $postId)->delete();
        if($confirm)
            return response()->json(['success'=>'Data is successfully added']);
        else
            return response()->json(['error'=>'Something Went Wrong']);
    }
        
}
