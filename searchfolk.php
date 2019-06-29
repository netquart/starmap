<?php



include('top_header.php');


require_once("class2.php");

$obj = new happenning;


?>    
  
  
    <!-- required styles -->
    <link type="text/css" href="fg.menu.css" media="screen" rel="stylesheet" />
    <link type="text/css" href="theme/ui.all.css" media="screen" rel="stylesheet" />
    
       <script type="text/javascript">    
	
	
	function loadlastreply(id,bidid)
{
        
	
	    data = 'option=getlastreply&reply_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert()
		
		$('#bids_'+bidid).before(sv);
		
		
		$('#reply_'+id).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}



	function loadlastreply2(id,bidid)
{
        
	
	  
	   
	    data = 'option=getlastreply&reply_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
	
		
		$('#reply_'+bidid).before(sv);
		
		
		$('#reply_'+bidid).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}





	
	
	
	
	
	
	function showpopup()
	
	{
	
		var zip = document.getElementById('zip').value;
		
		var miles = document.getElementById('miles').value;
		
		
		
			document.getElementById('user_zip').value=zip;
			
			
			document.getElementById('miles_area').value=miles;
			
			//alert(document.getElementById('miles_area').value)
			
			var current = '';
			
			 current = <?php echo $_SESSION['zipcode']; ?>;
			
			if(zip!=current && current!='')
			
			document.getElementById('baloon').innerHTML='<img data-toggle="modal" data-target="#myModal" src="images/baloon_active.png" style="cursor:pointer;" />';
			
			
			//$(".modal").hide();
			
			$('#myModal').modal('hide')
			
			

	
		
    }
	
	
	function updatetotal(id,keywords,price,cat)

{

	
	
	
	
	 data = 'option=updatetotal&total='+id+'&keywords='+keywords+'&price='+price+'&sub_cat='+cat;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	     // $("#btn_"+id).html('view (0)');
		  
		  $("#main0_"+id).after(sv);
		  
		  $('#srchmain_'+id).animate({ width: "100%" }, 1000 );

		}})	
	
}	
	
	
	function updatesearchval(id)
	
	{
	
	   var keyword = $("#keyword_"+id).val();
	   
	   var amount1 = $("#amount1_"+id).val();
	   
	   var amount2 = $("#amount2_"+id).val();
	   
	   var sub_cat = $("#sub_cat"+id).val();
	   
	  // var category = $("#hierarchy_"+id).html();
	   
	   
		
		
		data = 'option=updatesearchval&id='+id+'&keyword='+keyword+'&amount1='+amount1+'&amount2='+amount2+'&sub_cat='+sub_cat;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	     
		 $("#kywordss_"+id).html(keyword);
		 
		 $("#ammt_"+id).html('$'+amount1+' - '+amount2);
		 
		// $("#ctg_"+id).html(category);
		 
		 $('#myModalsrch_'+id).modal('hide');
		 
		  

		}})	
		
	}
	
	
	function callfunc(val)

{
	
	if(val!='')
	
	$(".results").css('display','block');
	
	else
	
	$(".results").css('display','none');
	
	
	
	}
	
	function func(val)
	
	{
	
		
		var srch = $("#searchit").val();
		
		
		srch= srch.replace('#','hash');
		
		location.href='whathapinng.php?keyword='+srch+'&type='+val;
		
	}
	
	
    </script>
    
    
   <style type="text/css">
  
  @media screen and (min-device-width: 280px) and (max-device-width: 900px) { 
	
	
.dropdown, .dropup {
    left: 2px;
    margin-top: 1px;
    position: absolute;
    top: 2px;
    z-index: 30;
}
.search input{padding: 0 12px 0 75px;}


.navbar {
    background: transparent none repeat scroll 0 0;
   
}

.navbar {
    border: medium none;
    margin-bottom: 0;
    min-height: 1px;
    position: relative;
	box-shadow: none;
}


.paddingset {
    margin-top: -41px;
    padding-left: 0;
    padding-right: 0;
    z-index: 20;
}

.search .results {
    background-color: #fff;
    border-color: #cbcfe2 #c8cee7 #c4c7d7;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    display: none;
    left: 70px;
    margin: 0;
    padding: 0;
    position: absolute;
    right: 0;
    top: 58px;
    width: 203px;
    z-index: 10;
}

.search .results  {
  
    left: 0px;
   
    width: 100%;
   
     }
	
}
  
  </style>  

<div class="body-container">
 
 <div class="container custombg">
  
  <div class="col-lg-12 col-md-12 custom_padding"><?php include("left_nav.php"); ?>
   
   <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">
    <!--showthis-->
    <div class="col-lg-12 addpadding" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px; margin-bottom:0px; ">
    
    
  <!--  <section class="main">
	 <form class="search" method="post" name="searchfrm" id="search-form" style="width:100%;" >
		
        
        
        

					<input type="text" class="form-control fontcolor" style="font-size: 15px;
    height: 55px;-webkit-box-shadow: unset; width:100%;cursor:pointer;

" name="searchit" id="searchit" placeholder="search for ..." autocomplete="off" onkeyup="callfunc(this.value)"  />
		 <ul class="results" >
			 <li><a href="#" id="whatshappening" onclick="func('whatshappening');" >everything</a></li>
			 <li><a href="#" onclick="func('whatfolkswant');" id="whatfolkswant">what folks want</span></a></li>
	 		<li><a href="#" onclick="func('folksoffers');" id="folksoffers" >what folks are offering</a></li>
		 </ul>
	 </form>
