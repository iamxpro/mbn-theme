<?php
/**
 * searchform (searchform.php)
 * @package WordPress
 * @subpackage MBN
 */
?>
<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group">
		<label class="sr-only" for="search-field">Search</label>
		<input type="search" class="form-control input-sm" id="search-field" placeholder="Search ..." value="<?php echo get_search_query() ?>" name="s">
	</div>
	<button type="submit" class="btn btn-default btn-sm">Search</button>
</form>