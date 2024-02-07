<!DOCTYPE html>
<html lang="en">
<head>
  <title>EOCIS Sea Ice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/main.css">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
 <!-- Load plotly.js for timeseries charts -->
  <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
  <?php include 'php_initialize.php';?>

  
</head>
<body>

  
<div class=" p-4 ">
    <div class="row">  
         <div class="col-md-3 col-sm-3">
          <a href="http://eocis.org"><image id="eocis_img" src="images/cropped-EOCIS-Logo-Final.png" alt="EOCIS logo"  ></a>
         </div>
         <div id="title_div" class="col-md-7  col-sm-9">
          <h3 class="text-center fs-2">Arctic Sea Ice Thickness, Volume and Mass Data</h3>
         </div>
         <div class="col-md-2  d-none d-md-block d-lg-block text-center">
          <div class="cpom_img_wrapper">
          <p class="cpom_img_txt">processed by:</p>
          <a href="http://cpom.org.uk"><image class="cpom_img" src="images/cpom_white.png" alt="CPOM" ></a>
          </div>
         </div>
    </div>
</div>

<!-- ---------------------------------------------------------------------------------- -->

<!-- <div class="bg-dark p-1 text-light">
  <p class="m-1">Product information</p>
</div> -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav justify-content-between">
    <li class="nav-item">
        <a class="nav-link active" href="http://www.cpom.ucl.ac.uk/eocis/seaice"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product_info.php">Product Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="download_info.php">Download Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="docs.php">Documents</a>
      </li>
      <li class="nav-item ms-auto">
        <a class="nav-link" href="product_info.php">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg> New products monthly</a>
      </li>
    </ul>
    
    <!--  -->
    
  </div>
</nav>

<!-- ---------------------------------------------------------------------------------- -->

