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
                       
                       <!-- <div class="tabs__content">
                          <form>
                           <br>
                            <input  type="text" name="login">
                            <br>
                            <input  id="login" type="submit" value="Login">
                          </form>
                       </div>  -->
                       <div class="tabs__content">
                           <form>
                            <br>
                            <input placeholder="Username" type="text" name="username">
                            <br>
                            <br>
                            <input placeholder="Password"id="password" type="password" name="password">
                            <br>
                            <input type="submit" value="Login">
                          </form>
                       </div> 
                   </div>
                    
                    <div class="tabs__tabItem">
                       <input type="radio" id="tab-3" name="tab-group-1">
                       <label for="tab-3">SUPPLIER</label>
                     
                       <div class="tabs__content">
                           <form>
                            <br>
                            <input placeholder="Username" type="text" name="username">
                            <br>
                            <br>
                            <input placeholder="Password"id="password" type="password" name="password">
                            <br>
                            <input type="submit" value="Login">
                          </form>
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

      
  
  <!-- <div class="slide-menu">
    
    <nav class="menu">
      <li><a href="#">Services</a></li>
      <li><a href="#">About US</a></li>
      <li><a href="#">Contact Us</a></li>
    </nav>
  </div> -->








            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/><br/>
            <br/>

            <section  class="section__content">
              <div class="section__content">
                <h1 class="border-outline">SERVICES</h1>
               <div > 
                  <h3>LOGISTICS</h3> 

                  <h3>Fulfillment:</h3> <p>Our full-service custom fulfillment includes: media-generated responses, consumer requests for assets, collateral material management, poster/video/promotional document fulfillment, response card requests, label generation and a host of solutions for all your needs. Barcode technology and customized pick and pack software provide accurate and efficient order processing.</p> 

                  <h3>Delivery:</h3> <p>With a fleet of vehicles in Toronto and Vancouver, we provide our customers with timely delivery windows and no consolidation. Our network of industry-specific subcontractors provide service to all other 
                  major cities.</p> 

                  <h3>Warehousing:</h3> <p>We offer secure and insured storage of printed materials and valuable goods utilizing an 
                  electronic inventory management system. We have scalable facilities in both Pickering, Ontario and Richmond, British Columbia.</p>

                  </p>
                </div>
              </div>

            </section>

            <br/>

            <section id="DIGITAL_SUPPORT" class="section__content">
              <div >
                <h1 class="border-outline">SERVICES</h1>
               <div class="border-outline"> 
                  <h3>DIGITAL SUPPORT</h3> 

                  <h3>Online brochure re-ordering:</h3> <p>Our comprehensive website is the easiest and most efficient way for travel agents to order brochures. Orders are processed immediately upon reciept and fulfilled in a timely manner. Online supplier access through a secure login allows you to view your order history, track shipments, place new orders and monitor inventory levels. </p> 

                  <h3>Brochure order capturing:</h3> <p>This allows full control over who receives your collateral. Your brochure is hosted at envoynetworks.ca, the agent order is captured and complete order details are emailed directly to you for fulfillment. </p> 

                  <h3>Brochure pre-order:</h3> <p>Exclusive to ENVOY, agents have the capacity to pre-order brochures in advance of their official release. These orders are captured through our website, a weekly email campaign and printed order form included with Travelweek magazine allowing for more targeted initial distribution and savings on printing costs. </p>

                  <h3>Brochure hosting:</h3> <p>By hosting your digital brochures with envoynetworks.ca, they can be viewed online or downloaded as a pdf allowing travel agents the flexibility of accessing material immediately. </p>

                  </p>
                </div>
              </div>

            </section>

            <br/>

            <section id="MARKETING-SOLUTIONS" class="section__content">
              <div >
                <h1 class="border-outline">SERVICES</h1>
               <div class="border-outline"> 
                  <h3>MARKETING SOLUTIONS</h3> 

                  <h3>Mailing house services:</h3> <p> ENVOY offers customized mailing services based on your specific requirements; from polybagged brochures and boxed materials to postcards and self-mailers. </p> 

                  <h3>Marketing support:</h3> <p>TYour marketing collateral is promoted to travel agents through digital and print copies 
                  of Travelweek magazine at no extra charge.  </p> 

                  <h3>Targeted mailing lists:</h3> <p>We create tailored mailing lists based on your specific marketing needs utilizing 
                  our extensive database of travel agents. This service is complimentary if used in conjunction with ENVOY's mailing service.  </p>

                  <h3>Printing services:</h3> <p>Our on-site web and sheet-fed presses offer all the benefits of a full service printing house 
                  to complement to our logistic and digital support. </p>

                  </p>
                </div>
              </div>

            </section>


            <br/>

            <section id="ABOUT-US" class="section__content">
              <div >
                <h1 class="border-outline">ABOUT US</h1>
               <div class="border-outline"> 
                  <h3>OVERVIEW</h3> 

                   <p> Envoy is a distribution and fulfillment company that specializes in providing the travel industry with custom marketing solutions. </p> 

                  <p>Established in 1998 under the name Hippo Express, Envoy was originally set up to handle the fulfillment and distribution of the industry-leading magazine Travelweek. With significant investments in equipment, vehicles and infrastructure, Envoy now offers a complete range of specialized logistics and warehouse capabilities specific—but not limited to—the travel and tourism industry. Our intrinsic knowledge and connections within this industry give us a unique advantage for our customers. We speak their language and as a result, anticipate their needs.</p> 

                  

                  </p>
                </div>
              </div>

            </section>


            <!-- <section id="ABOUT-US">
              <div >
                <h1 class="border-outline">ABOUT US</h1>
               <div class="border-outline"> 
                  <h3>MEET THE TEAM</h3> 

                   

                  

                  </p>
                </div>
              </div>

            </section> -->


            <section id="team" class="section__content">
              <h2>Our Team</h2>

               <ul class="list">

                        <li>
                  
                          <a href="mailto:"></a>
                          
                          <a href="tel:"><span class="contactNumber"></span></a>
                          

                          <span class="contactNumber"></span><br>
                        
                       </li>

                        </ul>


            </section>

            </div>

