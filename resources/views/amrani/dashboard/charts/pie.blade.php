<div class="border rounded-lg p-2 bg-white shadow mb-4 relative overflow-hidden">
    <div class="flex items-center justify-between h-12 px-4 text-gray-600">
        <h1 class="font-bold text-lg">Top 10 Secteurs</h1>
        <button class="text-blue-400 p-2 hover:text-gray-600 myDoughnutChart_reload"><i class="fas fa-sync-alt"></i></button>
    </div>
    <canvas id="myDoughnutChart" width="400" height="150"></canvas>
    <div class="absolute loader top-0 left-0 right-0 bottom-0 bg-gray-100 z-10 bg-opacity-20">
        <div class="w-12 text-center mx-auto mt-16 text-gray-400 text-4xl">
            <i class="fas fa-sync fa-spin"></i>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    function random_rgba(opacity = 0.5) {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + opacity + ')';
    }

    var i;
    var colors = [];
    var borders = [];
    for (i = 0; i < 10; i++) {
        colors.push(random_rgba());
        borders.push(random_rgba(0.8));
    } 

    ctx = document.getElementById('myDoughnutChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [],
            datasets: [{
                label: '# Top 10 Secteur',
                data: [],
                backgroundColor: colors,
                borderColor: borders,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });

    var config = {
        type : 'doughnut',
        caption :   '',
        labels : [],
        data : [],
        colors:[]
    };
    
    function loader(){
        $.get(
            "{{route('dashboard.topTenCitySectors')}}",
            function(response){

                var labels = [];
                var values = [];

                for (var key in response){
                    labels.push( response[key].city_sector_name_fr );
                    values.push(response[key].counter);
                }

                config.labels = labels;
                config.data = values;
                config.caption = 'Top 10 Secteurs : ';
                $('#myDoughnutChart').parent().find('.loader').hide();
                myChart.data.labels=config.labels;
                myChart.data.datasets[0].data=config.data;
                myChart.update();
            }
        );            
    }

    loader();
    
    $('.myDoughnutChart_reload').on('click', function(){
        $('#myDoughnutChart').parent().find('.loader').show();
        loader();
    })





})
</script>