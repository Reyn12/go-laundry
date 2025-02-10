{{-- Card Total Transaksi Component --}}
<div class="card bg-white dark:bg-gray-800 p-6 rounded-xl w-full shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="iconLaporan" class="dark:invert">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Total Transaksi</h2>
        </div>
        <select class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 border-none focus:outline-none text-gray-700 dark:text-gray-200">
            <option>Tahun Ini</option>
            <option>Tahun Lalu</option>
        </select>
    </div>
    
    <div id="transactionChart"></div>
</div>

{{-- ApexCharts Script --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Get current theme
    const isDarkMode = document.documentElement.classList.contains('dark');
    
    var options = {
        series: [{
            name: '2024',
            data: [65, 28, 15, 63, 45, 55, 38, 78, 82, 80, 45, 30]
        }],
        chart: {
            height: 220,
            type: 'bar',
            toolbar: {
                show: false
            },
            background: 'transparent'
        },
        colors: ['#0039C9'],
        plotOptions: {
            bar: {
                borderRadius: 5,
                columnWidth: '40%',
            }
        },
        dataLabels: {
            enabled: false
        },
        grid: {
            borderColor: isDarkMode ? '#374151' : '#f1f1f1',
            strokeDashArray: 4,
        },
        xaxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des'],
            labels: {
                style: {
                    colors: isDarkMode ? '#9ca3af' : '#64748b',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: isDarkMode ? '#9ca3af' : '#64748b',
                }
            }
        },
        theme: {
            mode: isDarkMode ? 'dark' : 'light'
        }
    };

    var chart = new ApexCharts(document.querySelector("#transactionChart"), options);
    chart.render();

    // Update chart when theme changes
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                chart.updateOptions({
                    grid: {
                        borderColor: isDarkMode ? '#374151' : '#f1f1f1'
                    },
                    xaxis: {
                        labels: {
                            style: {
                                colors: isDarkMode ? '#9ca3af' : '#64748b'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: isDarkMode ? '#9ca3af' : '#64748b'
                            }
                        }
                    },
                    theme: {
                        mode: isDarkMode ? 'dark' : 'light'
                    }
                });
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
</script>