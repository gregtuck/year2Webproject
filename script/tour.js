$(document).ready(function(){
    $('#load_data').click(function(){
        $.ajax({
            url:"tourDates.csv",
            dataType:"text",
            success:function(data)
            {
                var tour_dates = data.split(/\r?\n|\r/);
                var table_data = '<table class="table table-bordered table-striped">';
                for(var count = 0; count<tour_dates.length; count++)
                {
                    var cell_data = tour_dates[count].split(",");
                    table_data += '<tr>';
                    for(var cell_count=0; cell_count<cell_data.length; cell_count++)
                    {
                        if(count === 0)
                        {
                            table_data += '<th>'+cell_data[cell_count]+'</th>';
                        }
                        else
                        {
                            table_data += '<td>'+cell_data[cell_count]+'</td>';
                        }
                    }
                    table_data += '</tr>';
                }
                table_data += '</table>';
                $('#table').html(table_data);
            }
        });
    });
});