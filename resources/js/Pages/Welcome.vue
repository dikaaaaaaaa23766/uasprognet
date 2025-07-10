<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

import logoBth from '@/assets/images/logo.svg';
import heroBg from '@/assets/images/foto background.jpg';
import iconPanduan from '@/assets/images/kartu medical guide.png';
import iconKlinik from '@/assets/images/kartu fasilitas.png';
import iconTips from '@/assets/images/kartu pretravel.png';
import sectionBg from '@/assets/images/background 2.jpeg';

interface GeneralArticle {
  id: number;
  title: string;
  summary: string;
  cover_image: string;
  slug: string;
}

const props = defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
  generalArticles: GeneralArticle[];
}>();

const featuredArticle = computed(() => props.generalArticles?.[0]);
const otherArticles = computed(() => props.generalArticles?.slice(1));
</script>

<template>
  <Head title="Welcome - Bali Travel Health" />
  <div class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-slate-800 dark:to-indigo-900 text-slate-800 dark:text-slate-200">
    <!-- Hero Section -->
    <div class="relative min-h-[70vh] md:min-h-screen flex items-center justify-center overflow-hidden">
      <div class="absolute inset-0 hero-bg-animation" :style="{ backgroundImage: `url(${heroBg})` }"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/40 to-black/20"></div>
      
      <!-- Floating particles effect -->
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
      </div>

      <!-- Navigation -->
      <nav class="absolute top-0 left-0 right-0 z-20 p-6">
        <div class="container mx-auto">
          <div class="flex justify-between items-center backdrop-blur-md bg-white/10 dark:bg-slate-900/20 rounded-2xl px-6 py-4 border border-white/20">
            <Link :href="route('welcome')" class="flex items-center gap-3 group">
              <div class="p-2 rounded-xl bg-white/20 group-hover:bg-white/30 transition-all duration-300">
                <img :src="logoBth" alt="Logo" class="h-8 w-auto">
              </div>
              <span class="text-xl font-bold text-white tracking-wide">Bali Travel Health</span>
            </Link>
            <div v-if="canLogin" class="hidden md:flex items-center gap-3">
              <Link v-if="$page.props.auth.user" :href="route('dashboard')" 
                class="px-6 py-3 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Dashboard
              </Link>
              <template v-else>
                <Link :href="route('login')" 
                  class="px-6 py-3 rounded-xl text-sm font-semibold text-white hover:bg-white/10 transition-all duration-300 border border-white/20 hover:border-white/40">
                  Log in
                </Link>
                <Link v-if="canRegister" :href="route('register')" 
                  class="px-6 py-3 rounded-xl text-sm font-semibold text-slate-800 bg-white hover:bg-slate-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                  Register
                </Link>
              </template>
            </div>
          </div>
        </div>
      </nav>

      <!-- Hero Content -->
      <div class="relative z-10 text-center text-white p-4 max-w-5xl mx-auto">
        <div class="space-y-6">
          <h1 class="text-4xl md:text-7xl font-extrabold tracking-tight leading-tight">
            <span class="block text-gradient">Panduan Sehat</span>
            <span class="block text-white/90">& Aman Anda</span>
          </h1>
          <p class="mt-6 max-w-3xl mx-auto text-xl md:text-2xl text-slate-200 leading-relaxed font-light">
            Nikmati keindahan Pulau Dewata tanpa khawatir. Semua informasi kesehatan dan keselamatan ada di sini.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
            <Link :href="route('medical-guide.index')" 
              class="px-8 py-4 rounded-xl text-lg font-semibold text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
              Mulai Sekarang
            </Link>
            <Link href="#services" 
              class="px-8 py-4 rounded-xl text-lg font-semibold text-white border-2 border-white/30 hover:bg-white/10 transition-all duration-300">
              Pelajari Lebih Lanjut
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- Wave Separator -->
    <div class="relative z-10 -mt-1">
      <svg class="w-full h-24 text-slate-50 dark:text-slate-900" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="currentColor" fill-opacity="1" d="M0,192L48,181.3C96,171,192,149,288,160C384,171,480,213,576,197.3C672,181,768,107,864,96C960,85,1056,139,1152,149.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>

    <!-- Main Content -->
    <main class="relative py-20 lg:py-32 overflow-hidden">
      <div class="absolute inset-0 bg-cover bg-center opacity-5 dark:opacity-10" :style="{ backgroundImage: `url(${sectionBg})` }"></div>
      
      <!-- Services Section -->
      <section id="services" class="relative z-10">
        <div class="container mx-auto px-6 lg:px-8">
          <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-4">
              Layanan Kami
            </h2>
            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
              Solusi lengkap untuk perjalanan sehat dan aman di Bali
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <Link :href="route('medical-guide.index')" 
              class="service-card group relative overflow-hidden rounded-3xl bg-white/80 dark:bg-slate-800/80 p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-white/20 hover:border-blue-300 backdrop-blur-xl">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 mb-6 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                  <img :src="iconPanduan" alt="Panduan Medis Icon" class="h-10 w-10" />
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors">
                  Panduan Medis
                </h3>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                  Temukan informasi kesehatan dan panduan pertolongan pertama untuk perjalanan Anda.
                </p>
              </div>
            </Link>

            <Link :href="route('facilities.index')" 
              class="service-card group relative overflow-hidden rounded-3xl bg-white/80 dark:bg-slate-800/80 p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-white/20 hover:border-emerald-300 backdrop-blur-xl">
              <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 mb-6 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                  <img :src="iconKlinik" alt="Klinik Icon" class="h-10 w-10" />
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition-colors">
                  Klinik & RS Terdekat
                </h3>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                  Temukan dokter, klinik, dan rumah sakit terdekat dengan cepat.
                </p>
              </div>
            </Link>

            <Link href="#" 
              class="service-card group relative overflow-hidden rounded-3xl bg-white/80 dark:bg-slate-800/80 p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-white/20 hover:border-purple-300 backdrop-blur-xl">
              <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 mb-6 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                  <img :src="iconTips" alt="Tips Aman Berwisata Icon" class="h-10 w-10" />
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 group-hover:text-purple-700 dark:group-hover:text-purple-400 transition-colors">
                  Tips Aman Berwisata
                </h3>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                  Kumpulan panduan dan tips agar perjalanan Anda tetap aman dan nyaman.
                </p>
              </div>
            </Link>
          </div>

          <!-- Articles Section -->
          <section class="mb-20">
            <div class="text-center mb-16">
              <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-4">
                Artikel & Informasi Terkini
              </h2>
              <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto">
                Wawasan dan informasi bermanfaat untuk menyempurnakan perjalanan Anda di Bali.
              </p>
            </div>

            <div v-if="generalArticles.length > 0" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
              <!-- Featured Article -->
              <div class="lg:col-span-2">
                <div class="bg-white/90 dark:bg-slate-800/90 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group overflow-hidden">
                  <Link :href="route('general-article.show', featuredArticle.slug)" class="block">
                    <div class="overflow-hidden">
                      <img v-if="featuredArticle.cover_image" 
                        :src="`/storage/${featuredArticle.cover_image}`" 
                        :alt="featuredArticle.title" 
                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-8">
                      <div class="flex items-center gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium">
                          Featured
                        </span>
                      </div>
                      <h3 class="font-bold text-2xl text-slate-800 dark:text-slate-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors mb-3 leading-tight">
                        {{ featuredArticle.title }}
                      </h3>
                      <p class="text-slate-600 dark:text-slate-400 leading-relaxed line-clamp-3">
                        {{ featuredArticle.summary }}
                      </p>
                      <div class="mt-6 flex items-center gap-2 font-semibold text-blue-600 dark:text-blue-400 group-hover:gap-3 transition-all">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                      </div>
                    </div>
                  </Link>
                </div>
              </div>

              <!-- Other Articles -->
              <div class="space-y-6">
                <div v-for="article in otherArticles" :key="article.id" 
                  class="bg-white/90 dark:bg-slate-800/90 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                  <Link :href="route('general-article.show', article.slug)" class="flex items-center gap-4 p-6">
                    <div class="flex-shrink-0 overflow-hidden rounded-lg">
                      <img v-if="article.cover_image" 
                        :src="`/storage/${article.cover_image}`" 
                        :alt="article.title" 
                        class="w-24 h-24 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="flex-1 min-w-0">
                      <h4 class="font-bold text-lg text-slate-800 dark:text-slate-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors leading-tight">
                        {{ article.title }}
                      </h4>
                      <div class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400 group-hover:gap-3 transition-all">
                        <span>Baca artikel</span>
                        <svg class="w-3 h-3 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                      </div>
                    </div>
                  </Link>
                </div>
              </div>
            </div>
          </section>

          <!-- CTA Section -->
          <section class="text-center">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-12 shadow-2xl">
              <div class="absolute inset-0 bg-black/10"></div>
              <div class="relative z-10">
                <h2 class="text-4xl font-extrabold text-white mb-4">
                  Siap untuk Perjalanan Aman?
                </h2>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto mb-8 leading-relaxed">
                  Daftar sekarang untuk mendapatkan akses penuh ke semua fitur dan informasi kesehatan terbaru.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                  <Link v-if="!$page.props.auth.user" :href="route('register')" 
                    class="px-8 py-4 rounded-xl text-lg font-semibold text-blue-600 bg-white hover:bg-slate-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Buat Akun Gratis
                  </Link>
                  <Link v-else :href="route('dashboard')" 
                    class="px-8 py-4 rounded-xl text-lg font-semibold text-blue-600 bg-white hover:bg-slate-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Pergi ke Dashboard
                  </Link>
                  <Link href="#services" 
                    class="px-8 py-4 rounded-xl text-lg font-semibold text-white border-2 border-white/30 hover:bg-white/10 transition-all duration-300">
                    Pelajari Layanan
                  </Link>
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>
    </main>
  </div>
