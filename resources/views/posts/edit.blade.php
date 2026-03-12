
<x-Layout navTitle="Edit Post">
    <div class="container mx-auto mt-10 max-w-4xl bg-white p-8 rounded shadow-sm">
        
        <form action="{{ route('posts.update', $post['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" id="title" name="title " value="{{ $post['title'] }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="5" 
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">{{ $post['description'] }}</textarea>
            </div>

           
                <button type="submit" 
                    class="bg-emerald-500 text-white px-5 py-2 rounded hover:bg-emerald-600 font-medium transition duration-200">
                    Update
                </button>
          
        </form>

    </div>
    
    
</x-Layout>

