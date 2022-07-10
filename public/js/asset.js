$(function(){
    // chart();
    ajax_func()
});

function ajax_func(){
    var url = '/chart';
    ajax_action(url);
    function ajax_action(url){
        $.ajax({
            haeder:{ 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            url : url,
            type : 'GET',
            data : {},
            cache : false,
            dataType : 'json'
        })
        .done(function(data){
            chart(data.assets);
        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown){
            alert('Please reach out System Administrator');            
        })
    }
}

function chart(assets){
    col_1 = 'target_date';
    col_2 = 'total';
    const labels = [
        assets[7][col_1],
        assets[6][col_1],
        assets[5][col_1],
        assets[4][col_1],
        assets[3][col_1],
        assets[2][col_1],
        assets[1][col_1],
        assets[0][col_1],
    ];
    
    const data = {
        labels: labels,
        datasets: [{
            label: 'My Asset Graph',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [
                    assets[7][col_2]
                    ,assets[6][col_2]
                    ,assets[5][col_2]
                    ,assets[4][col_2]
                    ,assets[3][col_2]
                    ,assets[2][col_2]
                    ,assets[1][col_2]
                    ,assets[0][col_2]
                ],
        }]
    };
    
    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}