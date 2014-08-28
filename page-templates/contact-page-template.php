<?php
/**
 * Template Name: Contact Page
 * Description: Page template.
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<?php
global $NHP_Options;
$theme_options = $NHP_Options->options;
$lat = $theme_options['contact_map_lat'];
$lng = $theme_options['contact_map_lng'];
$zoom = $theme_options['contact_map_zoom'];
$pintitle = $theme_options['contact_map_pin_title'];
$pininfo = $theme_options['contact_map_pin_info'];
$pindirections = $theme_options['contact_map_directions'];
?>
<div id="themap" class="contactmap">                 
    <script>
        function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
          var myOptions = {
            zoom: <?php if (!empty($zoom)) { echo $zoom; } else { echo "14";}  ?>,
            center: myLatlng,
            scrollwheel: false,
            mapTypeControl: false,
            panControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                      {
                        "featureType": "landscape.natural",
                        "stylers": [
                          { "color": "#282828" }
                        ]
                      },{
                        "featureType": "landscape.man_made",
                        "stylers": [
                          { "color": "#141414" }
                        ]
                      },{
                        "featureType": "road",
                        "stylers": [
                          { "color": "#ffffff" },
                          { "weight": 0.1 }
                        ]
                      },{
                        "featureType": "administrative.locality",
                        "elementType": "labels",
                        "stylers": [
                          { "weight": 0.1 },
                          { "color": "#808080" },
                          { "visibility": "on" }
                        ]
                      },{
                        "featureType": "poi",
                        "stylers": [
                          { "visibility": "off" }
                        ]
                      },{
                        "featureType": "administrative.land_parcel",
                        "stylers": [
                          { "visibility": "on" },
                          { "weight": 0.5 },
                          { "color": "#3c3c3c" }
                        ]
                      },{
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                          { "visibility": "off" }
                        ]
                      },{
                        "featureType": "water",
                        "stylers": [
                          { "visibility": "simplified" }
                        ]
                      },{
                        "featureType": "transit",
                        "elementType": "labels",
                        "stylers": [
                          { "visibility": "off" }
                        ]
                      },{
                        "featureType": "water",
                        "stylers": [
                          { "color": "#eaeaea" }
                        ]
                      },{
                        "featureType": "administrative.country",
                        "stylers": [
                          { "visibility": "off" }
                        ]
                      },{
                          "featureType": "administrative.province",
                          "elementType": "labels",
                          "stylers": [
                            { "visibility": "off" }
                          ]
                        }
                    ],
          }
          var map = new google.maps.Map(document.getElementById("themap"), myOptions);
          /////////////
          var contentString = '<div id="content" class="map-popup">'+
                '<h1 id="firstHeading" class="firstHeading"><?php if (!empty ($pintitle)) { echo $pintitle; } else { bloginfo('name'); } ?></h1>'+
                '<div id="bodyContent">'+
                '<p><?php echo $pininfo; ?></p>'+
                '<p><a target="_blank" href="<?php echo $pindirections; ?>"> Click Here For Directions</a></p>'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
          /////////////
          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: '<?php bloginfo('name'); ?>'
          });
          google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
          });
        }
        jQuery(window).load(initialize);
    </script>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer("contact"); ?>