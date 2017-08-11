<?php
  wp_enqueue_style('gallery-page', get_template_directory_uri() . '/gallery.css');
?>

<?php
  class Gallery {
    public $image;
    public $link_date;
    public $link_title;
    public $link_url;
  }

  $gallery_array = array();

  for($i=0; $i < 7; $i++){
    $temp_gallery_item = new Gallery;
    $temp_gallery_item->image = 'image';
    $temp_gallery_item->link_date = 'link-date';
    $temp_gallery_item->link_title = 'link-title';
    $temp_gallery_item->link_url = 'link-url';
    $gallery_array[] = $temp_gallery_item;
  }
?>

<div id="jumbotron">
	<h1> <?php echo wp_title() ?></h1>
</div>

<section class="grid-container gallery-section" id="aotca-content-container">
  <?php
    function roundUpToAny($n, $x=3) {
      return (ceil($n)%$x === 0) ? ceil($n) : round(($n+$x/2)/$x)*$x;
    }

    for($i = 0; $i < roundUpToAny(count($gallery_array)); $i++) {
  ?>
    <div class="gallery-container <?php if ($i >= count($gallery_array)) echo "empty" ?>">
      <?php
        if ($i < count($gallery_array)) {
      ?>
      <a class="naked gallery-item" href="<?php echo $gallery_array[$i]->link_url?>">
        <div class="logo-wrapper">
            <img src="<?php echo $gallery_array[$i]->image?>" />
        </div>
        <div class="description">
          <span class="description-date"><?php echo $gallery_array[$i]->link_date?></span>
          <span class="description-title"><?php echo $gallery_array[$i]->link_title?></span>
        </div>
      </a>
      <?php }?>
    </div>
  <?php }?>
</section>
