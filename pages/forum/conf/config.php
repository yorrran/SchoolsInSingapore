<?php if (!defined('APPLICATION')) exit();

// Conversations
$Configuration['Conversations']['Version'] = '2.2.1';

// Database
$Configuration['Database']['Name'] = 'justdoitdb';
$Configuration['Database']['Host'] = 'localhost';
$Configuration['Database']['User'] = 'Admin';
$Configuration['Database']['Password'] = 'admin';

// EnabledApplications
$Configuration['EnabledApplications']['Conversations'] = 'conversations';
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';

// EnabledPlugins
$Configuration['EnabledPlugins']['GettingStarted'] = 'GettingStarted';
$Configuration['EnabledPlugins']['HtmLawed'] = 'HtmLawed';
$Configuration['EnabledPlugins']['jsconnect'] = true;
$Configuration['EnabledPlugins']['ExpandableCategories'] = true;

// Garden
$Configuration['Garden']['Title'] = 'JustDoItForum';
$Configuration['Garden']['Cookie']['Salt'] = '3CtbzE8OoChu1l5F';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Registration']['ConfirmEmail'] = true;
$Configuration['Garden']['Email']['SupportName'] = 'JustDoItForum';
$Configuration['Garden']['Email']['Format'] = 'text';
$Configuration['Garden']['SystemUserID'] = 1;
$Configuration['Garden']['InputFormatter'] = 'Html';
$Configuration['Garden']['Version'] = '2.2.1';
$Configuration['Garden']['Cdns']['Disable'] = false;
$Configuration['Garden']['CanProcessImages'] = true;
$Configuration['Garden']['Installed'] = true;
$Configuration['Garden']['Theme'] = 'EmbedFriendly';
$Configuration['Garden']['Embed']['Allow'] = true;
$Configuration['Garden']['Embed']['RemoteUrl'] = 'http://127.0.0.1/pages/forum.php';
$Configuration['Garden']['Embed']['ForceDashboard'] = false;
$Configuration['Garden']['Embed']['ForceForum'] = false;
$Configuration['Garden']['TrustedDomains'] = '';
$Configuration['Garden']['SignIn']['Popup'] = false;

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Plugins'] = '1';
$Configuration['Plugins']['GettingStarted']['Categories'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';

// Routes
$Configuration['Routes']['DefaultController'] = array('discussions', 'Internal');

// Vanilla
$Configuration['Vanilla']['Version'] = '2.2.1';
$Configuration['Vanilla']['Categories']['MaxDisplayDepth'] = '3';
$Configuration['Vanilla']['Categories']['DoHeadings'] = '1';
$Configuration['Vanilla']['Categories']['HideModule'] = false;
$Configuration['Vanilla']['Categories']['Layout'] = 'modern';
$Configuration['Vanilla']['Discussions']['Layout'] = 'modern';

// Last edited by Admin (127.0.0.1)2016-10-27 05:08:04