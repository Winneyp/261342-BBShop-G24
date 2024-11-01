@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <!-- Product Image -->
                <div class="md:w-1/2">
                    @if ($products->picture)
                        <img src="{{ asset('storage/' . $products->picture) }}" alt="Product Image"
                            class="w-full h-full object-cover">
                    @else
                        <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="md:w-1/2 p-8">
                    <!-- Stock Status Badge -->
                    <div class="mb-4">
                        @if ($products->stock_quantity > 0)
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                In Stock ({{ $products->stock_quantity }} available)
                            </span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                Out of Stock
                            </span>
                        @endif
                    </div>

                    <!-- Price -->
                    <div class="text-3xl font-bold text-gray-900 mb-4">
                        ${{ number_format($products->price, 2) }}
                    </div>

                    <!-- Product Attributes -->
                    <div class="space-y-4 mb-6">
                        <!-- Size -->
                        @if ($products->size)
                            <div>
                                <span class="text-gray-700 font-medium">Size:</span>
                                <span class="ml-2">{{ $products->size }}</span>
                            </div>
                        @endif

                        <!-- Color -->
                        @if ($products->color)
                            <div>
                                <span class="text-gray-700 font-medium">Color:</span>
                                <span class="ml-2">{{ $products->color }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    @if ($products->description)
                        <div class="mb-6">
                            <h3 class="text-gray-700 font-medium mb-2">Description</h3>
                            <p class="text-gray-600">{{ $products->description }}</p>
                        </div>
                    @endif

                    <!-- Add to Cart  -->
                    <form action="{{ route('add-to-cart', $products->product_id) }}" method="POST">
                        @csrf
                        <div class="mb-4 flex items-center">
                            <label for="quantity" class="text-gray-700 font-medium mr-2">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1"
                                max="{{ $products->stock_quantity }}"
                                class="border border-gray-300 rounded-lg px-2 py-1 w-20 text-center" required>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 
                            {{ $products->stock_quantity <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                            {{ $products->stock_quantity <= 0 ? 'disabled' : '' }}>
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