<div class=" bg-light">
  <div class="container pt-4 pb-4">
    <div class="row">  

      <!-- ---------------------------------------------------------------------------------- -->

      <div class="col-md-6
        <?php if ($expand_thick_image) echo " hide "; ?>
        <?php if ($expand_report_div) echo " hide "; ?>
      ">
        <h4>EOCIS Arctic Sea Ice Products</h4>
        
        <p>Arctic sea ice trends are a key indicator of climate change, an 
          obstacle to maritime activities, a factor in habitat loss, 
          and a significant influence on winter time weather in north west Europe.</p>

          <p>EOCIS sea ice thickness, volume and mass netcdf <a href="product_info.php">products</a> are generated monthly by 
          <a href="http://www.cpom.org.uk">CPOM</a> from 
          radar altimetry measurements taken from the ESA CryoSAT-2 satellite during the 
          winter months<a href="#winter"><sup>1</sup></a> (Oct-Apr).
        You can view or <a href="download_info.php">download</a> products here.</p>
        
        <!-- -----------------------------------------------------------------------
              Thickness/Volume Selector Pane
        --------------------------------------------------------------------------- -->
        <div id="thickness_volume_selector_pane">
          <div id="thickness_volume_selector_pane_row1">

            <!-- Download button & dropdown for TS -->
            <div class="ts_download_btn_wrapper">
              <div class="ts_download_btn btn-group">
                  <div class="button-wrapper">

                    <button type="button" class="btn btn-sm btn-secondary  ct_dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                      <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                      <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>
                    <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdown_menu_month">
                      <?php
                            $this_prod= "EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-$year" . sprintf("%02d", $month) . '-fv1.0.nc';

                            print "<a ";
                            print "class=\"dropdown-item active\"";
                            print "href=\"timeseries_data/cs2/arco/latest/$latest_ts_filename\">Download latest time-series data as netcdf containing both thickness and volume";
                            print "</a> ";

                            print "<a ";
                            print "class=\"dropdown-item\"";
                            print "href=\"download_info.php\">Manual/Automated downloads "; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                              <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                            <?php
                            print "</a> ";
                      ?>
                    </div>
                    
                  </div>
                </div> <!-- ts_download_btn -->
              </div> <!-- ts_download_btn_wrapper -->

            <!-- ------------------------------------------------------------------------------------------
              Radio Buttons for Selecting Thickness/Volume/Mass 
            ------------------------------------------------------------------------------------------ -->
            <div class="switch-container"> <!-- shrinks elements by .9-->

            <form class="inline_form" id="ts_type_form" name="form_show_ts_type" method="post" action="<?php print "index.php";?>">
              <div>
                <input id="mean_thickness" name="timeseries_type_to_show" type="radio" value="thickness" <?php if ($timeseries_type_to_show == 'thickness') echo 'checked'; ?> onClick="this.form.submit();">
                <label for="mean_thickness">Mean Thickness</label>
              </div>
              <div>
                <input id="volume" name="timeseries_type_to_show" type="radio" value="volume" <?php if ($timeseries_type_to_show == 'volume') echo 'checked'; ?> onClick="this.form.submit();">
                <label for="volume">Volume</label>
              </div>
              <div>
                <input id="mass" name="timeseries_type_to_show" type="radio" value="mass" <?php if ($timeseries_type_to_show == 'mass') echo 'checked'; ?> onClick="this.form.submit();">
                <label for="mass">Mass</label>
              </div>
              <input type="hidden" name="param" value="<?php print "$param";?>" >
              <input type="hidden" name="basin_number" value="<?php print "$basin_number";?>" >
              <input type="hidden" name="year" value="<?php print "$year";?>" >
              <input type="hidden" name="month" value="<?php print "$month";?>" >
              <input type="hidden" name="expand_ts1" value="<?php print "$expand_ts1";?>" >
              <input type="hidden" name="expand_ts2" value="<?php print "$expand_ts2";?>" >

            </form>
            
      </div> <!-- switch-container shrinks elements by .9-->
      </div> <!-- thickness_volume_selector_pane_row1 -->
      
      <div id="thickness_volume_selector_pane_row2">

      <!-- --------------------------------------------------------------------
            Basin Dropdown 
         ------------------------------------------------------------------------->
        <br>
         <div id="region_dropdown" class="">
          
          <div class="button-wrapper">
          Arctic basin:
            <button type="button" class="btn dropdown-toggle ct_dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                $basin_name_shown=$basin_name;
                if ($basin_number == 0) $basin_name_shown='Arctic (whole area)';
                ?>
            <?php print "$basin_name_shown";?> <span class="caret"></span></button>

             <div class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdown_menu_region">

            <?php
                    $index=0;
                    foreach ($basin_names as $thisbasin) {
                        if ($thisbasin == '---' ) {
                            print("<h6 class=\"dropdown-header\">$thisbasin</h6> ");
                        } elseif ($thisbasin == 'Norwegian Sea') {
                            print("<h6 class=\"dropdown-header\">$thisbasin (no measurements)</h6> ");
                        } else {
                            print "<a ";
                            if ($thisbasin == $basin_name) {
                                print "class=\"dropdown-item active\"";
                            } else {
                                print "class=\"dropdown-item\"";
                            }
                            
                            print " href=\"index.php?&mission=$mission&basin_number=$index&param=$param&area=$area&month=$month&year=$year&expand_ts1=$expand_ts1&expand_ts2=$expand_ts2\">$thisbasin</a>";
                        }
                        $index++;
                    }

            ?>
            </div>
          </div>
        </div> <!-- region_dropdown -->
        <button id="map_btn" class="btn dropdown-toggle ct_dropdown_button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
            </svg>
        </button>
        </div> <!-- thickness_volume_selector_pane_row2 -->

      </div> <!-- thickness_volume_selector_pane -->

        <!-- -----------------------------------------------------------------------
             Time Series 1: Last 2 Years
        --------------------------------------------------------------------------- -->
        <div class="
        <?php if ($expand_ts1) { echo "expand_ts" ; } ?>
        <?php if ($expand_report_div) { echo " hide " ; } ?>
        <?php if ($expand_ts2) { echo " hide " ; } ?> ts_pane
        ">

          <!-- Expand window icon -->
        <div class="expand-icon-container_ts">
          <?php if (!$expand_ts1) { ?>
          <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_ts1=1";?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-fullscreen expand-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
          </svg>
          </a>
          <?php } else {?>
            <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_ts1=0";?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract expand-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707zM15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707z"/>
</svg>
          </a>
          <?php } ?>
        </div>

          <div class="ts_title">Time-series of Last 2-years</div>
          
          <p class="text-muted text-center"><small>
            <?php if ($timeseries_type_to_show == 'volume') {?>
              Sea ice volume increases each Arctic winter season from October to April
            <?php } elseif ($timeseries_type_to_show == 'thickness') {?>
              Mean Sea ice thickness grows each Arctic winter season from October to April
            <?php } else {?>
              Sea ice mass increases each Arctic winter season from October to April
            <?php }?> 
          </small></p>
            <div id="<?php 
            echo $timeseries_type_to_show;
            ?>_ts_div" class=" third_height  
            <?php if ($expand_ts1) { echo " expanded_height " ; } ?>
            w3-border-bottom">
                  <!-- Plotly chart will be drawn inside this DIV -->
            </div>
            <?php if ($expand_ts1) { ?>
              <div class="w3-panel w3-border w3-light-grey w3-round-large">
              <p><strong>Tips:</strong> You can double-click within the time-series to view the full time period available or to reset to the default view.</p>
              <p>You can also select a section of the time-series chart to zoom in by dragging a rectangle
                around the part you want to expand.</p>
              </div> 
            <?php } ?>
      </div> <!-- ts_pane 1 -->

      <!-- -----------------------------------------------------------------------
           Time Series 2 Pane
        --------------------------------------------------------------------------- -->
        <div class="ts_pane
        <?php if ($expand_ts2) { echo "expand_ts" ; } ?>
        <?php if ($expand_report_div) { echo " hide " ; } ?>
        <?php if ($expand_ts1) { echo " hide " ; } ?>
        ">

          <!-- Expand window icon -->
        <div class="expand-icon-container_ts">
          <?php if (!$expand_ts2) { ?>
          <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_ts2=1";?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-fullscreen expand-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
          </svg>
          </a>
          <?php } else {?>
            <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_ts2=0";?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract expand-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707zM15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707z"/>
</svg>
          </a>
          <?php } ?>
        </div>

        
        <div class="ts_title">Full Period (key winter months): <?php print "$first_year:$last_year";?></div>

          <p class="text-muted text-center"><small>
            <?php if ($timeseries_type_to_show == 'volume') {?>
            Shows the trend in Arctic sea ice volume since 2010 when CryoSat was launched
            at the start (Oct), middle (Jan), and end (Apr) of the winter season.
            <?php } elseif ($timeseries_type_to_show == 'thickness') {?>
              Shows the trend in Arctic sea ice thickness since 2010 when CryoSat was launched
              at the start (Oct), middle (Jan), and end (Apr) of the winter season.
            <?php } else {?>  
              Shows the trend in Arctic sea ice mass since 2010 when CryoSat was launched
              at the start (Oct), middle (Jan), and end (Apr) of the winter season.
            <?php }?>
          </small></p>

            <div id="<?php 
            echo $timeseries_type_to_show;
            ?>_ts2_div" class=" third_height  
            <?php if ($expand_ts2) { echo " expanded_height " ; } ?>
            w3-border-bottom">
                  <!-- Plotly chart will be drawn inside this DIV -->
            </div>

            <?php if ($expand_ts2) { ?>
              <div class="w3-panel w3-border w3-light-grey w3-round-large">
              <p><strong>Tips:</strong> You can double-click within the time-series to view the full time period available or to reset to the default view.</p>
              <p>You can also select a section of the time-series chart to zoom in by dragging a rectangle
                around the part you want to expand.</p>
              </div> 
            <?php } ?>

      </div> <!-- ts_pane2 -->

      </div> <!-- col -->
      <!-- ---------------------------------------------------------------------------------- -->


      <!-- -----------------------------------------------------------------------
              Thickness Image
        --------------------------------------------------------------------------- -->

      <!-- Column to show thickness image and controls -->
      <div id="prod_col" class="
      <?php 
      if ($expand_ts1) echo " hide "; 
      if ($expand_ts2) echo " hide ";
      if ($expand_thick_image || $expand_report_div) { echo "col-md-12"; 
      } else { echo "col-md-6";} ?>
      "> 
        <div id="thickness_image_pane" class="
          <?php if ($expand_report_div) { echo "hide"; } ?>
        ">
        <div class="prod_title">Arctic Monthly Sea Ice <b>Thickness</b></div>
         <!-- Expand window icon -->
        <div class="expand-icon-container">
          <?php if (!$expand_thick_image) { ?>
          <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_thick_image=1";?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-fullscreen expand-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
          </svg>
          </a>
          <?php } else {?>
            <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_thick_image=0";?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract expand-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707zM15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707z"/>
</svg>
          </a>
          <?php } ?>
        </div>

      <!-- download dropdown -->
      <div class="dropdown_top_txt btn-group">
            <div class="button-wrapper">
              <p class="download_button_top_txt">&nbsp;</p>  

              <button type="button" class="btn btn-sm btn-secondary  ct_dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>
               <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdown_menu_month">
                <?php
                      $this_prod= "EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-$year" . sprintf("%02d", $month) . '-fv1.0.nc';

                      print "<a ";
                      print "class=\"dropdown-item active\"";
                      print "href=\"data/$this_prod\">Download selected month: $month/$year";
                      print "</a> ";

                      $this_prod= "EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-$last_year" . sprintf("%02d", $last_month) . '-fv1.0.nc';

                      print "<a ";
                      print "class=\"dropdown-item\"";
                      print "href=\"data/$this_prod\">Download latest month: $last_month/$last_year";
                      print "</a> ";

                      $this_prod= "EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-ALL-fv1.0.zip";

                      print "<a ";
                      print "class=\"dropdown-item\"";
                      print "href=\"data/$this_prod\">Download all months as a zip file: $first_month/$first_year -> $last_month/$last_year";
                      print "</a> ";

                      print "<a ";
                      print "class=\"dropdown-item\"";
                      print "href=\"download_info.php\">Manual/Automated downloads "; ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg>
                      <?php
                      print "</a> ";
                ?>
              </div>
              
            </div>
        </div> <!-- downloads_dropdown -->

      <!-- month_dropdown -->
      <div class="dropdown_top_txt btn-group">
            <div class="button-wrapper">
              <p class="button_top_txt">Month</p>  

              <!-- Left triangle button -->
              <button class="arrow_button bg-light" type="button" >
                  <?php if ($month == $first_month and $year == $first_year) { ?>
                      <div class="arrow_button_left_disabled" ></div>
                  <?php } else {  ?>
                    <?php 
                       if ($prev_month == 12) {
                        $year_to_set = $year -1; 
                       } else {
                        $year_to_set = $year;
                       }
                    ?>
                  <a href="<?php
                          print "index.php?basin_number=$basin_number&month=$prev_month&year=$year_to_set&param=$param&expand_thick_image=$expand_thick_image";
                          ?>">
                      <div class="arrow_button_left" ></div>
                  </a>
                  <?php } ?>
              </button>
              <button type="button" class="btn btn-sm btn-secondary dropdown-toggle ct_dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php print "$month_str";?> <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdown_menu_month">
                  <?php
                        $index=0;
                        foreach ($all_months as $thismonth) {
                            if ($thismonth == 0) {

                              print("<h6 class=\"dropdown-header\">[summer]</h6> ");
                            } else {
                                print "<a ";
                                if ($thismonth == $month) {
                                    print "class=\"dropdown-item active\"";
                                } else {
                                    print "class=\"dropdown-item\"";
                                }
                                print " href=\"index.php?basin_number=$basin_number&month=$thismonth&year=$year&param=$param&expand_thick_image=$expand_thick_image\">$months_str[$index]</a>";
                            }
                            $index++;
                        }
                  ?>
              </div>
              <!-- Right triangle button -->
              <button class="arrow_button bg-light" type="button" >
                      <?php if ($month == $last_month and $year == $last_year) { ?>
                          <div class="arrow_button_right_disabled" ></div>
                      <?php } else {  ?>

                        <?php 
                          if ($next_month == 1) {
                            $year_to_set = $year +1; 
                          } else {
                            $year_to_set = $year;
                          }
                        ?>

                      <a href="<?php
                              print "index.php?basin_number=$basin_number&month=$next_month&year=$year_to_set&param=$param&expand_thick_image=$expand_thick_image";
                              ?>">
                          <div class="arrow_button_right" ></div>
                      </a>
                      <?php } ?>
              </button>
            </div>
        </div> <!-- month_dropdown -->

        <!-- year_dropdown -->
        <div class="dropdown_top_txt btn-group">
            <div class="button-wrapper">
              <p class="button_top_txt">Year</p>  

              <!-- Left triangle button -->
              <button class="arrow_button bg-light" type="button" >
                  <?php if ($year == $first_year) { ?>
                      <div class="arrow_button_left_disabled" ></div>
                  <?php } else {  ?>
                  <a href="<?php
                          print "index.php?basin_number=$basin_number&month=$month&year=$prev_year&param=$param&expand_thick_image=$expand_thick_image";
                          ?>">
                      <div class="arrow_button_left" ></div>
                  </a>
                  <?php } ?>
              </button>
              <button type="button" class="btn btn-sm btn-secondary dropdown-toggle ct_dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php print "$year";?> <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdown_menu_month">
                <?php
                      $index=0;
                      foreach (range($first_year,$last_year) as $thisyear) {
                          if ($thisyear == '---') {
                            print("<h6 class=\"dropdown-header\">$thisyear</h6> ");
                          } else {
                              print "<a ";
                              if ($thisyear == $year) {
                                  print "class=\"dropdown-item active\"";
                              } else {
                                  print "class=\"dropdown-item\"";
                              }
                              print " href=\"index.php?basin_number=$basin_number&year=$thisyear&param=$param&expand_thick_image=$expand_thick_image&month=$month\">$thisyear</a>";
                          }
                          $index++;
                      }
                ?>
              </div>
              <!-- Right triangle button -->
              <button class="arrow_button bg-light" type="button" >
                      <?php if ($year == $last_year) { ?>
                          <div class="arrow_button_right_disabled" ></div>
                      <?php } else {  ?>
                      <a href="<?php
                              print "index.php?basin_number=$basin_number&month=$month&year=$next_year&param=$param&expand_thick_image=$expand_thick_image";
                              ?>">
                          <div class="arrow_button_right" ></div>
                      </a>
                      <?php } ?>
              </button>
            </div>
        </div> <!-- year_dropdown -->

        <!-- param dropdown -->
        <div class="dropdown_top_txt btn-group">
            <div class="button-wrapper">
              <p class="button_view_txt">View NetCDF Parameter</p>  

              <button type="button" class="btn btn-sm btn-secondary dropdown-toggle ct_dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php print "$param";?> <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdown_menu_month">
                <?php
                      $index=0;
                      foreach ($all_params as $thisparam) {
                          
                              print "<a ";
                              if ($thisparam == $param) {
                                  print "class=\"dropdown-item active\"";
                              } else {
                                  print "class=\"dropdown-item\"";
                              }
                              print " href=\"index.php?basin_number=$basin_number&year=$year&month=$month&param=$thisparam&expand_thick_image=$expand_thick_image\">$thisparam</a>";
                          
                          $index++;
                      }
                ?>
              </div>
              
            </div>
        </div> <!-- param_dropdown -->

        <!-- latest button  -->
        <?php if (($year != $last_year) | ($month != $last_month)) { ?>
        <div class="dropdown_top_txt btn-group">
        
            <div class="button-wrapper"> 
            <p class="latest_button_view_txt">Latest</p>  
            <a href="index.php?basin_number=<?php echo $basin_number; ?>&year=<?php echo $last_year; ?>&month=<?php echo $last_month; ?>&param=<?php echo $param; ?>&expand_thick_image=<?php echo $expand_thick_image; ?>"> 
  
              <button type="button" class="btn btn-sm btn-secondary  ct_dropdown_button" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-end-fill" viewBox="0 0 16 16">
  <path d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.693 3.3 4 3.678 4 4.308v7.384c0 .63.692 1.01 1.233.697L11.5 8.753V12a.5.5 0 0 0 1 0z"/>
</svg>
              </button>
              </a>
           </div> 
            
        </div> <!-- latest button  -->
        <?php } ?>
        
        <div id="image_div" class="text-center">
          <!--<image src="images/sit_example.png" alt="Sea Ice Thickness" width="100%" >-->
          <image class="image-with-shadow" src="data/<?php echo $quicklookImage; ?>" alt="Sea Ice Thickness" width="100%" >
        </div>
        <p class="filename_txt"><?php echo $productFile?></p>

        <p><br>Near Real Time (NRT) sea ice thickness data at 2-day latency (preliminary accuracy) is also available from CPOM at 
        this <a href="http://www.cpom.ucl.ac.uk/csopr/seaice.php">link</a>
        </p>

        </div> <!-- thickness_image_pane -->
        

        <!-- -----------------------------------------------------------------------
              Arctic Report
        --------------------------------------------------------------------------- -->
        <div id="report_div" 
        class="image-with-shadow
          <?php if ($expand_thick_image) echo " hide " ?> 
        ">
            <div class="prod_title">Latest Arctic Sea Ice <b>Report</b> (Q4 2023)</div>

            <!-- Expand window icon -->
            <div class="expand-icon-container">
              <?php if (!$expand_report_div) { ?>
              <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_report_div=1";?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-fullscreen expand-icon" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
              </svg>
              </a>
              <?php } else {?>
                <a href="index.php?<?php print "basin_number=$basin_number&month=$month&year=$year&param=$param&expand_report_div=0";?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract expand-icon" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707zM15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707z"/>
    </svg>
              </a>
              <?php } ?>
            </div>

              <?php if (!$expand_report_div) { ?>
              <p class="report_txt">In the last quarter of 2023, sea ice volume increased from 5.74 thousand km3 in October to 15.4 thousand km3 in December. However, for October, November and December, sea ice volume was below the average for the CryoSat-2 record (2010-2023), particularly in October. This can be attributed to lows in both the extent and thickness of multi-year ice (MYI); in October, the extent of MYI was the lowest on record, at 2.37 million km2 compared to the average of 3.27 million km2. Furthermore, the volume of MYI ice in December was the 4th lowest on record at 4.99 thousand km3.  
Interestingly, the volume of first-year ice (FYI) in the last quarter of 2023 was high, with November and December having the highest FYI volume since the CryoSat-2 record began, at 6.13 and 10.4 thousand km3 respectively, indicating a recovery since the Spring low FYI volume. This also suggests that the overall below average sea ice volume is being driven by reductions in MYI.
 [<a href="view_reports.php">See full pdf report and previous reports..</a>]
              </p>
              <?php } else {?>
                <object data="reports/Q4_2023_ASW.pdf" type="application/pdf" width="100%" height="600">
        <p>It appears you don't have a PDF plugin for this browser.
           You can <a href="reports/Q4_2023_ASW.pdf">download the PDF file.</a>
        </p>
    </object>
              <?php } ?>
  
        </div>


      </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">  
       <h5>Notes</h5>
        <a name="winter"><p><sup>1</sup>Sea ice freeboard (and derived thickness) is only reliably measured from 
        satellite radar altimetry during the winter months. During summer, melt ponds can form on the
         sea ice floes making it difficult for the satellite to differentiate between floes and leads,
        and hence calculate sea ice freeboard (and subsequently thickness). Measurement during summer
      months using radar altimetry is an area of active research (<a href="https://doi.org/10.1038/s41586-022-05058-5">Landy et al, 2022</a>) but is not yet operationally processed.</p></a>
    </div>
  </div> <!-- container pt-4 pb-4 -->