</section>  
-->

     
      <div class="boxes2">
      
      <div class="col-lg-1 col-xs-2 col-sm-1 col-md-1 topmenus3 wdtset2" onclick="location.href='mysearches2.php'" style="cursor:pointer;border-right: 1px solid #e3e1e1;" >all</div>

     
    <div class="col-lg-5 col-xs-4 col-sm-5 col-md-5  topmenus3 wdtset" style="cursor: pointer; border-right: 1px solid rgb(227, 225, 225); background: rgb(211, 32, 40) none repeat scroll 0% 0%; color: rgb(255, 255, 255);" onclick="location.href='searchfolk.php'" >what folks want</div>
     
     <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 topmenus3" style="cursor:pointer;" onclick="location.href='searchfolkoffers.php'">what folks are offering</div>
     
     </div>
    
    
   </div>
   
   
   
  
   
   
   
   
    

         
      <?php

/*and  (search_type='make' or search_type='get')*/


         $arrayget = $obj->selectAll('user_saved_searches','*',"  userid='".$_SESSION['user_session']."' and search_type='whatfolkswant' ",'order by save_id DESC');

	    
		 
	  ?>

         <!--created offers against each user -->

         <div class="ajaxget" id="form-content2">



         
		 <?php
		 
		 $dynamic1 = '';
		 
		 $dynamic2 = 1;

          foreach($arrayget as $array)

          {



         ?>    
		   
           <div id="main0_<?php echo $array['save_id']; ?>">
           
           <div class="borderouter" id="<?php echo $array['save_id']; ?>">
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            

          <div class="col-lg-7 col-xs-7 col-sm-9 col-md-7 " style="padding:0px;">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#999999; font-weight:normal;" id="title_<?php echo $array['save_id']; ?>">

      <?php 
	  
	  
	  
	  
	  echo '<p style="height:13px;" id="kywordss_'.$array['save_id'].'">'.$array['keywords'].'</p>';
	  
	  $amt = '';
	  
	  if($array['amount']!='$')
	  
	  {
	  	
		echo '<p style="height:14px;" id="ammt_'.$array['save_id'].'">$'.str_replace('$','',$array['amount']);
		
		 if($array['amount2']!='$')
		 
		 echo ' - '.$array['amount2'];
		
		echo '</p>';
		
		$amt = $array['amount'];
		
	  }
	  
	  else
	  
	  echo '<p style="height:13px;" id="ammt_'.$array['save_id'].'"></p>';
	  
	  
	  
	  if($array['search_type']=='whathappen')
	  
	  $showtype = 'what happenning';
	  
	  elseif($array['search_type']=='whatfolkswant')
	  
	  $showtype = 'what folks want';
	  
	  elseif($array['search_type']=='folksoffers')
	  
	  $showtype = 'what folks are offering';
	  
	  echo '<p id="ctg_'.$array['save_id'].'">'.$showtype.'</p>';
	  
	  // echo '<p id="ctg_'.$array['save_id'].'">'.$obj->categoryname($array['category']).'</p>';
	  
	  ?>



<div class="modal fade" id="myModalsrch_<?php echo $array['save_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;"> <div class="form-group"><input class="form-control" type="text" name="keyword" id="keyword_<?php echo $array['save_id'] ?>" value="<?php echo $array['keywords']; ?>" size="7"> </div></div>
        
         <div style="margin-top:15px;" >
         
         <div class="col-lg-4 col-sm-12">
        I will pay between $ </div> <div class="col-lg-2 col-sm-12"><div class="form-group"><input type="text" class="form-control" name="amount1" id="amount1_<?php echo $array['save_id'] ?>" value="<?php echo str_replace('$','',$array['amount']); ?>" size="7"></div></div>
        
        
         
         <div class="col-lg-2 col-sm-12" style="padding:0px;">- $ </div><div class="col-lg-2 col-sm-12" style="padding:0px;"><div class="form-group"><input type="text" class="form-control"  name="amount2" id="amount2_<?php echo $array['save_id'] ?>" value="<?php echo str_replace('$','',$array['amount2']); ?>" size="7"></div></div>
        
      </div>
      
      <br />
<br />

        <!-- <a style="float:none;" tabindex="0" href="#news-items-2" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="hierarchy_<?php echo $array['save_id'] ?>"><?php $names = $obj->categoryname($array['category']); if(!empty($names)) echo $names; else echo 'what best describes what you want?'; ?>  <div style="display:inline-block;margin-left:12px;" align="right">
         
         <span class="glyphicon glyphicon-chevron-down" style="color:#333333;">
         
         </span>
        
        </div></a>-->
<div id="news-items-2" class="hidden">


 <ul>
	  
       <li>
       
        <a href="1">buy something</a>
		
         <ul>
			
           <?php
           
		  $obj->buysomething();
		   
		   
		   ?>
		
        	
		
        </ul>
	  
       </li>
    
       <li>
       
        <a href="23">need something done</a>
    
    	 <ul>
			 <?php
              
			  $obj->needsomething();
			 
			 ?>
		
        </ul>
    
      </li>
    
     <li>
     
      <a href="46">rent something</a>
    
    	<ul>
			 <?php
              
			  $obj->rentsomething();
			 
			 ?>
		
        </ul>
    
     </li>
   
   </ul>


</div>
      
  </div>    
      
   
      <div class="modal-footer">
        <!--onclick="showpopup()"-->
        
         <input type="hidden" id="sub_cat<?php echo $array['save_id'];?>" name="sub_cat" value="">
        
        <input type="hidden" id="caller_<?php echo $array['save_id'];?>" name="caller" value="">
        
        <button type="button" class="btn btn-primary buttongreen" onclick="updatesearchval(<?php echo $array['save_id'];?>)">update</button>
        
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="call3(<?php echo $array['save_id'];?>)">cancel</button>
        
      </div>
    </div>
  </div>
</div>









        </div>

        


        </div> 
        
      </div>

        <div class="col-lg-5 col-xs-5 col-sm-5 col-md-5" style=" text-align:right; padding:0px;">

      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" >
       
       <?php
       
	   			$obj->viewbutton($array['save_id'],$array['total_results'],$array['keywords'],$amt,$array['category']);
	   
	   ?>
         
         </div>
         
         <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="display:inline-block; margin-top:10px;">
         
         <?php $obj->editdelbutton($array['save_id']); ?>
         
         </div>
      
       
     </div>

   <!--body navigation ends-->
      </div>

     
     </div>
   </div>  
     <?php
     
	$dynamic1 .= '
	
	
	$(\'#hierarchy_'.$array['save_id'].'\').menu({
			content: $(\'#hierarchy_'.$array['save_id'].'\').next().html(),
			crumbDefaultText: \' \'
		});
		
		';
		
		
		
	$dynamic2 +=1;	
		
		
		$arrays[]  = $array['save_id'];
	 
	 
	  }
	 
	 ?>    
     
      </div>
    <!--end created offers here -->
  
       
   </div>
        <!--main content ends-->
  </div>

 </div>
