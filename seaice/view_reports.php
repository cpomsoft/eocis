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
        <a class="nav-link" href="download_info.php">Download Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="view_reports.php">View reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="docs.php">Documents</a>
      </li>
      
    </ul>
  </div>
</nav>

<div class=" bg-light">
  <div class="container pt-4 pb-4">
    <div class="row">  
        <h3>View Reports</h3>
        <div class="report-selection" style="display: flex; align-items: center;">
      <p style="margin-right: 10px;">Select a report:</p>
      <select id="reportSelect" onchange="updateReport()" class="report-dropdown">
          <option value="reports/Q4_2023_ASW.pdf">Q4 2023</option>
          <option value="reports/Q1_2023_ASW.pdf">Q1 2023</option>
      </select>
    </div>
        <p>
        <object id="reportObject" data="reports/Q4_2023_ASW.pdf" type="application/pdf" width="100%" height="600">
        <p>It appears you don't have a PDF plugin for this browser.
           You can <a href="" id="pdfDownloadLink">download the PDF file.</a>
        </p>
    </div>
  </div>
</div>
<script>
function updateReport() {
    var selectedReport = document.getElementById('reportSelect').value;
    document.getElementById('reportObject').data = selectedReport;
    document.getElementById('pdfDownloadLink').href = selectedReport;
}
</script>

</body>
</html>

