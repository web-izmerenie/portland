<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
							</div>
					  </div>
					  <aside class="page-main-aside reviews-form-holder">						
						<?
						$APPLICATION->IncludeFile($APPLICATION->GetCurDir().'empty.php');
						?>
					  </aside>
					</div>
				  </div>
				</div>
            </main>
        </div>	
		<footer itemscope itemtype="http://schema.org/WPFooter" class="page-footer">
		  <div class="page-inner page-footer-inner">
			<div class="page-footer-row justify-alignment">
			  <div class="page-footer-item page-footer-item--small justify-item"><a href="/map/" class="page-footer-sitemap-link transition-icon compass2-icon-before compass2-hover-icon-after custom-link custom-link--orange custom-link--uppercase"><span class="custom-link-name">Карта сайта</span></a></div>
			  <div itemscope itemtype="http://schema.org/Restaurant" class="page-footer-item page-footer-item--large page-footer-item--center justify-item">
				<ul class="page-footer-item-info">
					<li class="page-footer-item-info-item">
						<!--Phone-->
						<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_phone.php');?>				
						<!--//Phone-->
					</li>
					<li itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="page-footer-item-info-item">
						<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_address.php');?>						
					</li>
					<li class="page-footer-item-info-item">
						<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_email.php');?>									
					</li>
				</ul>
			  </div>
			  <div class="page-footer-item page-footer-item--small page-footer-item--right justify-item"><a href="/subscription/empty.php" data-close="Закрыть" class="ajax-form custom-btn custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Подписаться на афишу</span></a></div>
			</div>
			<div class="page-footer-row justify-alignment">
			  <div class="page-footer-item page-footer-item--small justify-item"><span class="page-footer-copyrights"><?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_copy.php');?></span></div>
			  <div class="page-footer-item page-footer-item--large page-footer-item--center justify-item">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"soc_footer",
					Array(
						"IBLOCK_TYPE" => "about",
						"IBLOCK_ID" => "3",
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "",
						"SORT_ORDER2" => "",
						"FILTER_NAME" => "",
						"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"NAME",3=>"SORT",4=>"",),
						"PROPERTY_CODE" => array(0=>"LINK",1=>"",),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "N",
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "N",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"PAGER_TEMPLATE" => "",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N"
					)
				);?>            
			  </div>
			<div class="page-footer-item page-footer-item--small page-footer-item--right justify-item">
				<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_dev.php');?>			
			</div>
			</div>
		  </div>
		</footer>			
        <!--Scripts-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDMJfb274yP35aQlI2rTASmL_-q2ZqZZpU&amp;amp;sensor=true"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.js"></script>
        <script type="text/javascript" src="http://fotorama.s3.amazonaws.com/4.5.2/fotorama.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.0.0/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/js/vendor/cells-by-column.js"></script>
        <script type="text/javascript" src="/js/vendor/social.min.js"></script>
        <script type="text/javascript" src="/js/vendor/jquery.fs.stepper.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="/js/vendor/placeholders.min.js"></script>
        <script type="text/javascript" src="http://yandex.st/share/share.js"></script>
		<script type="text/javascript" src="/js/vendor/jquery.form.min.js"></script>
		<script type="text/javascript" src="/js/vendor/jquery.formstyler.js"></script>
        <script type="text/javascript" src="/js/portland.base.js"></script>
        <!--//Sripts-->
        <!--JS settings-->
        <script type="text/javascript">app.init.settings({
                'SITE_PATH': '/',
                'SITE_JS_PATH': '/js',
                'SITE_IMAGES_PATH': '/i',
                'SITE_UPLOAD_PATH': '/dummy', });</script>
        <!--//JS settings-->
        <!--Scripts-->
        <script type="text/javascript" src="/js/portland.methods.js"></script>
        <!--//Sripts-->
    </body>
</html>