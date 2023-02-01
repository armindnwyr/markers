<template>
  <Head title="New Categoria" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        New Categoria
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded">
        <!-- Formulario                -->
        <form class="py-4" @submit.prevent="submit">
          <div>
            <InputLabel for="nombre" value="Nombre" />

            <TextInput
              id="nombre"
              type="text"
              class="mt-1 block w-full"
              v-model="form.nombre"
              autofocus
            />

            <InputError class="mt-2" :message="$page.props.errors.nombre" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Update Categoria
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
    
    <script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
  categoria: Object,
});

const form = useForm({
  nombre: props.categoria?.nombre,
});

const submit = () => {
  router.post(`/categorias/${props.categoria.id}`, {
    _method: "put",
    nombre: form.nombre,
  });
};
</script>