<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8"> 
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Url
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Visits
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Last visit
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($links as $link)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $link->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ $link->link }}" class="text-indigo-600 hover:text-indigo-900">Url</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $link->visits_count }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $link->latest_visit?->created_at->diffForHumans() ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <a 
                                                        href="{{ route('links.edit', $link) }}" 
                                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25"
                                                        > Edit
                                                    </a>

                                                    <form method="POST" action="{{ route('links.destroy', $link) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button class="ml-2">delete</x-button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
