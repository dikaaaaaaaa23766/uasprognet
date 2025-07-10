<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

// --- Memberitahu TypeScript tentang objek global 'L' dari Leaflet ---
declare const L: any;

// --- Mendefinisikan Tipe Data ---
interface Facility {
    id: number;
    name: string;
    address: string;
    phone_number: string | null;
    type: string;
    latitude: number;
    longitude: number;
    website: string | null;
}

// --- Menerima Props ---
const props = defineProps<{
    facilities: Facility[];
}>();

// --- State & Referensi ---
const mapContainer = ref<HTMLElement | null>(null);

// --- Fungsi ---
onMounted(() => {
    // Memuat Pustaka Leaflet CSS & JS secara dinamis
    const leafletCss = document.createElement('link');
    leafletCss.rel = 'stylesheet';
    leafletCss.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
    document.head.appendChild(leafletCss);

    const leafletJs = document.createElement('script');
    leafletJs.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
    leafletJs.onload = () => {
        // Pustaka sudah dimuat, sekarang inisialisasi peta
        initializeMap();
    };
    document.head.appendChild(leafletJs);
});

function initializeMap() {
    if (!mapContainer.value || typeof L === 'undefined') return;

    // Koordinat default (Denpasar, Bali) jika pengguna menolak lokasi
    const defaultCoords: [number, number] = [-8.6705, 115.2126];
    
    // Inisialisasi Peta
    const map = L.map(mapContainer.value).setView(defaultCoords, 13);

    // Tambahkan Tile Layer (peta dasar dari OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Minta lokasi pengguna
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userCoords: [number, number] = [position.coords.latitude, position.coords.longitude];
                map.setView(userCoords, 14);
                
                // Tambahkan marker untuk lokasi pengguna
                L.marker(userCoords, {
                    icon: L.icon({
                        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                        shadowSize: [41, 41]
                    })
                }).addTo(map).bindPopup('<b>Lokasi Anda</b>').openPopup();
            },
            () => {
                console.log("Pengguna menolak akses lokasi. Menggunakan lokasi default.");
            }
        );
    }

    // Tambahkan marker dan tooltip untuk setiap fasilitas kesehatan
    props.facilities.forEach(facility => {
        const facilityCoords: [number, number] = [facility.latitude, facility.longitude];
        const popupContent = `
            <b>${facility.name}</b><br>
            ${facility.address}<br>
            <a href="https://www.google.com/maps/dir/?api=1&destination=${facility.latitude},${facility.longitude}" target="_blank" style="color: #3b82f6; font-weight: bold;">Lihat Rute &rarr;</a>
        `;
        L.marker(facilityCoords)
         .addTo(map)
         .bindPopup(popupContent)
         .bindTooltip(facility.name, {
            permanent: true,
            direction: 'top',
            offset: [0, -20],
            className: 'facility-tooltip'
         });
    });
}
</script>

<template>
    <Head title="Fasilitas Kesehatan Terdekat" />
    <GuestLayout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Header Konten -->
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 dark:text-white">Fasilitas Kesehatan Terdekat</h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-500 dark:text-slate-400">Temukan rumah sakit, klinik, dan apotek di sekitar Anda dengan mudah.</p>
            </div>

            <!-- Layout 2 Kolom: Peta dan Daftar -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Kolom Peta -->
                <div class="lg:col-span-2">
                    <div ref="mapContainer" class="w-full h-[500px] rounded-2xl shadow-lg z-0"></div>
                </div>

                <!-- Kolom Daftar Fasilitas -->
                <div class="lg:col-span-1">
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-4">Daftar Fasilitas</h2>
                    <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2">
                        <div v-for="facility in facilities" :key="facility.id" class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow">
                            <h3 class="font-bold text-lg">{{ facility.name }}</h3>
                            <p class="text-sm text-slate-500">{{ facility.type }}</p>
                            <p class="text-sm mt-2">{{ facility.address }}</p>
                            <a :href="`https://www.google.com/maps/dir/?api=1&destination=${facility.latitude},${facility.longitude}`" target="_blank" class="text-blue-500 hover:text-blue-700 font-semibold mt-2 inline-block">
                                Lihat Rute &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style>
/* Gaya kustom untuk tooltip permanen di peta */
.facility-tooltip {
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #ccc;
    padding: 5px 10px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    font-weight: bold;
    color: #333;
    white-space: nowrap;
    /* Menghilangkan panah default dari tooltip */
    border-left-color: transparent;
    border-right-color: transparent;
    border-top-color: transparent;
    border-bottom-color: transparent;
}
</style>
