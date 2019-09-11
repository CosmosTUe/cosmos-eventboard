<!DOCTYPE html>
<html lang="en">
    <!-- Start Page Header -->
    <head>  
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/materialize.js"></script>  
		

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
                        $html .= "<tr>";

                            $html .= '<td  colspan="2" class="event_info_column_big">';
                            $html .=  '<h2 class="light grey-text text-lighten-3"><b>' . $main['name'] . '</b></h2>';
                            $html .=  '<h5 class="light grey-text text-lighten-3"><b>' . date('d-m-Y H:i', strtotime($main['start_time'])) . '</b></h5>';
                            $html .=    '<h5 class="light grey-text text-lighten-3">' . $main['description'] . '</h5>';
                            $html .= "</td>";

							$html .= '<td class="next_event_column no-top-border">';
								$html .=  '<h3 class="light grey-text text-lighten-3"><b>' . $secondary['name'] . '</b></h4>';
								$html .=  '<img id="secondary" src="' . $secondary['cover']['source'] . '" >';
							$html .= "</td>";
						$html .= "</tr>";

                        $html .= '<tr>';
                            $html .= '<td class="qr_code_column">';
                            $html .= "<div>";
                            $html .=  '<h5 style="font-size: 23px;" class = "light grey-text text-lighten-3" >Check it out on Facebook!</h5>';
                            $html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $main['id'] . '%2F&choe=UTF-8" >';
                            $html .= "</div>";
                            $html .= "</td>";

                            $html .= '<td class="event_info_column">';
                            $html .=  '<img id="main" src="' . $main['cover']['source'] . '" >';
                            $html .= "</td>";

							$html .= '<td class="next_event_column">';
								$html .=  '<h3 class="light grey-text text-lighten-3"><b>' . $third['name'] . '</b></h4>';
								$html .=  '<img id="third" src="' . $third['cover']['source'] . '" >';
							$html .= "</td>";
						$html .= "</tr>";	
                    $html .= "</table>";
					$html .= "</li>";
                    return $html;
                }
				function build_two_slide($main,$secondary){
                    $html = "";
                    $html .= "<li>";
                    //tries to get an url and convert it to an image
                    $content = file_get_contents('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8');
                    // It breaks with the new update. TODO: Find higher resolution cover
                    // $html .=  '<img src="' . $event['photos']['data'][0]['images'][0]['source'] . '">';
                    $html .= "<table>";
                    $html .= "<tr>";

                    $html .= '<td  colspan="2" class="event_info_column_big">';
                    $html .=  '<h2 class="light grey-text text-lighten-3"><b>' . $main['name'] . '</b></h2>';
                    $html .=  '<h5 class="light grey-text text-lighten-3"><b>' . date('d-m-Y H:i', strtotime($main['start_time'])) . '</b></h5>';
                    $html .=    '<h5 class="light grey-text text-lighten-3">' . $main['description'] . '</h5>';
                    $html .= "</td>";

                    $html .= '<td class="next_event_column no-top-border">';
                    $html .=  '<h3 class="light grey-text text-lighten-3"><b>' . $secondary['name'] . '</b></h4>';
                    $html .=  '<img id="secondary" src="' . $secondary['cover']['source'] . '" >';
                    $html .= "</td>";
                    $html .= "</tr>";

                    $html .= '<tr>';
                    $html .= '<td class="qr_code_column">';
                    $html .= "<div>";
                    $html .=  '<h5 style="font-size: 23px;" class = "light grey-text text-lighten-3" >Check it out on Facebook!</h5>';
                    $html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $main['id'] . '%2F&choe=UTF-8" >';
                    $html .= "</div>";
                    $html .= "</td>";

                    $html .= '<td class="event_info_column">';
                    $html .=  '<img id="main" src="' . $main['cover']['source'] . '" >';
                    $html .= "</td>";

                    $html .= '<td class="next_event_column no-top-border">';
                    $html .= "</td>";
                    $html .= "</tr>";
                    $html .= "</table>";
                    $html .= "</li>";
                    return $html;
                }
				function build_one_slide($main){
                    $html = "";
                    $html .= "<li>";
                    //tries to get an url and convert it to an image
                    $content = file_get_contents('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8');
                    // It breaks with the new update. TODO: Find higher resolution cover
                    // $html .=  '<img src="' . $event['photos']['data'][0]['images'][0]['source'] . '">';
                    $html .= "<table class='push-to-front'>";
                    $html .= "<tr>";

                    $html .= '<td  colspan="2" class="event_info_column_big">';
                    $html .=  '<h2 class="light grey-text text-lighten-3"><b>' . $main['name'] . '</b></h2>';
                    $html .=  '<h5 class="light grey-text text-lighten-3"><b>' . date('d-m-Y H:i', strtotime($main['start_time'])) . '</b></h5>';
                    $html .=    '<h5 class="light grey-text text-lighten-3">' . $main['description'] . '</h5>';
                    $html .= "</td>";

                    $html .= "</tr>";

                    $html .= '<tr>';
                    $html .= '<td class="qr_code_column">';
                    $html .= "<div>";
                    $html .=  '<h5 style="font-size: 23px;" class = "light grey-text text-lighten-3" >Check it out on Facebook!</h5>';
                    $html .=  '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.facebook.com/' . $main['id'] . '%2F&choe=UTF-8" >';
                    $html .= "</div>";
                    $html .= "</td>";

                    $html .= '<td class="event_info_column">';
                    $html .=  '<img id="main" src="' . $main['cover']['source'] . '" >';
                    $html .= "</td>";


                    $html .= "</tr>";
                    $html .= "</table>";
                    $html .= "</li>";
                    return $html;
                }
				function build_zero_slide(){
                    $html = "";
                    $html = "<div style='text-align:center; width:100%; margin-top:35vh'><p style='width:50%; margin:0 auto; font-size:24px;'>It looks like no upcoming events were found... Might as well turn off the monitor so people don't see this ugly message :) </p></div>";	
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
					#Retrieve higher resolution images
					$images_query = $event["cover"]["id"] . "?fields=images&access_token=";
					$images_url = $base . $version . $images_query . $access_token;
					$raw_images = file_get_contents($images_url);
					$images = json_decode($raw_images, true);
					$event['cover']['source'] = $images["images"][0]["source"];

					array_push($eventTrack,$event);
                } 

//                $eventCount = 1;

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
        <div class="progress"> <div class="determinate" style="width: 0%"></div>
     </div>

        <!-- Initalize slider plugin -->
        <script src="js/init_slider.js"></script>

    </body>
    <!-- End Body -->
</html>
