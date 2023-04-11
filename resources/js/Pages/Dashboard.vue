<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

import App from '@/Components/App.vue';
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
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 ">

                <div v-if="$page.props.flash.message"
                    class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">{{ $page.props.flash.message }}</p>
                        </div>
                    </div>
                </div>
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
                    <div v-if="($page.props.user.tipo == 2)">
                        <App class=""></App>
                    </div>
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
                            class="font-semibold text-xl text-gray-800 leading-tight text-center border-b-2 border-sky-700 mt-10">
                            Servicios disponibles
                        </h2>

                        <div class="p-12">
                            <div v-if="servicios.length > 0" v-for="item in servicios"
                                class="relative inline-block text-center p-10 m-auto">

                                <Link :href="route('reservaciones.show', item.id)">
                                <img v-bind:src="('storage/Imagenes/' + item.imagen)" width="330"
                                    class="border-2 rounded-lg">
                                <span
                                    class="absolute -translate-x-2/4 -translate-y-1/2 top-1/2 left-1/2 text-2xl font-semibold text-black  hover:text-3xl hover:text-slate-700 bg-slate-100 bg-opacity-20">
                                    {{ item.nombre }}
                                </span>
                                </Link>
                            </div>
                            <div v-else
                                class="bg-red-100 border border-red-400 p-3 rounded-lg text-red-800 mt-5 text-left">
                                No hay ningún servicio disponible
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </app-layout>
    <div class="bg-slate-900 text-white flex justify-between">
        <img src="/storage/img/logo2.png" alt="" width="">
        <div class="p-12">
            <div class="flex items-center">
                <img src="/storage/img/ubicacion.png" alt="" width="25">
                <div>
                    Av. Los gallos, Cuautemoth, Jiutepec, Mor.
                </div>
            </div>
            <div class="flex items-center mt-5 mb-5">
                <img src="/storage/img/ubicacion.png" alt="" width="25">
                <div>
                    Miguel Aleman #69, Nueva Oriental Coapa, Tlalpan, CDMX, 14300
                </div>
            </div>
            <div class="p-2 ml-96">
                <img src="/storage/img/t.png" alt="" width="75">
                <img src="/storage/img/i.png" alt="" width="75" class="mt-4">
                <img src="/storage/img/f.png" alt="" width="75" class="mt-4">
            </div>
        </div>

    </div>

</template>
