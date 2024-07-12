@extends('mainLayout')

@section('page-title', 'Posts')
@section('page-content')
<div class="d-flex justify-content-center page-body">
    <div class="mt-2 post-grid">
        <form action="{{ route('posts') }}" method="POST">
            @csrf
            <div class="post-add post-card">
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="body" rows="4" placeholder="What's in your mind?"></textarea>
                </div>
                <div class="d-flex justify-content-between align-items-center post-btns">
                    <div class="d-flex">
                        <span><i class='bx bx-image-add' ></i></span>
                        <span><i class='bx bx-video-plus' ></i></span>
                        <span><i class='bx bx-paperclip' ></i></span>
                        <span><i class='bx bx-map' ></i></span>
                    </div>
                    <div class="">
                        <button type="submit" class="submit-btn">Post</button>
                    </div>
                </div>
            </div>
        </form>
    @foreach ($posts as $post)
    <a href="{{ route('post-detail', $post->id)}}">
        <div class="post-card post-link">  
            <div class="d-flex justify-content-between post-index align-items-center mb-3 border-bottom">
                <span class="post-owner mb-2">{{ $post->user->name }}</span>
                <span class="post-time mb-2">{{ $post->created_at->format('M d, Y h:i A') }}</span>
            </div>
            <div>
                <p class="post-title">{{$post->title}}</p>
                <p class="post-content">{{$post->body}}</p>
            </div>  
        </div>
    </a>
        
    @endforeach
    </div>
    
</div>


@endsection