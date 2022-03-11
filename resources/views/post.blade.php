<x-layout title="{{$post->title}}">
    <x-slot name="content">
        <div class="post light-post p-5">

            <h1>
                {{$post->title}}
            </h1>

            <p>
                <small><a href="/author/{{ $post->author->username }}">Author: {{$post->author->name}}</a></small>
            </p>

            <p>
                <small>
                    <a href="/category/{{ $post->category->slug }}">Category: {{$post->category->name}} </a>
                </small>
            </p>

            <p>
                {{$post->content}}
            </p>

            <a href="/"> Go Back </a>

        </div>
    </x-slot>
</x-layout>
