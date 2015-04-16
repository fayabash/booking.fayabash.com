<section class="artists-view row">
    
    <!-- bio -->
    <div class="col-md-3">
        <h3>Bio</h3>
        <p>
            <?php
            echo nl2br($artist['Artist']['bio']);
            ?>
        </p>
    </div>
    
    <!-- images name -->
    <div class="col-md-6">
        <h2><?php echo $artist['Artist']['name']; ?></h2>
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
        
        <h3>Links</h3>
        <?php echo $this->Markdown->decode($artist['Artist']['links']); ?>
        
        
        <h3>Presskit</h3>
        <?php foreach( $artist['Attachment'] as $attachment  ):?>
            <?php if( $attachment['type'] != 'image' ):?>
                <?php 
                echo $this->Html->link('downlaod presskit','/'.$attachment['path']);
                ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    
</section>