<div class="border rounded-lg p-2 bg-white shadow mb-4 relative overflow-hidden">
    <div class="flex items-center justify-between h-12 px-4 text-gray-600">
        <h1 class="font-bold text-lg">Total des Immobiliers</h1>
        <button class="text-blue-400 p-2 hover:text-gray-600 myChart_reload"><i class="fas fa-sync-alt"></i></button>
    </div>
    <canvas id="myChart"></canvas>
    <div class="absolute loader top-0 left-0 right-0 bottom-0 bg-gray-100 z-10 bg-opacity-20">
        <div class="w-12 text-center mx-auto mt-16 text-gray-400 text-4xl">
            <i class="fas fa-sync fa-spin"></i>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        var labels_array = {
                total_appartements:'Appart.', 
                total_maisons:'Maison', 
                total_terrains:'Terrain',
                total_lcs:'L. Commerc.', 
                total_villas:'Villa', 
                total_fermas:'Ferme'
        };

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Appart.', 'Maison', 'Terrain', 'L. Commerc.', 'Villa', 'Ferme'],
                datasets: [{
                    label: '# Total des Immobiliers / type',
                    data: [0, 0, 0, 0, 0, 0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var config = {
            type : 'bar',
            caption :   '',
            labels : [],
            data : [],
            colors:[]
        };
        
        function loader(){
            $.get(
                "{{route('dashboard.totals')}}",
                function(response){

                    var labels = [];
                    var values = [];
                    var total = 0;

                    for (var key in response){
                        if( labels_array.hasOwnProperty(key) ){
                            labels.push( labels_array[key] );
                            values.push(response[key]);
                        }
                    }

                    config.labels = labels;
                    config.data = values;
                    config.caption = 'Total : ';
                    $('#myChart').parent().find('.loader').hide();
                    myChart.data.labels=config.labels;
                    myChart.data.datasets[0].data=config.data;
                    myChart.update();
                }
            );            
        }

        loader();
        
        $('.myChart_reload').on('click', function(){
            $('#myChart').parent().find('.loader').show();
            loader();
        })


    });
</script>