<!DOCTYPE html>
<html lang="en">
<head>
  <title>EOCIS Sea Ice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css"></script>

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <?php include 'php_initialize.php';?>

  
</head>
<body class="">

  
<div class=" p-4 ">
    <div class="row">  
         <div class="col-md-3 col-sm-3">
          <a href="http://eocis.org"><image id="eocis_img" src="images/cropped-EOCIS-Logo-Final.png" alt="EOCIS logo"  ></a>
         </div>
         <div id="title_div" class="col-md-7  col-sm-9">
          <h3 class="text-center fs-2">Arctic Sea Ice Thickness, and Volume Data</h3>
         </div>
         <div class="col-md-2  d-none d-md-block d-lg-block text-center">
          <div class="cpom_img_wrapper">
          <p class="cpom_img_txt">processed by:</p>
          <a href="http://cpom.org.uk"><image class="cpom_img" src="images/cpom_white.png" alt="CPOM" ></a>
          </div>
         </div>
    </div>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="http://www.cpom.ucl.ac.uk/eocis/seaice"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Product Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="download_info.php">Download Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="docs.php">Documents</a>
      </li>
      
    </ul>
  </div>
</nav>

<!-- -------------------------------------------------------------------------------------------------------
     Main Content
------------------------------------------------------------------------------------------------------- -->

<div class=" bg-light">
  <div class="container pt-4 pb-4">
    <div class="row">  
    <h2>Arctic Sea Ice Product Information</h2>

    <p>EOCIS Artic Sea Ice products consist of 2 types of product, one gridded, one time-series (both in NetCDF4 format):</p>
    
    <!-- --------------------------------------------------------------------------------------------- -->
    <h3>Products Summary</h3>
    <table class="table table-striped table-bordered" width="90%">
      <tr><th>Product</th><th>Source Instrument/Data</th><th>Individual Product Period</th><th>Period of All Products</th><th>Seasons Covered</th><th>Latency</th><th>Type</th><th>Projection</th><th>Format</th></tr>
      <tr><td>Arctic Sea Ice Thickness Grids</td><td>CryoSat-2<br>L1b Baseline-E</td><td>1 Month</td><td>Nov-2010 until present</td><td>Winter(Oct-Apr)</td><td>-2 months</td><td>Grid (5km)</td><td>EPSG:3413</td><td>NetCDF4</td></tr>
      <tr><td>Arctic Sea Ice Thickness & Volume Time-series</td><td>CryoSat-2<br>L1b Baseline-E</td><td>Nov-2010 until present</td><td>Nov-2010 until present</td><td>Winter(Oct-Apr)</td><td>-2 months</td><td>Monthly Time series</td><td></td><td>NetCDF4</td></tr>
    </table>
    <p>Note that Sea Ice Mass products will be added at a later date in 2024.</p>
    <!-- --------------------------------------------------------------------------------------------- -->
    <h3>Arctic Sea Ice Thickness Grids</h3>
    <div class="myflex">
        <div class="prod_txt">
            <p>This is a monthly netcdf product containing a 5km grid 
                (on a polar stereographic projection defined by EPSG:3413) of mean sea ice 
                thickness value in each grid cell. Sea ice thickness is calculated using measurements from 
                ESA's CryoSat-2 satellite's radar altimeter using the method described in 
                <a href="https://doi.org/10.1016/j.asr.2017.10.051">Tilling et al, 2018</a>.
                It also contains additional variables 
                such as uncertainty and number of contributing measurements.</p>
            <p>Products are available approximately 40 days after acquisition of measurements from CryoSat-2 to allow for 
        processing and availability of the required final orbit and auxiliary data.</p>
             <p>Products only include measurements from the Arctic winter season (Oct-Apr). 
            This is because during summer months, melt ponds form on the sea ice, making 
            it more difficult for CryoSat-2's radar to distinguish between sea ice floes 
            and leads, and hence reliably measure sea ice freeboard (and subsequently determine 
            thickness and volume). New techniques are being developed to measure summer sea ice from CryoSat-2, 
            but these are not yet ready for operational use.
            </p>
            <p>Example product name: EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-202304-fv1.0.nc </p>
        </div>
        <image src="images/thickness_map_example.png" style="width: 406px; height:345px; margin-left: 10px;">

    </div> <!-- myflex -->

    <!-- --------------------------------------------------------------------------------------------- -->
    <h3>Arctic Sea Ice Thickness & Volume Time-series</h3>
    <div class="myflex">
        <div class="prod_txt">
    <p>This is a netcdf file containing a monthly time-series of mean sea ice thickness and volume. 
        The time-series covers the full period of the CryoSat-2 mission (Nov 2010 until present).</p>
    <p> A new product is produced each Arctic winter month (Oct-Apr) containing the updated timeseries.</p>
    <p>The product contains the timeseries of sea ice thickness and volume for the whole Arctic area as well as for 17 
        sub-basins as shown. The sub-basin names related to each time-series are provided in the netcdf file.</p>
        <p class="pt-2">Example product name: EOCIS-SEAICE-TIMESERIES-THICKVOL-CS2-ARCTIC-201011_202310-fv1.0.nc </p>
</div>
        <image src="images/arctic_basins.png" style=" margin-left: 10px;" >
</div>
    

    <h3>Sea Ice Thickness Processing References</h3>
    <ul>
    
<li>Estimating Arctic sea ice thickness and volume using CryoSat-2 radar altimeter data, Tiling.R, Ridout.A, Shepherd.A, ASR, Sept 2018
Cryosat-2 estimates of Arctic sea ice thickness and volume, Laxon,S et al, GRL, 2013, <a href="https://doi.org/10.1016/j.asr.2017.10.051">doi.org/10.1016/j.asr.2017.10.051</a></li>
</ul>
<h3>References for Auxillary Data used in Processing Sea Ice Thickness</h3>
<ul>
<li>
Warren, S.G., Rigor, I.G., Untersteiner, N., Radionov, V.F., Bryazgin, N. N., Aleksandrov, Y.I., Colony, R., 1999. Snow depth on Arctic sea ice. J. Clim. 12 (6), 1814–1829.
</li>
<li>
Andersen, S., Breivik, L.-A., Eastwood, S., Godøy, Ø., Lavergne, T., Lind, M., Porcires, M., Schyberg, 
H., Tonboe, R., 2012. Ocean and Sea Ice SAF, Sea Ice Product Manual, version 3.8, 
OSI SAF document no. SAF/OSI/met.no/TEC/MA/125. Darmstadt, Germany: EUMETSAT</li>
<li>
Cavalieri, D.J., Parkinson, C.L., Gloersen, P., Zwally, H.J., 1996, 
updated yearly. Sea ice concentrations from Nimbus-7 SMMR and DMSP SSM/I-SSMIS 
passive microwave data [concentration]. Boulder, Colorado, USA: NASA DAAC at the 
National Snow and Ice Data Center.</li>
</ul>

    </div>
  </div>
</div>


</body>
</html>

