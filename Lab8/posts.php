<?php
include 'classes/connection.php';
$offset = $_GET['offset'];
?>
<ul>
<?php
 $args = array(
 'numberposts' => 10,
 'order' => 'DESC',
 'offset' => $offset,
 'orderby' => 'post_date'
 );
 $postslist = get_posts($args);
 $i = 0;
 foreach($postslist as $post) {
 setup_postdata($post);
 $the_content = get_the_excerpt();
 $the_title = get_the_title();
 $the_link = get_permalink();
 print "<li>";
 print "<a href=" . $the_link . ">";
 print "<h4>" . substr($the_title, 0, 50) . "</h4>";
 print "<p>" . substr($the_content,0, 100) . "....</p>";
 print "</a>";
 print "</li>";
 $i++;
 }
?>
</ul>