Description
-----------
This is simple view style plugin, that combines a user defined number of rows into
sets, wrapped by chosen elements and attributes.

Installation
------------
To install this module, do the following:

1. Extract the tar ball that you downloaded from Drupal.org.

2. Upload the entire directory and all its contents to your modules directory.

Configuration
-------------
To enable and configure this module do the following:

1. Go to Admin -> Modules, and enable Views Rows Wrapper.

2. Create a view or open an existing view display settings page and click on
   style plugin name next to "Format:" label at the FORMAT section.
   Choose "Rows wrapper" style plugin in the list and click Apply.

3. Configure the settings, select number of rows to wrap, wrapper element,
   and wrapper attribute. Enter style or id name and select Apply to all items,
   if you need to wrap all the results.

Requirements
------------
views.

Customization
-------------

To override the default output html markup, you may edit the template file
views-rows-wrapper.tpl.php located inside module's folder.