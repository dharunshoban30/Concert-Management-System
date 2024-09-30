<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit User Account
            </h2>
            <p class="mb-4">Update your account details</p>
        </header>
    
        <form method="POST" action="/users/update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2 font-bold">Name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{ $user->name }}"
                    placeholder="Your full name"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2 font-bold">New Password</label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                    placeholder="New password (leave blank to keep current password)"
                />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2 font-bold">Confirm New Password</label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                    placeholder="Confirm new password"
                />
                <!-- No error message for confirmation, it's handled with 'password' field -->
            </div>
    
            <div class="mb-6 text-right">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Account
                </button>
                <a href="/" class="text-black ml-4">Back</a>
            </div>
        </form>

        <!-- Delete Account Section with Modal Confirmation -->
        <div x-data="{ open: false }">
            <!-- Trigger Button -->
            <button @click="open = true" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-red-700 mt-6">
                Delete Account
            </button>

            <!-- Modal -->
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center px-4 py-6"
                x-cloak
            >
                <div class="bg-white rounded-lg max-w-sm mx-auto overflow-hidden shadow-xl">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Confirm Account Deletion</h3>
                        <p class="mt-4 text-sm text-gray-600">Are you sure you want to delete your account? This action cannot be undone.</p>
                        <div class="mt-6 flex justify-end gap-3">
                            <button @click="open = false" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-laravel">
                                Cancel
                            </button>
                            <form method="POST" action="/users/{{ auth()->user()->id }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-2 px-4 bg-red-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Delete Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>
