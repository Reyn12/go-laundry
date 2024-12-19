{{-- Card Total Transaksi Component --}}
<div class="card bg-white p-6 rounded-xl w-full shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="iconLaporan">
            <h2 class="text-xl font-semibold text-gray-800">Total Transaksi</h2>
        </div>
        <select class="px-4 py-2 rounded-lg bg-gray-100 border-none focus:outline-none text-gray-700">
            <option>Tahun Ini</option>
            <option>Tahun Lalu</option>
        </select>
    </div>
    
    <div id="transactionChart"></div>
</div>

{{-- ApexCharts Script --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
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
            }
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
            borderColor: '#f1f1f1',
            strokeDashArray: 4,
        },
        xaxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des'],
            labels: {
                style: {
                    colors: '#64748b',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#64748b',
                }
            }
        },
        fill: {
            opacity: 1
        }
    };

    var chart = new ApexCharts(document.querySelector("#transactionChart"), options);
    chart.render();
</script>