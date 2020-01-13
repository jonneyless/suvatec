<?php

/* @var $this yii\web\View */
/* @var $starProducts \home\models\Product[] */

$this->title = 'HONGKONG SI-PRESS ELECTRONICS CO.,LIMITED - China Sourcing Agent, China Sourcing Agent, Electronics Manufacturer, Product Sourcing';

use home\models\Page;
use home\models\Service;
use yii\helpers\Url;

$this->registerMetaTag(['name' => 'keywords', 'content' => 'China Sourcing Agent, China Sourcing Agent, Electronics Manufacturer, Product Sourcing']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Suvatec also can help you source and customize electronic products. Strong supply chain like Xiaomi is also our advantage. china sourcing agent.']);

?>

    <div class="slide-box">

    </div>

    <div class="about-us box">
        <h1 class="box-header">
            About Us
        </h1>

        <div class="box-body">
            <div class="container">
                <div class="clearfix">
                    <div class="left-item">
                        <div class="image"></div>
                    </div>

                    <div class="right-item">
                        <div class="text">
                        <h3>About Suvatec</h3>
                        <?php $aboutUs = Page::findOne(1); ?>
                        <p><?= $aboutUs->showSummery() ?></p>
                        <a href="<?= $aboutUs->getViewUrl() ?>" class="more">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service box">
        <h1 class="box-header">
            Sourcing and Supply Chain Management Service
        </h1>

        <div class="box-body">
            <div class="container">
                <div class="icons">
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                    <div class="icon<?= $i ?>">
                        <a href="<?= Service::findOne($i)->getViewUrl() ?>"></a>
                    </div>
                <?php } ?>
                </div>
                Suvatec team has been in electronic industry since 2008, beginning with PCB manufacturing, assembling, then following the market needs and make the best out of our capability, to electronic turn key projects management.
                With the great advantage of Supply China in China Pearl River Delta(China electronic manufacturing base), we provide professional Sourcing and Supply Chain Management Service. Our experience in the industry, professional skills and great resouces here could be your shortcut to mature technology and product.In the mean time, save your investment and hassle of coordinating among different suppliers.
            </div>
        </div>
    </div>

    <div class="oem box">
        <div class="container">
            <h1 class="box-header">
                OEM / Sourcing Service
            </h1>

            <div class="box-body">
                Build a product from scratch takes time and funds, thus we provide certain model ready products available with customized logo and color,more than that, we provide sourcing service according to your special needs in electronics.
            </div>
        </div>
    </div>

    <div class="box">
        <h1 class="box-header">
            Star Product
        </h1>

        <div class="box-body">
            <div class="container">
                <div class="column-list">
                    <?php foreach ($starProducts as $product) { ?>
                <div class="column-flex-1">
                    <a href="<?= $product->getViewUrl() ?>">
                        <img src="<?= $product->getPreview(368, 368, false) ?>"/>
                    </a>
                    <p><?= $product->name ?></p>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <h1 class="box-header">
            Our Clients
        </h1>

        <div class="box-body">
            <div class="container">
                <div class="our-clients">
                    <a href="javascript:;" class="client-item client-item-1"></a>
                    <a href="javascript:;" class="client-item client-item-2"></a>
                    <a href="javascript:;" class="client-item client-item-3"></a>
                    <a href="javascript:;" class="client-item client-item-4"></a>
                    <a href="javascript:;" class="client-item client-item-5"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="contect box">
        <h1 class="box-header">
            Wanna Build a Product?
        </h1>

        <div class="box-body">
            <div class="container">
                <div class="col-lg-10 col-lg-offset-1">
                    <p>
                        Consumer electronics always growing, iterating. We always like the uniqe, crative, fun product. It's our pleasure to find them and bring to you.<br/>
                        We are your trustworth partner here in China, do share your thoughts with us!
                    </p>
                    <p>&nbsp;</p>

                    <form>
                        <div class="form-group form-group-lg">
                            <input type="text" class="form-control" name="name" placeholder="Full Name (require)"/>
                        </div>

                        <div class="form-group form-group-lg">
                            <input type="text" class="form-control" name="email" placeholder="Email Address (require)"/>
                        </div>

                        <div class="form-group form-group-lg">
                            <textarea class="form-control" name="message" placeholder="Message (require)" rows="6"></textarea>
                        </div>

                        <div class="form-group  form-group-lg text-center">
                            <button id="send" class="btn btn-lg btn-primary"> &nbsp; Send Message &nbsp;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

$sendUrl = Url::to(['site/contact']);
$js = <<<JS

    $('#send').click(function(){
      var form = $(this).closest('form');
      
      $.post('$sendUrl', form.serialize(), function(data) {
        if (data.error == 0) {
          form.reset();
        }
        alert(data.msg);
      }, 'json');
      
      return false;
    })

JS;

$this->registerJs($js);
