<template>
    <Head title="Contrats" />
    <AuthenticatedLayout>
        <template #header>
            <Link :href="route('contrats')"
                class="text-white bg-gradient-to-r from-red-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Return
            </Link>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-gradient-to-r from-gray-100 to-indigo-100 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="">
                            <form @submit.prevent="valider" id="createContForm">

                                <div class="">
                                    <div class="mb-5">
                                        <label for="type"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Type</label>
                                        <input :class="{ 'is-invalid': formCont.errors.type }" type="text" name="type"
                                            id="type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formCont.type" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formCont.errors.type">{{
                                                    formCont.errors.type }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="libelle"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Libellé</label>
                                        <textarea lass="{ 'is-invalid': formCont.errors.libelle }" type="text"
                                            name="libelle" id="libelle"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formCont.libelle" placeholder=" " required></textarea>
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formCont.errors.libelle">{{
                                                    formCont.errors.libelle }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="duree"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Durée</label>
                                        <input :class="{ 'is-invalid': formCont.errors.duree }" type="text" name="duree"
                                            id="duree"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formCont.duree" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formCont.errors.duree">{{
                                                    formCont.errors.duree }}</span></p>
                                    </div>
                                </div>
                            </form>
                            <button form="createContForm" type="submit"
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

const formCont = useForm({
    type: "",
    libelle: "",
    duree: "",
})

const valider = () => {

    formCont.post(route("contrats.store"), {
        onSuccess: (page) => {
            //useSawalSuccess("Propriété ajouté avec succès.")
            alert("Contrat enregistré avec succès ! ")
            formCont.reset()
        },
        onError: (errors) => {
            //useSawalError("Erreur de soumission.")
            alert("Erreur de soumission.")
        }
    })

}

</script>