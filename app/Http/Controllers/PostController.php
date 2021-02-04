<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('profile', ['user' => Auth::user()]);
    }

    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }

    public function create(Request $request){
        $user = Auth::user();
        return view('posts.create', ['user' => $user]);
    }

    public function store(Request $request):JsonResponse{
        $validator = Validator::make($request->all(), [
                'content' => 'required|min:1|string',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 400);
        }
        try {
            $imagePath = $request->picture->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            \auth()->user()->posts()->create([
                'content' => $request->get('content'),
                'picture' => $imagePath
            ]);
            $request->session()->flash('success', 'Bài viết mới đã được tạo');
            return response()->json(['url' => route('profile.show', Auth::id())], 200);
        }catch(\Exception  $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

}
