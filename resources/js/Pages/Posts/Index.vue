<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link, Head } from "@inertiajs/vue3";

defineProps({ posts: Object });
</script>

<template>
  <Head title="Posts" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="flex justify-between items-center">
            <div class="p-6 text-gray-900">Post List</div>
            <Link class="block" :href="route('posts/create')">
              <PrimaryButton class="bg-blue-500">
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;Post</span>
              </PrimaryButton>
            </Link>
          </div>
          <div
            class="border not-prose relative bg-slate-50 rounded-xl overflow-hidden mb-6"
          >
            <div class="relative rounded-xl overflow-auto">
              <div class="shadow-sm overflow-hidden mt-4">
                <table class="border-collapse table-fixed w-full text-sm">
                  <thead>
                    <tr>
                      <th
                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left w-2"
                      >
                        No.
                      </th>
                      <th
                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"
                      >
                        Title
                      </th>
                      <th
                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"
                      >
                        Description
                      </th>
                      <th
                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"
                      >
                        Category
                      </th>
                      <th
                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"
                      >
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr v-for="(post, index) in posts" :key="post.id">
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left w-2"
                      >
                        {{ ++index }}
                      </td>
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        {{ post.title }}
                      </td>
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        {{ post.description }}
                      </td>
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        {{ post.category.name }}
                      </td>
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        <Link
                          class="py-1 px-2 bg-yellow-500 text-white rounded-full shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 text-xs"
                          method="get"
                          :href="route('posts/show', post.id)"
                          as="button"
                          type="button"
                          >Show</Link
                        >
                        <Link
                          class="ms-3 py-1 px-2 bg-green-500 text-white rounded-full shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 text-xs"
                          :href="route('posts/edit', post.id)"
                        >
                          Edit
                        </Link>
                        <Link
                          class="ms-3 py-1 px-2 bg-red-500 text-white rounded-full shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 text-xs"
                          method="delete"
                          :href="route('posts/destroy', post.id)"
                          as="button"
                          type="button"
                          >Delete</Link
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
