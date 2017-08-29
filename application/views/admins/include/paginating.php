<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/28/2017
 * Time: 6:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( $allRecord <= 10 )
    return;
?>

<nav>
    <ul class="pager">
        <li class="previous">
            <a href="<?= base_url( 'admin/user' . ( $cPageNumbr <= 0 ? 0 : ($cPageNumbr - 1)) ); ?>">
                <span aria-hidden="true">&larr;</span> Previous
            </a>
        </li>
        <li class="next">
            <a href="<?= base_url( 'admin/user' . ($cPageNumbr >= $allPage ? $allPage : ($cPageNumbr + 1)) ); ?>">Next
                <span aria-hidden="true">&rarr;</span>
            </a>
        </li>
    </ul>
</nav>