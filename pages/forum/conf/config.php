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

// Routes
$Configuration['Routes']['DefaultController'] = 'discussions';

// Vanilla
$Configuration['Vanilla']['Version'] = '2.2.1';

// Last edited by Admin (127.0.0.1)2016-10-07 11:28:31