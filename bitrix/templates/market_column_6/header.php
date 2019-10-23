<?IncludeTemplateLangFile(__FILE__);?>
<?
if (!CModule::IncludeModule('alexkova.market')) return;
if (!CModule::IncludeModule('alexkova.bxready')) return;

use Alexkova\Market\Core;
use Alexkova\Bxready\Core as BXRCore;
use Alexkova\Bxready\Bxready;

global $templateType, $catalogType, $mainPageType, $arTopMenu, $arLeftMenu;

$arTopMenu = array (
	"TYPE" => "with_catalog",
	"TEMPLATE" => "version_v1",
	"FIXED_MENU" => "Y",
	"FULL_WIDTH" => "Y",
	"STYLE_MENU" => "colored_dark",
	"TEMPLATE_MENU_HOVER" => "list",
	"STYLE_MENU_HOVER" => "colored_light",
	"PICTURE_SECTION" => "IMG",
	"PICTURE_CATEGARIES" => "LEFT",
	"HOVER_MENU_COL_LG" => "3",
	"HOVER_MENU_COL_MD" => "3",
        "SEARCH_FORM" => "Y"
);

$arLeftMenu = array (
	"TYPE" => "with_catalog",
	"LEFT_MENU_TEMPLATE" => "left_hover",
	"STYLE_MENU" => "colored_light",
	"PICTURE_SECTION" => "ICO",
	"SUBMENU" => "ACTIVE_SHOW",
        "HOVER_TEMPLATE" => "list",
        "STYLE_MENU_HOVER" => "colored_light",
        "PICTURE_SECTION_HOVER" => "N",
        "PICTURE_CATEGARIES" => "N",
        "HOVER_MENU_COL_LG" => "2",
        "HOVER_MENU_COL_MD" => "2"
    
);

$BXReady = \Alexkova\Market\Core::getInstance();
/******************default settings************************/
$BXReady->setAreaType('top_line_type', 'v21');
$BXReady->setAreaType('header_type', 'version_6');
$BXReady->setAreaType('top_menu_type', 'v1');
$BXReady->setAreaType('left_menu_type', 'v2');

$BXReady->setBannerSettings(array(
	"TOP"=>"FIXED",
	"BOTTOM"=>"FIXED",
	"CATALOG_TOP"=>"RESPONSIVE",
	"CATALOG_BOTTOM"=>"RESPONSIVE",
	"LEFT"=>"RESPONSIVE",
));

if ($USER->IsAdmin()) $BXReady->getBitrixTopPanelMenu();

$mainPageType = "two_col";
//$mainPageType = "two_col";
$templateType = "two_col";
//$templateType = "one_col";
$catalogType = "two_col";
?>
<!DOCTYPE html>
<html>
<head>

	<title><?$APPLICATION->ShowTitle();?></title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2">
<meta name="yandex-verification" content="df1ed2b79add1a68" />
	<?$APPLICATION->ShowHead();?>

        <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.11.3.js');?>
        <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');?>

        <?
        $APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap.css");
        $APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/library/bootstrap/js/bootstrap.min.js');
        ?>
        
	<?
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/library/bootstrap/css/grid10_column.css', true);
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/library/less/less.css", true);
	?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"named_area",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/schema_og.php"
		),
		false
	);?>
    <? //также этот код используется в файле /bitrix/templates/market_column_6/components/alexkova.market/iblock.element.add.form/request_trade/template.php ?>
    <!-- Для электронной комерции -->
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(39849825, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true,
            ecommerce:"dataLayer"
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/39849825" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149495491-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-149927415-1');
      ga('create', 'UA-149927415-1', 'auto');
      ga('send', 'pageview');
    </script>
</head>
<body>
    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
    </div>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"named_area",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/schema.php"
		),
		false
	);?>
	
    <?
//    if ($GLOBALS["USER"]->GetId() == 2 || $GLOBALS["USER"]->GetId() == 6) {
        if ($GLOBALS["USER"]->isAdmin() && false) {?>
        <?$APPLICATION->IncludeComponent(
		"bxr.demo:customize.panel",
		".default",
		array(),
		false
	);?>
    <? }?>

	<?

	$BXReady->showBannerPlace("TOP");
	?>

	<?
	// Headline and Small Basket Interface
	if ($BXReady->getArea('top_line_type')){
		include($BXReady->getAreaPath('top_line_type'));
	};
	// end Headline
	?>

	<?
	// Header Basket Interface
	if ($BXReady->getArea('header_type')){
		include($BXReady->getAreaPath('header_type'));
	};
	// end Headline
	?>

	<?$APPLICATION->IncludeComponent(
		"alexkova.market:buttonUp",
		".default",
		array(
			"COMPONENT_TEMPLATE" => ".default",
			"LOCATION_HORIZONTALLY" => "rigth",
			"BUTTON_UP_HORIZONTALLY_INDENT" => "15",
			"BUTTON_UP_VERTICAL_INDENT" => "15",
			"BUTTON_UP_TOP_SHOW" => "300",
			"BUTTON_UP_SPEED" => "5000"
		),
		false
	);?>

    
        <?
	// TopMenu
        if (strlen($arTopMenu["TYPE"])) {
            switch ($arTopMenu["TYPE"]) {
                case "with_catalog": $BXReady->setAreaType('top_menu_type', 'v1'); break;
                case "only_catalog": $BXReady->setAreaType('top_menu_type', 'v2'); break;
            }
        }
	if ($BXReady->getArea('top_menu_type')){
                include($BXReady->getAreaPath('top_menu_type'));
	};
	// end TopMenu
	?>
    
    <?if ($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'):?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"",
					Array(
						"COMPONENT_TEMPLATE" => ".default",
						"PATH" => "",
						"SITE_ID" => "-",
						"START_FROM" => "0"
					)
				);?>


			</div>
		</div>
	</div>
    <?endif;?>

    <?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php' && $mainPageType != "two_col"):?>
        <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "named_area",
                Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/main_page_promo_slider.php",
                        "INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_PROMO_SLIDER")
                ),
                false
        );?>
    <?endif;?>

    <div class="container <?if ($mainPageType == "two_col" || $APPLICATION->GetCurPage(true) != SITE_DIR.'index.php') echo "tb20"; ?>" id="content">
        <div class="row">
	<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php'):?>
		<?if ($mainPageType == "two_col"):?>
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"named_area",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/main_page_left_column.php",
						"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_LEFT")
					),
					false
				);?>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"named_area",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/main_page_promo_column.php",
						"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_PROMO")
					),
					false
				);?>
		<?else:?>
			<div class="col-xs-12">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"named_area",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/main_page_promo.php",
						"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_PROMO")
					),
					false
				);?>
		<?endif;?>
	<?endif;?>

	<?if ($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'):?>
		<?if ($templateType == "one_col" || substr($APPLICATION->GetCurDir(),0,(8+strlen(SITE_DIR))) == SITE_DIR.'catalog/'):?>
				<div class="col-xs-12">
		<?else:?>
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"named_area",
							Array(
								"AREA_FILE_SHOW" => "sect",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/page_left_column.php",
								"INCLUDE_PTITLE" => GetMessage("GHANGE_PAGE_LEFT")
							),
							false
						);?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
					<h1><?$APPLICATION->ShowTitle(false);?></h1>
		<?endif;?>
	<?endif;?>