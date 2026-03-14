<script setup>
import ViewAjax from '@/Components/ViewAjax.vue'
import { route } from 'ziggy-js';
import { router, Link } from '@inertiajs/vue3'
defineProps({
  posts: Object
})


function deletePost(postId) {
  if (!confirm('Are you sure you want to delete this post?')) return
  router.delete(`/posts/${postId}`)
}

</script>

<template>
   <div class="container mx-auto mt-10 bg-white p-8 rounded shadow-sm">

        <div class="flex justify-center mb-8">
            <a :href="route('posts.create')"
                class="bg-emerald-500 text-white px-4 py-2 rounded-md hover:bg-emerald-600 font-medium">
                Create Post
            </a>

            <a :href="route('posts.trashed')"
                class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 font-medium ml-4">
                Restore Posts
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
                    <tr v-for="post in posts.data" :key="post.id">
                        <td class="py-3 px-2">{{ post.id }}</td>
                        <td class="py-3 px-2">{{ post.title }}</td>
                        <td class="py-3 px-2">{{ post.user?.name }}</td>
                        <td class="py-3 px-2">{{ new Date(post.created_at).toLocaleDateString('en-CA') }}</td>
                        <td class="py-1 px-1 flex space-x-2">

                            <view-ajax :id="post.id" :url="route('posts.show', { post: post.id })"></view-ajax>

                            <a
                                :href="route('posts.edit', { id: post.id })"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                                >
                                Edit
                                </a>






                            <button 
                                type="button"
                                class="text-red-600 hover:underline"
                                @click="deletePost(post.id)">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div v-if="posts.links && posts.links.length > 1" class="mt-4 flex flex-wrap gap-2 justify-center">
            <template v-for="(link, index) in posts.links" :key="index">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    class="px-4 py-2 rounded border text-sm font-medium transition"
                    :class="link.active
                        ? 'bg-blue-600 text-white border-blue-600'
                        : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50'"
                    v-html="link.label"
                />
                <span
                    v-else
                    class="px-4 py-2 rounded border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed"
                    v-html="link.label"
                />
            </template>
        </div>

    </div>
</template>