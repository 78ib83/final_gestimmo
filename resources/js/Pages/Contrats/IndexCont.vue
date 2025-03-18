<template>

    <Head title="Contrats" />
    <AuthenticatedLayout>
        <template #header>

            <Link :href="route('contrats.create')"
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
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Libellé
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Durée
                            </th>
                            <th scope="col" class="px-6 py-3">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="contrat in props.contrats.data" :key="contrat">
                        <tr class=" border-b dark:border-gray-300">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ contrat.type }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ contrat.libelle }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ contrat.duree }}
                            </td>
                            <td class="px-6 py-4">
                                <Link @click="deleteCont(contrat.id)"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Remove </Link>
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="`contrats/${contrat.id}/edit`"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="props.contrats.links" :prev="props.contrats.prev_page_url"
                    :next="props.contrats.next_page_url" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '../Shared/Pagination.vue';
import CreateCont from './CreateCont.vue';

import { Head, useForm } from '@inertiajs/vue3';
//import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    contrats: {
        type: Array,
        default: () => [],
        Required: true
    }
})

const form = useForm({});

const deleteCont = (id) => {
    form.delete(`contrats/${id}`);
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