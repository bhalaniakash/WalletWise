<script>
    var ctx = document.getElementById('incomeChart').getContext('2d');

    var incomeLabels = {!! json_encode(array_keys($monthlyIncome->toArray())) !!};
    var incomeData = {!! json_encode(array_values($monthlyIncome->toArray())) !!};

    var incomeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: incomeLabels, // Use pre-defined variables
            datasets: [{
                label: 'Income',
                data: incomeData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
