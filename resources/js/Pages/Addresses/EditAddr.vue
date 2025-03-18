<template>

    <Head title="Adresses" />
    <AuthenticatedLayout>
        <template #header>
            <Link :href="route('payments')"
                class="text-white bg-gradient-to-r from-red-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Return
            </Link>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-gradient-to-r from-gray-100 to-indigo-100 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="">
                            <form @submit.prevent="valider" id="editAddrForm">
                                <div class="">
                                    <div class="mb-5">
                                        <label for="pays"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Pays</label>
                                        <input :class="{ 'is-invalid': formAddr.errors.pays }" type="text" name="pays"
                                            id="pays"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formAddr.pays" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formAddr.errors.pays">{{
                                                    formAddr.errors.pays }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="ville"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Ville</label>
                                        <input :class="{ 'is-invalid': formAddr.errors.ville }" type="text" name="ville"
                                            id="ville"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formAddr.ville" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formAddr.errors.ville">{{
                                                    formAddr.errors.ville }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="quartier"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Quartier</label>
                                        <input :class="{ 'is-invalid': formAddr.errors.quartier }" type="text"
                                            name="quartier" id="quartier"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formAddr.quartier" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formAddr.errors.quartier">{{
                                                    formAddr.errors.quartier }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="rue"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Rue</label>
                                        <input :class="{ 'is-invalid': formAddr.errors.rue }" type="text" name="rue"
                                            id="rue"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formAddr.rue" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error" v-if="formAddr.errors.rue">{{
                                                    formAddr.errors.rue }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="porte"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Porte</label>
                                        <input :class="{ 'is-invalid': formAddr.errors.porte }" type="text" name="porte"
                                            id="porte"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formAddr.porte" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formAddr.errors.porte">{{
                                                    formAddr.errors.porte }}</span></p>
                                    </div>
                                </div>
                            </form>
                            <button form="editAddrForm" type="submit"
                                class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    address: {
        type: Object,
        default: null,
    },
})

const formAddr = useForm({
    pays: props.address.pays,
    ville: props.address.ville,
    quartier: props.address.quartier,
    rue: props.address.rue,
    porte: props.address.porte,
})

const valider = () => {

    formAddr.put(`/addresses/${props.address.id}`, {
        onSuccess: (page) => {
            //useSawalSuccess("Propriété ajouté avec succès.")
            alert("Adresse mise à jour avec succès ! ")
            /*formProp.reset()
            inputKey.value = null
            document.getElementById("image-preview").style.display = "none"*/
        },
        onError: (errors) => {
            //useSawalError("Erreur de soumission.")
            alert("Erreur de soumission.")
        }
    })

}
</script>
