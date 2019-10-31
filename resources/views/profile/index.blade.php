@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                                <div class="title p-2">
                                    <h1>{{ \Str::limit($headline->name, 70) }}</h1>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ \Str::limit($headline->hobby, 500) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ \Str::limit($headline->introduction, 500) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="body mt-3">
                                    <label class="col-md-2" for="name">氏名</label>
                                    {{ \Str::limit($post->name, 100) }}
                                </div>
                                <div class="body mt-3">
                                    <label class="col-md-2" for="gender">性別</label>
                                    {{ \Str::limit($post->gender, 100) }}
                                </div>
                                <div class="body mt-3">
                                    <label class="col-md-2" for="hobby">趣味</label>
                                    {{ \Str::limit($post->hobby, 300) }}
                                </div>
                                <div class="body mt-3">
                                    <label class="col-md-3" for="introduction">自己紹介欄</label>
                                    {{ \Str::limit($post->introduction, 500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection