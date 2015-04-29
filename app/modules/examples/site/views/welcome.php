<?php

/* @var \cordillera\middlewares\View $this */

?>
<div class="container">
    <div class="jumbotron">
        <h1>Welcome</h1>

        <p>Example applications powered by Cordillera framework</p>
    </div>
</div>
<?php
/*
echo \cordillera\widgets\Grid::widget([
    'data_provider' => new \cordillera\middlewares\db\DataProvider([
        'data_source' => new \modules\examples\contacts\models\Contact()
    ])
])->render()
*/
/*
echo \cordillera\widgets\Grid::widget([
    'data_provider' => new \cordillera\middlewares\db\DataProvider([
        'data_source' => new \cordillera\middlewares\db\Query()
    ]),
    'renderer' => function (\cordillera\widgets\Grid $widget) {
        return "Hola-->" . $widget->renderPagination() .
        $widget->renderHeaders() . $widget->renderSummaries() .
        $widget->renderBody();
    }
])->render();
*/
?>
