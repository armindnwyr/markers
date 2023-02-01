<template>
  <Head title="Categoria" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Categoria
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->
        <div class="flex justify-end m-2 p-2">
          <Link
            :href="route('categorias.create')"
            class="
              px-4
              -py-4
              bg-indigo-500
              hover:bg-indigo-700
              text-white
              rounded-md
            "
            >New Categories</Link
          >
        </div>
        <div class="relative overflow-x-auto rounded">
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="
                text-xs text-gray-700
                uppercase
                bg-gray-50
                dark:bg-gray-700 dark:text-gray-400
              "
            >
              <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="categoria in categoria.data"
                :key="categoria.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <th
                  scope="row"
                  class="
                    px-6
                    py-4
                    font-medium
                    text-gray-900
                    whitespace-nowrap
                    dark:text-white
                  "
                >
                  {{ categoria.id }}
                </th>
                <td class="px-6 py-4">{{ categoria.nombre }}</td>
                <td class="px-6 py-4">
                  <Link
                    :href="route('categorias.edit', categoria.id)"
                    class="font-medium text-blue-500 hover:text-blue-700 mr-2"
                    >Edit</Link
                  >

                  <Link
                    :href="route('categorias.destroy', categoria.id)"
                    method="delete"
                    as="button"
                    type="button"
                    class="font-medium text-red-500 hover:text-red-700 mr-2"
                    >Delete</Link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
  
  <script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  categoria: Object,
});
</script>