</div>




 <script>
	
	
	function call2(id)
	
	{
	
		$("#caller_"+id).val(id);
		
		if($(window).width()<901)
		
		setTimeout(function(){ $('.modal-backdrop').css('top','430px'); }, 300);
		
		
	}
	
	
		function call3(id)
	
	{
	
		$("#caller_"+id).val('');
		
	}

	




var allUIMenus = [];

$.fn.menu = function(options){
	var caller = this;
	var options = options;
	var m = new Menu(caller, options);	
	allUIMenus.push(m);
	
	$(this)
	.mousedown(function(){
		if (!m.menuOpen) { m.showLoading(); };
	})	
	.click(function(){
		if (m.menuOpen == false) { m.showMenu(); }
		else { m.kill(); };
		return false;
	});	
};

function Menu(caller, options){
	var menu = this;
	var caller = $(caller);
	
	
	
	var container = $('<div class="fg-menu-container ui-widget ui-widget-content ui-corner-all">'+options.content+'</div>');
	
	this.menuOpen = false;
	this.menuExists = false;
	
	var options = jQuery.extend({
		content: null,
		width: 174, // width of menu container, must be set or passed in to calculate widths of child menus
		maxHeight: 170, // max height of menu (if a drilldown: height does not include breadcrumb)
		positionOpts: {
			posX: 'left', 
			posY: 'bottom',
			offsetX: 0,
			offsetY: 0,
			directionH: 'right',
			directionV: 'down', 
			detectH: true, // do horizontal collision detection  
			detectV: true, // do vertical collision detection
			linkToFront: false
		},
		showSpeed: 200, // show/hide speed in milliseconds
		callerOnState: 'ui-state-active', // class to change the appearance of the link/button when the menu is showing
		loadingState: 'ui-state-loading', // class added to the link/button while the menu is created
		linkHover: 'ui-state-hover', // class for menu option hover state
		linkHoverSecondary: 'li-hover', // alternate class, may be used for multi-level menus		
	// ----- multi-level menu defaults -----
		crossSpeed: 200, // cross-fade speed for multi-level menus
		crumbDefaultText: 'Choose an option:',
		backLink: true, // in the ipod-style menu: instead of breadcrumbs, show only a 'back' link
		backLinkText: 'Back',
		flyOut: false, // multi-level menus are ipod-style by default; this parameter overrides to make a flyout instead
		flyOutOnState: 'ui-state-default',
		nextMenuLink: 'ui-icon-triangle-1-e', // class to style the link (specifically, a span within the link) used in the multi-level menu to show the next level
		topLinkText: 'All',
		nextCrumbLink: 'ui-icon-carat-1-e'	
	}, options);
	
	var killAllMenus = function(){
		$.each(allUIMenus, function(i){
			if (allUIMenus[i].menuOpen) { allUIMenus[i].kill(); };	
		});
	};
	
	this.kill = function(){
		caller
			.removeClass(options.loadingState)
			.removeClass('fg-menu-open')
			.removeClass(options.callerOnState);	
		container.find('li').removeClass(options.linkHoverSecondary).find('a').removeClass(options.linkHover);		
		if (options.flyOutOnState) { container.find('li a').removeClass(options.flyOutOnState); };	
		if (options.callerOnState) { 	caller.removeClass(options.callerOnState); };			
		if (container.is('.fg-menu-ipod')) { menu.resetDrilldownMenu(); };
		if (container.is('.fg-menu-flyout')) { menu.resetFlyoutMenu(); };	
		container.parent().hide();	
		menu.menuOpen = false;
		$(document).unbind('click', killAllMenus);
		$(document).unbind('keydown');
	};
	
	this.showLoading = function(){
		caller.addClass(options.loadingState);
	};

	this.showMenu = function(){
		killAllMenus();
		if (!menu.menuExists) { menu.create() };
		caller
			.addClass('fg-menu-open')
			.addClass(options.callerOnState);
		container.parent().show().click(function(){ menu.kill(); return false; });
		container.hide().slideDown(options.showSpeed).find('.fg-menu:eq(0)');
		menu.menuOpen = true;
		caller.removeClass(options.loadingState);
		$(document).click(killAllMenus);
		
		// assign key events
		$(document).keydown(function(event){
			var e;
			if (event.which !="") { e = event.which; }
			else if (event.charCode != "") { e = event.charCode; }
			else if (event.keyCode != "") { e = event.keyCode; }
			
			var menuType = ($(event.target).parents('div').is('.fg-menu-flyout')) ? 'flyout' : 'ipod' ;
			
			switch(e) {
				case 37: // left arrow 
					if (menuType == 'flyout') {
						$(event.target).trigger('mouseout');
						if ($('.'+options.flyOutOnState).size() > 0) { $('.'+options.flyOutOnState).trigger('mouseover'); };
					};
					
					if (menuType == 'ipod') {
						$(event.target).trigger('mouseout');
						if ($('.fg-menu-footer').find('a').size() > 0) { $('.fg-menu-footer').find('a').trigger('click'); };
						if ($('.fg-menu-header').find('a').size() > 0) { $('.fg-menu-current-crumb').prev().find('a').trigger('click'); };
						if ($('.fg-menu-current').prev().is('.fg-menu-indicator')) {
							$('.fg-menu-current').prev().trigger('mouseover');							
						};						
					};
					return false;
					break;
					
				case 38: // up arrow 
					if ($(event.target).is('.' + options.linkHover)) {	
						var prevLink = $(event.target).parent().prev().find('a:eq(0)');						
						if (prevLink.size() > 0) {
							$(event.target).trigger('mouseout');
							prevLink.trigger('mouseover');
						};						
					}
					else { container.find('a:eq(0)').trigger('mouseover'); }
					return false;
					break;
					
				case 39: // right arrow 
					if ($(event.target).is('.fg-menu-indicator')) {						
						if (menuType == 'flyout') {
							$(event.target).next().find('a:eq(0)').trigger('mouseover');
						}
						else if (menuType == 'ipod') {
							$(event.target).trigger('click');						
							setTimeout(function(){
								$(event.target).next().find('a:eq(0)').trigger('mouseover');
							}, options.crossSpeed);
						};				
					}; 
					return false;
					break;
					
				case 40: // down arrow 
					if ($(event.target).is('.' + options.linkHover)) {
						var nextLink = $(event.target).parent().next().find('a:eq(0)');						
						if (nextLink.size() > 0) {							
							$(event.target).trigger('mouseout');
							nextLink.trigger('mouseover');
						};				
					}
					else { container.find('a:eq(0)').trigger('mouseover'); }		
					return false;						
					break;
					
				case 27: // escape
					killAllMenus();
					break;
					
				case 13: // enter
					if ($(event.target).is('.fg-menu-indicator') && menuType == 'ipod') {							
						$(event.target).trigger('click');						
						setTimeout(function(){
							$(event.target).next().find('a:eq(0)').trigger('mouseover');
						}, options.crossSpeed);					
					}; 
					break;
			};			
		});
	};
	
	this.create = function(){	
		container.css({ width: options.width }).appendTo('body').find('ul:first').not('.fg-menu-breadcrumb').addClass('fg-menu');
		container.find('ul, li a').addClass('ui-corner-all');
		
		// aria roles & attributes
		container.find('ul').attr('role', 'menu').eq(0).attr('aria-activedescendant','active-menuitem').attr('aria-labelledby', caller.attr('id'));
		container.find('li').attr('role', 'menuitem');
		container.find('li:has(ul)').attr('aria-haspopup', 'true').find('ul').attr('aria-expanded', 'false');
		container.find('a').attr('tabindex', '-1');
		
		// when there are multiple levels of hierarchy, create flyout or drilldown menu
		if (container.find('ul').size() > 1) {
			if (options.flyOut) { menu.flyout(container, options); }
			else { menu.drilldown(container, options); }	
		}
		else {
			container.find('a').click(function(){
				menu.chooseItem(this);
				return false;
			});
		};	
		
		if (options.linkHover) {
			var allLinks = container.find('.fg-menu li a');
			allLinks.hover(
				function(){
					var menuitem = $(this);
					$('.'+options.linkHover).removeClass(options.linkHover).blur().parent().removeAttr('id');
					$(this).addClass(options.linkHover).focus().parent().attr('id','active-menuitem');
				},
				function(){
					$(this).removeClass(options.linkHover).blur().parent().removeAttr('id');
				}
			);
		};
		
		if (options.linkHoverSecondary) {
			container.find('.fg-menu li').hover(
				function(){
					$(this).siblings('li').removeClass(options.linkHoverSecondary);
					if (options.flyOutOnState) { $(this).siblings('li').find('a').removeClass(options.flyOutOnState); }
					$(this).addClass(options.linkHoverSecondary);
				},
				function(){ $(this).removeClass(options.linkHoverSecondary); }
			);
		};	
		
		menu.setPosition(container, caller, options);
		menu.menuExists = true;
	};
	
	this.chooseItem = function(item){
		menu.kill();
		// edit this for your own custom function/callback:
		//$('#menuSelection').text($(item).text());	
		
		<?php //echo $dynamic2; ?>
		
		
		var arr = new Array(<?php echo implode(',',$arrays); ?>);
		
		var k=0;
		
		for(i=0;i<arr.length;i++)
		{
			
			if($('#caller_'+arr[i]).val()!='')
			
			{
			   if(k==0)
			  { var idset = arr[i];k++;}
				
			}
			
			
			
		}
		
		$("#hierarchy_"+idset).text($(item).text());
		
		$("#sub_cat"+idset).val($(item).attr('href'));
		
		
		/*$("#hierarchy_'.$array['save_id'].'").text($(item).text());
		
		$("#sub_cat'.$array['save_id'].'").val($(item).attr(\'href\'));*/
		
		//alert($(item).attr('href'))
		
		//location.href = $(item).attr('href');
	};
};

