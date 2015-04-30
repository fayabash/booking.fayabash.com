<div class="container">
    <h2 class="text-center">
        <?php echo $this->Html->link('FB', 'http://www.fayabash.com'); ?>
    </h2>
    <h1 class="text-center">ART I STS BOOK I NG</h1>

    <section class="artists-index text-center">
        <?php foreach( $artists as $artist ): ?>
            <div class="menitem">
                <h3>
                <?php
                echo $this->Html->link($artist['Artist']['name'], array(
                    'action' => 'view',
                    $artist['Artist']['id'],
                    Inflector::slug($artist['Artist']['name'],'-')
                ));
                ?>
                </h3>

             <?php
                $images = array();
                foreach( $artist['Attachment'] as $attachment  ){
                    if( $attachment['type'] == 'image' ){
                        array_push($images, $attachment['path']);
                    }
                }

                $image = ( empty($images) )? '' : $images[0];

                

               echo $this->Image->image(array(
                    'image' => $image,
                    'width' => '600',
                    'cropratio' => '6:4'
                ),array(
                    'class' => 'img-responsive img-absolute'
                ));
                        
                ?>
            </div>
        <?php endforeach; ?>
    </section>
</div>