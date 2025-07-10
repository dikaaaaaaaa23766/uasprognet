<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Article {
    title: string;
    content: string;
    cover_image: string;
    created_at: string;
}

const props = defineProps<{
    article: Article;
}>();

const formattedDate = computed(() => {
    return new Date(props.article.created_at).toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
});
</script>

<template>
    <Head :title="article.title" />
    <GuestLayout>
        <!-- Header Artikel dengan Gambar Latar -->
        <div class="relative h-96 w-full flex items-center justify-center text-center bg-cover bg-center" :style="{ backgroundImage: `url(/storage/${article.cover_image})` }">
            <div class="absolute top-0 right-0 bottom-0 left-0 bg-black/60"></div>
            <div class="relative z-10 p-4">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight tracking-tight">{{ article.title }}</h1>
                <p class="mt-4 text-lg text-slate-300">Diterbitkan pada {{ formattedDate }}</p>
            </div>
        </div>

        <!-- Konten Artikel -->
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <article class="prose dark:prose-invert max-w-none text-lg leading-relaxed" v-html="article.content"></article>

            <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700 text-center">
                <Link :href="route('welcome')" class="text-blue-500 hover:text-blue-700 font-semibold">
                    &larr; Kembali ke Halaman Utama
                </Link>
            </div>
        </div>
    </GuestLayout>
</template>
