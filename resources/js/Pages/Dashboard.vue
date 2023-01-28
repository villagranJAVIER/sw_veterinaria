<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

import Welcome from '@/Components/Welcome.vue';
defineProps({
    servicios: Object,
});

</script>

<template>
    <app-layout title="Home">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menú principal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="
                    bg-white
                    overflow-hidden
                    shadow-xl
                    rounded-lg
                    p-6
                    border-b
                    border-gray-200
                    justify-center
                    text-xl

                ">
                    <div class="p-5 w-3/5" v-if="($page.props.user.tipo == 1)">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            Gestiones
                        </h2>
                        <div class="p-2 flex justify-start">
                            <div>
                            </div>
                            <div>
                                <Link
                                    class="bg-transparent hover:bg-blue-800 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-xl mr-4"
                                    :href="route('servicios.index')">
                                Servicios
                                </Link>
                               
                            </div>

                        </div>
                    </div>
                    <div v-else class="p-5 w-4/5 m-auto">
                        <h2
                            class="font-semibold text-xl text-gray-800 leading-tight text-center border-b-2 border-amber-500 mt-10">
                            Servicios disponibles
                        </h2>

                        <div class="p-12">
                            <div v-for="item in servicios" class="relative inline-block text-center p-10 m-auto">

                                <Link :href="route('reservaciones.show', item.id)">
                                <img v-bind:src="('storage/Imagenes/' + item.imagen)" width="330"
                                    class="border-2 rounded-lg">
                                <span
                                    class="absolute -translate-x-2/4 -translate-y-1/2 top-1/2 left-1/2 text-2xl text-white hover:text-3xl hover:text-slate-300">
                                    {{ item.nombre }}
                                </span>
                                </Link>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </app-layout>
</template>
