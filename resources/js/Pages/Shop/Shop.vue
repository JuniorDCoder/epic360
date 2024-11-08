<template>
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 class="pb-5 text-4xl font-semibold md:ml-24 text-primary-text">Shop</h1>
            <div class="flex flex-col items-center justify-between w-full gap-4 p-5 text-white md:p-3 md:flex-row md:px-24 bg-primary-text">
                <div class="flex items-center justify-between w-full gap-4 text-sm md:w-1/4">
                    <div class="flex items-center gap-2 cursor-pointer">
                        <img src="/public/storage/icons/filter.png" alt="Filter" class="w-4 h-4"/>
                        <p>Filter</p>
                    </div>
                    <p>|</p>
                    <div>
                        Showing {{ products.from }} to {{ products.to }} of {{ products.total }} results
                    </div>
                </div>
                <div class="flex items-center justify-between w-full gap-4 text-sm md:w-1/4">
                    <p>Show</p>
                    <p class="flex items-center justify-center w-10 h-10 p-3 bg-gray-300 border border-gray-400 text-primary-text">
                        <span>{{ products.total }}</span>
                    </p>
                    <p>Sort by</p>
                    <select v-model="selectedCategory" @change="filterProducts" class="py-3 text-primary-text w-full md:w-[100px] px-2">
                        <option value="">All Categories</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col w-full gap-3 py-12 md:px-24">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <ShopItem v-for="product in filteredProducts" :key="product.id" :product="product"/>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div>
                        Showing {{ products.from }} to {{ products.to }} of {{ products.total }} results
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="goToPage(products.current_page - 1)" :disabled="!products.prev_page_url" class="px-4 py-2 text-white rounded bg-primary-text">Previous</button>
                        <button @click="goToPage(products.current_page + 1)" :disabled="!products.next_page_url" class="px-4 py-2 text-white rounded bg-secondary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import ShopItem from '../../Components/ShopItem.vue';
import { ref, computed, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

defineProps({
    products: [Object, Array],
    categories: Array
})

const { props } = usePage();
const products = props.products;
const categories = props.categories;
const selectedCategory = ref('');

const filteredProducts = computed(() => {
    if (!selectedCategory.value) {
        return products.data;
    }
    return products.data.filter(product => product.category.id === selectedCategory.value);
});

const filterProducts = () => {
    // This method is called when the category is changed
};

const pageNumber = ref(products.current_page);

const goToPage = (page) => {
    if (page > 0 && page <= products.last_page) {
        $inertia.get(route('shop'), { page });
    }
};

watch(() => products.current_page, (newPage) => {
    pageNumber.value = newPage;
});
</script>

<style scoped>
/* Add your styles here */
</style>
