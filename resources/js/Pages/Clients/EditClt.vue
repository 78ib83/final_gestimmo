<template>

    <Head title="Clients" />
    <AuthenticatedLayout>
        <template #header>
            <Link :href="route('clients')"
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
                            <h3 class="bg-gradient-to-bl from-gray-100 to-indigo-100">
                                Mise à jour de {{ client.prenom }} {{ client.nom }}
                            </h3>
                            <form @submit.prevent="valider" id="editCltForm">
                                <div class="grid lg:grid-cols-2 lg:gap-4">
                                    <div class="flex flex-col items-start gap-2">
                                        <label for="prenom"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Prénom</label>
                                        <input :class="{ 'is-invalid': formClt.errors.prenom }" type="text" name="prenom"
                                            id="prenom"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formClt.prenom" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formClt.errors.prenom">{{
                                                    formClt.errors.prenom }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="nom"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Nom</label>
                                        <input :class="{ 'is-invalid': formClt.errors.nom }" type="text" name="nom"
                                            id="nom"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formClt.nom" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error" v-if="formClt.errors.nom">{{
                                                    formClt.errors.nom }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="genre"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Genre</label>
                                        <select :class="{ 'is-invalid': formClt.errors.genre }" v-model="formClt.genre"
                                            id="genre"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>Genre</option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                            <span v-if="formClt.errors.genre" class="invalid-feedback error">{{
                                                formClt.errors.genre
                                                }}</span>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label for="telephone"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Téléphone</label>
                                        <input :class="{ 'is-invalid': formClt.errors.telephone }" type="text" name="telephone"
                                            id="telephone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formClt.telephone" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formClt.errors.telephone">{{
                                                    formClt.errors.telephone }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">
                                            Email</label>
                                        <input :class="{ 'is-invalid': formClt.errors.email }" type="email" name="email"
                                            id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="formClt.email" placeholder=" " required />
                                        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span
                                                class="font-medium invalid-feedback error"
                                                v-if="formClt.errors.email">{{
                                                    formClt.errors.email }}</span></p>
                                    </div>

                                    <div class="mb-5">
                                        <label for="properties_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Propriété</label>
                                        <select :class="{ 'is-invalid': formClt.errors.properties_id }"
                                            v-model="formClt.properties_id" id="properties_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>propriété</option>
                                            <option v-for="properties_id in properties" :key="properties_id.id"
                                                :value="properties_id.id">{{ properties_id.code }} {{ properties_id.type
                                                }}
                                            </option>
                                            <span v-if="formClt.errors.properties_id" class="invalid-feedback error">{{
                                                formClt.errors.properties_id
                                                }}</span>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label for="contrats_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Contrats</label>
                                        <select :class="{ 'is-invalid': formClt.errors.contrats_id }"
                                            v-model="formClt.contrats_id" id="contrats_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>Contrat</option>
                                            <option v-for="contrats_id in contrats" :key="contrats_id.id"
                                                :value="contrats_id.id">{{ contrats_id.type }}
                                            </option>
                                            <span v-if="formClt.errors.properties_id" class="invalid-feedback error">{{
                                                formClt.errors.contrats_id
                                                }}</span>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600"
                                            for="photo">Image</label>
                                        <input :key="inputKey" @input="previewImage($event)" accept="image/*"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-100 dark:border-gray dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="photo" type="file">
                                        <div v-if="props.client.photo">
                                            <img src="'/storage/'+client.photo" alt="" id="image-preview"
                                                style="width: 75px; height: 75px; border-radius: 25px; display: none;">
                                        </div>
                                        <div v-else>
                                            <img src="" alt="image non disponible" id="image-preview"
                                                style="width: 75px; height: 75px; border-radius: 25px; display: none;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button form="editCltForm" type="submit"
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
import { ref } from 'vue';


const props = defineProps({
    client: {
        type: Object,
        default: null,
    },
    properties: {
        type: Object,
        default: null,
    },
    contrats: {
        type: Object,
        default: null,
    },
})

const inputKey = ref("")
const formClt = useForm({
    prenom: props.client.prenom,
    nom: props.client.nom,
    genre: props.client.genre,
    telephone: props.client.telephone,
    email: props.client.email,
    properties_id: props.client.properties_id,
    contrats_id: props.client.contrats_id,
    photo: null
})

const valider = () => {

    formClt.put(`/clients/${props.client.id}`, {
        onSuccess: (page) => {
            //useSawalSuccess("Propriété ajouté avec succès.")
            alert("Client mise à jour avec succès ! ")
            /*formProp.reset()
            inputKey.value = null
            document.getElementById("image-preview").style.display = "none"*/
        },
        onError: (errors) => {
            //useSawalError("Erreur de soumission.")
            alert("Erreur de soumission.")
            console.log(errors);
            
        }
    })

}
const previewImage = (event) => {
    if (event.target.files.length > 0) {
        formClt.photo = event.target.files[0]
        var src = URL.createObjectURL(formClt.photo)
        var previewImage = document.getElementById("image-preview")
        previewImage.src = src
        previewImage.style.display = "block"
    }
}
</script>