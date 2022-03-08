<x-layout title="{{$post->title}}">
    <x-slot name="content">
        <div class="post light-post p-2">

            <h1>
                {{$post->title}}
            </h1>

            <p>
                {{$post->body}}
            </p>

            <a href="/"> Go Back </a>

        </div>
    </x-slot>
</x-layout>
