<x-layout>

    <x-slot name="content">

        <section class="px-6 py-8">
            <main class="max-w-xl mx-auto mt-10 bg-gray-100 p-5 rounded-xl border border-grey-500">
                <h1 class="text-center font-bold text-xl">
                    Login
                </h1>

                <form method="POST" action="{{ route('login') }}" class="mt-10">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
                        <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email"
                            placeholder="" value="{{ old('email') }}">

                        @error('email')
                            <small class="text-red-500">* {{$message}}</small>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
                        <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password"
                            placeholder="">

                        @error('password')
                            <small class="text-red-500">* {{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-gray-100 p-2 pr-5 pl-5 rounded-xl transition hover:bg-blue-600">Login</button>
                </form>



                @if ($errors->any())
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>
                                <small class="text-red-500">{{$error}}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </main>
        </section>

    </x-slot>

</x-layout>
