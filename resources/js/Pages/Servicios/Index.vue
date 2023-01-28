<template>
    <app-layout title="Gestion servicios">
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ titulo }}
        </h2>
      </template>
      <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 text-right">
  
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
                    {{ item.precio }}
                    </Link>
                  </td>
                  <td class="px-6 py-4">
                    <Link :href="route('servicios.edit', item.id)" class="no-underline text-black hover:font-bold">
                    <!-- {{ item.imagen }} -->
                    <img v-bind:src="('storage/Imagenes/'+item.imagen)" width="120">
                    </Link>
                  </td>
                  <td class="px-6 py-4">
                    <Link :href="route('servicios.edit', item.id)" class="text-blue-500 hover:text-blue-600">
                    <svg class="h-8 w-8 text-black" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
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