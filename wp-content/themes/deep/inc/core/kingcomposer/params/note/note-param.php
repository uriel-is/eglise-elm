<?php 

// Text param
add_action('init', 'kc_note_settings_field', 99 );
 
function kc_note_settings_field(){
 
    global $kc;
    $kc->add_param_type( 'note', 'output_note_param' );
}
 
function output_note_param(){
    echo '
    <div name="{{data.name}}" class="kc-param wn-text-wrap">
        {{data.value}}
    </div>';
}