@extends('mainLayout')

@section('page-title', 'Posts')
@section('back-link', route('posts'))

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
    <a href="{{ route('post-detail', $post->id)}}" class="link-card">
        <div class="post-card">  
            <div class="d-flex justify-content-between post-index align-items-center mb-3 border-bottom">
                <div>
                    <span class="post-owner mb-2">{{ $post->user->name }}</span>
                    
                </div>
                <div>
                    <span class="post-time mb-2">{{ $post->created_at->format('M d, Y h:i A') }}</span>
                </div>
            </div>
            <div>
                <p class="post-title">{{$post->title}}</p>
                <p class="post-content">{{$post->body}}</p>
            </div> 
            @can('update', $post)
                <a href="{{ route('edit', $post->id) }}" class="actions edit-action">Edit</a> • 
            @endcan 
            @can('delete', $post)
                <form action="{{ route('destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="actions del-action btn btn-link p-0">Delete</button>
                </form>
            @endcan
        </div>
    </a>
        
    @endforeach
    </div>
    
</div>


@endsection