Menu.prototype.flyout = function(container, options) {
	var menu = this;
	
	this.resetFlyoutMenu = function(){
		var allLists = container.find('ul ul');
		allLists.removeClass('ui-widget-content').hide();	
	};
	
	container.addClass('fg-menu-flyout').find('li:has(ul)').each(function(){
		var linkWidth = container.width();
		var showTimer, hideTimer;
		var allSubLists = $(this).find('ul');		
		
		allSubLists.css({ left: linkWidth, width: linkWidth }).hide();
			
		$(this).find('a:eq(0)').addClass('fg-menu-indicator').html('<span>' + $(this).find('a:eq(0)').text() + '</span><span class="ui-icon '+options.nextMenuLink+'"></span>').hover(
			function(){
				clearTimeout(hideTimer);
				var subList = $(this).next();
				if (!fitVertical(subList, $(this).offset().top)) { subList.css({ top: 'auto', bottom: 0 }); };
				if (!fitHorizontal(subList, $(this).offset().left + 100)) { subList.css({ left: 'auto', right: linkWidth, 'z-index': 999 }); };
				showTimer = setTimeout(function(){
					subList.addClass('ui-widget-content').show(options.showSpeed).attr('aria-expanded', 'true');	
				}, 300);	
			},
			function(){
				clearTimeout(showTimer);
				var subList = $(this).next();
				hideTimer = setTimeout(function(){
					subList.removeClass('ui-widget-content').hide(options.showSpeed).attr('aria-expanded', 'false');
				}, 400);	
			}
		);

		$(this).find('ul a').hover(
			function(){
				clearTimeout(hideTimer);
				if ($(this).parents('ul').prev().is('a.fg-menu-indicator')) {
					$(this).parents('ul').prev().addClass(options.flyOutOnState);
				}
			},
			function(){
				hideTimer = setTimeout(function(){
					allSubLists.hide(options.showSpeed);
					container.find(options.flyOutOnState).removeClass(options.flyOutOnState);
				}, 500);	
			}
		);	
	});
	
	container.find('a').click(function(){
		menu.chooseItem(this);
		return false;
	});
};


