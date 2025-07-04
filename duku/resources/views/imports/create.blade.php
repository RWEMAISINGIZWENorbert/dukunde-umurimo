<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Import') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">Add New Import Record</h3>

                    <form method="POST" action="{{ route('imports.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <label for="Food_Id" class="block font-medium text-sm text-gray-700">Food Item</label>
                            <select name="Food_Id" id="Food_Id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="">Select a food item</option>
                                @foreach($foods as $food)
                                    <option value="{{ $food->Food_Id }}" {{ old('Food_Id') == $food->Food_Id ? 'selected' : '' }}>
                                        {{ $food->Food_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Food_Id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="Import_Quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="number" name="Import_Quantity" id="Import_Quantity" value="{{ old('Import_Quantity') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required min="1">
                            @error('Import_Quantity')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="Import_Date" class="block font-medium text-sm text-gray-700">Import Date</label>
                            <input type="date" name="Import_Date" id="Import_Date" value="{{ old('Import_Date', date('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            @error('Import_Date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Save Import</button>
                            <a href="{{ route('imports.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 