<h1> Topics </h1>

<?php echo $this->HTML->link('Create a new topic', array('controller' => 'topics', 'action' => 
    'add')); ?>
<br>

<?php
    if(AuthComponent::user()){
        echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 
    'logout'));
    }else{
        echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 
    'login')).' or '.$this->HTML->link('Register', array('controller' => 'users', 'action' => 
    'add'));
    }
?>

<br>

<table>
<tr>
    <th>Title</th>
    <th>User ID</th>
    <th>Created</th>
    <th>Modified</th>
    <?php if(AuthComponent::user('role') == 2) : ?>
        <th>Published</th>
    <th>Edit</th>
    <th>Delete</th>
    <?php endif; ?>
</tr>
<?php foreach($topics as $topic) : ?>

<tr>
<?php if(AuthComponent::user('role')== 2) : ?>
    <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 
        'topics' , 'action' => 'view' , $topic['Topic']['id'])); ?></td>
    <td><?php echo $topic['User']['username']; ?></td>
    <td><?php echo $topic['Topic']['created']; ?></td>
    <td><?php echo $topic['Topic']['modified']; ?></td>
<?php if(AuthComponent::user('role') == 2) : ?>
    <td><?php echo $topic['Topic']['visible']; ?></td>
    <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics' , 'action' => 
        'edit' , $topic['Topic']['id'])); ?></td>
    <td><?php echo $this->Form->postlink('Delete', array('controller' => 'topics' , 'action' => 
        'delete' , $topic['Topic']['id']), array('confirm' => 'Are you sure? Final na?')); ?></td>
   <?php endif; ?>
</tr>
<?php endif; ?>
<?php if(AuthComponent::user('role') == 1 || !AuthComponent::user()) : ?>
<?php if($topic['Topic']['visible'] == 1) : ?>
    <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 
        'topics' , 'action' => 'view' , $topic['Topic']['id'])); ?></td>
    <td><?php echo $topic['User']['username']; ?></td>
    <td><?php echo $topic['Topic']['created']; ?></td>
    <td><?php echo $topic['Topic']['modified']; ?></td>
    <?php if(AuthComponent::user('role') == 2) : ?>
        <td><?php echo $topic['Topic']['visible']; ?></td>
    <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics' , 'action' => 
        'edit' , $topic['Topic']['id'])); ?></td>
    <td><?php echo $this->Form->postlink('Delete', array('controller' => 'topics' , 'action' => 
        'delete' , $topic['Topic']['id']), array('confirm' => 'Are you sure? Final na?')); ?></td>   
    <?php endif; ?>
</tr>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php unset($topic); ?>
</table>