Menu.prototype.drilldown = function(container, options) {
	var menu = this;	
	var topList = container.find('.fg-menu');	
	var breadcrumb = $('<ul class="fg-menu-breadcrumb ui-widget-header ui-corner-all ui-helper-clearfix"></ul>');
	var crumbDefaultHeader = $('<li class="fg-menu-breadcrumb-text">'+options.crumbDefaultText+'</li>');
	var firstCrumbText = (options.backLink) ? options.backLinkText : options.topLinkText;
	var firstCrumbClass = (options.backLink) ? 'fg-menu-prev-list' : 'fg-menu-all-lists';
	var firstCrumbLinkClass = (options.backLink) ? 'ui-state-default ui-corner-all' : '';
	var firstCrumbIcon = (options.backLink) ? '<span class="ui-icon ui-icon-triangle-1-w"></span>' : '';
	var firstCrumb = $('<li class="'+firstCrumbClass+'"><a href="#" class="'+firstCrumbLinkClass+'">'+firstCrumbIcon+firstCrumbText+'</a></li>');
	
	container.addClass('fg-menu-ipod');
	
	if (options.backLink) { breadcrumb.addClass('fg-menu-footer').appendTo(container).hide(); }
	else { breadcrumb.addClass('fg-menu-header').prependTo(container); };
	breadcrumb.append(crumbDefaultHeader);
	
	var checkMenuHeight = function(el){
		if (el.height() > options.maxHeight) { el.addClass('fg-menu-scroll') };	
		el.css({ height: options.maxHeight });
	};
	
	var resetChildMenu = function(el){ el.removeClass('fg-menu-scroll').removeClass('fg-menu-current').height('auto'); };
	
	this.resetDrilldownMenu = function(){
		$('.fg-menu-current').removeClass('fg-menu-current');
		topList.animate({ left: 0 }, options.crossSpeed, function(){
			$(this).find('ul').each(function(){
				$(this).hide();
				resetChildMenu($(this));				
			});
			topList.addClass('fg-menu-current');			
		});		
		$('.fg-menu-all-lists').find('span').remove();	
		breadcrumb.empty().append(crumbDefaultHeader);		
		$('.fg-menu-footer').empty().hide();	
		checkMenuHeight(topList);		
	};
	
	topList
		.addClass('fg-menu-content fg-menu-current ui-widget-content ui-helper-clearfix')
		.css({ width: container.width() })
		.find('ul')
			.css({ width: container.width(), left: container.width() })
			.addClass('ui-widget-content')
			.hide();		
	checkMenuHeight(topList);	
	
	topList.find('a').each(function(){
		// if the link opens a child menu:
		if ($(this).next().is('ul')) {
			$(this)
				.addClass('fg-menu-indicator')
				.each(function(){ $(this).html('<span>' + $(this).text() + '</span><span class="ui-icon '+options.nextMenuLink+'"></span>'); })
				.click(function(){ // ----- show the next menu			
					var nextList = $(this).next();
		    		var parentUl = $(this).parents('ul:eq(0)');   		
		    		var parentLeft = (parentUl.is('.fg-menu-content')) ? 0 : parseFloat(topList.css('left'));    		
		    		var nextLeftVal = Math.round(parentLeft - parseFloat(container.width()));
		    		var footer = $('.fg-menu-footer');
		    		
		    		// show next menu   		
		    		resetChildMenu(parentUl);
		    		checkMenuHeight(nextList);
					topList.animate({ left: nextLeftVal }, options.crossSpeed);						
		    		nextList.show().addClass('fg-menu-current').attr('aria-expanded', 'true');    
		    		
		    		var setPrevMenu = function(backlink){
		    			var b = backlink;
		    			var c = $('.fg-menu-current');
			    		var prevList = c.parents('ul:eq(0)');
			    		c.hide().attr('aria-expanded', 'false');
		    			resetChildMenu(c);
		    			checkMenuHeight(prevList);
			    		prevList.addClass('fg-menu-current').attr('aria-expanded', 'true');
			    		if (prevList.hasClass('fg-menu-content')) { b.remove(); footer.hide(); };
		    		};		
		
					// initialize "back" link
					if (options.backLink) {
						if (footer.find('a').size() == 0) {
							footer.show();
							$('<a href="#"><span class="ui-icon ui-icon-triangle-1-w"></span> <span>Back</span></a>')
								.appendTo(footer)
								.click(function(){ // ----- show the previous menu
									var b = $(this);
						    		var prevLeftVal = parseFloat(topList.css('left')) + container.width();		    						    		
						    		topList.animate({ left: prevLeftVal },  options.crossSpeed, function(){
						    			setPrevMenu(b);
						    		});			
									return false;
								});
						}
					}
					// or initialize top breadcrumb
		    		else { 
		    			if (breadcrumb.find('li').size() == 1){				
							breadcrumb.empty().append(firstCrumb);
							firstCrumb.find('a').click(function(){
								menu.resetDrilldownMenu();
								return false;
							});
						}
						$('.fg-menu-current-crumb').removeClass('fg-menu-current-crumb');
						var crumbText = $(this).find('span:eq(0)').text();
						var newCrumb = $('<li class="fg-menu-current-crumb"><a href="javascript://" class="fg-menu-crumb">'+crumbText+'</a></li>');	
						newCrumb
							.appendTo(breadcrumb)
							.find('a').click(function(){
								if ($(this).parent().is('.fg-menu-current-crumb')){
									menu.chooseItem(this);
								}
								else {
									var newLeftVal = - ($('.fg-menu-current').parents('ul').size() - 1) * 180;
									topList.animate({ left: newLeftVal }, options.crossSpeed, function(){
										setPrevMenu();
									});
								
									// make this the current crumb, delete all breadcrumbs after this one, and navigate to the relevant menu
									$(this).parent().addClass('fg-menu-current-crumb').find('span').remove();
									$(this).parent().nextAll().remove();									
								};
								return false;
							});
						newCrumb.prev().append(' <span class="ui-icon '+options.nextCrumbLink+'"></span>');
		    		};			
		    		return false;    		
    			});
		}
		// if the link is a leaf node (doesn't open a child menu)
		else {
			$(this).click(function(){
				menu.chooseItem(this);
				return false;
			});
		};
	});
};


