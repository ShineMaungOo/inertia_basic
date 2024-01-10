<template>
  <Head title="Categories" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Categories
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="flex justify-between items-center">
            <div class="p-6 text-gray-900">Category List</div>
            <Link class="block" :href="route('categories/create')">
              <PrimaryButton class="bg-blue-500">
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;Category</span>
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
                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"
                      >
                        No.
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
                    <tr
                      v-for="(category, index) in categories"
                      :key="category.id"
                    >
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        {{ ++index }}
                      </td>
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        {{ category.name }}
                      </td>
                      <td
                        class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-left"
                      >
                        <Link
                          class="py-1 px-2 bg-green-500 text-white rounded-full shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 text-xs"
                          :href="route('categories/edit', category.id)"
                        >
                          Edit
                        </Link>
                        <Link
                          class="ms-3 py-1 px-2 bg-red-500 text-white rounded-full shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 text-xs"
                          method="delete"
                          :href="route('categories/destroy', category.id)"
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
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({ categories: Object });

const form = useForm({
  id: "",
});

// const destroy = (id) => {
//   alert(id);
//   if (confirm("Are you sure you want to delete this category?")) {
//     form.delete(route("categories/destroy", id));
//   }
// };
</script>

