<?php
$body = elgg_extract("body", $vars);

// make links clickable for messages that are not HTML encoded yet
if (strpos($body, "<a href") === false) {
    $body = preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $body);
}

?>
<!-- Article -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="article">
            <!-- Content -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="article-body" style="padding:26px 66px 29px 46px; background:#ffffff">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="text" style="color:#000000; font-family:Arial,sans-serif; font-size:16px; line-height:20px; text-align:left">
                                                <?php echo $body; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- END Content -->
        </td>
    </tr>
</table>
<!-- END Article -->