Menu.prototype.setPosition = function(widget, caller, options) { 
	var el = widget;
	var referrer = caller;
	var dims = {
		refX: referrer.offset().left,
		refY: referrer.offset().top,
		refW: referrer.getTotalWidth(),
		refH: referrer.getTotalHeight()
	};	
	var options = options;
	var xVal, yVal;
	
	var helper = $('<div class="positionHelper"></div>');
	helper.css({ position: 'absolute', left: dims.refX, top: dims.refY, width: dims.refW, height: dims.refH });
	el.wrap(helper);
	
	// get X pos
	switch(options.positionOpts.posX) {
		case 'left': 	xVal = 0; 
			break;				
		case 'center': xVal = dims.refW / 2;
			break;				
		case 'right': xVal = dims.refW;
			break;
	};
	
	// get Y pos
	switch(options.positionOpts.posY) {
		case 'top': 	yVal = 0;
			break;				
		case 'center': yVal = dims.refH / 2;
			break;				
		case 'bottom': yVal = dims.refH;
			break;
	};
	
	// add the offsets (zero by default)
	xVal += options.positionOpts.offsetX;
	yVal += options.positionOpts.offsetY;
	
	// position the object vertically
	if (options.positionOpts.directionV == 'up') {
		el.css({ top: 'auto', bottom: yVal });
		if (options.positionOpts.detectV && !fitVertical(el)) {
			el.css({ bottom: 'auto', top: yVal });
		}
	} 
	else {
		el.css({ bottom: 'auto', top: yVal });
		if (options.positionOpts.detectV && !fitVertical(el)) {
			el.css({ top: 'auto', bottom: yVal });
		}
	};
	
	// and horizontally
	if (options.positionOpts.directionH == 'left') {
		el.css({ left: 'auto', right: xVal });
		if (options.positionOpts.detectH && !fitHorizontal(el)) {
			el.css({ right: 'auto', left: xVal });
		}
	} 
	else {
		el.css({ right: 'auto', left: xVal });
		if (options.positionOpts.detectH && !fitHorizontal(el)) {
			el.css({ left: 'auto', right: xVal });
		}
	};
	
	// if specified, clone the referring element and position it so that it appears on top of the menu
	if (options.positionOpts.linkToFront) {
		referrer.clone().addClass('linkClone').css({
			position: 'absolute', 
			top: 0, 
			right: 'auto', 
			bottom: 'auto', 
			left: 0, 
			width: referrer.width(), 
			height: referrer.height()
		}).insertAfter(el);
	};
};


