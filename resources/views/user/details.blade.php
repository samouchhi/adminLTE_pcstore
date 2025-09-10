@extends('layouts.home')


@section('content')
    <main class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->


            <div class="grid gap-10 lg:grid-cols-2">
                <!-- Left: Product Image / Gallery -->
                <section>
                    <div class="rounded-2xl border bg-white p-4">
                        <img src="{{ asset('storage/uploads/' . $product->image) }}"
                            class="w-full rounded-xl object-contain" />
                    </div>
                </section>

                <!-- Right: Details -->
                <section>
                    <h1 class="text-2xl font-bold leading-tight">
                        {{ $product->name }} </span>
                    </h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Category:
                        <span class="underline text-blue-700">
                            {{ $product->categories->pluck('name')->join(', ') }}
                        </span>
                    </p>




                    <!-- Specs list -->
                    <div class="mt-6 rounded-2xl border bg-white p-6">
                        <div>
                            <p class="whitespace-pre-line">{{ $product->description }}</p>

                        </div>
                    </div>

                    <!-- Price + Actions -->
                    <div class="mt-6 flex items-center gap-6">
                        <div>
                            <div class="text-2xl font-extrabold text-red-500">${{ number_format((float) $product->price, 2) }}
                            </div>
                            <div class="mt-1 text-xs text-gray-500">VAT included • In Stock</div>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap items-center gap-3">
                        <!-- Qty (no JS; just visuals) -->
                        <div class="inline-flex items-center rounded-xl border bg-white">
                            <button class="px-3 py-2 text-gray-700">−</button>
                            <input type="number" value="1" min="1"
                                class="w-12 border-x px-2 py-2 text-center outline-none" />
                            <button class="px-3 py-2 text-gray-700">+</button>
                        </div>

                        <button class="rounded-xl bg-black px-5 py-2.5 text-sm font-semibold text-white hover:bg-black">
                            Add to cart
                        </button>
                    </div>


                </section>
            </div>
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
