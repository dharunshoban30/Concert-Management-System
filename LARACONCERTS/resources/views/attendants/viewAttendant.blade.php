<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase"> Attendants List </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($attendants->isEmpty())
                    @foreach ($attendants as $attendant)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/attendants/{{ $attendant->id }}">{{ $attendant->concert_name }}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/attendants/{{ $attendant->id }}">{{ $attendant->full_name }}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/attendants/{{ $attendant->id }}">{{ $attendant->email }}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/attendants/{{ $attendant->id }}">{{ $attendant->contact_no }}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/attendants/{{ $attendant->id }}">{{ $attendant->address }}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/attendants/{{ $attendant->id }}/editAttendant"
                                    class="text-black-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td colspan="4" class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No Attendants Found</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </x-card>
    </x-layout>
