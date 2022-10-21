<x-layout>
    <x-slot:content>

        @include('posts.header')

        {{------------------------------------ Articles -------------------------------------}}
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            @if ($posts->count())
                <div>
                    @foreach ($posts as $post)

                        @if ($loop->first)
                            @include('posts.article1')

                        @elseif ($loop->index == 1)
                            <div class="lg:grid lg:grid-cols-2">
                                @include('posts.article2')
                        @elseif ($loop->index == 2)
                                @include('posts.article2')
                            </div>
                        @else
                            @if ($loop->index % 3 == 0)
                                <div class="lg:grid lg:grid-cols-3">
                                    @include('posts.article3')
                            @elseif ($loop->index % 3 < 2)
                                    @include('posts.article3')
                            @else
                                    @include('posts.article3')
                                </div>
                            @endif
                        @endif

                    @endforeach
                </div>

                <div>
                    {{ $posts->links() }}
                </div>

            @else
                <h3 class="text-center">No Posts Found :(</h3>
            @endif
        </main>


        @if (session()->has('done'))
            <small
                class="bg-blue-500 text-white p-3 rounded-xl fixed bottom-3 right-3"
                x-data="{show : true}"
                x-init="setTimeout(() => show = false, 4000)"
                x-show="show"
            >
                {{ session('done') }}
            </small>
        @endif

    </x-slot>
</x-layout>
