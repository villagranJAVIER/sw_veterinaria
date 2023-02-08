<template>
  <app-layout title="Editar servicios">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ titulo }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 text-left text-2xl">

        <div class="bg-gray-50 shadow-2xl p-8">
          <form class="p-10 flex flex-col items-center" @submit.prevent="guardar" enctype="multipart/form-data">

            <jet-label for="nombre" value="Nombre del servicio:" />
            <jet-input id="nombre" class="px-5 py-3 w-3/4 border border-gray-600 rounded" v-model="form.nombre"
              :class="{ 'is-invalid': form.errors.nombre }" required placeholder="Nombre documento" />
            <jet-input-error :message="form.errors.nombre" />

            <jet-label for="precio" value="Precio:" class="mt-7" />
            <jet-input id="precio" class="px-5 py-3 w-3/4 border border-gray-600 rounded" v-model="form.precio"
              :class="{ 'is-invalid': form.errors.precio }" placeholder="Nombre plantilla" />
            <jet-input-error :message="form.errors.precio" />

            <jet-label for="imagen" value="Selecciona una imagen:" class="mt-7" />
            <jet-input
              class="text-2xl block w-3/4 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              type="file" @input="form.imagen = $event.target.files[0]" />
            <jet-input-error :message="form.errors.imagen" />

            <div class="flex items-center justify-around mt-14 w-3/4">
              <Link :href="route(`${routeName}index`)" class="underline text-gray-600 hover:text-gray-900">
              Cancelar
              </Link>

              <jet-button @click="guardar" class="ml-4 text-xl" :class="{ 'text-white': form.processing }"
                :disabled="form.processing">
                <span class="animate-spin mr-1" v-show="form.processing">&#9696;</span> Guardar
              </jet-button>

              <div class="ml-4">
                <button class="
                                p-1
                                border-2
                                border-red-500
                                text-red-500
                                bg-red-100
                                hover:bg-red-200
                                font-bold
                                rounded-xl
                              " v-if="!servicios.deleted_at" type="button" @click="eliminar">
                  <i class="bi bi-trash"></i> Eliminar Registro
                </button>
              </div>
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
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

export default {
  name: "Edit",
  props: {
    titulo: { type: String, required: true },
    servicios: { type: Object, required: true },
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
    const form = useForm({ ...props.servicios });

    const guardar = () => {
      form.post(route("upload", form.id));
    };

    const eliminar = () => {
      Swal.fire({
        title: "¿Esta seguro?",
        text: "Esta acción no se puede revertir",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Si!, eliminar registro!",
      }).then((res) => {
        if (res.isConfirmed) {
          form.delete(route("servicios.destroy", props.servicios.id));
        }
      });
    };
    return { form, guardar, eliminar };
  },
};
</script>