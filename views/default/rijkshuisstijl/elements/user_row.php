<?php
$user = elgg_extract("user", $vars);

?>

<a href="<?php echo $user->getURL() ?>" title="<?php echo $user->name; ?>" class="rhs-card-list__item">
    <table class="rhs-card-list__table">
        <tbody>
            <tr>
                <td class="rhs-card-list__date">
                    <a href="<?php echo $user->getURL(); ?>" title="<?php echo $user->name; ?>" class="rhs-card-user-content__profile">
                      <img src="<?php echo $user->getIconURL('small') ?>">
                    </a>
                </td>
                <td class="rhs-card-list__text" style="min-width: 20rem;">
                    <?php echo $user->name; ?>
                </td>
            </tr>
        </tbody>
    </table>
</a>