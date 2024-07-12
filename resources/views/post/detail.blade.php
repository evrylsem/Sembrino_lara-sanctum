@extends('mainLayout')

@section('page-title', $post->user->name . ' | ' . $post->title )
@section('page-content')
<div class="container page-body">
    <div class="d-flex justify-content-center">
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
    </div>
    

    <div class="comments mt-4">
        <h5>Comments</h5>
        @foreach ($post->comments as $comment)
        <div class="comment-card mb-2">
            <div class="d-flex justify-content-between comment-index align-items-center mb-2">
                <span class="comment-owner">{{ $comment->user->name }}</span>
                <span class="comment-time">{{ $comment->created_at->format('M d, Y h:i A') }}</span>
            </div>
            <div>
                <p class="comment-content">{{ $comment->body }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection