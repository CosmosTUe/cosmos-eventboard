<!DOCTYPE html>
<html lang="en">
    <!-- Start Page Header -->
    <head>  
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/materialize.js"></script>  
		
<style>

tr {
	height:100%;
	width:100%;
}
td {	
	height:600px;
    text-align:center;	
	background-color:black;
	border-radius:0px;
}
#two_e {
	height:200px;
    text-align:center;	
	background-color:black;
	border-radius:0px;
}
li {
	background-image: url("https://cosmostue.nl/static/assets/img/background.jpg");
}
#main {
	height:475px;
	width:825px;
}
#main_one {
	height:550px;
	width:900px;
}
#secondary {
	width:500px;
	height:300px;
}
#third {
	width:500px;
	height:300px;
}
div {
	width:250px;
	height:250px;
	margin-left: auto;
    margin-right: auto;
}

body {
	
}
</style>
    </head>
    <!-- End Page Header -->

    <!-- Start Body -->
   <body>
		
        <!-- Fullscreen Slider -->
        <div class="slider fullscreen">
            <ul class="slides" id="slides">

                <?php 

                include "token.php"; 

                function get_events($url){
                    $events = file_get_contents($url);
                    return $events;
                }

                function build_slide($main,$secondary,$third){
                    $html = "";
                    $html .= "<li>";
					//tries to get an url and convert it to an image
					$content = file_get_contents('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8');
                    // It breaks with the new update. TODO: Find higher resolution cover
                    // $html .=  '<img src="' . $event['photos']['data'][0]['images'][0]['source'] . '">';
					$html .= "<table>";
						$html .= '<tr>';
							$html .= '<td style="width:30%;background-color:#330000;border-bottom:4px solid black">';
								$html .=  '<h3 class="light grey-text text-lighten-3"><i><u>' . $secondary['name'] . '</u></i></h4>';
								$html .=  '<img id="secondary" src="' . $secondary['cover']['source'] . '" >';
							$html .= "</td>";
							
							$html .= '<td style="background-color:black;width:50%">';						
								$html .=  '<h2 class="light grey-text text-lighten-3"><i><u>' . $main['name'] . '</u></i></h2>';
								$html .=    '<h5 class="light grey-text text-lighten-3">' . $main['description'] . '</h5>';
							$html .= '<td style="background-color:black;width:300px">';
								$html .= "<div>";
								$html .=  '<h5 class = "light grey-text text-lighten-3" > You can visit the event here!</h5>';
								$html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $main['id'] . '%2F&choe=UTF-8" >';
								$html .= "</div>";
							$html .= "</td>";
						$html .= "</tr>";	
						$html .= "<tr>";			
							$html .= '<td style="background-color:#330000">';									
								$html .=  '<h3 class="light grey-text text-lighten-3"><i><u>' . $third['name'] . '</u></i></h4>';
								$html .=  '<img id="third" src="' . $third['cover']['source'] . '" >';
							$html .= "</td>";				
								$html .= '<td>';
									$html .=  '<img id="main" src="' . $main['cover']['source'] . '" >';					
							    $html .= "</td>";
								
								$html .= '<td style="background-color:black;width:30%">';
								$html .= "</td>";
						$html .= "</tr>";	
                    $html .= "</table>";
					$html .= "</li>";
                    return $html;
                }
				function build_two_slide($main,$secondary){
                    $html = "";
					$html .= "<li>";
                    // $html .=  '<img src="' . $event['photos']['data'][0]['images'][0]['source'] . '">';
					$html .= "<table>";
						$html .= '<tr>';
							$html .= '<td style="width:50%;background-color:black">';
								$html .=  '<h3 class="light grey-text text-lighten-3"><i><u>' . $main['name'] . '</u></i></h3>';
								$html .=  '<img id="main" src="' . $main['cover']['source'] . '" >';					
							$html .= "</td>";				
							$html .= '<td style="width:50%;background-color:black">';
								$html .=  '<h3 class="light grey-text text-lighten-3"><i><u>' . $secondary['name'] . '</u></i></h3>';
								$html .=  '<img id="main" src="' . $secondary['cover']['source'] . '" >';			
							$html .= "</td>";		
						$html .= "</tr>";
						$html .= '<tr>';
							$html .= '<td id="two_e" style="width:50%;background-color:black">';
								$html .=    '<h5 class="light grey-text text-lighten-3">' . $main['description'] . '</h5>';
							$html .= "</td>";
							
							$html .= '<td id="two_e" style="width:50%;background-color:black">';
								$html .=    '<h5 class="light grey-text text-lighten-3">' . $secondary['description'] . '</h5>';
							$html .= "</td>";		
						$html .= "</tr>";
						$html .= "<tr>";
								$html .= '<td id="two_e" style="background-color:black;width:300px">';
									$html .= "<div>";
									//$html .=  '<h5 class = "light grey-text text-lighten-3" > You can visit the event here!</h5>';
									$html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $main['id'] . '%2F&choe=UTF-8" >';
									$html .= "</div>";
							    $html .= "</td>";
								$html .= '<td id="two_e" style="background-color:black;width:300px">';
									$html .= "<div>";
									//$html .=  '<h5 class = "light grey-text text-lighten-3" > You can visit the event here!</h5>';
									$html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $secondary['id'] . '%2F&choe=UTF-8" >';
									$html .= "</div>";
							    $html .= "</td>";
						$html .= "</tr>";		
                    $html .= "</table>";
					$html .= "</li>";		
                    return $html;
                }
				function build_one_slide($main){
                    $html = "";
					$html .= "<li>";
                    // $html .=  '<img src="' . $event['photos']['data'][0]['images'][0]['source'] . '">';
					$html .= "<table>";
						$html .= '<tr>';
							$html .= '<td style="width:50%;background-color:black">';
								$html .=  '<h3 class="light grey-text text-lighten-3"><i><u>' . $main['name'] . '</u></i></h3>';
								$html .=  '<img id="main_one" src="' . $main['cover']['source'] . '" >';					
							$html .= "</td>";					
						$html .= "</tr>";
						$html .= '<tr>';
							$html .= '<td id="two_e" style="width:50%;background-color:black">';
								$html .=    '<h5 class="light grey-text text-lighten-3">' . $main['description'] . '</h5>';
							$html .= "</td>";		
						$html .= "</tr>";
						$html .= "<tr>";
								$html .= '<td id="two_e" style="background-color:black;width:300px">';
									$html .= "<div>";
									//$html .=  '<h5 class = "light grey-text text-lighten-3" > You can visit the event here!</h5>';
									$html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $main['id'] . '%2F&choe=UTF-8" >';
									$html .= "</div>";
							    $html .= "</td>";
						$html .= "</tr>";		
                    $html .= "</table>";
					$html .= "</li>";		
                    return $html;
                }
				function build_zero_slide(){
                    $html = "";
					$html .= "<li>";
					$html .= "</li>";		
                    return $html;
                }
				function get_number_of_events($events) {
					$eventCount = 0;
					foreach($events["events"]["data"] as $event) {
						$eventCount++;
					}
					return $eventCount;
				}
				
                $base = "https://graph.facebook.com/";
                $version = "v3.1/";
                # Facebook access token is stored in a separate file, ask the repo admins for it or include your own (and then modify the query as well)
                $query = "372136979547549/?fields=events.time_filter(upcoming){name,description,start_time,cover,photos{images}}&access_token=";
                $url = $base . $version . $query . $access_token;
                $html_out = '';
                $raw_events = get_events($url);
                $events = json_decode($raw_events, true);
				
				$eventCount = get_number_of_events($events);			
				$eventTrack = array(); 
				$counter = 0;
				
				
				foreach ($events["events"]["data"] as $event){
					// ?fields=images
					#Retrieve higher resolution images
					$images_query = $event["cover"]["id"] . "?fields=images&access_token=";
					$images_url = $base . $version . $images_query . $access_token;
					$raw_images = file_get_contents($images_url);
					$images = json_decode($raw_images, true);
					$event['cover']['source'] = $images["images"][0]["source"];


					array_push($eventTrack,$event);
                } 
				
				if($eventCount==0){
					$html_out .= build_zero_slide();
				} else if($eventCount==1) {
					$html_out .= build_one_slide($eventTrack[0]);
				} else if($eventCount==2) {
					$html_out .= build_two_slide($eventTrack[0],$eventTrack[1]);
				} else {
					for($i = 0; $i < $eventCount; $i++) { 	
						if($i==$eventCount-2) {
							$main = $eventTrack[$i];
							$secondary = $eventTrack[$i+1];
							$third = $eventTrack[0];
						} else if($i==$eventCount-1) {
							$main = $eventTrack[$i];
							$secondary = $eventTrack[0];
							$third = $eventTrack[1];
						} else {
							$main = $eventTrack[$i];
							$secondary = $eventTrack[$i+1];
							$third = $eventTrack[$i+2];
						}			
						$html_out .= build_slide($main,$secondary,$third);
					} 
				}	
				echo $html_out;
                ?>
				
            </ul>
        </div>
        <div class="progress">
         <div class="determinate" style="width: 0%"></div>
     </div>

        <!-- Initalize slider plugin -->
        <script src="js/init_slider.js"></script>

    </body>
    <!-- End Body -->
</html>
