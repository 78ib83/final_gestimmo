<template>

    <Head title="Adresses" />
    <AuthenticatedLayout>
        <template #header>

            <Link :href="route('addresses.create')"
                class="text-white bg-gradient-to-r from-gray-200 to-indigo-200 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Ajouter
            </Link>
        </template>

        <div class="py-2">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

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
                        <input type="text" id="table-search" style="background-color: transparent;"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:border-gray dark:placeholder-gray-400 dark:text-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Pays
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ville
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quartier
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rue
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Porte
                            </th>
                            <th scope="col" class="px-6 py-3">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="address in props.addresses.data" :key="address">
                        <tr
                            class="border-b dark:border-gray-300">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ address.pays }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ address.ville }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ address.quartier }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ address.rue }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ address.porte }}
                            </td>
                            <td class="px-6 py-4">
                                <Link @click="deleteProp(address.id)"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Remove </Link>
                            </td>
                            <td class="px-2 py-4">
                                <Link :href="`addresses/${address.id}/edit`"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="props.addresses.links" :prev="props.addresses.prev_page_url"
                    :next="props.addresses.next_page_url" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '../Shared/Pagination.vue';
import CreateAddr from './CreateAddr.vue';

import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    addresses: {
        type: Array,
        default: () => [],
    }
})

const form = useForm({});

const deleteProp = (id) => {
    form.delete(`addresses/${id}`);
};

/*
const searchBox = ref("")
const search = async () => {
    // console.log("searchBox : ", searchBox.value );
    axios.get(route("properties.index", {
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