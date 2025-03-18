<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({

    countprop: {
        type: Array,
        default: () => [],
    },
    countclts: {
        type: Array,
        default: () => [],
    },
    countcontr: {
        type: Array,
        default: () => [],
    },
    properties: {
        type: Array,
        default: () => [],
    }
})
// console.log("Count Part ::: " + props.countprop);

function showPic(property) {
    if (property.photo) {
        return 'storage/' + property.photo;
    } else {
        return null;
        //return client.sexe = "M" ? "images/man.png" : "images/woman.png"
    }
}

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>

        </template>

        <div class="py-12">
            <div class="grid gap-6 lg:grid-cols-3 lg:gap-6">
                <div style="font-family: 'Times New Roman', Times, serif;"
                    class="text-blue-400 flex flex-col items-center gap-6 overflow-hidden rounded-lg shadow-[0px_16px_36px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 md:row-span-3 ">
                    Propeties
                    <strong>
                        <em style="font-size: 40px; ">
                            {{ props.countprop }}
                        </em>
                    </strong>
                </div>
                <div style="font-family: 'Times New Roman', Times, serif;"
                    class="text-blue-400 flex flex-col items-center gap-6 overflow-hidden rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 md:row-span-3 ">
                    Clients
                    <strong>
                        <em style="font-size: 40px; ">
                            {{ props.countclts }}
                        </em>
                    </strong>
                </div>
                <div style="font-family: 'Times New Roman', Times, serif;"
                    class="text-blue-400 flex flex-col items-center gap-6 overflow-hidden rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 md:row-span-3 ">
                    Contrats
                    <strong>
                        <em style="font-size: 40px; ">
                            {{ props.countcontr }}
                        </em>
                    </strong>
                </div>
            </div>
        </div>
        <div class="grid gap-6 lg:grid-cols-3 lg:gap-6">
            <div v-for="property in properties" :key="property"
                class="w-full flex flex-col items-center gap-6 overflow-hidden rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 md:row-span-3 ">
                <img :src="showPic(property)" alt="no picture" style="width: 100%; height: 100%;">
            </div>
        </div>
    </AuthenticatedLayout>
</template>
