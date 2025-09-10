{{-- resources/views/partials/product-navbar.blade.php --}}
<div class="mb-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 text-center">
    <!-- Laptop -->
    <a href="{{ url('products/laptop') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path d="M3 5h18v12H3z" stroke-width="2" />
            <path d="M2 19h20" stroke-width="2" />
        </svg>
        <span class="text-sm font-medium @if (Request::is('products/laptop')) text-blue-500 @endif">Laptop</span>
    </a>

    <!-- PC Hardware -->
    <a href="{{ url('products/pc-hardware') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <rect x="4" y="4" width="16" height="16" rx="2" ry="2" stroke-width="2" />
            <path d="M8 16h8" stroke-width="2" />
            <circle cx="12" cy="12" r="2" stroke-width="2" />
        </svg>
        <span class="text-sm font-medium @if (Request::is('products/pc-hardware')) text-blue-500 @endif">PC Hardware</span>
    </a>

    <!-- Accessories -->
    <a href="{{ url('products/accessories') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path d="M12 2v20M5 7h14M5 17h14" stroke-width="2" />
        </svg>
        <span class="text-sm font-medium @if (Request::is('products/accessories')) text-blue-500 @endif">Accessories</span>
    </a>
</div>
