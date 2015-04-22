<?php
use cordillera\base\Application;
use modules\examples\routes\models\Route;
use cordillera\helpers\Url;
use cordillera\helpers\Crypt;

/* @var \modules\examples\routes\models\Zone[] $zones */
/* @var \modules\examples\routes\models\Route[] $routes */
/* @var \cordillera\middlewares\View $this */
/* @var integer $id */

$this->layout->registerJsFile(
    '//maps.google.com/maps/api/js??key=AIzaSyC1TDjFx7XwbbG7tduhePPyvbSN6VXi9GY&sensor=false&libraries=places'
);
$this->layout->registerJsFile(Application::getRequest()->base_url.'media/modules/examples/routes/js/marker.js');
$this->layout->registerCssFile(Application::getRequest()->base_url.'media/modules/examples/routes/css/marker.css');
?>
<div class="row-offcanvas row-offcanvas-left">
    <div id="sidebar" class="sidebar-offcanvas">
        <div class="col-md-12">
            <ul class="list-group">
                <?php
                foreach ($zones as $zone) {
                    echo "\n<li class=\"zone list-group-item\" id=\"zone_{$zone->id}\">{$zone->name}</li>";
                    echo "\n<ul class=\"list-group\">";

                    $routes = Route::findAll([
                        'condition' => 'T.zone_id = :zone_id',
                        'select' => 'T.id,T.`code`,T.`name`,T.zone_id',
                        'params' => [':zone_id' => $zone->id],
                    ]);

                    foreach ($routes as $route) {
                        echo "\n<li id=\"route_{$route->id}\" class=\"route list-group-item".
                            ($id == $route->id ? ' active' : '')."\" data-id=\"{$route->id}\">".
                            "<a href=\"".Url::relative('examples/routes/index', ['id' => $route->id]).
                            "\">{$route->name}</a></li>";
                    }
                    echo "\n</ul>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div id="map"></div>
</div>
<script type="text/javascript">
    //Marker.source_url = '<?php echo Url::relative('examples/routes/get')?>'; // If request method is POST
    Marker.source_url = '<?php echo Url::relative('examples/routes/get', ['id' => $id])?>';// If request method is GET
    Marker.csrf_id = '<?php echo Crypt::requestVar(Application::getRequest()->csrf_id);?>';// If request method is POST
    Marker.csrf_value = '<?php echo Application::getRequest()->csrf_value;?>';// If request method is POST
    Marker.init(<?php echo (int) $id;?>);
</script>
