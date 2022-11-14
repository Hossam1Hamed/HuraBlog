<?php

namespace App\Http\Controllers\Website;

use App\Events\PostEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\PostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $postRepo;
    private $userRepo;
    public function __construct(PostRepositoryInterface $postRepoInterface,UserRepositoryInterface $userRepoInterface)
    {
        $this->postRepo = $postRepoInterface;
        $this->userRepo = $userRepoInterface;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        return view('web.pages.posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = $this->postRepo->create($request->all());
        $user = $this->userRepo->find($request->user_id);
        if($post)
        {
            broadcast(new PostEvent($user))->toOthers();
            return redirect()->route('website.home')->with('success','Post Added Successfully');
        }else{
            return redirect()->route('website.home')->with('error','Post didn\'t Add ... please try again');
        }
    }

    public function doLike(Request $request)
    {
        $like_status = $request->like_s;
        $post_id = $request->post_id;
        
        $like = DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)
                ->first();
        
        if(!$like)
        {
            DB::table('likes')->insert([
                'user_id' => Auth::user()->id,
                'post_id' => $post_id,
            ]);
            $is_like = 1;
        }elseif($like){
            DB::table('likes')->where('id',$like->id)->delete();
            $is_like = 0;
        }
        $response = array(
            'is_like' => $is_like ,
        );
        return response()->json($response , 200);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
