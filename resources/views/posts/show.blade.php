
<x-Layout navTitle="Post Details">
    <div class="container mx-auto mt-10 max-w-6xl space-y-8">
        
        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">Post Info</h3>
            </div>
            <div class="p-6 space-y-2">
                <p><span class="font-bold text-gray-800 text-lg">Title :- </span> <span class="text-gray-700">{{ $post['title'] }}</span></p>
                <div>
                    <span class="font-bold text-gray-800">Description :- </span>
                    <p class="text-gray-600 mt-1 italic">
                        {{ $post['description'] }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">Post Creator Info</h3>
            </div>
            <div class="p-6 space-y-3">
                <p><span class="font-bold text-gray-800 text-lg">Name :- </span> <span class="text-gray-700">{{ $post['creator']['name'] }}</span></p>
                <p><span class="font-bold text-gray-800 text-lg">Email :- </span> <span class="text-gray-700">{{ $post['creator']['email'] }}</span></p>
                <p><span class="font-bold text-gray-800 text-lg">Created At :- </span> <span class="text-gray-700">{{ $post['creator']['created_at'] }}</span></p>
                
              
            </div>
        </div>

     

    </div>
</x-Layout>
