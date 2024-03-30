<x-layout>
    <div class="p-2">
        <div class="flex justify-between">
            <p class="text-3xl">Edit Product</p>
            <a class="px-3 py-2 bg-blue-500 rounded-md text-white" href="{{ route('product.home') }}">Back</a>
        </div>
        <form class="flex flex-col gap-4" action="{{ route('product.edit', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <label class="font-bold" for="name">Name:</label>
                <input class="border-2 border-neutral-400 p-2 rounded-md" type="text" name="name"
                    placeholder="Name" value="{{ old('name', $product->name) }}">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label class="font-bold" for="price">Price (RM):</label>
                <input class="border-2 border-neutral-400 p-2 rounded-md" type="float" name="price"
                    placeholder="99.90" value="{{ old('price', $product->price) }}">
                @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label class="font-bold" for="details">Detail:</label>
                <textarea class="border-2 border-neutral-400 p-2 rounded-md" name="details" rows="10" placeholder="Detail">{{ old('details', $product->details) }}</textarea>
                @error('details')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label class="font-bold" for="publish">Publish</label>
                <label>
                    <input type="radio" name="publish" value="yes"
                        {{ old('publish', $product->publish ? 'yes' : 'no') === 'yes' ? 'checked' : '' }}>
                    Yes
                </label>
                <label>
                    <input type="radio" name="publish" value="no"
                        {{ old('publish', $product->publish ? 'yes' : 'no') === 'no' ? 'checked' : '' }}>
                    No
                </label>
                @error('publish')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <button class="w-24 px-2 py-3 bg-blue-500 text-white rounded-md">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
