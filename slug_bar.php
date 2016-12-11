<?php
try
{
$bdd_gamedata = new PDO('mysql:host=db629575900.db.1and1.com;dbname=db629575900;charset=utf8', 'dbo629575900', 'Zorn1902');
}
catch(Exception $error)
{
die('Error : '.$error->getMessage());
}
$post_name = substr($_SERVER["REQUEST_URI"],1);
$query= 'SELECT DISTINCT post_title,ID,post_date,post_name,slug FROM xwapvLkfposts AS p INNER JOIN (SELECT * FROM xwapvLkfterm_relationships) as tr ON p.ID = tr.object_id INNER JOIN (SELECT slug,term_id FROM `xwapvLkfterms`) as t ON t.term_id = tr.term_taxonomy_id WHERE p.post_name="'.$post_name.'"';
$answer = $bdd_gamedata->query($query);
while ($data = $answer->fetch())
{
	$post_slug = $data['slug'];
}
$answer->closeCursor();

if (!isset($post_slug))
{
	exit;
}

$query='SELECT DISTINCT post_title,ID,post_date,post_name,slug,post_status FROM xwapvLkfposts AS p
INNER JOIN (SELECT * FROM xwapvLkfterm_relationships) as tr ON p.ID = tr.object_id
INNER JOIN (SELECT * FROM `xwapvLkfterms`) as t ON t.term_id = tr.term_taxonomy_id
WHERE t.slug="'.$post_slug.'" AND p.post_status="publish" 
ORDER BY post_date DESC';
$answer = $bdd_gamedata->query($query);
$data_array=array();
while ($data = $answer->fetch())
{
  // Just build the list
  array_push($data_array,$data['post_name']);
  
}
$answer->closeCursor();
if (!isset($data_array))
{
	exit;
}

$data_size = count($data_array);
$post_key = array_search($post_name, $data_array);
if (($post_key - 1)>= 0)
{
	$post_prev_name = $data_array[$post_key - 1];
}
else
{
	$post_prev_name =$post_name;
}
if (($post_key + 1)< $data_size)
{
	$post_next_name = $data_array[$post_key + 1];
}
else
{
	$post_next_name =$post_name;
}	

$post_prev_url='http://mediations.civcreation.com/'.$post_prev_name;
$post_next_url='http://mediations.civcreation.com/'.$post_next_name;
?>
<div class="slug_bar" style="top:5px">
<a href="<?php echo($post_prev_url)?>"><img src="/wp-content/themes/graphy/images/direction_arrow_blue_left.png" style="float:left;left:0px;width:32px;height:32px;border:0;"></a>
<a href="<?php echo($post_next_url)?>"><img src="/wp-content/themes/graphy/images/direction_arrow_blue_right.png" style="float:right;right:0px;width:32px;height:32px;border:0;"></a>
</div>
