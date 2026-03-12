
<x-Layout navTitle="Create Post">
    <div class="container mx-auto mt-10 max-w-4xl bg-white p-8 rounded shadow-sm">
        
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" id="title" name="title" 
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="5" 
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400"></textarea>
            </div>

            <div class="mb-6">
                <label for="user_id" class="block text-gray-700 font-medium mb-2">Post Creator</label>
                <select id="user_id" name="user_id" 
                    class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                    @foreach ($user as $users)
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" 
                class="bg-emerald-500 text-white px-5 py-2 rounded hover:bg-emerald-600 font-medium transition duration-200">
                Create
            </button>
        </form>

    </div>
    
    
</x-Layout>

