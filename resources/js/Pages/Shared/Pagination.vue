<template>
    <!--ul class="pagination pagination-sm float-right">
        <li class="page-item" :class="{ 'disabled': props.prev == null }">
            <Link :href="props.prev" class="page-link"> « </Link>
        </li>
        <li class="page-item" :class="{ 'active': link.active }" v-for="link in computedLinks" :key="link">
            <Link :href="link.url" class="page-link"> {{ link.label }} </Link>
        </li>
        <li class="page-item" :class="{ 'disabled': props.next == null }">
            <Link :href="props.next" class="page-link"> » </Link>
        </li>


    </ul-->

    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
        <!--span
            class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
            <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                class="font-semibold text-gray-900 dark:text-white">1000</span></span-->
        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
            <li>
                <Link :href="props.prev"
                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-100 dark:border-gray dark:text-gray-400 dark:hover:bg-gray-300 dark:hover:text-white"
                    :class="{ 'disabled': props.prev == null }">Previous</Link>
            </li>
            <li>
                <Link :href="link.url"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-100 dark:border-gray dark:text-gray-400 dark:hover:bg-gray-300 dark:hover:text-white"
                    :class="{ 'active': link.active }" v-for="link in computedLinks" :key="link"> {{ link.label }}
                </Link>
            </li>
            <!--li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
            </li-->
            <li>
                <Link :href="props.next"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-100 dark:border-gray dark:text-gray-400 dark:hover:bg-gray-300 dark:hover:text-white"
                    :class="{ 'disabled': props.next == null }">Next</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    links: {
        type: Array,
        Required: true
    },
    prev: {
        type: String,
        default: ""
    },
    next: {
        type: String,
        default: ""
    },

})
const computedLinks = computed(() => {
    props.links.shift()
    props.links.pop()
    return props.links
})
</script>
