<section class="relative h-96 flex justify-center items-center mb-4 overflow-hidden">
    <div 
        class="w-full h-full relative"
        x-data="{ activeSlide: 1, slides: [1, 2, 3] }"
        x-init="setInterval(() => { activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1 }, 3000)"
    >
        <template x-for="slide in slides" :key="slide">
            <img 
                x-show="activeSlide === slide"
                x-transition:enter="transition-opacity ease-out duration-1000"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-in duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 w-full h-full object-cover"
                :src="`/images/concert${slide}.jpg`"
                :alt="`Concert ${slide}`"
            >
        </template>
        <div class="absolute inset-0 flex justify-center items-center flex-col">
            <div class="bg-[#030614] p-4 rounded-md">
                <h2 class="text-5xl font-bold text-white uppercase mb-4">LARACONCERTS</h2>
                <p class="text-white text-center">Find or Post Concerts Around the Country</p>
            </div>
        </div>
    </div>
</section>
