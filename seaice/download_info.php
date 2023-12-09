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
        <a class="nav-link"  href="product_info.php">Product Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="download_info.php">Download Info</a>
      </li>
      
    </ul>
  </div>
</nav>

<div class=" bg-light">
  <div class="container pt-4 pb-4">
    <div class="row">  
        <h1>Download Information</h1>
        <p>This section provides information on how to manually or automatically download 
            EOCIS Arctic Sea Ice products.</p>
        <p>Note that you can also download products by clicking the download icon 
        [<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>]
        in the product
          view panels on the product <a href="http://www.cpom.ucl.ac.uk/eocis/seaice">home page</a>.</p>
        <h2>Download Individual Sea Ice Thickness Monthly Gridded Products</h2>
          <p>To download the EOCIS Sea Ice Arctic monthly gridded mean thickness for a specific month
              using the you can use the following URL. Substitute the actual year
              and month for <b>YYYYMM</b>.
          <p><code>http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-<b>YYYYMM</b>-fv1.0.nc</code></p>
          <p>Example: To download the product for January 2016, the URL would be: </p>
          <p><code><a href="http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-201601-fv1.0.nc">
            http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-<b>201601</b>-fv1.0.nc</code>
            </a></p>
        <h2>Download All Months of Gridded Products</h2>
          <p>You can download all available months as a single zip file using the URL:</p>
          <p><code><a href="http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-ALL-fv1.0.zip">
            http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-<b>ALL</b>-fv1.0.zip</code>
            </a></p>
          <p>This will unzip to include each separate monthly file since Nov 2010.</p>
        <h2>Download Latest Time-series Product</h2>
        <p>The latest time-series product can be downloaded from the URL directory:</p>
        <p><code>http://www.cpom.ucl.ac.uk/eocis/seaice/timeseries_data/cs2/arco/latest </code></p>
        <p>Using the wget tool, the syntax to download the latest timeseries would be:</p>
        <p><code>wget -r -nd --no-parent -A 'EOCIS*.nc' 
          http://www.cpom.ucl.ac.uk/eocis/seaice/timeseries_data/cs2/arco/latest/</code></p>

        <h2>Tools for Automatic or Manual Downloads</h2>
          <p>There are many different ways to download data from URLs. 
              Some suggested tools are <b>wget</b> and <b>curl</b>.
    </div>
  </div>
</div>


</body>
</html>

