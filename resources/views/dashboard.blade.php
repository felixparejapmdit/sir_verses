<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    /* Enhanced CSS styling */
    body {
        background-color: #edf2f7;
        font-family: Arial, sans-serif;
    }

    .dashboard-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .chart-box, .info-box {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .chart-box:hover, .info-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 30px rgba(0, 0, 0, 0.2);
    }

    .chart-box {
        grid-column: span 2;
        position: relative;
    }

    .wide-box {
        grid-column: span 4;
    }

    .chart-box canvas, .info-box canvas {
        width: 100%;
        height: 220px;
    }

    .chart-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
        font-weight: bold;
        color: #2d3748;
        text-align: center;
        text-transform: uppercase;
    }

    /* Custom colors based on contrast-enhanced style */
    .wallet-box {
        background: linear-gradient(135deg, #83eaf1, #63a4ff);
    }

    .losses-box {
        background: linear-gradient(135deg, #ff758c, #ff7eb3);
    }

    .income-box {
        background: linear-gradient(135deg, #66ff99, #33cc99);
    }

    .info-title {
        font-size: 1.6rem;
        color: #333;
    }

    .info-detail {
        font-size: 1.4rem;
        font-weight: bold;
        color: #2d3748;
    }

    /* Responsive layout */
    @media only screen and (max-width: 992px) {
        .dashboard-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .wide-box {
            grid-column: span 2;
        }
    }

    @media only screen and (max-width: 768px) {
        .dashboard-container {
            grid-template-columns: 1fr;
        }

        .wide-box {
            grid-column: span 1;
        }
    }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EVM LV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="dashboard-container">



        
            <!-- Ordained Ministers Chart -->
            <div class="chart-box wide-box">
                <h2 class="chart-title">Ordained Ministers (2009-2024)</h2>
                <canvas id="ordainedMinistersChart"></canvas>
            </div>

            <!-- Translators Chart -->
            <div class="chart-box">
                <h2 class="chart-title">Translators</h2>
                <canvas id="translatorsChart"></canvas>
            </div>

            <!-- Used Verses Chart -->
            <div class="chart-box">
                <h2 class="chart-title">Used Verses</h2>
                <canvas id="usedVersesChart"></canvas>
            </div>

            <!-- Bible Translations Chart -->
            <div class="chart-box">
                <h2 class="chart-title">Bible Translations</h2>
                <canvas id="bibleTranslationsChart"></canvas>
            </div>

            <!-- Pastoral Visitations (Philippines) Chart -->
            <div class="chart-box">
                <h2 class="chart-title">Pastoral Visitations (Philippines)</h2>
                <canvas id="pvPhilippinesChart"></canvas>
            </div>

            <!-- Pastoral Visitations (Abroad) Chart -->
            <div class="chart-box">
                <h2 class="chart-title">Pastoral Visitations (Abroad)</h2>
                <canvas id="pvAbroadChart"></canvas>
            </div>

            <!-- Dedicated Houses Chart -->
            <div class="chart-box wide-box">
                <h2 class="chart-title">Dedicated Houses of Worship</h2>
                <canvas id="dedicatedHousesChart"></canvas>
            </div>
        </div>

        <script>
        // Common Chart Configuration Options
        const chartOptions = {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#2d3748',
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                },
                title: {
                    display: true,
                    color: '#2d3748',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#2d3748',
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    ticks: {
                        color: '#2d3748',
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: '#e2e8f0'
                    }
                }
            }
        };

        // Year range from 2009 to 2024
        const years = Array.from({ length: 2024 - 2009 + 1 }, (v, k) => 2009 + k);

        // Total Ordained Ministers by Year
        new Chart(document.getElementById('ordainedMinistersChart'), {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Total Ordained Ministers',
                    data: [30, 40, 35, 45, 50, 60, 70, 80, 75, 90, 95, 100, 110, 115, 120, 125],
                    backgroundColor: 'rgba(99, 179, 237, 0.5)',
                    borderColor: '#3182CE',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3182CE',
                    pointRadius: 5,
                }]
            },
            options: chartOptions
        });

        // Total Translators
        new Chart(document.getElementById('translatorsChart'), {
            type: 'doughnut',
            data: {
                labels: ['Translators'],
                datasets: [{
                    label: 'Total Translators',
                    data: [120],
                    backgroundColor: ['#ED64A6'],
                    hoverBackgroundColor: ['#F687B3'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        // Used Verses
        new Chart(document.getElementById('usedVersesChart'), {
            type: 'polarArea',
            data: {
                labels: ['Used Verses'],
                datasets: [{
                    label: 'Total Used Verses',
                    data: [350],
                    backgroundColor: ['#48BB78'],
                    hoverBackgroundColor: ['#4FD1C5'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        // Bible Translations
        new Chart(document.getElementById('bibleTranslationsChart'), {
            type: 'bar',
            data: {
                labels: ['Bible Translations'],
                datasets: [{
                    label: 'Total Bible Translations',
                    data: [20],
                    backgroundColor: ['#ECC94B'],
                    hoverBackgroundColor: ['#F6E05E'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        // Pastoral Visitations (Philippines)
        new Chart(document.getElementById('pvPhilippinesChart'), {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Pastoral Visitations (Philippines)',
                    data: [25, 35, 45, 30, 50, 40, 60, 55, 65, 70, 75, 80, 85, 90, 95, 100],
                    backgroundColor: '#68D391',
                    borderColor: '#48BB78',
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });

        // Pastoral Visitations (Abroad)
        new Chart(document.getElementById('pvAbroadChart'), {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Pastoral Visitations (Abroad)',
                    data: [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85],
                    backgroundColor: '#F56565',
                    borderColor: '#E53E3E',
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });

        // Dedicated Houses of Worship
        new Chart(document.getElementById('dedicatedHousesChart'), {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Dedicated Houses of Worship',
                    data: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80],
                    backgroundColor: '#63B3ED',
                    borderColor: '#3182CE',
                    borderWidth: 2,
                    fill: true,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#3182CE',
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#63B3ED',
                    tension: 0.3
                }]
            },
            options: chartOptions
        });
        </script>
    </div>
</x-app-layout>
