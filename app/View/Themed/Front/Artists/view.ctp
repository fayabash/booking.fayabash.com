<div class="container">
    <h2 class="text-center hidden-xs hidden-sm">
        <?php echo $this->Html->link('FB', 'http://www.fayabash.com'); ?>
    </h2>

    <h2 class="text-center visible-xs visible-sm">
        <?php echo $this->Html->link('ARTIST BOOKING', '/'); ?>
    </h2> 

    <h1 class="text-center visible-xs visible-sm" style="margin:55px 0 0 0;"><?php echo $artist['Artist']['name']; ?></h1>

</div>

<section class="artists-view container">
    <div class="row">

        
        <!-- bio -->
        <div class="col-md-3">
            <h4 class="hidden-xs hidden-sm">BIO</h4>
            <p>
                <?php
                echo nl2br($artist['Artist']['bio']);
                ?>
            </p>
        </div>
        
        <!-- images name -->
        <div class="col-md-6">

            <h2 class="text-center hidden-xs hidden-sm">
                <?php echo $this->Html->link('ARTIST BOOKING', '/'); ?>
            </h2>

            <h1 class="text-center hidden-xs hidden-sm" style="margin:55px 0 0 0;"><?php echo $artist['Artist']['name']; ?></h1>
            <p>
                <?php
                $images = array();
                foreach( $artist['Attachment'] as $attachment  ){
                    if( $attachment['type'] == 'image' ){
                        array_push($images, $attachment['path']);
                    }
                }

                $image = ( empty($images) )? '' : ( !empty($images[1]) )? $images[1]: $images[0];


               echo $this->Image->image(array(
                    'image' => $image,
                    'width' => '992'
                ),array(
                    'class' => 'img-responsive'
                ));
                        
                ?>

            </p>
        </div>
        
        <!-- links press-->
        <div class="col-md-3 links">
            <div class="text-center" style="text-transform:uppercase;">
    		<h4>LINKS</h4>
    		<?php echo $this->Markdown->decode($artist['Artist']['links']); ?>
    		
    	   <div class="spacer"></div>

    		<h4>PRESSKIT</h4>
    		<?php foreach( $artist['Attachment'] as $attachment	 ):?>
    			<?php if( $attachment['type'] != 'image' ):?>
    				<?php 
    				echo $this->Html->link('downlaod presskit','/'.$attachment['path']);
    				?>
    			<?php endif; ?>
    		<?php endforeach; ?>
    		
            <div class="spacer"></div>
    		
    		<h4>CONTACT</h4>
    		<p><a href="mailto:booking@fayabash.com">booking@fayabash.com</a></p>
            </div>
        </div>
    </div>
</section>