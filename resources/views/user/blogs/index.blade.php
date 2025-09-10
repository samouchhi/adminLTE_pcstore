@extends('layouts.home')

@section('content')
    <main class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold">Blog</h1>
            <p class="mt-1 text-gray-600">Tips, reviews, and setup ideas.</p>

            <!-- Cards grid -->
            <section class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card -->
                @foreach ($blogs as $blog)
                    <article class="group overflow-hidden rounded-3xl border bg-white shadow-sm transition hover:shadow-md">
                        <a href="{{ route('user.blogs.detail', $blog->id) }}">
                            <img src="{{ asset('storage/uploads/' . $blog->image) }}"
                                alt="Post image" class="h-48 w-full object-cover transition group-hover:scale-105" />
                        </a>
                        <div class="p-5">
                            <a href="#" class="block">
                                <h2 class="text-lg font-semibold leading-6 group-hover:underline">
                                    {{ $blog->title }}

                                </h2>
                            </a>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                                {{ $blog->description }}
                            </p>
                        </div>
                    </article>
                @endforeach



            </section>
        </div>
    </main>
@stop

@section('footer')
    <footer class="border-t bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 text-sm text-gray-500">
            © <span class="font-medium">GadgetHub</span> — All rights reserved.
        </div>
    </footer>
@stop
