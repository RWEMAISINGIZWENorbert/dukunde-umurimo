<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Welcome to your custom dashboard!') }}
                    {{-- Add your custom dashboard content here --}}
                    <p>Here you can display summaries of imports, exports, and food items.</p>
                    <p>Link to Food Management, Import Records, Export Records.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 