<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    servicios: Object,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">

        <div v-if="canLogin" class="hidden absolute top-0 right-0 px-6 py-4 sm:block">

            <Link v-if="$page.props.user" :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-2xl text-gray-500 underline">Iniciar sesión
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-2xl text-gray-500 underline">Registrarse
                </Link>
            </template>
        </div>

        <div class="w-3/4 mx-auto sm:px-6 lg:px-8 mt-28">
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
