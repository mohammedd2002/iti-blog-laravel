<x-Layout navTitle="edit comment">

      <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="bg-gray-50 px-4 py-3 border-b">
                <h3 class="font-medium text-gray-700">edit Comment</h3>
            </div>
            <div class="p-6">
                <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="body" class="block text-gray-700 font-medium mb-2">Comment</label>
                        <textarea id="body" name="body" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">{{ $comment->body }}</textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 font-medium transition duration-200">
                        Update Comment
                    </button>
                </form>
            </div>
        
        </div>

</x-Layout>