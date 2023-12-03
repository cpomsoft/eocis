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

  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <?php include 'php_initialize.php';?>

  
</head>
<body class="">

  
<div class=" p-4 ">
    <div class="row">  
         <div class="col">
          <a href="http://eocis.org"><image src="images/cropped-EOCIS-Logo-Final.png" alt="EOCIS logo" width="200px" ></a>
         </div>
         <div class="col">
          <h3 class="text-center">Sea Ice <br>Thickness, Volume and Mass Data</h3>
         </div>
    </div>
</div>

<div class="bg-dark p-1 text-light">
  <div class="row">
    <div class="col text-start">
      <p class="m-1">
        <a href="http://www.cpom.ucl.ac.uk/eocis/seaice">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg></a>&nbsp;/&nbsp;Download Information

      </p>
    </div>
    <div class="col text-end">
      <p class="m-1">EOCIS Sea Ice products will be available Dec 2023.</p>
    </div>
  </div>
</div>




<div class=" bg-light">
  <div class="container pt-4 pb-4">
    <div class="row">  
        <h1>Download Information</h1>
        <p>This section provides information on how to manually or automatically download 
            EOCIS Monthly Arctic Sea Ice products from their URL.</p>
       <h2>Download Individual Months</h2>
        <p>To download the EOCIS Sea Ice Arctic monthly gridded mean thickness for a specific month
            using the you can use the following URL. Substitute the actual year
            and month for <b>YYYYMM</b>.
        <p>http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-<b>YYYYMM</b>-fv1.0.nc</p>
        <p>Example: To download the product for January 2016: </p>
        <p>http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-<b>201601</b>-fv1.0.nc</p>
        <h2>Download All Months</h2>
        <p>You can download all available months as a single zip file using the URL:</p>
        <p>http://www.cpom.ucl.ac.uk/eocis/seaice/data/EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-<b>ALL</b>-fv1.0.zip</p>
        <p>This will unzip to include each separate monthly file since Nov 2010.</p>
        <h2>Tools for Automatic or Manual Downloads</h2>
        <p>There are many different ways to download data from URLs. 
            Some suggested tools are <b>wget</b> and <b>curl</b>.
    </div>
  </div>
</div>


</body>
</html>

