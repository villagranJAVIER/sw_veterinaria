<template>
    <app-layout title="Agregar reservación">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ titulo }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 text-left text-2xl">

                <div class="bg-gray-50 shadow-2xl p-8 m-auto flex items-center">
                    <form class="p-10 items-center flex flex-col bg-slate-50 w-1/2" @submit.prevent="guardar">

                        <jet-label for="nombre" value="Nombre de la mascota:" class="mt-8" />
                        <jet-input id="nombre" class="px-5 py-3 w-3/4 border border-gray-600 rounded"
                            v-model="form.nombre" :class="{ 'is-invalid': form.errors.nombre }" required
                            placeholder="Nombre de la mascota" />
                        <jet-input-error :message="form.errors.nombre" />

                        <jet-label for="edad" value="Edad de la mascota:" class="mt-8" />
                        <jet-input id="edad" class="px-5 py-3 w-3/4 border border-gray-600 rounded"
                            v-model="form.edad" :class="{ 'is-invalid': form.errors.edad }" required
                            placeholder="Edad de la mascota" />
                        <jet-input-error :message="form.errors.edad" />

                        <jet-label for="peso" value="Peso de la mascota(KG):" class="mt-8" />
                        <jet-input id="peso" class="px-5 py-3 w-3/4 border border-gray-600 rounded"
                            v-model="form.peso" :class="{ 'is-invalid': form.errors.peso }" required
                            placeholder="Peso de la mascota" />
                        <jet-input-error :message="form.errors.peso" />

                        <jet-label for="raza" value="Raza de la mascota:" class="mt-8" />
                        <jet-input id="raza" class="px-5 py-3 w-3/4 border border-gray-600 rounded"
                            v-model="form.raza" :class="{ 'is-invalid': form.errors.raza }" required
                            placeholder="Raza de la mascota" />
                        <jet-input-error :message="form.errors.raza" />

                        <div class="flex justify-around mt-10 text-2xl mb-5 w-3/5">
                            <Link :href="route(`${routeName}index`)"
                                class="underline text-gray-600 hover:text-gray-900">
                            Cancelar
                            </Link>

                            <jet-button @click="guardar" class="ml-4 text-xl" :class="{ 'text-white': form.processing }"
                                :disabled="form.processing">
                                <span class="animate-spin mr-1" v-show="form.processing">&#9696;</span> Guardar
                            </jet-button>
                        </div>

                    </form>
                    <div class="bg-slate-50 w-1/2 p-14">
                        <div class="mb-7">
                            <img v-bind:src="('/storage/Imagenes/' + servicio.imagen)" width="800"
                                class="border-2 rounded-lg">
                        </div>
                        <div class="flex flex-col">
                            <jet-label value="Servicio solicitado:" />
                            <span id="service_id"
                                class="px-5 py-3 w-3/4 border border-gray-600 rounded mb-3 bg-slate-200">
                                {{ servicio.nombre }}
                            </span>
                            <jet-label value="Precio del servicio:" class="" />
                            <span id="service_id" class="px-5 py-3 w-3/4 border border-gray-600 rounded bg-slate-200">
                                ${{ servicio.precio }}
                            </span>
                        </div>
                    </div>
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
        servicio: {
            type: Object,
            default: {},
            required: true,
        },
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
        const form = useForm({ nombre: "", edad: "", peso: "", raza: "", service_id: "", user_id: "" });
        const guardar = () => {
            form.service_id = props.servicio.id;
            form.post(route("reservaciones.store"));
        };

        return { form, guardar };
    },

};
</script>
