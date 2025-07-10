<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-[#F4F6F9] dark:bg-slate-900 font-sans">
        <nav class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-lg border-b border-slate-200 dark:border-slate-700 sticky top-0 w-full z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link :href="route('welcome')" class="flex items-center gap-3">
                                <svg class="h-8 w-auto text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-xl font-bold text-slate-800 dark:text-slate-200">Bali Travel Health</span>
                            </Link>
                        </div>
                    </div>
                     <div class="flex items-center gap-4">
                        <Link :href="route('login')" class="text-sm font-semibold text-slate-600 hover:text-blue-500 transition">Log in</Link>
                        <Link :href="route('register')" class="text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-full transition">Register</Link>
                   </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
         <footer class="bg-white dark:bg-slate-800 mt-16">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-slate-500 dark:text-slate-400">&copy; {{ new Date().getFullYear() }} Bali Travel Health. All rights reserved.</p>
            </div>
        </footer>
    </div>
</template>
