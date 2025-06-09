<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <!-- Overview Cards -->
            <div class="flex flex-wrap justify-center gap-3 mb-6">
                <!-- Total Food Items -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-lg w-64 mx-auto">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-gray-900 text-xl font-semibold">Total Food Items</div>
                            <div class="p-3 bg-blue-100 rounded-full">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900">{{ $totalFoods }}</div>
                    </div>
                </div>

                <!-- Today's Imports -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-lg w-64 mx-auto">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-gray-900 text-xl font-semibold">Today's Imports</div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                                </svg>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-green-600">{{ $todayImports }}</div>
                    </div>
                </div>

                <!-- Today's Exports -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-lg w-64 mx-auto">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-gray-900 text-xl font-semibold">Today's Exports</div>
                            <div class="p-3 bg-red-100 rounded-full">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                </svg>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-red-600">{{ $todayExports }}</div>
                    </div>
                </div>

                <!-- Stock Status -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-lg w-96 mx-auto">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-gray-900 text-xl font-semibold">Stock Status</div>
                            <div class="p-3 bg-purple-100 rounded-full">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-600">In Stock</span>
                                    <span class="font-semibold text-green-600">{{ $stockStatus['In Stock'] }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full w-[{{ ($stockStatus['In Stock'] / $totalFoods) * 100 }}%]"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-600">Low Stock</span>
                                    <span class="font-semibold text-yellow-600">{{ $stockStatus['Low Stock'] }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-600 h-2 rounded-full w-[{{ ($stockStatus['Low Stock'] / $totalFoods) * 100 }}%]"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-600">Out of Stock</span>
                                    <span class="font-semibold text-red-600">{{ $stockStatus['Out of Stock'] }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-red-600 h-2 rounded-full w-[{{ ($stockStatus['Out of Stock'] / $totalFoods) * 100 }}%]"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:shadow-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
                            <div class="p-2 bg-blue-100 rounded-full">
                                <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-4">
                            @forelse($recentActivities as $activity)
                                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition duration-150">
                                    @if($activity['type'] === 'import')
                                        <div class="p-2 bg-green-100 rounded-full">
                                            <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="p-2 bg-red-100 rounded-full">
                                            <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $activity['type'] === 'import' ? 'Imported' : 'Exported' }} {{ $activity['quantity'] }} units of {{ $activity['food_name'] }}
                                        </p>
                                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($activity['date'])->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                    <p class="mt-2 text-gray-500">No recent activity</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Most Active Items -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:shadow-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-medium text-gray-900">Most Active Items</h3>
                            <div class="p-2 bg-purple-100 rounded-full">
                                <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-4">
                            @forelse($mostActiveItems as $item)
                                <div class="flex justify-between items-center p-3 rounded-lg hover:bg-gray-50 transition duration-150">
                                    <span class="text-gray-900 font-medium">{{ $item->Food_Name }}</span>
                                    <div class="flex space-x-4">
                                        <div class="flex items-center space-x-1">
                                            <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                                            </svg>
                                            <span class="text-sm text-green-600">{{ $item->imports_count }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <svg class="h-4 w-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                            </svg>
                                            <span class="text-sm text-red-600">{{ $item->exports_count }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                    <p class="mt-2 text-gray-500">No active items</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>