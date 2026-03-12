<x-Layout navTitle="Trashed Posts">
    <div class="container mx-auto mt-10 bg-white p-8 rounded shadow-sm">



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
                            <td class="py-3 px-2">{{ $post->id }}</td>
                            <td class="py-3 px-2">{{ $post->title }}</td>
                            <td class="py-3 px-2">{{ $post->user?->name }}</td>
                            <td class="py-3 px-2">{{ $post->created_at->format('Y-m-d') }}</td>
                            <td class="py-1 px-1 flex space-x-2">




                                <form action="{{ route('posts.restore', $post['id']) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to restore this post?')">Restore</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>


    </div>
</x-Layout>
