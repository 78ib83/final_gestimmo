<template>

    <Head title="Proeperties" />
    <AuthenticatedLayout>
        <template #header>
            <Link :href="route('properties')"
                class="text-white bg-gradient-to-r from-red-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Return
            </Link>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="bg-gradient-to-r from-gray-100 to-indigo-100 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="">
                            <form @submit.prevent="valider" id="createPropForm">

                                <div class="grid lg:grid-cols-2 lg:gap-4">
                                    <div class="flex flex-col items-start gap-2">
                                        <label for="code"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-600">Code
                                            Propriété</label>
                                        <input :class="{ 'is-invalid': formProp.errors.code }" type="text" name="code"
                                            id="code"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formProp.code" placeholder=" " required />

                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formProp.errors.code">{{
                                                    formProp.errors.code }}</span></p>
                                    </div>
                                    <div class="flex flex-col items-start gap-2">
                                        <label for="type"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-600">Type</label>
                                        <input :class="{ 'is-invalid': formProp.errors.type }" type="text" name="type"
                                            id="type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formProp.type" placeholder=" " required />

                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formProp.errors.type">{{
                                                    formProp.errors.type }}</span></p>
                                    </div>

                                    <div class="flex flex-col items-start gap-2">
                                        <label for="libelle"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-600">Libéllé</label>
                                        <textarea lass="{ 'is-invalid': formProp.errors.libelle }" name="libelle"
                                            id="libelle"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formProp.libelle" placeholder=" " required></textarea>

                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formProp.errors.libelle">{{
                                                    formProp.errors.libelle }}</span></p>
                                    </div>

                                    <div class="flex flex-col items-start gap-2">
                                        <label for="prix"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-600">Prix</label>
                                        <input :class="{ 'is-invalid': formProp.errors.prix }" type="text" name="prix"
                                            id="prix"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formProp.prix" placeholder=" " required />

                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formProp.errors.prix">{{
                                                    formProp.errors.prix }}</span></p>
                                    </div>


                                    <div class="flex flex-col items-start gap-2">
                                        <label for="etat"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-600">Etat</label>
                                        <select :class="{ 'is-invalid': formProp.errors.etat }" v-model="formProp.etat"
                                            id="etat"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>Etat</option>
                                            <option value="libre">Libre</option>
                                            <option value="occupee">Occupée</option>
                                            <span v-if="formProp.errors.etat" class="invalid-feedback error">{{
                                                formProp.errors.etat
                                                }}</span>
                                        </select>
                                    </div>
                                    <div class="flex flex-col items-start gap-2">
                                        <label for="addresses_id"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-600">Adresse</label>
                                        <select :class="{ 'is-invalid': formProp.errors.addresses_id }"
                                            v-model="formProp.addresses_id" id="addresses_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">adresse</option>
                                            <option v-for="addresses_id in addresses" :key="addresses_id.id"
                                                :value="addresses_id.id">{{
                                                    addresses_id.pays }} {{ addresses_id.ville
                                                }} {{ addresses_id.quartier }} {{ addresses_id.rue }} {{
                                                    addresses_id.porte }}</option>
                                            <span v-if="formProp.errors.addresses_id" class="invalid-feedback error">{{
                                                formProp.errors.addresses_id
                                                }}</span>
                                        </select>
                                    </div>
                                    <div class="flex flex-col items-start gap-2">
                                        <label class="block text-sm font-medium text-gray-900 dark:text-gray-600"
                                            for="photo">Image</label>
                                        <input :key="inputKey" @input="previewImage($event)" accept="image/*"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="photo" type="file">

                                    </div>
                                    <div class="flex flex-col items-start gap-2">
                                        <img src="" alt="image not selected yet ...." id="image-preview"
                                            style="width: 600px; height: 80px; border-radius: 25px; display: none;">
                                    </div>
                                </div>
                            </form>
                            <div>
                                <button style="float: right;" form="createPropForm" type="submit"
                                    class="text-white bg-gradient-to-r from-gray-600 to-blue-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-12 py-2.5 text-center mt-12 mb-2">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { useSwallError, useSwallSuccess } from '@/Composables/alert';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const inputKey = ref("")
const formProp = useForm({
    code: "",
    type: "",
    libelle: "",
    prix: "",
    etat: "",
    addresses_id: "",
    photo: null,
})

defineProps({
    addresses: {
        type: Array,
        default: () => [],
        Required: true
    },
})

const valider = () => {

    formProp.post(route("properties.store"), {
        onSuccess: () => {

            useSwallSuccess("Propriété ajouté avec succès.")
            //alert("Propriété ajoutés avec succès ! ")
            formProp.reset()
            inputKey.value = null
            document.getElementById("image-preview").style.display = "none"
        },
        onError: (errors) => {
            useSwallError("Erreur de soumission.")
            // alert("Erreur de soumission.")
            //console.log(errors)
        }
    })

}
const previewImage = (event) => {
    if (event.target.files.length > 0) {
        formProp.photo = event.target.files[0]
        var src = URL.createObjectURL(formProp.photo)
        var previewImage = document.getElementById("image-preview")
        previewImage.src = src
        previewImage.style.display = "block"
    }
}
</script>