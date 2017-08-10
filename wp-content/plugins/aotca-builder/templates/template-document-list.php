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

$documents = get_fields(get_the_ID())['documents'];

$page_no = $_GET["results"];
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
  </div>
  <div id="modal-feedback">
      <p id="download-link"><a download>Click here to download</a></p>
      <p id="modal-msg"></p>
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
 <?php if(!$documents || count($documents) == 0):?>
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
   			<a href="?results=<?php echo $page_no-1?>" class="custom_pagination" >&laquo; Previous </a>
   		<?php
   		$previous_counter++;
   		}?>

   		<a href ="?results=<?php echo $i?>" <?php if($page_no==$i){?>class="active" <?php }?>><?php echo $i; ?></a>

   	<?php
   	}
   	if($page_no!=$total_pages&&$next_counter==0){?>
   		<a href="?results=<?php echo $page_no+1?>" class="custom_pagination"> Next &raquo;</a>
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
        $('#modal-feedback').children().hide();
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
                          $('#download-link').find('a').attr('href', response);
                          $('#download-link').show()
                          $('#modal-msg').hide();
                      }
                      else {
                          $('#download-link').find('a').removeAttr('href');
                          $('#download-link').hide();
                          $('#modal-msg').html('Incorrect password');
                          $('#modal-msg').show();
                      }
                    }
                });
            }
            else {
                $('#download-link').find('a').removeAttr('href');
                $('#download-link').hide();
                $('#modal-msg').html('Please enter your password');
                $('#modal-msg').show();
            }
          return false;
    	  });
        $('button.member').on('click', function(){
            // reset
            $('#download-link').find('a').removeAttr('href');
            $('#modal-feedback').children().hide();
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
