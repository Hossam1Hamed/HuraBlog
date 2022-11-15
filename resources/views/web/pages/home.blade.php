@extends('web.layouts.base')

@section('content')

<div class=" pb-0">
    <div class="d-lg-flex">

        <div class="ms-auto my-auto mt-lg-0 m-6">
            <div class="ms-auto my-auto">
                <a href="{{route('website.posts.create')}}" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="" data-bs-target="#exampleModal">
                    +&nbsp; Add Post
                </a>

            </div>
        </div>
    </div>
</div>

<!-- <a href="{% url 'app:add' %}" style="position:absolute;bottom:50px;right:50px;margin:0;padding:5px 3px;"><i class="fas fa-plus-circle fa-3x"></i></a> -->
<div class="mx-auto col-md-6">

    @foreach($posts as $post)
    <div class="card">

        <div class="d-flex justify-content-between p-2 px-3">
            <div class="d-flex flex-row align-items-center"> <img src="{{url('storage/images/'.$post->user->image)}}" width="50" class="rounded-circle">
                <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">{{$post->user->name}}</span> </div>
            </div>
            <div class="d-flex flex-row mt-1"> <small class="mr-2">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small> </div>
        </div>
        <!-- <img src="https://i.imgur.com/xhzhaGA.jpg" class="img-fluid"> -->
        <div class="p-2">
            <h4 class="text-justify">{{$post->title}}</h4>
            <p class="text-justify">{{$post->content}}</p>
            <hr>
            
            <div class="d-flex justify-content-between align-items-center">
                <!-- <p class="likeBtn"><i class="fa fa-thumbs-up pressLike"></i> Like</p> -->
                <!-- <div class="d-flex flex-row icons d-flex align-items-center"> <i class="fal fa-heart pressLove"></i> </div> -->
                @php
                    $user = auth()->user();
                    $like_status = $post->likes->contains($user) ? 'btn btn-sm btn-success' : 'btn btn-sm btn-secondary';
                    $likes_count = $post->likes->count();
                @endphp
                <div class="d-flex flex-row icons d-flex align-items-center">
        
                    <button data-like_s="{{$like_status}}" data-postid="{{$post->id}}" data-likes_count="{{$likes_count}}" type="button"
                        class="{{$like_status}} like outline-none">
                             <span class="fa fa-thumbs-up"></span> Like </button>
                </div>
                <div class="d-flex flex-row muted-color"> 
                    <span>{{$post->comments->count()}} comments | </span> 
                    <span id="likes-count" class="likes_count"> {{$likes_count}} likes</span>
                </div>
            </div>
            <hr>
            <div class="comments">
                @foreach($post->comments as $comment)
                <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/9AZ2QX1.jpg" width="40" class="rounded-image">
                    <div class="d-flex flex-column ml-2"> <span class="name">{{$comment->user->name}}</span> <small class="comment-text">{{$comment->content}}</small>
                        <div class="d-flex flex-row align-items-center status"><small>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small> </div>
                    </div>
                </div>
                @endforeach

                <div class="comment-input">
                    <form action="{{route('website.comments.store')}}" method="post">
                    @csrf
                    <label for="">leave your comment if you want</label>
                    <input type="text" name="content" class="form-control">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- pagination -->
    {!! $posts -> links() !!}
</div>



@endsection