</div> <!-- bg-light -->


    <div class="row">  


<!-- Plotly timeseries and availability charts drawn by Plotly javascript-->
<?php
     if ($timeseries_type_to_show == 'volume') {
      include 'volume_timeseries.php';
      include 'volume_timeseries2.php';
     } elseif ($timeseries_type_to_show == 'thickness') {
      include 'thickness_timeseries.php';
      include 'thickness_timeseries2.php';
     } else {
      include 'mass_timeseries.php';
      include 'mass_timeseries2.php';
     }
?>

<dialog id="myDialog">
  <form method="dialog">
    <h3>Product Information</h3>
    <p>EOCIS Sea Ice products consist of 2 types of product, one gridded, one time-series (both in NetCDF4 format):</p>
    <table class="table" width="90%">
      <tr><th>Product</th><th>Product Period</th><th>Season</th><th>Latency</th><th>Type</th><th>Projection</th><th>Format</th></tr>
      <tr><td>Arctic Sea Ice Thickness</td><td>1 Month</td><td>Winter(Oct-Apr)</td><td>-2 months</td><td>Grid (5km)</td><td>EPSG:3413</td><td>NetCDF4</td></tr>
      <tr><td>Arctic Sea Thickness & Volume</td><td>Nov-2010 until latest month</td><td>Winter(Oct-Apr)</td><td>-2 months</td><td>Monthly Time series</td><td></td><td>NetCDF4</td></tr>
    </table>
    
    <p>To download products or find out about product URLs for automatic downloads click on 
      the download icon [<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>] for each product.
    <p>Note that products only include measurements from the Arctic winter season (Oct-Apr). This is because during summer
      months, melt ponds form on the sea ice, making it more difficult for CryoSat-2's radar to distinguish between sea ice
      floes and leads, and hence reliably measure sea ice freeboard (and subsequently determine thickness and volume). 
      New techniques are being developed to measure summer sea ice from CryoSat-2, but these are not yet ready for operational use.
              </p>
    <button type="button" id="closeDialog">Close</button>
  </form>
