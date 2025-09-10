@extends('layouts.home')


@section('content')
    <main class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold">Products</h1>
                    <!-- Category Quick Links -->
                    @include('partials.product-navbar')

                    <p class="mt-1 text-gray-600">A focused selection to keep choices simple.</p>
                </div>
            </div>

            @php

                $banners = [
                    'GPU' =>
                        'https://static-cdn.jtvnw.net/jtv_user_pictures/15c17d09-200a-4a45-9bd5-91e172d25156-profile_banner-480.jpeg',
                    'CPU' => 'https://computerlounge.co.nz/cdn/shop/articles/AMD_9950X3D_blog_banner_2c3c2b3a-1346-4184-909c-a90aa5e27d4b.jpg?v=1741776282&width=1600',
                    'Motherboard' =>
                            'https://dlcdnwebimgs.asus.com/gain/6D909D0C-142A-4100-AFE2-93948C7F442A/fwebp',
                    'Ram' =>
                        'https://store974.com/cdn/shop/files/Corsair_Ram_copy.jpg?v=1731250105',
                ];

                $grouped = collect();

                foreach ($products as $product) {
                    foreach ($product->categories as $category) {
                        if (!$grouped->has($category->name)) {
                            $grouped[$category->name] = collect();
                        }

                        if (!$grouped[$category->name]->contains('id', $product->id)) {
                            $grouped[$category->name]->push($product);
                        }
                    }
                }
            @endphp
            @foreach ($grouped as $category => $items)
                @if (isset($banners[$category]))
                    {{-- your existing rendering stays the same --}}
                    <div class="mb-8">
                        <img src="{{ $banners[$category] }}" alt="{{ $category }} Banner" class="w-full rounded-lg mb-6">
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($items as $product)
                                <article class="group rounded-3xl border bg-white p-4 shadow-sm transition hover:shadow-md">
                                    {{-- Image --}}
                                    @if ($product->image)
                                        <a href="{{ route('user.details', $product->id) }}">
                                            <img src="{{ asset('storage/uploads/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="w-full h-64 object-contain rounded-2xl transition group-hover:scale-105" />
                                        </a>
                                    @else
                                        <div
                                            class="aspect-[4/3] w-full rounded-2xl bg-gradient-to-tr from-gray-100 to-gray-200 grid place-items-center">
                                            <span class="text-sm text-gray-500">No Image</span>
                                        </div>
                                    @endif

                                    {{-- Title + Stock --}}
                                    <div class="mt-4 flex items-start justify-between gap-3">
                                        <h2 class="text-lg font-semibold leading-6 text-center">{{ $product->name }}</h2>
                                    </div>


                                    {{-- Price + CTA --}}
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-xl font-bold text-red-500">
                                            ${{ number_format((float) $product->price, 2) }}
                                        </span>
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="shrink-0 rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-700">
                                                {{ $product->stock }} In-Stock
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
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
