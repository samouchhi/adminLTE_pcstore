@extends('layouts.home')

@section('content')
    <main class="py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <!-- Title -->
            <h1 class="text-3xl sm:text-5xl font-extrabold leading-tight tracking-tight">
                {{ $blog->title }}
            </h1>

            <!-- Meta: date • authors • like • discuss -->
            <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-gray-700">
                <time datetime="2025-08-25">{{ $blog->created_at->format('M d, Y') }}</time>

                <span class="hidden sm:inline">•</span>

                <div class="flex flex-wrap items-center gap-1">Author:
                    <a href="#" class="text-blue-700 hover:underline"> {{ $blog->staff_name }}</a>
                </div>


            </div>

            <!-- Hero image -->
            <figure class="mt-6 overflow-hidden rounded-2xl border bg-white">
                <img src="{{ asset('storage/uploads/' . $blog->image) }}" alt="NVIDIA Jetson Thor hero"
                    class="w-full object-cover aspect-[16/9]" />
            </figure>



            <!-- Article body -->
            <article class="mt-8 space-y-6 text-gray-800 leading-7">
                <p>
                    {{ $blog->description }}
                </p>

            </article>


        </div>
    </main>

@stop
