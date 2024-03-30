<x-layout>
    <div class="p-2 flex flex-col gap-4">
        <div class="flex justify-between">
            <p class="text-3xl">Laravel</p>
            <a class="px-3 py-2 bg-green-500 rounded-md text-white" href="{{ route('product.create') }}">Create New
                Product</a>
        </div>
        <div class="flex justify-end">
            <form action="{{ route('product.search') }}" method="GET">
                <input class="h-10 border-2 border-neutral-400 py-1 px-2 rounded-md" type="text" name="search"
                    placeholder="Search...">
                <button class="h-10 px-4 bg-gray-100 rounded-md">Search</button>
            </form>
        </div>
        <table class="max-w-full bg-white border">
            <thead>
                <tr>
                    <th class="w-1/12 px-6 py-3 border text-left font-bold">No.</th>
                    <th class="w-2/12 px-6 py-3 border text-left font-bold">Name</th>
                    <th class="w-2/12 px-6 py-3 border text-left font-bold">Price (RM)</th>
                    <th class="w-3/12 px-6 py-3 border text-left font-bold">Details</th>
                    <th class="w-1/12 px-6 py-3 border text-left font-bold">Publish</th>
                    <th class="w-3/12 px-6 py-3 border text-left font-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4 border whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 border whitespace-nowrap">{{ $product->name }}</td>
                        <td class="px-6 py-4 border whitespace-nowrap">{{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 border whitespace-nowrap">{{ $product->details }}</td>
                        <td class="px-6 py-4 border whitespace-nowrap">{{ $product->publish ? 'Yes' : 'No' }}</td>
                        <td class="px-6 py-4 border whitespace-nowrap">
                            <a class="inline-block h-12 px-4 py-3 bg-blue-300 text-white rounded-md"
                                href="{{ route('product.show', $product) }}">Show</a>
                            <a class="inline-block h-12 px-4 py-3 bg-blue-500 text-white rounded-md"
                                href="{{ route('product.edit', $product) }}">Edit</a>
                            <form class="inline m-0 p-0" action="{{ route('product.delete', $product) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="h-12 px-4 py-3 bg-red-500 text-white rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
