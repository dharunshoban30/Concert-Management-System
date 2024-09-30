{{-- resources/views/ticket/view.blade.php --}}
<x-layout>
    <x-card class="max-w-lg mx-auto mt-8">
        <h2 class="text-2xl font-bold uppercase mb-4">Your Tickets</h2>
        <ul>
            @forelse ($tickets as $ticket)
                <li>{{ $ticket->name }} - {{ $ticket->date }}</li> <!-- Adjust according to your ticket model -->
            @empty
                <li>No tickets found.</li>
            @endforelse
        </ul>
    </x-card>
</x-layout>
