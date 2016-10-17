<?php
$user = elgg_extract("user", $vars);

?>

<a href="<?php echo $user->getURL() ?>" title="<?php echo $user->name; ?>" class="rhs-card-list__item">
    <table class="rhs-card-list__table">
        <tbody>
            <tr>
                <td class="rhs-card-list__user" style="">
                    <a href="<?php echo $user->getURL(); ?>" title="<?php echo $user->name; ?>" class="rhs-card-user-content__profile">
                      <img src="<?php echo $user->getIconURL('small') ?>">
                    </a>
                </td>
                <td class="rhs-card-list__text rhs-card-list__text--user">
                    <?php echo $user->name; ?>
                </td>
            </tr>
        </tbody>
    </table>
</a>