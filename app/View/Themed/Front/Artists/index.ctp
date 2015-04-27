<h1 class="text-center">ART I STS BOOK I NG</h1>
<section class="artists-index text-center">
    <?php foreach( $artists as $artist ): ?>
    <h3>
        <?php
        echo $this->Html->link($artist['Artist']['name'], array(
            'action' => 'view',
            $artist['Artist']['id'],
            Inflector::slug($artist['Artist']['name'],'-')
        ));
        ?>
    </h3>
    <?php endforeach; ?>
</section>