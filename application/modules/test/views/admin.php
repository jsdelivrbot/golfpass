<!-- chart.js -->
<html>

<head>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src="<?=domain_url('/public/js/utils.js')?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script> -->
</head>
<body>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart");

var myLineChart = new Chart(ctx, {
    type: 'line',
    
    data : {
        labels: [1,2,3,4,5],
        label: '1234',
        datasets: [{
            data: [1,2,3,4,3],
            pointBackgroundColor : [
                'black'
            ],
            backgroundColor : 'rgba(255,0,0,0.3)',
            
        }]
    }
});


</script>
</body>

</html>