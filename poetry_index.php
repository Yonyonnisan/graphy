<?php
try
{
$bdd_gamedata = new PDO('mysql:host=db629575900.db.1and1.com;dbname=db629575900;charset=utf8', 'dbo629575900', 'Zorn1902');
}
catch(Exception $error)
{
die('Error : '.$error->getMessage());
}

//echo('

//<span style="font-size: 2.5em; font-weight: bold; text-decoration: underline;">Liste des textes</span>
//');

$answer = $bdd_gamedata->query('SELECT DISTINCT post_title,ID,post_date,post_name,post_status FROM xwapvLkfposts AS p
INNER JOIN (SELECT * FROM xwapvLkfterm_relationships) as tr ON p.ID = tr.object_id
INNER JOIN (SELECT * FROM `xwapvLkfterms`) as t ON t.term_id = tr.term_taxonomy_id
WHERE t.slug="poesie" AND p.post_status="publish"
ORDER BY post_date DESC');
while ($data = $answer->fetch())
{
$url = 'http://mediations.civcreation.com/'.$data['post_name'];
echo('
<ul>
 	<li><a href="');echo($url);echo('">'); echo $data['post_title'];echo('</a></li>
</ul>
');
}
$answer->closeCursor();
echo('
');
?>