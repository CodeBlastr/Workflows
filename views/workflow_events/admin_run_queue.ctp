<?php 
if (!empty($triggered)) { 
?>
<h1>Events Run</h1>
<pre>
	<?php print_r($triggered); ?>
</pre>
<?php 
} else {
?>
<h1>No Events Run</h1>
<?php
}
?>