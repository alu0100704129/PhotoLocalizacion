<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once ("../cabecera.php");
?>
            <ul class="nav">
              <li><a href="<?php ruta_raiz();?>/index.php">Inicio</a></li>
              <?php
                session_start();
                if ($_SESSION["k_username"] != null) {
              ?>
              <li><a href="<?php ruta_raiz();?>/imagenes/imagenes.php">Imagenes</a></li>
              <li class="active"><a href="<?php echo "";?>">Mapa</a></li>
              <?php
                }
              ?>
            </ul>
<?php  
    require_once ("../menuderecha.php");
    require_once ("../bbdd/bbdd.php");
    $nombre = $_GET['nombre'];
    $row = seleccionarll($nombre);
    $longitud = $row[0];
    $latitud = $row[1];
?>

<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 50px; padding: 0px }
  #map_canvas { height: 60% }
</style>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript">
  function initialize(){
    var lon = '<?php echo $longitud;?>'
    var lat = '<?php echo $latitud;?>'
    var nom = '<?php echo $nombre;?>'
    var latlng = new google.maps.LatLng(lat, lon);
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);

    var marcador = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lon),
        map: map,
        title: nom,
        animation: google.maps.Animation.BOUNCE
    });

    var infowindow = new google.maps.InfoWindow({
      content: ""
    });
    google.maps.event.addListener(marcador, 'click', function(){
      infowindow.open(map,marcador);
    });
  }

  window.onload=initialize;
</script>
    <div class="hero-unit" id="map_canvas"></div>

<?php
    require_once("../pie.php");
?>