@if(session()->has('message'))
    <div 
    x-data="{ show: true }" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 flex items-center justify-center px-4 py-6 z-50"
    style="background-color: rgba(0, 0, 0, 0.4);"> <!-- Semi-transparent background -->
        <div class="bg-[#030614] text-white px-6 py-4 rounded-lg shadow-lg text-center" style="width: 600px; max-width: 90%;">
            <p class="text-lg font-medium">{{ session('message') }}</p>
        </div>
    </div>
@endif