<?php
    $this->assign('title',  'Blog Posts')
?>
<h1>
    <?= $this->Html->link('Add New',['controller'=>'Posts','action'=>'add'],['class'=>['pull-right','fs12']]); ?>
    Blog Posts
</h1>
<ul>
    <?php foreach($posts as $post) : ?>
        <li>
            <!-- <?= h($post->title); ?> -->
            <!-- <?= $this->Html->link($post->title,['controller'=>'Posts','action'=>'view',$post->id]); ?> -->
            <!-- <?= $this->Html->link($post->title,['action'=>'view',$post->id]); ?> -->
            <!-- <a href="<?= $this->Url->build(['action'=>'view',$post->id]); ?>">
                <?= h($post->title); ?>
            </a> -->
            <?= $this->Html->link($post->title,['action'=>'view',$post->id]); ?>
            <?= $this->Html->link('[Edit]',['action'=>'edit', $post->id ],['class'=>'fs12']); ?>
            <?= $this->Form->postLink(
                '[x]',
                ['action'=>'delete',$post->id],
                ['confirm'=>'Are you sure?','class'=>'fs12']
            );
            ?>
        </li>
    <?php endforeach; ?>
</ul>