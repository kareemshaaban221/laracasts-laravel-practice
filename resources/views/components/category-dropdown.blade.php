<x-dropdown :categories="$categories" :selectedCategory="$selectedCategory ?? null">
    <x-slot:trigger>
        <button @click="show = !show" class="py-2 pl-3 pr-9 text-sm font-semibold lg:w-auto w-full text-left" @click.away="show = false">
            @isset($selectedCategory)
                {{$selectedCategory->name}}
            @else
                Category--
            @endisset

            <x-icon class="absolute pointer-events-none inline-flex" style="right: 12px;" width="22"
                height="22" viewBox="0 0 22 22" name="down-arrow"></x-icon>
        </button>
    </x-slot>
</x-dropdown>
