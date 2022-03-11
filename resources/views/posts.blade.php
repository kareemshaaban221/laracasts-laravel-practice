<x-layout>
    <x-slot name='content'>

        {{-- posts --}}
        @foreach ($posts as $post)
        <div class="post p-5 {{$loop->odd ? 'dark-post' : 'light-post'}}">
            <h1>
                <a href="/post/{{ $post->title }}">
                    {{$post->title}}
                </a>
            </h1>

            <p>
                <small>
                    <a href="/author/{{ $post->author->username }}">Author: {{ $post->author->name }} </a>
                </small>
            </p>

            <p>
                <small>
                    <a href="/category/{{ $post->category->slug }}">Category: {{$post->category->name}} </a>
                </small>
            </p>

            <p>
                <small>
                    {{$post->published_at}}
                </small>
            </p>

            <h5 class="font-weight-bolder">
                {{$post->description}}
            </h5>
        </div>
        @endforeach

    </x-slot>
</x-layout>
