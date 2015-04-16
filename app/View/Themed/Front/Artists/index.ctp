<section class="artists-index">
    <?php foreach( $artists as $artist ): ?>
    <h2><?php echo $this->Html->link($artist['Artist']['name'], array(
        'action' => 'view',
        $artist['Artist']['id'],
        Inflector::slug($artist['Artist']['name'],'-')
    )); ?></h2>
    <?php endforeach; ?>
</section>