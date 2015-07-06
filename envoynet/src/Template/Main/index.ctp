<!-- Top Navigation Bar -->
  <header id="top-header">


    
    <nav >
      <ul id="login">
        <li>LOGIN</li>
        <li><a href="#">TRAVEL AGENT<a></li>
        <li><a href="#">SUPPLIER</a></li>
      </ul>



      <ul class="desktop">
        <li class="gray-text">1800 IRON STONE MANOR, PICKERING, ON L1W 3J9</li>
        <li class="gray-text"><u><a href="tel:9058310006">(905)831-0006</a></u></li>
        <li class="white-text"><u><a href="mailto:INFO@ENVOYNETWORKS.CA"></u>INFO@ENVOYNETWORKS.CA</a></li>
      </ul>
    </nav>

    
  </header>








<div id="wrapper">
  <input id="toggle" type="checkbox">

  <div class="content "> 
      
      <header id="main-header" class="section__content " >
      
      <?php echo $this->Html->image('assets/envoy-logo.svg', array( 'id'=>'logo'));?> 
          
          <label for="toggle"> <?php echo $this->Html->image('assets/menu-button.png', array( 'id'=>'menu-button'));?> </label>

      
        <nav class="menu">
          <ul>
            <li><a href="#">Services</a>
              <ul>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'logistics','prefix'=>'agent')); ?>">Logistics</a></li> 
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'digital','prefix'=>'agent')) ?>">Digital support</a></li> 
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing','prefix'=>'agent')) ?>">Marketing solutions</a></li> 
              </ul>

            </li>
            <li><a href="#">About Us</a>
              <ul>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview','prefix'=>'agent')); ?>">Overview</a></li>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'meettheteam','prefix'=>'agent')); ?>">Meet the Team</a></li>
              </ul>
            </li>
            <li>  <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix'=>'agent')); ?>">Contact Us</a> 
   </li>
            </ul>
        </nav>

      </header>

            <section id="masthead" class="section__content desktop">

                <section class="tabs">
                    
                   <div class="tabs__tabItem">
                       <input type="radio" id="tab-1" name="tab-group-1" checked>
                       <label for="tab-1">TRAVEL AGENT</label>
                       
                <div class="tabs__content">


          <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>

          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>"Username")) ?>

          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>"Password")) ?>


          <button class="button" type="submit">Login</button>
          <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    
                    <div class="tabs__tabItem">

                       <input type="radio" id="tab-3" name="tab-group-1">
                       <label for="tab-3">SUPPLIER</label>
                     
                       <div class="tabs__content">


                        <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>

                        <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text', 'placeholder'=>"Username")) ?>

                        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'placeholder'=>"Password")) ?>

                        <button class="button" type="submit">Login</button>

                         <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    
                </section>


              <div class="section__content">
                <h2>
                  Serving the Travel <br/>and Tourism Industry<br/> for over 15 years.
                </h2>
                  <br/>
                  <button class=" button button--green">
                  <a href="#">
                    <span class="desktop">BECOME A PART OF THE NETWORK</span>
                    <span class="mobile">JOIN OUR NETWORK</span>
                  </a>
                </button>

              </div>

            </section>
          


          <section class="box box__blue overview">
            
             <?php echo $this->Html->image('assets/mastheadBgVans.png');?> 
              
              <div class="section__content ">
                <p>
                  Envoy is a distribution and fulfillment company that specializes in providing the travel industry with <a href="#"><br/>custom marketing solutions</a>.
                </p>
                <h5>Our business is built on:</h5>

                <ul>
                  <li>Partnerships</li>
                  <li>Intelligence</li>
                  <li>Reach</li></ul>
          
                <button class="button button--white button--full-width "><a href="#">View Our Services</a></button>
                <br style="clear:both" />
              </div>
          </section>
          
          <section id="green-circle" class="section__content">
                      
                      <p class=" white-text " id="third-section-paragraph">With significant investments in equipment, vehicles, infrastructure and technology. Envoy represents its modern position by exceeding the requirements of the Travel &amp; Tourism industry.</p>
          </section>


          <section  class="section__content">
            <h3 class="blue-text about-heading">About ENVOY</h3>
            <p class="gray-text font-large" class="section__content">Envoy specializes in providing the Travel & Tourism industry with custom programs to deliver marketing campaigns that facilitate successful transactions. By leveraging it's extensive partnerships in Travel & Tourism, unparalleled reach is achieved to consumer & retail outlets</p>


          </section>

      



 <!--Start copyright Line content /-->

 <section class="section__content" id="partners">

 <h3 class="blue-text">Our Partners</h3>
 <div class="section__images">
    <?php echo $this->Html->image('assets/partners/usa.png');?>
    <?php echo $this->Html->image('assets/partners/g-adventures.png');?>
    <?php echo $this->Html->image('assets/partners/travel-guard.png');?>
    <?php echo $this->Html->image('assets/partners/star-clippers.png');?>
    <?php echo $this->Html->image('assets/partners/resorts-of-ontario.png');?>
    <?php echo $this->Html->image('assets/partners/ensemble.png');?>
    <?php echo $this->Html->image('assets/partners/bahia-principe.png');?>
  </div>
 </section>

    <div class="Hippo_Copyright_Line" id="Main_copyright_Holder">© Copyright Envoy Network Inc. 2015
      <div id="Travelweek_Holder">
	  <a href="http://travelweek.ca" target="_blank">
	  <?php echo $this->Html->image('assets/site_logos/travel_week_logo.png',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
      </div>
    </div>
    <!--End copyright Line content /-->

<script type="text/javascript" language="javascript">
        $(".iframe-link").fancybox({
				'width'				: '45%',
				'height'			: '70%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
</script>

<script type="text/javascript" >
$(document).ready(function() {
	$('#LoginDataDigits1, #LoginDataDigits2, #LoginDataDigits3').autotab_magic().autotab_filter('numeric');
})

</script>
