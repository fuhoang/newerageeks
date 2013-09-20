<?php
function some_function($string){
     				$string = substr($string,0,500);
     				$string = substr($string,0,strrpos($string," "));
     				return $string . ' ... ';
				}
				
?>

	<div id="content">
	
	<div id="slideGallery">
		
		<div id="banner-fade">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
        	<?
        		
				if(is_array($featureOrderList)){
					foreach($featureOrderList as $li ) {
			?>	
       
           		<li>
          			<a href="http://localhost/newerageeks/index.php?p=view_blog&blogId=<?=$li->id?>">
          				<img src="http://localhost/newerageeks/fufu-cms/<?=$li->image_url?>" title="Automatically generated caption">
          				<p class="fu-caption"><?=$li->blog_title?></p>
          			</a>		
          		</li>
          <?
					}
				}
          ?>	
         	    			
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 420,
            width       : 950,
            responsive  : true
          });

        });
      </script>
	</div>
	
	<div id="negUrl">
			<p style="font-size:42px;">New Era Geeks</p>
			<p class="italic">www.newerageeks.com</p>
	</div>
	
	<div class="section-title">
			<h2>Blog</h2>
	</div>
	
	<div class="section-divider"></div>
	
	

	
	<div class="left-col">	
			
		<?
			if(is_array($blogOrderList)){
				foreach($blogOrderList as $li ) {
		?>	
			
			
		<div class="blog-container">
		
			<div class="image-holder">	
				<img src="fufu-cms/<?=$li->image_url?>" alt="" />
			</div>
			
		<div class="post-meta">	
			<div class="title-wrap">
				<a href="index.php?p=view_blog&blogId=<?=$li->id?>"><h2><?=$li->blog_title?></h2></a>
			</div>
				<ul class="date-wrap">
					<li><?=date("d ", $li->date_posted)?></li>
					<li><?=date("M", $li->date_posted)?></li>
					<li><?=date("Y", $li->date_posted) ?></li>
				</ul>
		</div>	

		

	
		<div class="content-wrap">
			<p><?php
				
				
				
				$big = $li->blog_content;
				$small = some_function($big);
				echo $small;
				
				
				?></p>
		</div>	
		<a style="color:#FF6633; float: right; padding: 10px; font-style: bold;" href="index.php?p=view_blog&blogId=<?=$li->id?>">more...</a>
		

		
		</div>
		
		<?	
				}
			}
		?>


		


	</div><!--end of left col-->

	

	<div class="right-col">
		<h3 class="padding-left">Recent blogs</h3>
			<ul class="recent-list">
		<?
			if(is_array($blogOrderList)){
				foreach($blogOrderList as $li ) {
		?>	
				
			<li><a href="index.php?p=view_blog&blogId=<?=$li->id?>"><?=$li->blog_title?></a></li>
		<?
				}
			}	
		?>	
			</ul>	
		
		<h3 class="padding-left">Features</h3>
			<?
        		
				if(is_array($featureOrderList)){
					foreach($featureOrderList as $li ) {
			?>
			
			<div class="feature_box">
					<img src="http://localhost/newerageeks/fufu-cms/<?=$li->image_url?>" title="<?=$li->blog_title?>">
				<a href="http://localhost/newerageeks/index.php?p=view_blog&blogId=<?=$li->id?>"><span class="feature_title"><?=$li->blog_title?></span></a>	
			</div>
			
			<?
					}
				}
			
			?>

	</div><!--end of right-col-->
	
	<div class="section-title">
			<h2>Social Media</h2>
	</div>
	
	<div class="section-divider"></div>
</div><!--end of content-->