</dialog>

<!-- The Dialog -->
<dialog id="myMapDialog">
        <div id="to_center" class="container">
        <div class="img-overlay-wrap">
          <image src="images/arctic_map.png">
           <?php require 'arctic_regions.php';?>
        </div>
        <div class="myflex">
          <a href="?basin_number=0&<?php print"timeseries_type_to_show=$timeseries_type_to_show&param=$param&month=$month&year=$year&param=$param"?>">
          <button id="selectAllBtn">Select Whole Arctic</button></a>
          <p class="select_txt">
              Select an Arctic basin in the map to show its time-series</p>
          </div>
       </div>
</dialog>



<script>
  // Get references to the elements
  const openMapDialogLink = document.getElementById('map_btn');
  const myMapDialog = document.getElementById('myMapDialog');
  //const closeMapDialogButton = document.getElementById('closeDialog');

  // Add a click event listener to the link
  openMapDialogLink.addEventListener('click', (event) => {
    // Prevent the default link behavior (preventing page reload)
    event.preventDefault();
    // Show the dialog
    myMapDialog.showModal();
  });

  // Add a click event listener to the close button
  // closeMapDialogButton.addEventListener('click', () => {
  //   // Close the dialog
  //   myDialog.close();
  // });
</script>





<!-- =============================================================================================================
      Final Javascript
    ============================================================================================================= -->

	<!-- Support for bootstrap 4.6 -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<!-- Support for bootstrap popovers 

	<script>
		$(document).ready(function(){
  			$('[data-toggle="popover"]').popover();
		});
	</script> -->
</body>
</html>

