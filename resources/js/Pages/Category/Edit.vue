<template>
  <Head title="Create Category" />

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
            <div class="p-6 text-gray-900">Edit Category</div>
          </div>
          <div class="p-6">
            <form @submit.prevent="update">
              <div class="grid grid-cols-3 gap-4">
                <div>
                  <InputLabel for="title" value="Name" />
                  <TextInput
                    type="hidden"
                    class="mt-1 block w-full"
                    v-model="form.id"
                  />
                  <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                  />
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

const props = defineProps({ category: Object });

const form = useForm({
  id: props.category.id,
  name: props.category.name,
});

const update = () => {
  form.put(route("categories/update"));
};
</script>
