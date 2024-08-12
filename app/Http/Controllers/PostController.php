<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);
      
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    public function store(StorePostRequest $request)
    {   

        if ($request->hasFile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }

        $post = new Post;
        $post->title = $request->title;
        $post->user_id = auth()->id();
        $post->short_content = $request->shortContent;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->photo = $path ?? 'dfd/fgf';
        $post->save();
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $userPost = false;
        if($post->user->id === auth()->id()){
            $userPost = true;
        }
        return view('posts.show', ['post' => $post, 
        'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
        'userPost' => $userPost
    ]); 
    }

   
    public function edit(Post $post)
    {   if (auth()->id() === $post->user->id){
            return view('posts.edit', ['post' => $post]);
        }
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if (auth()->id() === $post->user->id){

            if ($request->hasFile('photo')){
                Storage::delete($post->photo);
                $name = $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('post-photos', $name);
    
            }
        
            $post->update(
                [
                'title' => $request->title,
                'short_content' => $request->shortContent,
                'content' => $request->content,
                'photo' => $path ?? $post->photo
                ]
            );
    
            return redirect()->route('posts.show', ['post' => $post->id]);
        }

        return redirect()->route('posts.show', ['post' => $post->id]);
       
    }

    public function destroy(Post $post)
    {
        
        if(auth()->id() === $post->user->id){
            $post->delete();
            return redirect()->route('posts.index');
        }
        return redirect()->route('posts.show', ['post' => $post]);
    }

   

    
}
