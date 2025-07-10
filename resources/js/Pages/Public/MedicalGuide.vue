<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// --- Mendefinisikan Tipe Data ---
interface Article {
    id: number;
    title: string;
    content: string;
}

interface Submenu {
    id: number;
    title: string;
    articles: Article[];
}

interface Guide {
    id: number;
    title: string;
    submenus: Submenu[];
}

// --- Menerima Props ---
defineProps<{
    guides: Guide[];
}>();

// --- State Management ---
const openAccordionId = ref<number | null>(null);

const toggleAccordion = (guideId: number) => {
    openAccordionId.value = openAccordionId.value === guideId ? null : guideId;
};
</script>

<template>
    <Head title="Panduan Medis" />

    <GuestLayout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Header Konten -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 dark:text-white">Panduan Kesehatan Anda</h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-500 dark:text-slate-400">Temukan informasi penting dan panduan pertolongan pertama untuk perjalanan yang aman dan nyaman di Bali.</p>
            </div>

            <!-- Konten Utama -->
            <div class="max-w-4xl mx-auto">
                <div v-if="guides.length > 0" class="space-y-4">
                    <!-- Loop untuk setiap Guide utama (Accordion) -->
                    <div v-for="guide in guides" :key="guide.id" class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg shadow-slate-200/50 dark:shadow-black/20 overflow-hidden transition-all duration-300">
                        <!-- Tombol Header Accordion -->
                        <button @click="toggleAccordion(guide.id)" class="w-full flex justify-between items-center p-6 text-left">
                            <div class="flex items-center gap-4">
                                <div :class="[
                                    'w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300',
                                    openAccordionId === guide.id ? 'bg-blue-500 text-white' : 'bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400'
                                ]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <span class="font-bold text-lg text-slate-700 dark:text-slate-200">{{ guide.title }}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform transition-transform duration-300 text-slate-400" :class="{'rotate-180 text-blue-500': openAccordionId === guide.id}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Konten Accordion -->
                        <div class="overflow-hidden transition-all duration-500" :class="openAccordionId === guide.id ? 'max-h-[1000px]' : 'max-h-0'">
                            <div class="px-6 pb-6">
                                <div class="space-y-6">
                                    <div v-for="submenu in guide.submenus" :key="submenu.id">
                                        <h4 class="text-md font-semibold text-slate-600 dark:text-slate-300 mb-3 border-b border-slate-200 dark:border-slate-700 pb-2">{{ submenu.title }}</h4>
                                        <div class="space-y-2">
                                            <div v-for="article in submenu.articles" :key="article.id">
                                                <Link :href="route('article.show', article.id)" class="block p-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700/50 transition group">
                                                    <h5 class="font-semibold text-slate-800 dark:text-slate-200 group-hover:text-blue-600 dark:group-hover:text-blue-400">{{ article.title }}</h5>
                                                    <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mt-1">{{ article.content }}</p>
                                                </Link>
                                            </div>
                                            <p v-if="!submenu.articles.length" class="text-sm text-slate-400 italic px-4 py-2">Belum ada artikel di bagian ini.</p>
                                        </div>
                                    </div>
                                    <p v-if="!guide.submenus.length" class="text-sm text-slate-400 italic">Belum ada sub-bagian yang tersedia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pesan jika tidak ada panduan -->
                <div v-else class="text-center py-24 bg-white dark:bg-slate-800 rounded-2xl shadow-lg">
                    <p class="text-slate-500">Panduan Medis belum tersedia saat ini.</p>
                </div>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700 text-center">
                <Link :href="route('welcome')" class="text-blue-500 hover:text-blue-700 font-semibold">
                    &larr; Kembali ke Halaman Utama
                </Link>
            </div>
    </GuestLayout>
</template>
