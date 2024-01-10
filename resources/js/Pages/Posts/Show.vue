<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link, Head } from "@inertiajs/vue3";

defineProps({ post: Object });
</script>

<template>
  <Head title="Post Detail" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="flex justify-between items-center">
            <div class="p-6 text-gray-900">Post Detail</div>
            <Link class="block" :href="route('posts')">
              <PrimaryButton> Back </PrimaryButton>
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
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
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
