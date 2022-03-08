<x-layout>
    <x-slot name='content'>
        @foreach ($posts as $post)
            <div class="post p-2 {{$loop->odd ? 'dark-post' : 'light-post'}}">
                <h1>
                    <a href="/post/{{ $post->slug }}">
                        {{$post->title}}
                    </a>
                </h1>

                <p>
                    {{$post->discription}}
                </p>
            </div>
        @endforeach

        
    </x-slot>
</x-layout>
