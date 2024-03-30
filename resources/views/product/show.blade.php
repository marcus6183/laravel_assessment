<x-layout>
    <div class="p-2">
        <div class="flex justify-between">
            <p class="text-3xl">Show Product</p>
            <a class="px-3 py-2 bg-blue-500 rounded-md text-white" href="{{ route('product.home') }}">Back</a>
        </div>
        <div class="flex flex-col gap-4">
            <p><span class="font-bold">Name: </span>{{ $product->name }}</p>
            <p><span class="font-bold">Price: </span>RM {{ number_format($product->price, 2) }}</p>
            <p><span class="font-bold">Details: </span>{{ $product->details }}</p>
            <p><span class="font-bold">Publish: </span>{{ $product->publish ? 'Yes' : 'No' }}</p>

        </div>

    </div>
</x-layout>
