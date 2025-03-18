<template>

    <Head title="Properties" />
    <AuthenticatedLayout>
        <template #header>

            <Link :href="route('properties.create')"
                class="text-white bg-gradient-to-r from-gray-200 to-indigo-200 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Ajouter
            </Link>
        </template>

        <div class="py-2">
            <div class=" relative overflow-x-auto shadow-md sm:rounded-lg">

                <div class="pb-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input v-model="searchBox" @keyup="search" type="text" id="table-search" style="background-color: transparent ;"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:border-gray dark:placeholder-gray-400 dark:text-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Code
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Libellé
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prix
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Etat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Adresses_id
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="property in props.properties.data" :key="property">
                        <tr class=" border-b dark:border-gray-300">
                            <td class="p-4">
                                <img :src="showPic(property)" class="w-16 md:w-20 max-w-full max-h-full"
                                    alt="no picture">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ property.code }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ property.type }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ property.libelle }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ property.prix }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ property.etat }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ property.addresses_id }}
                            </td>
                            <td class="px-2 py-4">
                                <Link @click="deleteProp(property.id)"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                Remove </Link>
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="`properties/${property.id}/edit`"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="props.properties.links" :prev="props.properties.prev_page_url"
                    :next="props.properties.next_page_url" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '../Shared/Pagination.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps({
    properties: {
        type: Array,
        default: () => [],
    }
})


function showPic(property) {
    if (property.photo) {
        return 'storage/' + property.photo;
    } else {
        return null;
        //return client.sexe = "M" ? "images/man.png" : "images/woman.png"
    }
}

const form = useForm({});

const deleteProp = (id) => {
    form.delete(`properties/${id}`);
};


const searchBox = ref("")
/*
const search = () => {
    console.log("search box : ", searchBox.value);
    
}*/
/*
const search = _thro () => {
     console.log("searchBox : ", searchBox.value );
    axios.get(route("properties", {
        search: searchBox.value
    }), {},
        {
            replace: true,
            preserveState: true
        })
}
*/
/*
function deleteProp(id){
    axios.delete(route("properties.destroy", {properties: id}),{
        onSuccess:(Response)=>{
            alert("Propriété supprimée avec succès !")
        },
        onError:(error)=>{
            alert(error.message ?? "Une erreure s'est produite")
        }
    })
}
function deleteConfirm(properties){
    const message = `Êtes-vous sûr de vouloir supprimer cette propriété : "${properties.code} ${properties.type}" ?`
    /*alert(message,()=>{
        deleteProp(properties.id)
    })
    deleteProp(properties.id)
}
*/

</script>