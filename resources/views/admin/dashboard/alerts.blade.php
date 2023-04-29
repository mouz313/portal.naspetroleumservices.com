<?php if(Session::has('flash_message')): ?>
    <div class="alert alert-fill-primary " role="alert">
    <i class="fa fa-exclamation-triangle"></i>
    {{ Session::get('flash_message') }}
    </div>
    
<?php endif; ?>

<?php if(Session::has('Success')): ?>
    <div class="alert alert-fill-primary " role="alert">
    <i class="fa fa-exclamation-triangle"></i>
    {{ Session::get('Success') }}
    </div>
    
<?php endif; ?>


