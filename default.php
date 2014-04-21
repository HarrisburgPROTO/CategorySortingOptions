<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['CategorySortingOptions'] = array(
   'Description' => 'Provides per-category sorting options.',
   'Version' => '1.0',
   'RequiredPlugins' => FALSE, // This is an array of plugin names/versions that this plugin requires
   'HasLocale' => FALSE, // Does this plugin have any locale definitions?
   'RegisterPermissions' => FALSE, // Permissions that should be added for this plugin.
   'SettingsUrl' => FALSE, // Url of the plugin's settings page.
   'SettingsPermission' => FALSE, // The permission required to view the SettingsUrl.
   'Author' => "Drew Buglione & Lucas Bodnyk",
   'AuthorEmail' => 'me@drewb.ug',
   'AuthorUrl' => FALSE
);

class CategorySortingOptionsPlugin extends Gdn_Plugin {
  public function DiscussionModel_BeforeGet_Handler($Sender) {
    $cid = $Sender->EventArguments[Wheres]["d.CategoryID"];
    $cso = C('Plugins.CategorySortingOptions');
    if ($cso[$cid] !== NULL) {
      $Sender->EventArguments['SortField'] = $cso[$cid]['SortField'];
      $Sender->EventArguments['SortDirection'] = $cso[$cid]['SortDirection'];
    }
  }
}
