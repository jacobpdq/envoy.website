<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>
      <?php echo __('ENVOY'); ?>
      |
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>

    <?= $this->Html->css('cake.css') ?>
    
    <?= $this->Html->css('main') ?>

    <?= $this->Html->css('layout_agent') ?>

    <?= $this->Html->css('layout_supplier') ?>

    <?= $this->Html->css('layout') ?>

    <?= $this->Html->css('typography') ?>

    <?= $this->Html->css('navbar') ?>

    <?= $this->Html->css('common') ?>

    <?= $this->Html->css('col_grid') ?>

    <?= $this->Html->css('advanced_search') ?>

    <?= $this->Html->css('new_btn') ?>

    <?= $this->Html->css('jquery.jscrollpane') ?>

    <?= $this->Html->css('jquery.jscrollpane.lozenge') ?>

    <?= $this->Html->css('jquery.fancybox-1.3.4') ?>

    <?= $this->Html->css('jquery.bxslider.css') ?>

    <?= $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js') ?>

    <?= $this->Html->script('jquery.ui-1.8.11.min.js') ?>

    <?= $this->Html->script('jquery.mousewheel-3.0.4.pack.js') ?>

    <?= $this->Html->script('jquery.fancybox-1.3.4.pack.js') ?>

    <?= $this->Html->script('jquery.easing-1.3.pack.js') ?>

    <?= $this->Html->script('jquery.jscrollpane.min.js') ?>

    <?= $this->Html->script('jquery.bxslider.min.js') ?>


    <?= $this->Html->script('jquery.validate.min.js') ?>

    <?= $this->Html->script('jquery.autotab-1.1b.js') ?>

    <?= $this->Html->script('main.js') ?> 


    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>

    <?php echo $sso_session_check; ?>
</head>
<body class="<?php echo $this->request->session()->read('language'); ?>">
<script type="text/javascript">
  if (/language/.test(window.location.href)) {
  window.location = document.referrer;
}
</script>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

        <script type="text/javascript" language="javascript">
        $(".iframe-link").fancybox({
        'width'       : '45%',
        'height'      : '70%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'
      });
        $('.bxslider').bxSlider({ 
        auto: true,
        autoControls: true,
        mode: 'fade'});
</script>


<!-- Google Code for Long List -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 955485625;
var google_conversion_label = "XU3ZCL3ZtlgQuZvOxwM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/955485625/?value=1.00&amp;currency_code=CAD&amp;label=XU3ZCL3ZtlgQuZvOxwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>
