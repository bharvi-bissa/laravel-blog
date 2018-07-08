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
        return view('add');
    }

    function getPosts(){
        
        //$data = DB::table('posts')->get();
        $data=DB::table('posts')->latest()->paginate(4);
        //print_r($data);
        return view('posts',compact('data')); 
    }

    function getFullPost($id){
        $postid=$id;
        $singlePost = DB::table('posts')->where('id', $postid)->first();
        //print_r($singlePost);
        return view('singlePost',compact('singlePost'));
    }
        
}