</div>








































































<div id="Main_content_Holder">

    <!--Start Login screen content /-->

    <!--Envoy Logo /-->
    <div id="Logo_Menu_Holder">
	 <div id="Logo_Holder">
	<?php echo $this->Html->image('assets/site_logos/main_envoy_logo.png');?>
    </div>
     <div id="Search_Interface">
      <ul id="navbar">
       <li>
        <a>Services1</a> 
        
    </li>

    <li>
      <a> About Us</a>

    </li>

     <li id="last">
        <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix'=>'agent')); ?>">Contact Us</a> 
    </li> 
      </ul>
      
     </div>
    
  </div>
    <!--End Envoy Logo /-->

    <!--Start Login screen content /-->
 
  <!--rotating images/login start /-->  
 <?php echo $this->Flash->render(); ?> 
 
 
  <div id="login_image_holder"> 
  
  <!--rotating image start/-->
    <div id="rotating_image_holder">

    
 <ul class="bxslider">
  <li><?php echo $this->Html->image('bg_images/branding.jpg');?></li>
  <li><?php echo $this->Html->image('bg_images/branding2.jpg');?></li>
  <li><?php echo $this->Html->image('bg_images/branding3.jpg');?></li>
  </ul>
    
    </div>
    <!--rotating image end/-->     
    
     <!--agent login start/-->
         <div id="agent_login_holder">
   <?php /*if ($this->request->session()->check('Message.auth')): ?>
    <?php echo $this->request->session()->flash('auth'); ?>
    <?php endif; */ ?> 
    
    <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>
      <h1 id="agent-login-text">Travel Agent Login</h1>
          <div class="form_content_field_left5">
      
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'Form_holder_style5', 'placeholder'=>"Username")) ?>
        </div>
      </div>

      <div class="form_content_field_left5">
       
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'Form_holder_style5', 'placeholder'=>"Password")) ?>
        </div>
      </div>
<!--
    <ul id="phone-input">
      <li>
        <?php /* echo $this->Form->input('digits1', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number", 'placeholder'=>"123")) ?>
      </li>
    
      <li>
        <?php echo $this->Form->input('digits2', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number", 'placeholder'=>"123")) ?>
      </li>
    
      <li>
        <?php echo $this->Form->input('digits3', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'4', 'MAXLENGTH' => '4','class'=>"required number", 'placeholder'=>"1234")) */ ?>
      </li>
    </ul>
      <div id="agent-login-instructions">
 (Enter your phone number)
  </div>
-->

        <div id="profile_submit_Holder">
          <button class="button" type="submit">Login</button>
       <!--    <?php echo $this->Html->link('Register',array('controller' => 'agents', 'action' => 'register','prefix' => 'agent'));?> /-->
        </div>


    <?php echo $this->Form->end(); ?>
        </div>
          <!--agent login end/-->
          
          <!--supplier login start/-->  
         <div id="supplier_login_holder">
          <h1 id="agent-login-text">Supplier Login</h1>
   <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>
   
    <div class="form_content_field_left5">
      
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'Form_holder_style5', 'placeholder'=>"Username")) ?>
        </div>
      </div>

      <div class="form_content_field_left5">
       
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'Form_holder_style5', 'placeholder'=>"Password")) ?>
        </div>
      </div>
<div id="profile_submit_Holder">
      <button class="button" type="submit">Login</button>
    </div>
    
    
       <div id="estore_logo_holder">
        <a href="http://v2.printsys.net/register.aspx?tokenid=BBGAAY872" target="_blank">
       <?php echo $this->Html->image('assets/site_logos/ENVOYeSTORE_ClickPrint_RGB.jpg');?>
       </a>
       </div>
    
    
    
        </div>
         <!--supplier login end/-->
      
      
    
       
       
  </div>
<!--rotating images/login end /-->  


  
   
</div>

 <!--Start copyright Line content /-->

    <div class="Hippo_Copyright_Line" id="Main_copyright_Holder">© Copyright Envoy Network Inc. 2013
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
