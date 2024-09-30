{{-- @extends('layouts.app')

@section('title', 'Attendants')

@section('content')
    <h1>Attendant Management</h1>

    @forelse($attendants as $attendant)
        <div>
            <h3>{{ $attendant->concert_name }}</h3>
            <h3>{{ $attendant->full_name }}</h3>
            <h3>{{ $attendant->email }}</h3>
            <h3>{{ $attendant->contact_no }}</h3>
            <p>{{ $attendant->address }}</p>
        </div>
    @empty
        <p>No Participants</p>
    @endforelse
@endsection --}}


<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($attendants) == 0)
        @foreach($attendants as $attendant)
        <x-listing-card :attendant="$attendant" />
        @endforeach

        @else
        <p>No Participants</p>
        @endunless

    </div>

    <div class= ".mt-6 p-4">
        {{$attendants->links()}}
    </div>
    </x-layout>