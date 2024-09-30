<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update User Information
            </h2>
            <p class="mb-4">Edit for {{ $attendant->full_name }}</p>
        </header>

        <form method= "POST" action="/attendants/{{ $attendant->id }}" enctype= "multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="concert_name"
                    class="inline-block font-bold text-lg mb-2">Concert Name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="concert_name"
                    value="{{ $attendant->concert_name }}"
                    placeholder="Concert Name" />
                @error('concert_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="full_name"
                    class="inline-block font-bold text-lg mb-2">Full Name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="full_name"
                    value="{{ $attendant->full_name }}"
                    placeholder="Enter full name"
                />
                @error('full_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="email"
                    class="inline-block font-bold text-lg mb-2">Email</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ $attendant->email }}"
                    placeholder="Enter email"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="contact_no"
                    class="inline-block font-bold text-lg mb-2">Contact Number</label>
                <input
                    type="tel"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="contact_no"
                    value="{{ $attendant->contact_no }}"
                    placeholder="Enter contact number"
                />
                @error('contact_no')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="address"
                    class="inline-block font-bold text-lg mb-2">Address</label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="address"
                    placeholder="Enter address">"{{ $attendant->address }}"</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button class="bg-laravel font-bold text-white rounded py-2 px-4 hover:bg-black">Save Changes
                </button>
                <a href="/attendants/viewAttendant" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
