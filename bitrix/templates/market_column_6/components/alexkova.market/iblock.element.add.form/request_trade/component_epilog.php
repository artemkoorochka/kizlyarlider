<?if (!isset($_REQUEST['PROPERTY'])) {?>
    <script>
        function decodeEntities(encodedString) {
            var textArea = document.createElement('textarea');
            textArea.innerHTML = encodedString;
            return textArea.value;
        }
        $(function() {
            if(window.formRequestMsg)
                $('textarea[data-code="USER_COMMENT_AREA"]').html(decodeEntities(decodeEntities(formRequestMsg)));
            if(window.trade_id)
                $('input[data-code="TRADE_ID_HIDDEN"]').val(trade_id); 
            if(window.trade_name)
                $('input[data-code="TRADE_NAME_HIDDEN"]').val(trade_name);
            if(window.trade_link)
                $('input[data-code="TRADE_LINK_HIDDEN"]').val(trade_link); 
            if (window.current_offer_id && parseInt(current_offer_id) > 0)
                $('input[data-code="OFFER_ID_HIDDEN"]').val(current_offer_id); 
        });
    </script>
<? } ?>


<?
$element = CIBlockElement::GetList(
    array(),
    array(
        "IBLOCK_ID" => $arResult["ELEMEN"]["NAME"],
        "ID" => $arResult["ELEMEN"]["ID"],
    ),
    false,
    false,
    array(
        "ID",
        "NAME",
        "PROPERTY_TRADE_ID_HIDDEN", // ID товара
        "PROPERTY_OFFER_ID_HIDDEN", // ID предложения
        "PROPERTY_TRADE_NAME_HIDDEN", // Название товара
        "PROPERTY_USER_NAME",
        "PROPERTY_USER_PHONE",
        "PROPERTY_USER_MAIL1",
        "PROPERTY_USER_MAIL",
        "PROPERTY_USER_COMMENT_AREA"
    )
);
if($element = $element->Fetch()){
    AddMessage2Log($element, "my_module_id");
}
?>
