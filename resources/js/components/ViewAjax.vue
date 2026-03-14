
<script setup>
import { ref } from "vue"
import axios from "axios"

//props
const props = defineProps({
    id: Number,
    url : String
})

const post = ref({})
const showModal = ref(false)

const openPost = async () => {
    const response = await axios.get(props.url)
    // console.log(response)
    post.value = response.data
    showModal.value = true
}


</script>

<template>
    <button @click="openPost" class="text-blue-600">
        View
    </button>

   

    <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black/50">
    <div role="alert" class="border-2 bg-blue-100 p-4 text-blue-900 shadow-[4px_4px_0_0] ">
  <div class="flex items-start gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mt-0.5 size-4">
      <path fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z" clip-rule="evenodd"></path>
    </svg>
        
    <div>
        <p class="font-semibold">Post Details</p>
        <p class="text-sm">
            <b>ID:</b> {{ post.id }} <br>
            <b>Title:</b> {{ post.title }} <br>
            <b>Description:</b> {{ post.description }} <br> 
            <b>User:</b> {{ post.user?.name }} <br>
            <b>Email:</b> {{ post.user?.email }}
        </p>
        <button @click="showModal=false" class="mt-4 bg-gray-500 text-white px-3 py-1 rounded">Close</button>
    </div>
  </div>    
</div>
</div>
</template>