/* Utilities to sort and find viewport dimensions */

function sortBigToSmall(a, b) { return b - a; };

jQuery.fn.getTotalWidth = function(){
	return $(this).width() + parseInt($(this).css('paddingRight')) + parseInt($(this).css('paddingLeft')) + parseInt($(this).css('borderRightWidth')) + parseInt($(this).css('borderLeftWidth'));
};

jQuery.fn.getTotalHeight = function(){
	return $(this).height() + parseInt($(this).css('paddingTop')) + parseInt($(this).css('paddingBottom')) + parseInt($(this).css('borderTopWidth')) + parseInt($(this).css('borderBottomWidth'));
};

function getScrollTop(){
	return self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
};

function getScrollLeft(){
	return self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft;
};

function getWindowHeight(){
	var de = document.documentElement;
	return self.innerHeight || (de && de.clientHeight) || document.body.clientHeight;
};

function getWindowWidth(){
	var de = document.documentElement;
	return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
};


	
function fitHorizontal(el, leftOffset){
	var leftVal = parseInt(leftOffset) || $(el).offset().left;
	return (leftVal + $(el).width() <= getWindowWidth() + getScrollLeft() && leftVal - getScrollLeft() >= 0);
};

function fitVertical(el, topOffset){
	var topVal = parseInt(topOffset) || $(el).offset().top;
	return (topVal + $(el).height() <= getWindowHeight() + getScrollTop() && topVal - getScrollTop() >= 0);
};


Number.prototype.pxToEm = String.prototype.pxToEm = function(settings){
	//set defaults
	settings = jQuery.extend({
		scope: 'body',
		reverse: false
	}, settings);
	
	var pxVal = (this == '') ? 0 : parseFloat(this);
	var scopeVal;
	var getWindowWidth = function(){
		var de = document.documentElement;
		return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
	};	
					
	if (settings.scope == 'body' && $.browser.msie && (parseFloat($('body').css('font-size')) / getWindowWidth()).toFixed(1) > 0.0) {
		var calcFontSize = function(){		
			return (parseFloat($('body').css('font-size'))/getWindowWidth()).toFixed(3) * 16;
		};
		scopeVal = calcFontSize();
	}
	else { scopeVal = parseFloat(jQuery(settings.scope).css("font-size")); };
			
	var result = (settings.reverse == true) ? (pxVal * scopeVal).toFixed(2) + 'px' : (pxVal / scopeVal).toFixed(2) + 'em';
	return result;
};





 $(function(){
    	// BUTTONS
    	$('.fg-button').hover(
    		function(){ $(this).removeClass('ui-state-default').addClass('ui-state-focus'); },
    		function(){ $(this).removeClass('ui-state-focus').addClass('ui-state-default'); }
    	);
   
		
		$('#hierarchybreadcrumb').menu({
			content: $('#hierarchybreadcrumb').next().html(),
			backLink: true
		});
		
		<?php echo $dynamic1; ?>
		
		
    });











</script>   











<script type="text/javascript">

