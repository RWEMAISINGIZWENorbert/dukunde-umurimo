<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Activity Reports</h3>

                    <!-- Filter and Search Section -->
                    <form method="GET" action="{{ route('reports.index') }}" class="mb-6">
                        <div class="flex flex-wrap gap-4 items-center">
                            <div class="flex items-center gap-2">
                                <label for="start_date" class="text-sm text-gray-600">From:</label>
                                <input type="date" id="start_date" name="start_date" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $startDate ?? '' }}">
                            </div>
                            <div class="flex items-center gap-2">
                                <label for="end_date" class="text-sm text-gray-600">To:</label>
                                <input type="date" id="end_date" name="end_date" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $endDate ?? '' }}">
                            </div>
                            <div class="flex-grow">
                                <input type="text" id="search" name="search" placeholder="Search activities..." class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $searchQuery ?? '' }}">
                            </div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Filter
                            </button>
                        </div>
                    </form>

                    <!-- Reports Table/Content -->
                    <div class="border-t border-gray-200 pt-4">
                        @if ($activities->isEmpty())
                            <p class="text-gray-600">No activities found for the selected criteria.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Food Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($activities as $activity)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $activity['type'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $activity['food_name'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $activity['quantity'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($activity['date'])->format('Y-m-d H:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 