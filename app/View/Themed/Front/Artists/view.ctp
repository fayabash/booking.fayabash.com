<section class="artists-view row">
    
    <!-- bio -->
    <div class="col-md-3">
        <h4>BIO</h4>
        <p>
            <?php
            echo nl2br($artist['Artist']['bio']);
            ?>
        </p>
    </div>
    
    <!-- images name -->
    <div class="col-md-6">
        <h2 class="text-center"><?php echo $artist['Artist']['name']; ?></h2>
        <p>
            <?php foreach( $artist['Attachment'] as $attachment  ):?>
                <?php if( $attachment['type'] == 'image' ):?>
                    <?php
                    echo $this->Image->image(array(
                        'image' => $attachment['path'],
                        'width' => '992'
                    ),array(
                        'class' => 'img-responsive'
                    ));
                    
                    ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </p>
    </div>
    
    <!-- links press-->
    <div class="col-md-3">
        <div class="text-center">
		<h4>LINKS</h4>
		<?php echo $this->Markdown->decode($artist['Artist']['links']); ?>
		
		<p></p>
		<h4>PRESSKIT</h4>
		<?php foreach( $artist['Attachment'] as $attachment	 ):?>
			<?php if( $attachment['type'] != 'image' ):?>
				<?php 
				echo $this->Html->link('downlaod presskit','/'.$attachment['path']);
				?>
			<?php endif; ?>
		<?php endforeach; ?>
		
		<p></p>
		<h4>CONTACT</h4>
		<p><a href="mailto:booking@fayabash.com">booking@fayabash.com</a></p>
        </div>
    </div>
    
</section>