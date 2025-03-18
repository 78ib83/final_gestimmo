<script setup>
import AuthenticatedLayout1 from '@/Layouts/AuthenticatedLayout1.vue';
import { Head } from '@inertiajs/vue3';

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
    }
}

</script>

<template>

    <Head title="Articles" />

    <AuthenticatedLayout1>
        <div class="py-12">
            <div class="grid gap-6 lg:grid-cols-3 lg:gap-6">
                <div v-for="property in properties" :key="property"
                    class="w-full flex flex-col items-center gap-6 overflow-hidden rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 md:row-span-3 ">
                    <img :src="showPic(property)" alt="no picture" style="width: 100%; height: 100%;">
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout1>
</template>