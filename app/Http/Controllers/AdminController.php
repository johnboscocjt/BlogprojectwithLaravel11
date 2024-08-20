<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //actions
    public function post_page(){
        return view('admin.post_page');
    }

    public function add_post(Request $request){ //requesting data from add_post
        $user = Auth()->user();//user table for logged in user
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;//from db


        $post = new Post;
        $post->title = $request->title; 
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $user_id;
        $post->name =  $name;
        $post->usertype = $usertype;//from above variables created

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);//folder created
            $post->image = $imagename;
        }
        

        $post ->save();
        return redirect()->back()->with('message', 'Post Added Succesfully');
    }

    public function show_post(Request $request){
        $post = Post::all();
        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }


    public function edit_page($id){
        $post = Post::find($id);//identifying the specific id

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id){
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);//folder created
            $data->image = $imagename;//image from db
        }

        $data->save();
        return redirect()->back()->with('message','Post Updated Successfully');
    }

    public function accept_post($id){
        $data = Post::find($id);
        $data->post_status='active';//change post status to active

        $data->save();
        return redirect()->back()->with('message','Post accepted');
    }

    public function reject_post($id){
        $data = Post::find($id);
        $data->post_status='rejected';//change post status to active

        $data->save();
        return redirect()->back()->with('message','Post rejected');
    }
}
