<template>
  <Head title="Update Post" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="flex justify-between items-center">
            <div class="p-6 text-gray-900">Update Post</div>
          </div>
          <div class="p-6">
            <form @submit.prevent="update" class="">
              <div class="grid grid-cols-3 gap-4">
                <TextInput
                  type="hidden"
                  class="mt-1 block w-full"
                  v-model="form.id"
                />
                <div>
                  <InputLabel for="title" value="Title" />

                  <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                  />

                  <!-- <InputError class="mt-2" :message="form.errors.title" /> -->
                </div>
                <div>
                  <InputLabel for="description" value="Description" />

                  <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required
                    autofocus
                    autocomplete="description"
                  />
                </div>
                <div>
                  <InputLabel for="category_id" value="Category" />
                  <select
                    name="category_id"
                    id="category_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    v-model="form.category_id"
                    required
                  >
                    <option value="" disabled selected>Please Select</option>
                    <option
                      v-for="category in props.categories"
                      :key="category.id"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
                  </select>
                </div>
              </div>
              <PrimaryButton class="mt-4 bg-green-500"> Update </PrimaryButton>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({ post: Object, categories: Object });

const form = useForm({
  id: props.post.id,
  title: props.post.title,
  description: props.post.description,
  category_id: props.post.category_id,
});

const update = () => {
  form.put(route("posts/update"));
};
</script>
