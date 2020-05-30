<?php
/**
 * Migrate to version 1.0.8
 *
 * @since   1.0.8
 * @package Autoremove_Attachments
 */





// Migrate.
$autoremove_attachments = get_option( 'autoremove_attachments' );

$autoremove_attachments['usage-restrictions'] = 'accept';

update_option( 'autoremove_attachments', $autoremove_attachments );
