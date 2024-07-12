@extends('mainLayout')

@section('page-title', 'Edit Post')
@section('back-link', route('posts'))

@section('page-content')
<div class="d-flex justify-content-center page-body">
<form action="{{ route('update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="post-add post-card">
                <div class="mb-3">
                    <input type="text" class="form-control" value="{{ old('title', $post->title) }}" name="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" textcontent="{{ $post->body }}" name="body" rows="4" placeholder="What's in your mind?">{{ old('body', $post->body) }}</textarea>
                </div>
                <div class="d-flex justify-content-between align-items-center post-btns">
                    <div class="d-flex">
                        <span><i class='bx bx-image-add' ></i></span>
                        <span><i class='bx bx-video-plus' ></i></span>
                        <span><i class='bx bx-paperclip' ></i></span>
                        <span><i class='bx bx-map' ></i></span>
                    </div>
                    <div class="">
                        <button type="submit" class="submit-btn">Update</button>
                    </div>
                </div>
            </div>
        </form>
</div>



        @endsection