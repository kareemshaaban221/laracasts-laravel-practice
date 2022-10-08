@props([
    'categories',
    'selectedCategory'
])

<div>
    {{$trigger}}

    <div class="pt-1 pb-1 absolute bg-gray-100 mt-1 rounded-xl w-full z-50 max-h-30 overflow-auto" x-show="show">
        <x-dropdown-item
            href="/?{{ http_build_query(request()->except('category')) }}"
        >
            --
        </x-dropdown-item>

        @foreach ($categories as $category)
            {!! $loop->first ? "" : "<hr>" !!}
            <x-dropdown-item
                {{-- href="/?category={{$category->slug}}&search={{request('search')}}" first approach --}}
                href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category') /* return array */) /* return string key=val&key2=val2&.. */ }}"
                :active="isset($selectedCategory) && $selectedCategory->slug == $category->slug ? true : false"
                {{-- :active="request()->is('category/'. $category->slug)" --}}
            >
                {{$category->name}}
            </x-dropdown-item>
        @endforeach

    </div>

</div>