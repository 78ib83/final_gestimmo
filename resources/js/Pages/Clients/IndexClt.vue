<template>

    <Head title="Clients" />
    <AuthenticatedLayout>
        <template #header>

            <Link :href="route('clients.create')"
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
                            <th scope="col" class="px-12 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Prénom
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Nom
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Téléphone
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Properties_id
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Contrats_id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="client in props.clients.data" :key="client">
                        <tr class=" border-b dark:border-gray-300">
                            <td class="p-4">
                                <img :src="showPic(client)" class="w-16 md:w-32 max-w-full max-h-full"
                                    alt="no picture">
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ client.prenom }}
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ client.nom }}
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ client.telephone }}
                            </td>
                            <td class="px-2 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ client.email }}
                            </td>
                            <td class="px-2 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ client.properties_id }}
                            </td>
                            <td class="px-2 py-4 font-semibold text-gray-900 dark:text-gray-500">
                                {{ client.contrats_id }}
                            </td>
                            <td class="px-6 py-4">
                                <a @click="deleteClt(client.id)"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Remove </a>
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="`clients/${client.id}/edit`"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="props.clients.links" :prev="props.clients.prev_page_url"
                    :next="props.clients.next_page_url" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '../Shared/Pagination.vue';
import { Head, useForm } from '@inertiajs/vue3';
//import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    clients: {
        type: Array,
        default: () => [],
        Required: true
    }
})

function showPic(client) {
    if (client.photo) {
        return 'storage/' + client.photo;
    } else {
        return null;
        //return client.sexe = "M" ? "images/man.png" : "images/woman.png"
    }
}

const form = useForm({});

const deleteClt = (id) => {
    form.delete(`clients/${id}`);
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