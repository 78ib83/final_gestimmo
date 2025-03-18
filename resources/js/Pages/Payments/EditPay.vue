<template>

    <Head title="Payments" />
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
                            <h3 class="">
                                Mise à jour de {{ payment.code }} {{ payment.type }}
                            </h3>
                            <form @submit.prevent="valider" id="editPayForm">
                                <div class="">
                                    <div class="mb-5">
                                        <label for="type"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Type</label>
                                        <input :class="{ 'is-invalid': formPay.errors.type }" type="text" name="type"
                                            id="type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formPay.type" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error" v-if="formPay.errors.type">{{
                                                    formPay.errors.type }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="libelle"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Libellé</label>
                                        <textarea lass="{ 'is-invalid': formPay.errors.libelle }" type="text"
                                            name="libelle" id="libelle"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formPay.libelle" placeholder=" " required></textarea>
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formPay.errors.libelle">{{
                                                    formPay.errors.libelle }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="properties_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Propriété</label>
                                        <select :class="{ 'is-invalid': formPay.errors.properties_id }"
                                            v-model="formPay.properties_id" id="properties_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">propriété</option>
                                            <option v-for="properties_id in properties" :key="properties_id.id"
                                                :value="addresses_id.id">{{ properties_id.code }} {{ properties_id.type
                                                }}
                                            </option>
                                            <span v-if="formPay.errors.properties_id" class="invalid-feedback error">{{
                                                formPay.errors.properties_id
                                                }}</span>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label for="maintenances_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Maintenance</label>
                                        <select :class="{ 'is-invalid': formPay.errors.maintenances_id }"
                                            v-model="formPay.maintenances_id" id="maintenances_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">maintenance</option>
                                            <option v-for="maintenances_id in maintenances" :key="maintenances_id.id"
                                                :value="maintenances_id.id">{{ maintenances_id.type }}</option>
                                            <span v-if="formPay.errors.maintenances_id"
                                                class="invalid-feedback error">{{
                                                    formPay.errors.maintenances_id
                                                }}</span>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label for="montant"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Montant</label>
                                        <input :class="{ 'is-invalid': formPay.errors.montant }" type="text"
                                            name="montant" id="montant"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formPay.montant" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formPay.errors.montant">{{
                                                    formPay.errors.montant }}</span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <button form="editPayForm" type="submit"
                            class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Valider</button>
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
    payment: {
        type: Object,
        default: null,
    },
})


const formPay = useForm({
    type: props.payment.type,
    libelle: props.payment.libelle,
    montant: props.payment.montant,
})

const valider = () => {

    formPay.put(`/payments/${props.payment.id}`, {
        onSuccess: (page) => {
            //useSawalSuccess("Propriété ajouté avec succès.")
            alert("Payment mise à jour avec succès ! ")
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
