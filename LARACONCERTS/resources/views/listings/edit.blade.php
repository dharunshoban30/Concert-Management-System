<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Concert
            </h2>
            <p class="mb-4">Edit for {{$listing->title}}</p>
        </header>
    
        <form method= "POST" action="/listings/{{$listing->id}}" enctype= "multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label 
                    for="title" 
                    class="inline-block font-bold text-lg mb-2">Concert Title</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    value= "{{$listing->title}}"
                    placeholder="Example: James World Tour"
                />
                @error('title')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="artist"
                    class="inline-block font-bold text-lg mb-2">Artist Name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="artist"
                    value= "{{$listing->artist}}"
                    placeholder="Example: James Arthur"
                />
                @error('artist')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="tags" class="inline-block font-bold text-lg mb-2"> Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    value= "{{$listing->tags}}"
                    placeholder="Example: Pop, Rap, Rock, etc"
                />
                @error('tags')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="date"
                    class="inline-block font-bold text-lg mb-2">Concert Date</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="date"
                    value= "{{$listing->date}}"
                    placeholder="Example: 1 January 2000"
                />
                @error('date')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="time" 
                       class="inline-block font-bold text-lg mb-2">Concert Time</label>
                <input type="time" 
                       class="border border-gray-200 rounded p-2 w-full" 
                       name="time" 
                       value="{{$listing->time}}" />
                @error('time')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block font-bold text-lg mb-2">Concert Location</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    value= "{{$listing->location}}"
                    placeholder="Example: Wembley Stadium"
                />
                @error('location')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label 
                    for="organizer" 
                    class="inline-block font-bold text-lg mb-2">Concert Organizer</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="organizer"
                    value= "{{$listing->organizer}}"
                    placeholder="Example: GoLive Concerts Malaysia"
                />
                @error('organizer')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label 
                    for="email" 
                    class="inline-block font-bold text-lg mb-2">Contact Email</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value= "{{$listing->email}}"
                    placeholder="Example: goliveasia@gmail.com"
                />
                @error('email')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            
    
            <div class="mb-6">
                <label 
                    for="picture" 
                    class="inline-block font-bold text-lg mb-2">Concert Photo</label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="picture" 
                />
                <img
                    class="w-64"
                    src="{{$listing->logo ? 
                    asset('storage/' . $listing->logo) : asset('/images/Full Logo.png')}}"
                    alt= ""
                />
                @error('picture')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block font-bold text-lg mb-2">Concert Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    value= "{{$listing->description}}"
                    placeholder="Write an enticing paragraph about the concert."
                ></textarea>
                @error('description')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label 
                    for="ticket_price" 
                    class="inline-block font-bold text-lg mb-2">Ticket Price</label>
                    <input
                    type="number"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="ticket_price"
                    value="{{ $listing->ticket_price }}"
                    placeholder="Enter ticket price (e.g., 10.99)"
                    step="0.01"
                />
                @error('ticket_price')
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button
                    class="bg-laravel font-bold text-white rounded py-2 px-4 hover:bg-black">Save Changes
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
    </x-layout>