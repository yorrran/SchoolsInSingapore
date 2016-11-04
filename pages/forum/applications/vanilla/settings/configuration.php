<?php if (!defined('APPLICATION')) {
    exit();
      }
/**
 * Vanilla default configuration options.
 *
 * DO NOT EDIT THIS FILE!
 * All of the settings defined here can be overridden in the /conf/config.php file.
 * Called by VanillaHooks::Setup() to add config options upon enabling app.
 *
 * @package Vanilla
 */

$Configuration['Vanilla']['Installed'] = '0';
$Configuration['Vanilla']['Comment']['MaxLength'] = '8000';

// Spam settings explained:
// Users cannot post more than $SpamCount comments within $SpamTime seconds or
// their account will be locked from posting for $SpamLock seconds.
$Configuration['Vanilla']['Comment']['SpamCount'] = '5';
$Configuration['Vanilla']['Comment']['SpamTime'] = '60';
$Configuration['Vanilla']['Comment']['SpamLock'] = '120';
$Configuration['Vanilla']['Discussion']['SpamCount'] = '3';
$Configuration['Vanilla']['Discussion']['SpamTime'] = '60';
$Configuration['Vanilla']['Discussion']['SpamLock'] = '120';

$Configuration['Vanilla']['Discussions']['MaxPages'] = 100;
$Configuration['Vanilla']['Comments']['PerPage'] = '30';
$Configuration['Vanilla']['Discussions']['PerCategory'] = '5';
$Configuration['Vanilla']['Discussions']['PerPage'] = '30';
$Configuration['Vanilla']['Discussions']['Home'] = 'discussions';
$Configuration['Vanilla']['Categories']['Use'] = true;
// Categories can be infinitely nested, but this doesn't look great when
// displaying them to users. Use the MaxDisplayDepth settings to control how
// deep they should be displayed to the users on the category listing. The final
// depth layer will be represented as a comma-delimited list.
// Zero means "no max", and categories will be displayed in a nested format indefinitely.

// The max depth of nested categories to display on all category view.
$Configuration['Vanilla']['Categories']['MaxDisplayDepth'] = 3;
// The max depth of nested categories to display in the category module (in the panel).
$Configuration['Vanilla']['Categories']['MaxModuleDisplayDepth'] = 0;
// Should the first level of category above root be a heading and unclickable?
$Configuration['Vanilla']['Categories']['DoHeadings'] = 0;

// Should users be automatically pushed to the last comment they read in a discussion?
$Configuration['Vanilla']['Comments']['AutoOffset'] = true;
$Configuration['Vanilla']['Comment']['ReplaceNewlines'] = true;

// Module visibility
$Configuration['Vanilla']['Modules']['ShowBookmarkedModule'] = false;

// Allow users to delete their own comments if are still allowed to edit (per timeout).
$Configuration['Vanilla']['Comments']['AllowSelfDelete'] = Yes;
