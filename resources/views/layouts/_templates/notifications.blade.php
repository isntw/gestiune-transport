<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<?php
if (isset($errors) && count($errors)):
    foreach ($errors->all() as $error):
        \Toastr::add('error', $error);
    endforeach;
endif;
?>
{!! Toastr::render() !!}