$(document).ready(function() {	




$('#reg-form').submit(function(e){

		showpopup();

		e.preventDefault(); // Prevent Default Submission

		

		$.ajax({

			url: 'search_new_getoffers.php',

			type: 'POST',

			data: $(this).serialize() // it will serialize the form data

		})

		.done(function(data){

		
				$('#form-content2').fadeIn('slow').html(data);

				$('#savesrach').html('add to my searches <button type="button" onclick="savesearch()" class="btn btn-primary" id="save_srch">save search</button>')


		})

		.fail(function(){

			alert('Ajax Submit Failed ...');	

		});

	});
	
	
	
	
	
	
	
	
	


$("#register-form").on('submit',(function(e) {
		
		if(validatefirst())
		{
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				//$("#err").fadeOut();
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					//$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#register-form")[0].reset();	
					
					$("#image-holder").html('');
					
					$("#image-holder").html('<span style="color:red"></span>');
					
					$("#sub_cat").val('');
					
					$("#uploadedimages").val('');
					
					
					
					$("#hierarchy").text('what best describes what you want?');
					
					
					
					loadlastoffer(data);
					
				}
		    },
		  	error: function(e) 
	    	{
				//$("#err").html(e).fadeIn();
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	
	return false;
	   
	}));



function loadlastoffer(id)
{

	
	    data = 'option=getlastoffer&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert()
		
		$('#mainouterform').after(sv);
		
		
		$('#main_'+id).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}



	   

function validatefirst()

{

	  var counter = 0;
	  
	 

	   if($('#desc').val()=='')

	   {
		alert('please enter description')

		$('#desc').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc').val();
	
	    var res = str.split("$");
	    
		
		
		if(res.length==1)
		
		{
		
		   alert('don\'t forget how much you are willing to pay in the following format: $0 or $0.00');
		  //location.reload();
		   counter=1;
		  
		   return false;
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  alert('don\'t forget how much you are willing to pay in the following format: $0 or $0.00');
			 // location.reload();
			  counter=1;
			  
			  return false;
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}




$("#upload_file").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#upload_file').val('');

	 $('#upload_file').select();

	  return false

	 }
	 
	 else
	 
	 {
	 
	 

     var imgPath = $(this)[0].value;
	 
	
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     
	

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        
		 if (typeof (FileReader) != "undefined") {

			 
              $.each(this.files, function() {
               
			    readURL(this);
			   
			   
               
				 
                 
				 
             })
			 
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
 
 
});
 
 
 function readURL(file)
 
 {

		 var image_holder = $("#image-holder");
     
	 image_holder.empty();
		
		
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					  
					
					 
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
			
				
					
                 image_holder.show();
			 
	 
}
 
 


function parseData(entries){
  for (var i=0; i<entries.length; i++) {
    reader.onloadend = (function(file) {
      return function(evt) {
        createListItem(evt, file)
      };
    })(entries[i]);
    reader.readAsText(entries[i]);
  }
}





function removeimg(id,id2,img)

{

var str = $("#uploadedimages").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);


array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}



function getoffers(offer_posted_user,offer_id,logged_in_user)

{

	window.location='home3.php?offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;

}


function showoffers(offerid,btn)
{
        
		
		
		
		$('#'+btn).prop('disabled',true);
		
		
		$('#'+offerid).after('<div id="additional'+offerid+'"></div>');
		
		
		data = 'option=viewoffers&offer_id='+offerid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		
		$('#additional'+offerid).html(sv);
		
		
		$('#additional'+offerid).animate({ width: "100%" }, 1000 );
		


		}})
		
		
		
		
	
}


function showbidreplies(offerid,userid,bidid,btn)

{
        $('#'+btn).prop('disabled',true);
		
		$('#bids_'+bidid).after('<div id="additional_'+bidid+'"></div>');
	
		data = 'option=viewcomments&offer_id='+offerid+'&userid='+userid+'&bidid='+bidid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		$('#additional_'+bidid).html(sv);
		
		$('#additional_'+bidid).animate({ width: "100%" }, 3000 );

		//$('#bids_'+bidid).after(sv);

		}})
	
		
	
}

function deleteit(id)

{
    
	if(confirm('are you confirm to delete?'))
	
	{
		
	   
	  $('#main_'+id).fadeOut(1000, function(){ $(this).remove();});
	   
	   
	   data = 'option=deleteoffers&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	
		

		}})
	   
	}
	   
	
}


function deletesearch(id)

{
    
	if(confirm('are you confirm to delete?'))
	
	{
		
	   
	  $('#main0_'+id).fadeOut(1000, function(){ $(this).remove();});
	   
	   
	   data = 'option=deletesearch&id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	
		

		}})
	   
	}
	   
	
}













function showform(offerid,bidid,offerposteduser)

{

       var innertext = $("#title_"+offerid).text();
	   
	  
				
		
		var str  = '<input type="hidden" name="bid_id" value="'+bidid+'"><input type="hidden" name="offer_id" value="'+offerid+'"><input type="hidden" name="offerposteduser" value="'+offerposteduser+'"><input type="hidden" name="option" value="replies">';


		$('#bids_'+bidid).append('<div id="bidsform_'+bidid+'" style="margin-top:5px;margin-right:10px;display:block;"><div  class="col-lg-12 " style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;margin-bottom:12px;"><form method="post" id="register-form'+bidid+'" name="register-form'+bidid+'" action="ajax.php"  enctype="multipart/form-data" autocomplete="off"><div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:0px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="reply to '+$.trim(innertext)+'" cols="" rows=""></textarea></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 " style="margin-top:0px;padding-right: 0px;"><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero"><div class="form-group"><label class="filebutton"><span><input type="file" id="upload_file" name="upload_file[]"  class="required" multiple/></span></label></div></div><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image4"  class="btn btn-sm btn-primary" id="replycomments" value="reply"/><input type="hidden" name="prevs" id="prevs" value=""></div></div>'+str+'</form></div></div>')
		
		
		$('#btn_reply_'+bidid).prop('disabled',true);
		
	
}


	
	
	
	
	
	


function paypal(seller_id,user_id,offer_id,bid_id,amount)

{

	

	if(confirm('you agree you are purchasing this item and willing to pay '+amount+' ?'))

	

	window.location = 'gotopaypal.php?seller_id='+seller_id+'&user_id='+user_id+'&offer_id='+offer_id+'&bid_id='+bid_id;

	

	}
	
	
function savesearch()

{

	$("#save_srch").prop('disabled',true);
	
	var keyword = $("#lname").val();
	
	var subcat = $("#sub_cat").val();
	
	
	 data = 'option=savesearch&keyword='+keyword+'&subcat='+subcat;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	      
		  
		

		}})	
	
}	
	
	
	
	
	
	
	

</script>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>