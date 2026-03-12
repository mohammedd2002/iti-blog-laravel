<x-Layout navTitle="Post Details">
    <div class="container mx-auto mt-10 max-w-6xl space-y-8">

        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">Post Info</h3>
            </div>
            <div class="p-6 space-y-2">
                <p><span class="font-bold text-gray-800 text-lg">Title :- </span> <span
                        class="text-gray-700">{{ $post->title }}</span></p>
                <div>
                    <span class="font-bold text-gray-800">Description :- </span>
                    <p class="text-gray-600 mt-1 italic">
                        {{ $post->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">Post Creator Info</h3>
            </div>
            <div class="p-6 space-y-3">
                <p><span class="font-bold text-gray-800 text-lg">Name :- </span> <span
                        class="text-gray-700">{{ $post->user?->name }}</span></p>
                <p><span class="font-bold text-gray-800 text-lg">Email :- </span> <span
                        class="text-gray-700">{{ $post->user?->email }}</span></p>
                <p><span class="font-bold text-gray-800 text-lg">Created At :- </span> <span
                        class="text-gray-700">{{ $post->user?->created_at->format('l jS \o\f F Y h:i:s A') }}</span></p>


            </div>
        </div>

        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">Add Comment</h3>
            </div>
            <div class="p-6">
                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="body" class="block text-gray-700 font-medium mb-2">Comment</label>
                        <textarea id="body" name="body" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 font-medium transition duration-200">
                        Add Comment
                    </button>
                </form>
            </div>
        
        </div>

        @if ($post->comments->isNotEmpty())
        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">Comments</h3>
            </div>
            <div class="p-6 space-y-4">
                @foreach ($post->comments as $comment)
                    <div class="border rounded p-4 bg-gray-50">
                        <p class="text-gray-700">{{ $comment->body }}</p>
                        <p class="text-sm text-gray-500 mt-2">Commented at: {{ $comment->created_at->format('Y-m-d H:i') }}</p>
                        <div class='flex space-x-2'>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                            onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                        </form>
                        </div>
                    </div>
                    @endforeach
                    
            </div>
        </div>
        @endif

            
      


    </div>
</x-Layout>
