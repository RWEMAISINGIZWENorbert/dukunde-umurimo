<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Total Food Items -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Total Food Items</div>
                        <div class="text-3xl font-bold text-gray-900">{{ $totalFoods }}</div>
                    </div>
                </div>

                <!-- Today's Imports -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Today's Imports</div>
                        <div class="text-3xl font-bold text-green-600">{{ $todayImports }}</div>
                    </div>
                </div>

                <!-- Today's Exports -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Today's Exports</div>
                        <div class="text-3xl font-bold text-red-600">{{ $todayExports }}</div>
                    </div>
                </div>

                <!-- Stock Status -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Stock Status</div>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">In Stock:</span>
                                <span class="font-semibold text-green-600">{{ $stockStatus['In Stock'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Low Stock:</span>
                                <span class="font-semibold text-yellow-600">{{ $stockStatus['Low Stock'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Out of Stock:</span>
                                <span class="font-semibold text-red-600">{{ $stockStatus['Out of Stock'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            @forelse($recentActivities as $activity)
                                <div class="flex items-center space-x-4">
                                    @if($activity['type'] === 'import')
                                        <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                                        </svg>
                                    @else
                                        <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                        </svg>
                                    @endif
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $activity['type'] === 'import' ? 'Imported' : 'Exported' }} {{ $activity['quantity'] }} units of {{ $activity['food_name'] }}
                                        </p>
                                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($activity['date'])->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No recent activity</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Most Active Items -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Most Active Items</h3>
                        <div class="space-y-4">
                            @forelse($mostActiveItems as $item)
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-900">{{ $item->Food_Name }}</span>
                                    <div class="flex space-x-4">
                                        <span class="text-sm text-green-600">{{ $item->imports_count }} imports</span>
                                        <span class="text-sm text-red-600">{{ $item->exports_count }} exports</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No active items</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