</template>

<style scoped>
.hero-bg-animation {
  background-size: cover;
  background-position: center;
  animation: kenburns 25s ease-in-out infinite;
}

@keyframes kenburns {
  0% {
    transform: scale(1) translate(0, 0);
  }
  25% {
    transform: scale(1.05) translate(-1%, 1%);
  }
  50% {
    transform: scale(1.1) translate(-2%, 2%);
  }
  75% {
    transform: scale(1.05) translate(-1%, -1%);
  }
  100% {
    transform: scale(1) translate(0, 0);
  }
}

.text-gradient {
  background: linear-gradient(135deg, #60a5fa 0%, #60a5fa 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.particle {
  position: absolute;
  width: 4px;
  height: 4px;
  background: rgba(255, 255, 255, 0.6);
  border-radius: 50%;
  animation: float 6s ease-in-out infinite;
}

.particle-1 {
  top: 20%;
  left: 20%;
  animation-delay: 0s;
}

.particle-2 {
  top: 40%;
  right: 30%;
  animation-delay: 2s;
}

.particle-3 {
  bottom: 30%;
  left: 40%;
  animation-delay: 4s;
}

.particle-4 {
  top: 60%;
  right: 20%;
  animation-delay: 1s;
}

.particle-5 {
  bottom: 20%;
  right: 40%;
  animation-delay: 3s;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
    opacity: 1;
  }
  50% {
    transform: translateY(-20px) rotate(180deg);
    opacity: 0.5;
  }
}

.service-card {
  backdrop-filter: blur(20px);
  background: rgba(255, 255, 255, 0.8);
}

.dark .service-card {
  background: rgba(30, 41, 59, 0.8);
}

.service-card:hover {
  transform: translateY(-8px);
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Smooth scrolling */
html {
  scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-track {
  background: #f1f5f9;
}

::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}

.dark ::-webkit-scrollbar-track {
  background: #1e293b;
}

.dark ::-webkit-scrollbar-thumb {
  background: #475569;
}

.dark ::-webkit-scrollbar-thumb:hover {
  background: #64748b;
}
</style>