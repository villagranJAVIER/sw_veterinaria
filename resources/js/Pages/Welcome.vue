<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    servicios: Object,
});


</script>

<template>
    <Head title="Bienvenido" />
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden absolute top-0 right-0 px-6 py-4 sm:block w-full h-32"
            style="background-color: #3DC1A8;">
            <div v-if="$page.props.user" class="flex justify-between items-center">
                <div class="">
                    <ApplicationMark class="block h-32 w-auto ml-14" />
                </div>
                <div class="flex mr-20">
                    <Link :href="route('dashboard')" class="text-2xl font-bold text-gray-500 underline">Inicio</Link>
                </div>
            </div>
            <template v-else>
                <div class="flex justify-between items-center">
                    <div class="">
                        <ApplicationMark class="block h-32 w-auto ml-14" />
                    </div>
                    <div class="flex mr-20">
                        <Link :href="route('login')" class="text-2xl font-bold text-gray-500 underline">Iniciar sesión
                        </Link>
                        <Link v-if="canRegister" :href="route('register')"
                            class="ml-4 text-2xl font-bold text-gray-500 underline">
                        Registrarse</Link>
                    </div>
                </div>
            </template>
        </div>

        <div class="w-3/4 mx-auto sm:px-6 lg:px-8 mt-32">
            <div class="p-4">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center mt-10">
                    Conoce nuestros servicios
                </h2>
                <div v-if="servicios.length > 0" v-for="item in servicios"
                    class="relative inline-block text-center p-4 m-auto">

                    <Link :href="route('reservaciones.show', item.id)">
                    <img v-bind:src="('storage/Imagenes/' + item.imagen)" width="300" class="border-2 rounded-lg">
                    <span
                        class="absolute -translate-x-2/4 -translate-y-1/2 top-1/2 left-1/2 text-2xl font-semibold text-black  hover:text-3xl hover:text-slate-700 bg-slate-100 bg-opacity-20">
                        {{ item.nombre }}
                    </span>
                    </Link>
                </div>
                <div v-else class="bg-red-100 border border-red-400 p-3 rounded-lg text-red-800 mt-5 text-left">
                    No hay ningún servicio disponible
                </div>

                <!-- <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center mt-10">
                    Amamos los animales
                </h2>
                <div class="relative inline-block text-center p-4 m-auto">
                    <img src="../assets/catalogo/1.jpg" width="300" class="border-2 rounded-lg">
                </div> -->
            </div>
        </div>
    </div>
</template>

<style></style>
