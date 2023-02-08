<template>
  <app-layout title="Agregar servicio">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ titulo }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 text-left text-2xl">

        <div class="bg-gray-50 shadow-2xl p-8">
          <form class="p-10 flex flex-col items-center" @submit.prevent="guardar">

            <jet-label for="nombre" value="Nombre del servicio:" />
            <jet-input id="nombre" class="px-5 py-3 w-3/4 border border-gray-600 rounded" v-model="form.nombre"
              :class="{ 'is-invalid': form.errors.nombre }" required placeholder="Nombre servicio" />
            <jet-input-error :message="form.errors.nombre" />

            <jet-label for="precio" value="Precio:" />
            <jet-input id="precio" class="px-5 py-3 w-3/4 border border-gray-600 rounded" v-model="form.precio"
              :class="{ 'is-invalid': form.errors.precio }" required placeholder="Precio" />
            <jet-input-error :message="form.errors.precio" />

            <jet-label for="imagen" value="Selecciona una imagen:" class="mt-7" />
            <jet-input
              class="text-2xl block w-3/4 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              type="file" @input="form.imagen = $event.target.files[0]" />
            <jet-input-error :message="form.errors.imagen" />

            <div class="flex justify-around mt-10 text-2xl mb-5 w-3/5">
              <Link :href="route(`${routeName}index`)" class="underline text-gray-600 hover:text-gray-900">
              Cancelar
              </Link>

              <jet-button @click="guardar" class="ml-4 text-xl" :class="{ 'text-white': form.processing }"
                :disabled="form.processing">
                <span class="animate-spin mr-1" v-show="form.processing">&#9696;</span> Guardar
              </jet-button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetLabel from "@/Components/Label.vue";
import JetInput from "@/Components/Input.vue";
import JetInputError from "@/Components/InputError.vue";
import JetButton from "@/Components/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  name: "Create",
  props: {
    titulo: { type: String, required: true },
    routeName: { type: String, required: true },
  },
  components: {
    AppLayout,
    Link,
    JetLabel,
    JetInput,
    JetInputError,
    JetButton,
  },
  setup(props) {
    const form = useForm({ nombre: "", precio: "", imagen: "" });
    const guardar = () => {
      form.post(route("servicios.store"));
    };

    return { form, guardar };
  },

};
</script>
