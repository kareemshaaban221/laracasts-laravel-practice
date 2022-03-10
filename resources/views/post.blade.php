<x-layout title="{{$post->title}}">
    <x-slot name="content">
        <div class="post light-post p-5">

            <h1>
                {{$post->title}}
            </h1>

            <p>
                {{$post->content}}
            </p>

            <a href="/"> Go Back </a>

        </div>
    </x-slot>
</x-layout>
