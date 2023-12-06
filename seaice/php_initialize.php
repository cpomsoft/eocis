<?php

    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags)
        {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

        // ---------------------------------------------------------------------------
        // PHP initialisation section
        // ---------------------------------------------------------------------------

        date_default_timezone_set("Europe/London");

        // ----------------------------------------------------------------------------
        //    show_volume  (to choose to display volume or thickness)
        //    Allowed values: 0,1
        // ----------------------------------------------------------------------------
        $area='arctic';
        
        $all_show_volume=array(0,1);

        if(isset($_POST['show_volume'])) {
            $show_volume=$_POST['show_volume'];
        } else {
            if(isset($_GET['show_volume'])) {
                $show_volume=$_GET['show_volume'];
            } else $show_volume=1;
        }

         if (!in_array($show_volume,$all_show_volume)) {
            $show_volume=1;
        }

        
        if(isset($_POST['expand_thick_image'])) {
            $expand_thick_image=$_POST['expand_thick_image'];
        } else {
            if(isset($_GET['expand_thick_image'])) {
                $expand_thick_image=$_GET['expand_thick_image'];
            } else {
                $expand_thick_image=0;
            }
        }
        if (!is_numeric($expand_thick_image)) {
            $expand_thick_image= 0;
        }

        if(isset($_POST['expand_ts1'])) {
            $expand_ts1=$_POST['expand_ts1'];
        } else {
            if(isset($_GET['expand_ts1'])) {
                $expand_ts1=$_GET['expand_ts1'];
            } else {
                $expand_ts1=0;
            }
        }
        if (!is_numeric($expand_ts1)) {
            $expand_ts1= 0;
        }

        if(isset($_POST['expand_ts2'])) {
            $expand_ts2=$_POST['expand_ts2'];
        } else {
            if(isset($_GET['expand_ts2'])) {
                $expand_ts2=$_GET['expand_ts2'];
            } else {
                $expand_ts2=0;
            }
        }
        if (!is_numeric($expand_ts2)) {
            $expand_ts2= 0;
        }

        if(isset($_POST['expand_report_div'])) {
            $expand_report_div=$_POST['expand_report_div'];
        } else {
            if(isset($_GET['expand_report_div'])) {
                $expand_report_div=$_GET['expand_report_div'];
            } else {
                $expand_report_div=0;
            }
        }
        if (!is_numeric($expand_report_div)) {
            $expand_report_div= 0;
        }

        // get the parameter value or set default for theme
        $all_params = array("sea_ice_thickness","sea_ice_thickness_uncertainty","n_thickness_measurements") ;
        if(isset($_POST['param'])) {
            $param=$_POST['param'];
        } else {
            if(isset($_GET['param'])) {
                $param=$_GET['param'];
            } else {
                $param='sea_ice_thickness';
            }
        }
        if (!in_array($param,$all_params)) {
            $param=$all_params[0];
        }


        $directory = 'data/';

        // Step 1: Get the list of files in the directory
        $files = scandir($directory);

        // Step 2: Filter files with the specified format using a regular expression
        $pattern = '/^EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-(\d{6})-fv1.0\.nc$/';

        $filteredFiles = preg_grep($pattern, $files);

        // Step 3: Find the latest product by comparing the date parts
        $latestDate = 0;
        $latestProduct = '';

        foreach ($filteredFiles as $file) {
            preg_match($pattern, $file, $matches);
            $currentDate = $matches[1];

            if ($currentDate > $latestDate) {
                $latestDate = $currentDate;
                $latestProduct = $file;
            }
        }
        // Step 4: Extract the year and month from the latest product filename
        preg_match('/(\d{4})(\d{2})/', $latestDate, $dateMatches);
        $last_year = $dateMatches[1];
        $last_month = $dateMatches[2];

        
        // get the parameter value or set default for theme
        if(isset($_POST['month'])) {
            $month=$_POST['month'];
        } else {
            if(isset($_GET['month'])) {
                $month=$_GET['month'];
            } else {
                $month=$last_month;
            }
        }

        // get the parameter value or set default for theme
        if(isset($_POST['year'])) {
            $year=$_POST['year'];
        } else {
            if(isset($_GET['year'])) {
                $year=$_GET['year'];
            } else {
                $year=$last_year;
            }
        }

        $first_year=2010;
        $first_month=12;

        if ($year < $first_year) $year = $first_year;
        if ($year == $first_year && $month <= $first_month) $month=$first_month;

        if ($year > $last_year) $year = $last_year;
        if ($year == $last_year && $month > $last_month) $month=$last_month;

        // Form the product
        $productFile = "EOCIS-SEAICE-L3C-SITHICK-CS2-5KM-$year" . sprintf("%02d", $month) . '-fv1.0.nc';
        // Step 5: Derive the quicklook image filename from the latest product filename
        $quicklookImage = str_replace('.nc', ".$param.ql.png", $productFile);

        // Set previous year number
        $prev_year = $year -1;
        if ($prev_year < $first_year) $prev_year = $first_year;

        // Set next year number
        $next_year = $year +1;
        if ($next_year > $last_year) $next_year = $last_year;

        // Set previous month number
        $prev_month = $month -1;
        if ($prev_month < 1) $prev_month = 12;
        if ($prev_month == 9) $prev_month = 4;

        // Set next month number
        $next_month = $month +1;
        if ($next_month > 12) $next_month = 1;
        if ($next_month == 5) $next_month = 10;

        $months_str=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

        $month_str = $months_str[$month -1];

        $all_months=array(1,2,3,4,0,10,11,12);
        $months_str=array('Jan', 'Feb', 'Mar', 'Apr','-' ,'Oct','Nov','Dec');

        // ----------------------------------------------------------------------------
        //    Select basin_number to show (must be numeric 0-17)
        // ----------------------------------------------------------------------------

        if(isset($_POST['basin_number'])) {
            $basin_number=$_POST['basin_number'];
        } else {
            if(isset($_GET['basin_number'])) {
                $basin_number=$_GET['basin_number'];
            } else $basin_number=0;
        }

        if (! is_numeric($basin_number) ) $basin_number = 0;

        if ($area == 'arctic') {
            
            $basin_names=array('Arctic',
            'Amerasian Basin',
            'Eurasian Basin',
            'Canadian Archipelago',
            'Hudson & Foxe Bays',
            'Bafin Bay',
            'Greenland Sea',
            'Iceland Sea',
            'Norwegian Sea',
            'Barents Sea',
            'White Sea',
            'Kara Sea',
            'Siberian Shelf Seas',
            'Bering Sea',
            'Sea of Okhotsk',
            'Baltic Sea & Gulfs',
            'Gulf of St Lawrence & Nova Scotia Peninsular',
            'Labrador Sea');


        } else {

            $basin_names=array('Antarctic Ocean',
            'Ross Sector',
            'Pacific Ocean Sector',
            'Indian Ocean Sector',
            'East Weddell',
            'West Weddell',
            'Amundsen-Bellingshausen Coastal Zone',
            'Amundsen-Bellingshausen Ocean Zone');

        }
        if ($basin_number > (count($basin_names)-1)) $basin_number=0;
        if ($basin_number < 0) $basin_number=0;

        
       $basin_name = $basin_names[$basin_number];

        // Check if the timeseries file exists
        $mission='cs2';
        $farea='arco';
        // $ts_file="timeseries_data/$mission/$farea/timeseries_".$basin_number."_thickness.csv";
        // $ts_exists=file_exists($ts_file);

        $first_plot_year=$last_year-2;
        $first_plot_month=$last_month;
        $last_plot_year=$last_year;
        $last_plot_month=$last_month;

        console_log("first_plot_month=$first_plot_month");
        console_log("last_plot_month=$last_plot_month");
        console_log("first_plot_year=$first_plot_year");
        console_log("last_plot_year=$last_plot_year");

        $zoom=0;
        $show_regions=1;

?>