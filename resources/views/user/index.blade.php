@extends('layouts.home')




<!-- Hero -->
@section('content')
    <section class="relative overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">
                        Quality peripherals for work, study, and play.
                    </h1>
                    <p class="mt-4 text-lg text-gray-600">
                        We curate laptop accessories, keyboards, mice, headsets, and more—so you don’t have to guess
                        what’s
                        good.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ url('/products') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-5 py-3 text-white hover:bg-black transition">
                            Browse Products
                        </a>
                        <a href="{{ url('/blog') }}"
                            class="inline-flex items-center justify-center rounded-xl border px-5 py-3 hover:bg-gray-100 transition">
                            Read the Blog
                        </a>
                    </div>
                    <dl class="mt-10 grid grid-cols-3 gap-6 text-center sm:max-w-md">
                        <div class="rounded-2xl bg-white p-4 shadow-sm">
                            <dt class="text-xs uppercase tracking-wide text-gray-500">Warranty</dt>
                            <dd class="text-xl font-semibold">12 Months</dd>
                        </div>
                        <div class="rounded-2xl bg-white p-4 shadow-sm">
                            <dt class="text-xs uppercase tracking-wide text-gray-500">Shipping</dt>
                            <dd class="text-xl font-semibold">Nationwide</dd>
                        </div>
                        <div class="rounded-2xl bg-white p-4 shadow-sm">
                            <dt class="text-xs uppercase tracking-wide text-gray-500">Support</dt>
                            <dd class="text-xl font-semibold">24/7</dd>
                        </div>
                    </dl>
                </div>
                <div class="relative">
                    <div class="rounded-3xl border bg-white p-4 shadow-lg">
                        <div class="aspect-[4/3] w-full rounded-2xl overflow-hidden">
                            <img src="{{ asset('storage/banners/logo.png') }}"
                                alt="Hero image" class="h-full w-full object-cover">
                        </div>

                    </div>
                    <div
                        class="pointer-events-none absolute -left-10 -top-10 h-40 w-40 rounded-full bg-gray-200/60 blur-2xl">
                    </div>
                    <div
                        class="pointer-events-none absolute -right-10 -bottom-10 h-40 w-40 rounded-full bg-gray-300/60 blur-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('valvue')
    <!-- Values -->
    <section class="py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold">Why shop with us?</h2>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-2xl border bg-white p-6 shadow-sm">
                    <h3 class="font-semibold">Curated Gear</h3>
                    <p class="mt-2 text-sm text-gray-600">We hand-pick reliable keyboards, mice, and accessories tested
                        by
                        enthusiasts.</p>
                </div>
                <div class="rounded-2xl border bg-white p-6 shadow-sm">
                    <h3 class="font-semibold">Fair Pricing</h3>
                    <p class="mt-2 text-sm text-gray-600">Transparent pricing with seasonal promos—no gimmicks.</p>
                </div>
                <div class="rounded-2xl border bg-white p-6 shadow-sm">
                    <h3 class="font-semibold">Fast Support</h3>
                    <p class="mt-2 text-sm text-gray-600">Friendly support that actually solves problems.</p>
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer')
    <!-- Footer -->
    <footer class="border-t bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 text-sm text-gray-500">
            © <span class="font-medium">GadgetHub</span> — All rights reserved.
        </div>
    </footer>
@stop
