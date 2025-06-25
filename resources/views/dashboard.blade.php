<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-indigo-500 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">
                Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 px-4 sm:px-0">
                <div class="bg-white p-4 sm:p-6 shadow-sm rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center mb-2 sm:mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <p class="text-sm sm:text-base text-gray-600 font-medium">Jumlah Buku</p>
                    </div>
                    <p class="text-2xl sm:text-3xl font-bold text-indigo-600">{{ $bookCount }}</p>
                </div>

                <div class="bg-white p-4 sm:p-6 shadow-sm rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center mb-2 sm:mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm sm:text-base text-gray-600 font-medium">User Terverifikasi</p>
                    </div>
                    <p class="text-2xl sm:text-3xl font-bold text-green-600">{{ $verifiedCount }}</p>
                </div>

                <div class="bg-white p-4 sm:p-6 shadow-sm rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center mb-2 sm:mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm sm:text-base text-gray-600 font-medium">User Belum Terverifikasi</p>
                    </div>
                    <p class="text-2xl sm:text-3xl font-bold text-yellow-500">{{ $unverifiedCount }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 px-4 sm:px-0">
                <div class="bg-white p-4 sm:p-6 shadow-sm rounded-lg border border-gray-200">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">Statistik Verifikasi User</h3>
                    </div>
                    <div class="w-full h-48 sm:h-64">
                        <canvas id="verificationPieChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <div class="bg-white p-4 sm:p-6 shadow-sm rounded-lg border border-gray-200">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">Statistik Buku / Bulan</h3>
                    </div>
                    <div class="w-full h-48 sm:h-64">
                        <canvas id="booksBarChart" class="w-full h-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const verificationPieChart = new Chart(document.getElementById('verificationPieChart'), {
            type: 'pie',
            data: {
                labels: ['Terverifikasi', 'Belum Terverifikasi'],
                datasets: [{
                    data: [{{ $verifiedCount }}, {{ $unverifiedCount }}],
                    backgroundColor: ['#16a34a', '#f59e0b'],
                    borderWidth: 1,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 20,
                            font: {
                                family: 'Inter'
                            }
                        }
                    }
                }
            }
        });

        const booksBarChart = new Chart(document.getElementById('booksBarChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($booksPerMonth)) !!},
                datasets: [{
                    label: 'Jumlah Buku',
                    data: {!! json_encode(array_values($booksPerMonth)) !!},
                    backgroundColor: '#6366f1',
                    borderColor: '#4f46e5',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        },
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</x-app-layout>