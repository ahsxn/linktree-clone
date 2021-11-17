<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Add a new link</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST" action="{{ route('links.store') }}">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3">
                                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                            Name
                                            </label>
                                            <x-input 
                                                type="text" 
                                                name="name" 
                                                value="{{ old('name') }}"
                                                class="w-full mt-2" 
                                            />
                                        </div>
                                        <div class="col-span-3">
                                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                            Link Url
                                            </label>
                                            <div class="flex mt-1 rounded-md shadow-sm">
                                                <x-input 
                                                    type="text" 
                                                    name="link" 
                                                    value="{{ old('link') }}"
                                                    placeholder="www.example.com" 
                                                    class="w-full" 
                                                />
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <x-button type="submit">
                                save
                                </x-button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
