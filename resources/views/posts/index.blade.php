<x-Layout navTitle="All Posts">
    <div class="container mx-auto mt-10 bg-white p-8 rounded shadow-sm">

        <div class="flex justify-center mb-8">
            <a href="{{ route('posts.create') }}"
                class="bg-emerald-500 text-white px-4 py-2 rounded-md hover:bg-emerald-600 font-medium">
                Create Post
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-4 px-2 font-semibold">ID</th>
                        <th class="py-4 px-2 font-semibold">Title</th>
                        <th class="py-4 px-2 font-semibold">Posted By</th>
                        <th class="py-4 px-2 font-semibold">Created At</th>
                        <th class="py-4 px-2 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="py-3 px-2">{{ $post['id'] }}</td>
                            <td class="py-3 px-2">{{ $post['title'] }}</td>
                            <td class="py-3 px-2">{{ $post['creator']['name'] }}</td>
                            <td class="py-3 px-2">{{ $post['creator']['created_at'] }}</td>
                            <td class="py-1 px-1 flex space-x-2">


                                {{-- <a href="{{ route('posts.show', $post['id']) }}"
                                    class="text-blue-600 hover:underline mr-3">View</a>
                                <a href="{{ route('posts.edit', $post['id']) }}"
                                    class="text-green-600 hover:underline mr-3">Edit</a> --}}

                                <x-button type="primary" :route="route('posts.show', $post['id'])" name="View">
                                </x-button>

                                <x-button type="secondary" :route="route('posts.edit', $post['id'])" name="Edit">
                                </x-button>




                                <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- <div class="mt-8">
            <p class="text-red-600 mb-2 font-semibold">Pagination in lab 2</p>
            <div class="inline-flex border rounded overflow-hidden">
                <button class="px-3 py-2 border-r hover:bg-gray-100 text-blue-600">Previous</button>
                <button class="px-4 py-2 border-r hover:bg-gray-100 text-blue-600">1</button>
                <button class="px-4 py-2 border-r hover:bg-gray-100 text-blue-600">2</button>
                <button class="px-4 py-2 border-r hover:bg-gray-100 text-blue-600">3</button>
                <button class="px-3 py-2 hover:bg-gray-100 text-blue-600">Next</button>
            </div>
        </div> --}}

    </div>
</x-Layout>
