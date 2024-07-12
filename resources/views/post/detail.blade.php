@extends('mainLayout')

@section('page-title', $post->user->name . ' | ' . $post->title )
@section('back-link', route('posts'))
@section('page-content')
<div class="d-flex flex-column align-items-center page-body">
    <div class="d-flex flex-column align-items-start">
        <div class="post-card">
            <div class="d-flex justify-content-between post-index align-items-center mb-3 border-bottom">
                <span class="post-owner mb-2">{{ $post->user->name }}</span>
                <span class="post-time mb-2">{{ $post->created_at->format('M d, Y h:i A') }}</span>
            </div>
            <div>
                <h3 class="post-title">{{ $post->title }}</h3>
                <p class="">{{ $post->body }}</p>
            </div>
        </div>
        <div class=" mt-4">

            <h5 class="comment-header">Comments</h5>
            <form action="{{ route('comment', ['post' => $post->id]) }}" method="POST" class="mb-2">
                @csrf
                <div class="post-add post-card">
                    <div class="mb-3">
                        <textarea class="form-control" name="body" rows="2" placeholder="What's in your mind?"></textarea>
                    </div>
                    <div class="d-flex justify-content-between align-items-center post-btns">
                        <div class="d-flex">
                            <span><i class='bx bx-image-add' ></i></span>
                            <span><i class='bx bx-video-plus' ></i></span>
                            <span><i class='bx bx-paperclip' ></i></span>
                            <span><i class='bx bx-map' ></i></span>
                        </div>
                        <div class="">
                            <button type="submit" class="submit-btn">Comment</button>
                        </div>
                    </div>
                </div>
            </form>
            <div>
                @foreach ($post->comments as $comment)
                <div class="comment-card mb-2">
                    <div class="d-flex justify-content-between comment-index align-items-center mb-2">
                        <div>
                            <span class="comment-owner">{{ $comment->user->name }}</span>
                        </div>
                        <div>
                            <span class="comment-time">{{ $comment->created_at->format('M d, Y h:i A') }}</span>
                            @can('delete', $comment)
                            |
                            <form action="{{ route('comment-delete', ['comment' => $comment->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="actions del-action btn btn-link p-0">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    <div>
                        <p class="comment-content">{{ $comment->body }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            
            

            
        </div>
    </div>
    

    
</div>
@endsection