<div class="artists view">
        <h2><?php echo __('Artist'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['bio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presskit'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['presskit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Links'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['links']); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Artist'), array('action' => 'edit', $artist['Artist']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Artist'), array('action' => 'delete', $artist['Artist']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $artist['Artist']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Attachments'); ?></h3>
                <?php if (!empty($artist['Attachment'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Subtype'); ?></th>
		<th><?php echo __('Size'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('Embed'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Copyright'); ?></th>
		<th><?php echo __('Metadata'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($artist['Attachment'] as $attachment): ?>
		<tr>
			<td><?php echo $attachment['id']; ?></td>
			<td><?php echo $attachment['name']; ?></td>
			<td><?php echo $attachment['date']; ?></td>
			<td><?php echo $attachment['type']; ?></td>
			<td><?php echo $attachment['subtype']; ?></td>
			<td><?php echo $attachment['size']; ?></td>
			<td><?php echo $attachment['path']; ?></td>
			<td><?php echo $attachment['embed']; ?></td>
			<td><?php echo $attachment['description']; ?></td>
			<td><?php echo $attachment['copyright']; ?></td>
			<td><?php echo $attachment['metadata']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attachments', 'action' => 'view', $attachment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attachments', 'action' => 'edit', $attachment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attachments', 'action' => 'delete', $attachment['id']), null, __('Are you sure you want to delete # %s?', $attachment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
