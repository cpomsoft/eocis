<?php  
$mass_ts_file =  "timeseries_data/$mission/$farea/timeseries_".$basin_number."_mass.csv";
$ts_exists=file_exists($mass_ts_file);

//console_log($mass_ts_file);
?>
<script>
        <?php if ($ts_exists) { ?>

            Plotly.d3.csv("<?php echo $mass_ts_file;?>", function(err, rows){

            function unpack(rows, key) {
                return rows.map(function(row) { return row[key]; });
            }

            /*Date,mass,January_mass,October_mass,April_mass
            */
            <?php
                $plot_y_title="Sea Ice Mass (Gt)";
                $unpack_param='mass';
                $param_name='Mass';
                $param_units='?';
                $plot_name = 'All files';

            ?>

            
            var trace2 = {
                type: "scatter",
                mode: "lines+markers",
                name: 'Oct',
                x: unpack(rows, 'Date'),
                y: unpack(rows, 'October_<?php echo $unpack_param;?>'),
                hoverinfo: 'skip',
                 
                line: {
                    color: 'blue',
                    width: 1,
                    dash: 'dashdot',
                },
                connectgaps: true,
                hovertemplate: '<i><?php echo $param_name;?></i>: %{y:.1f} <?php echo $param_units;?>',
            }

            var trace3 = {
                type: "scatter",
                mode: "lines+markers",
                name: 'Jan',
                x: unpack(rows, 'Date'),
                y: unpack(rows, 'January_<?php echo $unpack_param;?>'),
                 hoverinfo: 'skip',

                line: {
                    color: 'orange',
                    width: 1,
                    dash: 'dashdot',
                },
                connectgaps: true,
                hovertemplate: '<i><?php echo $param_name;?></i>: %{y:.1f} <?php echo $param_units;?>',
            }

            var trace4 = {
                type: "scatter",
                mode: "lines+markers",
                name: 'Apr',
                x: unpack(rows, 'Date'),
                y: unpack(rows, 'April_<?php echo $unpack_param;?>'),
                hoverinfo: 'skip',

                line: {
                    color: 'green',
                    width: 1,
                    dash: 'dashdot',
                },
                connectgaps: true,
                hovertemplate: '<i><?php echo $param_name;?></i>: %{y:.1f} <?php echo $param_units;?>',
            }



            var data = [trace2,trace3,trace4];

            /* with custom-range:     */
            var layout = {

                plot_bgcolor:"#FCFCFE",

                title: {
                    <?php if ($basin_number < 1) { ?>
                    text:'Mean Sea Ice <?php echo $param_name;?> (All Arctic Regions)',
                    <?php } else { ?>
                    text:'Mean Sea Ice <?php echo $param_name;?> (<?php echo $basin_name; ?>)',
                    <?php }?>
                    font: {
                        family: 'Arial, sans-serif',
                        size: 12
                    },
                },

                xaxis: { /* remove this to set plot range automatically */
                    /*range: ['<?php print("$first_plot_year-$first_plot_month-01");?>','<?php print("${last_plot_year}-${last_plot_month}-31");?>'],*/
                    title: 'Month',
                    tickangle: -45,
                    type: 'date',
                    showgrid: true,
                    showline: true,
                    gridcolor: '#ffffff',
                    gridwidth: 1,
                    linecolor: '#e0e0e0',
                    linewidth: 1,
                    tickfont: {
                     family: 'Arial, sans-serif',
                      size: 14,
                      color: 'black'
                    },
                },
                yaxis: {
                  title: '<?php print "$plot_y_title";?>',
                  showticklabels: true,
                  showline: true,
                  tickfont: {
                     family: 'Arial, sans-serif',
                      size: 14,
                      color: 'black'
                    },
                    gridcolor: '#e0e0e0',
                    gridwidth: 1,
                    linecolor: '#e0e0e0',
                },

              shapes: [{
                type: 'line',
                x0: '<?php print "$year-$month-1";?>',
                y0: 0,
                x1: '<?php print "$year-$month-1";?>',
                yref: 'paper',
                y1: 1,
                line: {
                  color: 'grey',
                  width: 1.5,
                  dash: 'dot'
                }
              },],

                margin: { t: 30 },

                legend: {
                    y: 0.5,
                    font: {
                        size: 16
                    }
                }

                /*showlegend: false*/

            };


            Plotly.newPlot('mass_ts2_div', data, layout, { displaylogo: false, responsive: true, scrollZoom: false,modeBarButtonsToRemove: ['select2d','lasso2d','toggleSpikelines','hoverClosestGl2d','hoverClosestCartesian', 'hoverCompareCartesian','resetScale2d']});
        })

        <?php } else {
         print("<!-- no timeseries file found: $ts_file -->");   
        }?>

    </script>