<template>
  <app-layout title="Gestion servicios">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ titulo }}
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 text-right">
        <div v-if="$page.props.flash.message"
          class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mb-10" role="alert">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
              d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
          </svg>
          <p>{{ $page.props.flash.message }}</p>
        </div>
        <Link class="
                  p-3
                  border-2
                  border-blue-500
                  text-blue-500
                  bg-blue-100
                  hover:bg-blue-200
                  font-bold
                  rounded-xl
              " :href="route(`${routeName}create`)">
        + Agregar nuevo
        </Link>
        <div class="overflow-x-auto relative sm:rounded-lg mt-10 bg-gray-50 shadow-2xl p-8">
          <table v-if="servicios.data.length > 0" class="w-full text-left text-gray-500">
            <thead class="text-gray-700 uppercase">
              <tr>
                <th class="px-6 py-3 border-r bg-gray-300">
                  Nombre
                </th>
                <th class="px-6 py-3 border-r bg-gray-300">
                  Precio
                </th>
                <th class="px-6 py-3 border-r bg-gray-300">
                  Imagen
                </th>
                <th class="px-6 py-3 border-r bg-gray-300">
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody v-for="item in servicios.data">
              <tr class="border-b border-slate-400 text-lg">
                <td class="px-6 py-4">
                  <Link :href="route('servicios.edit', item.id)" class="no-underline text-black hover:font-bold">
                  {{ item.nombre }}
                  </Link>
                </td>
                <td class="px-6 py-4">
                  <Link :href="route('servicios.edit', item.id)" class="no-underline text-black hover:font-bold">
                  ${{ item.precio }}
                  </Link>
                </td>
                <td class="px-6 py-4">
                  <Link :href="route('servicios.edit', item.id)" class="no-underline text-black hover:font-bold">
                  <!-- {{ item.imagen }} -->
                  <img v-bind:src="('storage/Imagenes/' + item.imagen)" width="120">

                  </Link>
                </td>
                <td class="px-6 py-4">
                  <Link :href="route('servicios.edit', item.id)" class="text-blue-500 hover:text-blue-600">
                  <svg class="h-8 w-8 text-black  ml-10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                    <line x1="16" y1="5" x2="19" y2="8" />
                  </svg>
                  </Link>

                </td>
              </tr>
            </tbody>
          </table>
          <div v-else class="bg-red-100 border border-red-400 p-3 rounded-lg text-red-800 mt-5 text-left">
            No hay ningun registro
          </div>
        </div>

      </div>
    </div>

  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3"
import Input from "@/Components/Input.vue";
import JetButton from '@/Components/Button.vue';

export default {
  name: "Index",
  props: {
    titulo: { type: String, required: true },
    servicios: {
      type: Object,
      default: {},
      required: true,
    },
    routeName: { type: String, required: true }
  },
  components: {
    AppLayout,
    Link,
    Input,
    JetButton,
  },
};
</script>