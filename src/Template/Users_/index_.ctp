<h1>Usuarios</h1>


<ul>
    
    <?php foreach ($users as $user): ?>
    <li>
        
        <?=  $user->email ?>
        <?=  $user->firstname ?>
    </li>

    <?php endforeach; ?>
    
</ul>