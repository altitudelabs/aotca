<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Document List
 *
 * Access original fields: $mod_settings
 */

 wp_enqueue_style('document-list', plugin_dir_url( __FILE__ ) . '/assets/document-list.css');

 $document_list_default = array(
   'page' => 10,
   'button' => array (
       'title' => '',
       'link' => '',
   ),
 );

$fields_args = wp_parse_args( $mod_settings, $document_list_default);

 extract( $fields_args );

 $container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
 	'module', 'module-' . $mod_name, $module_ID
 	), $mod_name, $module_ID, $fields_args )
 );

// no pw needed or logged in
 if (empty(get_fields(get_the_ID())['password']) || isset($_POST['pass'])){
     $documents = get_fields(get_the_ID())['documents'];
 }
 else{ //check password
     $m_password = $_POST['password'];
     $password = get_fields(get_the_ID())['password'];
     if (strcmp($m_password, $password) == 0) {
 		$documents = get_fields(get_the_ID())['documents'];
        $pass = true;
 	}
    else {
        $pass = false;
    }
 }

$page_no = $_POST['page_no'];
$total_pages = ceil(count($documents)/$page);

if(!isset($page_no)||empty($page_no)){
    $page_no = "1";
}
$start = ($page_no-1)*$page;
?>
<div id="login-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
      <p id="close">&times;</p>
      <div class="modal-inner">
    <p>Enter your member's password</p>
    <form method="post">
        <input name="id" type="hidden"/>
        <input name="type" type="hidden"/>
        <input type="password" name="password"/>
        <button type="submit" class="login btn-secondary bold cap">login</button>
    </form>
    <p id="modal-msg">&emsp;</p>

  </div>
</div>
</div>
 <div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
     <div class="aotca-viewport">
<?php if (!empty($button[0]["title"]) && (!empty($button[0]["link"]))) :?>
    <form method="get" action="<?php echo $button[0]["link"] ?>">
        <button class="return bold" type="submit"><i class="fa fa-caret-left fa-fw" aria-hidden="true"></i><?php echo $button[0]["title"] ?></button>
    </form>

<?php endif;?>
<!-- need pw login -->
<?php if (!empty(get_fields(get_the_ID())['password'])):?>
    <div>
        <!-- not logged in before -->
        <?php if (!isset($_POST['pass'])):?>
            <!-- not logged in through publication page -->
            <?php if (!isset($_POST['password'])):?>
                Please login in Publications.
            <?php else:?>
                <?php if (!$pass):?>
                    Incorrect password.
                <?php else:?>
                    <!-- correct pw but no documents -->
                    <?php if (empty($documents)):?>
                        There are no documents available.
                    <?php endif?>
                <?php endif;?>
            <?php endif ;?>
        <?php endif ;?>
    </div>
<!-- no pw lock but no documents -->
 <?php elseif(empty($documents)):?>
     <div>
         There are no documents available.
     </div>
<?php endif;?>
 <?php if($documents):?>
   <div class="document-container">
       <ul class="naked">
           <?php for($i=$start; $i< min(count($documents),($start+$page)); $i++):?>
       <li>
           <div>
               <p class="title"><?php echo $documents[$i]['title']?></p>
               <p><?php echo $documents[$i]['date']?></p>
             </div>
             <?php if (isset($documents[$i]['password']) && (!empty($documents[$i]['password']))): ?>
                 <button class="btn-outline-secondary cap member" data-type="documents" data-id="<?php echo $documents[$i]['file']['id'] ?>"><i class="fa fa-lock fa-fw" aria-hidden="true"></i>Members</button>
            <?php else:?>
                <form method="get" target="_blank" action="<?php echo $documents[$i]['file']['url'] ?>" class="download">
                    <button class="btn-outline-primary cap" type="submit">
                        Download Now
                    </button>
                </form>
            <?php endif;?>
       </li>
        <?php endfor;?>
    </ul>
   </div>
   <div id = "pagination_wrapper">
    <?php
    $previous_counter = 0;
    $next_counter = 0;
    for($i = 1; $i<=$total_pages; $i++){

        if($page_no>1 && $previous_counter==0){?>
            <form method="post" target="_self" action="<?php echo $_SERVER['REQUEST_URI']?>">
                <input type="hidden" name="page_no" value="<?php echo $page_no-1?>"/>
                <input type="hidden" name="pass" value="<?php echo $pass?>"/>
                <button type="submit" class="custom_pagination">&laquo; Previous</button>
            </form>
        <?php
        $previous_counter++;
        }?>
        <form method="post" target="_self" action="<?php echo $_SERVER['REQUEST_URI']?>">
            <input type="hidden" name="page_no" value="<?php echo $i?>"/>
            <input type="hidden" name="pass" value="<?php echo $pass?>"/>
            <button type="submit" class="pagination<?php if ($page_no==$i) echo " active"?>"><?php echo $i?></button>
        </form>
    <?php
    }
    if($page_no!=$total_pages&&$next_counter==0){?>
        <form method="post" target="_self" action="<?php echo $_SERVER['REQUEST_URI']?>">
            <input type="hidden" name="page_no" value="<?php echo $page_no+1?>"/>
            <input type="hidden" name="pass" value="<?php echo $pass?>"/>
            <button type="submit" class="custom_pagination">Next &raquo;</button>
        </form>
    <?php
        $next_counter++;
    }?>
   </div>
   <?php endif;?>
        </div>
 </div>
 <script>
 var $ = window.jQuery;
 $(document).ready(function() {
     $('#login-modal form').on('submit', function(){
         var _password = $(this).find('input[name="password"]').val();
         if (_password){
             $.ajax({
                 url: <?php echo wp_json_encode(admin_url('admin-ajax.php', 'relative'))?>,
                 type: 'post',
                 data: {
                     action: 'password',
                   file: $(this).find('input[name="id"]').val(),
                   type: $(this).find('input[name="type"]').val(),
                   password: _password,
                   post_id: <?php echo get_the_ID() ?>,
                 },
                 success: function(response) {
                   if (response) {
                       $('#modal-msg').html($('<a>',{href: response, text: 'Click here to download', download: true}));
                   }
                   else {
                       $('#modal-msg').html('Incorrect password');
                   }
                 }
             });
         }
         else {
             $('#modal-msg').html('Please enter your password');
         }
       return false;
       });
     $('button.member').on('click', function(){
         // reset
        $('#modal-msg').html('&emsp;');
         $('#login-modal').find('input[name="password"]').val('');

         // set input value
         $('#login-modal').find('input[name="id"]').val($(this).data('id'));
         $('#login-modal').find('input[name="type"]').val($(this).data('type'));

          $('#login-modal').show();
     });
     $('#close').on('click', function(){
         $('#login-modal').hide();
     });
 });
 </script>
