<?php
/**
 * WorkflowItemEventFixture
 *
 */
class WorkflowItemEventFixture extends CakeTestFixture {
	
/**
 * Import
 *
 * @var array
 */
	public $import = array('config' => 'Workflows.WorkflowItemEvent');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'workflow_item_id' => '4',
			'data' => 'b:0;',
			'trigger_time' => '2012-04-19 21:20:29',
			'is_triggered' => 0,
			'triggered_time' => NULL,
			'is_failed' => 0,
			'creator_id' => '4',
			'modifier_id' => '4',
			'created' => '2012-04-19 21:20:29',
			'modified' => '2012-04-19 21:20:29'
		),
		array(
			'id' => '84',
			'workflow_item_id' => '5',
			'data' => 'a:11:{s:11:"CatalogItem";a:39:{s:2:"id";s:36:"4f90a57d-e664-447e-9f4d-1530124e0d46";s:9:"parent_id";N;s:3:"lft";s:4:"1603";s:4:"rght";s:4:"1604";s:3:"sku";s:7:"2838838";s:4:"name";s:6:"Delete";s:7:"summary";s:11:"delete this";s:11:"description";s:271:"delete delete delete delete delete delete delete deletedelete delete delete deletedelete delete delete deletedelete delete delete deletedelete delete delete deletedelete delete delete deletedelete delete delete deletedelete delete delete deletedelete delete delete delete";s:9:"video_url";s:0:"";s:10:"start_date";N;s:8:"end_date";N;s:9:"published";b:1;s:21:"catalog_item_brand_id";s:1:"3";s:10:"catalog_id";s:1:"2";s:5:"stock";N;s:10:"stock_item";s:5:"99999";s:8:"cart_min";N;s:8:"cart_max";N;s:5:"price";s:5:"45.00";s:8:"location";N;s:8:"deadline";N;s:6:"weight";N;s:6:"height";N;s:5:"width";N;s:6:"length";N;s:13:"shipping_type";s:0:"";s:15:"shipping_charge";N;s:12:"payment_type";N;s:12:"arb_settings";s:0:"";s:10:"is_virtual";b:0;s:12:"hours_expire";N;s:5:"model";s:0:"";s:11:"foreign_key";s:0:"";s:8:"owner_id";N;s:8:"children";N;s:10:"creator_id";s:1:"1";s:11:"modifier_id";s:1:"1";s:7:"created";s:19:"2012-04-19 23:53:33";s:8:"modified";s:19:"2012-04-19 23:53:33";}s:7:"Catalog";a:14:{s:2:"id";s:1:"2";s:4:"name";s:4:"WWBE";s:8:"alias_id";N;s:7:"summary";s:0:"";s:12:"introduction";s:0:"";s:11:"description";s:0:"";s:10:"additional";s:0:"";s:10:"start_date";s:19:"2010-04-25 08:48:00";s:8:"end_date";s:19:"2010-04-25 08:48:00";s:9:"published";b:1;s:10:"creator_id";s:1:"1";s:11:"modifier_id";s:1:"1";s:7:"created";s:19:"2010-05-20 16:46:21";s:8:"modified";s:19:"2011-01-20 18:54:23";}s:17:"CatalogItemParent";a:39:{s:2:"id";N;s:9:"parent_id";N;s:3:"lft";N;s:4:"rght";N;s:3:"sku";N;s:4:"name";N;s:7:"summary";N;s:11:"description";N;s:9:"video_url";N;s:10:"start_date";N;s:8:"end_date";N;s:9:"published";N;s:21:"catalog_item_brand_id";N;s:10:"catalog_id";N;s:5:"stock";N;s:10:"stock_item";N;s:8:"cart_min";N;s:8:"cart_max";N;s:5:"price";N;s:8:"location";N;s:8:"deadline";N;s:6:"weight";N;s:6:"height";N;s:5:"width";N;s:6:"length";N;s:13:"shipping_type";N;s:15:"shipping_charge";N;s:12:"payment_type";N;s:12:"arb_settings";N;s:10:"is_virtual";N;s:12:"hours_expire";N;s:5:"model";N;s:11:"foreign_key";N;s:8:"owner_id";N;s:8:"children";N;s:10:"creator_id";N;s:11:"modifier_id";N;s:7:"created";N;s:8:"modified";N;}s:16:"CatalogItemBrand";a:10:{s:2:"id";s:1:"3";s:4:"name";s:12:"Product Club";s:7:"summary";s:1465:"<div id="brandPageSplash">
	<img alt="Product Club" src="/theme/default/images/productclub-product-page.jpg" style="width: 889px; height: 244px;" /></div>
<div id="brandPageMeta">
	<div id="brandPageLogo">
		<img alt="doop - the ultimate styling brand" src="/theme/default/images/productclub-mini-logo.gif" style="width: 140px; height: 139px;" /></div>
	<div id="brandPageBrand">
		<h2>
			Product Club</h2>
	</div>
	<div id="brandPageSections">
		<ul>
			<li>
				<div class="bpSection">
					<a href="/galleries/galleries/view/Gallery/320"><img src="/theme/default/images/productclub-photosIcon.jpg" /></a></div>
				Photos</li>
			<li>
				<div class="bpSection">
					<a href="/galleries/galleries/view/Gallery/321"><img src="/theme/default/images/productclub-pressIcon.jpg" /></a></div>
				Press</li>
			<li>
				<div class="bpSection">
					<a href="/theme/default/images/Product_Club_Brochure.pdf"><img src="/theme/default/images/productclub-brochureIcon.jpg" /></a></div>
				Brochure</li>
		</ul>
	</div>
	<div id="brandPageBullets">
		<div class="brandPageBulletsHeader">
			Why WWBE Members Love Them</div>
		<ul>
			<li>
				The best possible tools for stylists</li>
			<li>
				The leader in color accessories</li>
			<li>
				A major commitment to education for colorists</li>
			<li>
				The most complete accessories range available</li>
		</ul>
	</div>
	<div style="clear: both;">
		<!-- --></div>
</div>
";s:10:"catalog_id";s:1:"2";s:8:"owner_id";s:1:"1";s:10:"creator_id";s:1:"1";s:11:"modifier_id";s:1:"1";s:7:"created";s:19:"2011-01-25 15:03:16";s:8:"modified";s:19:"2012-04-12 12:48:14";s:11:"description";s:6220:"<div id="brandPageSidebar">
	<div class="brandPageBox">
		<div class="titleBox">
			Video</div>
		<br />
		<iframe allowfullscreen="" frameborder="0" height="113" src="http://www.youtube.com/embed/D_NChSiGfiU?rel=0&amp;autoplay=1&amp;modestbranding=1&amp;autohide=1" width="180"></iframe><br />
		&nbsp;</div>
	<div class="brandPageBox">
		<div class="titleBox">
			Connect with Product Club!</div>
		<ul id="brandPageSocials">
			<li class="facebook">
				<a href="https://www.facebook.com/ProductClub" target="_blank">&nbsp;</a></li>
			<li class="youtube">
				<a href="http://www.youtube.com/watch?v=D_NChSiGfiU" target="_blank">&nbsp;</a></li>
			<li class="rss">
				<a href="https://www.facebook.com/feeds/page.php?id=111805682196763&amp;format=rss20" target="_blank">&nbsp;</a></li>
		</ul>
		<div style="clear: both;">
			<!-- --></div>
	</div>
	<div class="brandPageBox">
		<div class="titleBox">
			Product Club Specials</div>
		<div class="indexRow">
			<div class="indexCell galleryThumb" id="galleryThumb739">
				<div array="">
					<a href="/catalogs/catalog_items/view/739"><img alt="cache/tmp_9888resizeCrop.FS200_open.jpg" class="gallery-thumb" height="88" id="gallery281" src="/theme/default/upload/gallery_image/filename/thumb/medium/cache/tmp_9888resizeCrop.FS200_open.jpg" width="98" /></a></div>
			</div>
			<div class="indexCell itemName catalogItemName" id="catalogItemName739">
				<a href="/catalogs/catalog_items/view/739">Original Pop-Up Foil</a></div>
			<div class="indexCell itemDescription catalogItemDescription" id="catalogItemDescription739">
				Great for all haircoloring techniques.</div>
			<div class="indexCell itemAction catalogItemAction" id="catalogItemAction739">
				<div class="actions">
					<div class="action itemCartText catalogItemCartText">
						<div class="action itemAddCart catalogItemAddCart">
							<form accept-charset="utf-8" action="/orders/order_items/add" id="OrderItemViewForm" method="post">
								<div style="display:none;">
									<input name="_method" type="hidden" value="POST" /></div>
								<div class="input text">
									<label for="OrderItemQuantity">Quantity </label><input id="OrderItemQuantity" name="data[OrderItem][quantity]" type="text" value="1" /></div>
								<input id="OrderItemParentId" name="data[OrderItem][parent_id]" type="hidden" value="739" /><input id="OrderItemCatalogItemId" name="data[OrderItem][catalog_item_id]" type="hidden" value="739" /><input id="OrderItemPrice" name="data[OrderItem][price]" type="hidden" value="8.99" /><input id="OrderItemPaymentType" name="data[OrderItem][payment_type]" type="hidden" />
								<div class="submit">
									<input id="add_button" type="submit" value="+ Cart" /></div>
							</form>
						</div>
						<!-- end action itemAddCart catalogItemAddCart --></div>
				</div>
			</div>
		</div>
		<div class="indexRow">
			<div class="indexCell galleryThumb" id="galleryThumb4f16409a-5e68-4bb6-94c3-16af45a3a949">
				<div array="">
					<a href="/catalogs/catalog_items/view/4f16409a-5e68-4bb6-94c3-16af45a3a949"><img alt="cache/tmp_9888resizeCrop.Black_Gloves_on_hands.jpg" class="gallery-thumb" id="gallery300" src="/theme/default/upload/gallery_image/filename/thumb/medium/cache/tmp_9888resizeCrop.Black_Gloves_on_hands.jpg" style="width: 88px; height: 98px; " /></a></div>
			</div>
			<div class="indexCell itemName catalogItemName" id="catalogItemName4f16409a-5e68-4bb6-94c3-16af45a3a949">
				<a href="/catalogs/catalog_items/view/4f16409a-5e68-4bb6-94c3-16af45a3a949">jetBlack Disposable Vinyl Gloves</a></div>
			<div class="indexCell itemDescription catalogItemDescription" id="catalogItemDescription4f16409a-5e68-4bb6-94c3-16af45a3a949">
				Disposable, powder-free, premium vinyl</div>
			<div class="indexCell itemAction catalogItemAction" id="catalogItemAction4f16409a-5e68-4bb6-94c3-16af45a3a949">
				<div class="actions">
					<div class="action itemCartText catalogItemCartText">
						<div class="action itemAddCart catalogItemAddCart">
							<form accept-charset="utf-8" action="/orders/order_items/add" id="OrderItemViewForm" method="post">
								<div style="display:none;">
									<input name="_method" type="hidden" value="POST" /></div>
								<div class="input text">
									<label for="OrderItemQuantity">Quantity </label><input id="OrderItemQuantity" name="data[OrderItem][quantity]" type="text" value="1" /></div>
								<input id="OrderItemParentId" name="data[OrderItem][parent_id]" type="hidden" value="4f16409a-5e68-4bb6-94c3-16af45a3a949" /><input id="OrderItemCatalogItemId" name="data[OrderItem][catalog_item_id]" type="hidden" value="4f16409a-5e68-4bb6-94c3-16af45a3a949" /><input id="OrderItemPrice" name="data[OrderItem][price]" type="hidden" value="3.98" /><input id="OrderItemPaymentType" name="data[OrderItem][payment_type]" type="hidden" />
								<div class="submit">
									<input id="add_button" type="submit" value="+ Cart" /></div>
							</form>
						</div>
						<!-- end action itemAddCart catalogItemAddCart --></div>
				</div>
			</div>
		</div>
		<div style="clear: both;">
			<!-- --></div>
	</div>
</div>
<div style="float: left; margin: 20px 30px; width: 610px; font-size: 15px;">
	<h2>
		About: <span style="color:#b30101">Product Club</span></h2>
	<p>
		Product Club&rsquo;s Mission is to offer colorists the best possible tools for their profession. Our products are designed, created and marketed based upon salon research &amp; professionally packaged to meet the needs of colorists.</p>
	<div class="details-block">
		<div class="bg">
			<p>
				Product Club is the leader in color accessories offering everything a colorist needs to perform color services with the exception of the haircolor itself! Product Club offers over 200 items for professional colorists including the largest selection of foil, gloves, capes, caps and more. Product Club is committed to offering colorists the best possible tools for their profession. All of our products are designed based on salon research and are professionally packaged to meet the needs of today&rsquo;s colorists.</p>
		</div>
	</div>
</div>
<br />
";}s:5:"Owner";a:55:{s:2:"id";N;s:9:"parent_id";N;s:14:"reference_code";N;s:9:"full_name";N;s:10:"first_name";N;s:9:"last_name";N;s:8:"username";N;s:8:"password";N;s:5:"email";N;s:11:"view_prefix";N;s:3:"zip";N;s:10:"last_login";N;s:12:"forgot_tries";N;s:10:"forgot_key";N;s:18:"forgot_key_created";N;s:12:"user_role_id";N;s:12:"credit_total";N;s:4:"slug";N;s:7:"isadmin";N;s:7:"created";N;s:8:"modified";N;s:15:"agreed_to_terms";N;s:6:"status";N;s:9:"signature";N;s:6:"locale";N;s:8:"timezone";N;s:10:"totalPosts";N;s:11:"totalTopics";N;s:12:"currentLogin";N;s:9:"lastLogin";N;s:11:"facebook_id";N;s:9:"is_active";N;s:14:"license_number";N;s:12:"referral_key";N;s:9:"user_type";N;s:10:"salon_name";N;s:7:"address";N;s:8:"is_owner";N;s:18:"employees_on_staff";N;s:20:"resale_exempt_number";N;s:20:"salon_license_number";N;s:17:"state_recognition";N;s:23:"license_expiration_date";N;s:23:"license_state_different";N;s:16:"personal_address";N;s:15:"personal_street";N;s:13:"personal_city";N;s:14:"personal_state";N;s:12:"personal_zip";N;s:14:"personal_phone";N;s:19:"shipping_salon_name";N;s:13:"shipping_city";N;s:15:"shipping_street";N;s:15:"personal_county";N;s:16:"personal_country";N;}s:7:"Gallery";a:16:{s:2:"id";N;s:16:"gallery_thumb_id";N;s:4:"name";N;s:11:"description";N;s:5:"model";N;s:11:"foreign_key";N;s:4:"type";N;s:11:"thumb_width";N;s:12:"thumb_height";N;s:10:"full_width";N;s:11:"full_height";N;s:16:"transition_speed";N;s:10:"creator_id";N;s:11:"modifier_id";N;s:7:"created";N;s:8:"modified";N;}s:8:"Location";a:9:{s:2:"id";N;s:9:"available";N;s:10:"restricted";N;s:5:"model";N;s:11:"foreign_key";N;s:10:"creator_id";N;s:11:"modifier_id";N;s:7:"created";N;s:8:"modified";N;}s:9:"OrderItem";a:0:{}s:19:"CatalogItemChildren";a:0:{}s:8:"Category";a:0:{}s:14:"CategoryOption";a:0:{}}',
			'trigger_time' => '2012-04-19 23:57:41',
			'is_triggered' => 0,
			'triggered_time' => NULL,
			'is_failed' => 0,
			'creator_id' => '1',
			'modifier_id' => '1',
			'created' => '2012-04-19 23:57:41',
			'modified' => '2012-04-19 23:57:41'
		),
	);
}
