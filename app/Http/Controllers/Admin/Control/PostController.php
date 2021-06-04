<?php

namespace App\Http\Controllers\Admin\Control;

use App\Http\Requests\Admin\Control\StorePost;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Support\ImageService;
use App\Support\Scopes\MessagesTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use MessagesTrait;

    protected $nameModel = 'Publicação';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('admin.control.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.control.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        try {
            if ($request->hasFile('image_path')) {

                $image = new ImageService($request->image_path, 770, 460);
                $request['path'] = $image->resizeImage('posts', false);

                $thumb = new ImageService($request->image_path, 368, 274);
                $request['thumb_path'] = $thumb->resizeImage('posts', true);
            }
            $request['user_id'] = \Auth::user()->id;
            Post::create($request->all());
            return redirect()->back()->with('success', $this->successCreatedMessage($this->nameModel));
        } catch (\Exception $exception) {
            return redirect()->back()->withInput(Input::all())->with('error', $this->errorCreatedMessage($this->nameModel, $exception));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.control.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        try {
            if ($request->hasFile('image_path')) {
                $image = new ImageService($request->image_path, 900, 450);
                $request['path'] = $image->resizeImage('posts', false);

                $thumb = new ImageService($request->image_path, 400, 260);
                $request['thumb_path'] = $thumb->resizeImage('posts', true);
            }
            $request['slug'] = Str::slug($request->title);
            $request['user_id'] = \Auth::user()->id;
            Post::findOrFail($id)->update($request->all());
            return redirect()->back()->with('success', $this->successUpdateMessage($this->nameModel));
        } catch (\Exception $exception) {
            return redirect()->back()->withInput(Input::all())->with('error', $this->errorUpdateMessage($this->nameModel, $exception));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            Storage::drive('uploads')->delete($post->image);
            Storage::drive('uploads')->delete($post->thumb_path);
            $post->delete();
            return redirect()->back()->with('success', 'Publicação apagada com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->withInput(Input::all())->with('error', 'Não foi possível apagar esta publicação:' . $exception->getMessage());
        }
    }
}
