=== Plugin Name ===
Contributors: superkc9, sil.linguist, philfreo
Donate link: http://pro.thejourneyler.org/partnership
Tags: metadata, custom field, language, linguistics, library, archive, ISO 639-3, Ethnologue, doublin core
Requires at least: 2.7
Tested up to: 2.9
Stable tag: 0.1.3

This plugin adds the ability to add an ISO 639-3 language code to the custom field of a post.

== Description ==

This plugin is designed to allow a WordPress user to add an ISO 639-3 language code to in a custom field related to their post so that their posts can be organized by ISO 639-3 code. One advantage of this would be to list their WordPress install as a language resource with [OLAC](http://www.language-archives.org/ "OLAC: Open Language Archives Community").


== Installation ==

1. Upload the entire folder language_code to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Start adding language codes to your post by typing a three letter ISO 639-3 code or the language name. (See screenshots 2 & 3)
1. Edit your Theme to display custome field data.


== Frequently Asked Questions ==

= What is ISO 639-3? =

ISO 639-3 codes are codes for the representation of names of languages. ISO 639-3 attempts to provide as complete an enumeration of languages as possible, including living, extinct, ancient, and constructed languages, whether major or minor, written or unwritten. More information can be found at [http://www.sil.org/iso639-3/](http://www.sil.org/iso639-3/ "http://www.sil.org/iso639-3/").

= Who controls ISO 639-3? =

The ISO does but, you can contact the registrar, [SIL International](http://www.sil.org/iso639-3/default.asp#contact/ "SIL International").

= What are the plugin dependencies? =

Everything you need to make this plugin work with wordpress ships with the plugin.
However in our code we have used the ISO 639-3 UTF-8 table provided by SIL International [http://www.sil.org/ISO639-3/iso-639-3_20090210.tab](http://www.sil.org/ISO639-3/iso-639-3_20090210.tab "http://www.sil.org/ISO639-3/iso-639-3_20090210.tab") This table is updated annualy. 
We also have used and modified the jQuery autocomplete script made availible by PengoWorks.Com (http://www.pengoworks.com/workshop/jquery/autocomplete.htm "http://www.pengoworks.com/workshop/jquery/autocomplete.htm") 

== Screenshots ==

1. `screenshot-1.jpg` This is the input field in the admin area. 


2. `screenshot-2.jpg` You can search for a language code or a language name.


3. `screenshot-3.jpg` Or part of the name of the language for example **ench** returns "French". 


== Changelog ==

0.1.3: CURRENT VERSION

- bug fix: changed the plugin folder name from language_code to language-code to follow WP Extend conventions. This also affected several paths to. js files.

0.1.2: 

- Promoted at the WordPress Plugin Database as 0.1.2 beta
- The autocomplete seems to work better now. Can do accent/case insensitive searches.
 - fixed bug for `MYSQL SELECT` query for searching (`values.php` line 23) 
 - specified `TABLE language_code` to be `utf8_general_ci` to be accent/case insensitive for searching (`language_code.php` line 27) 
 - specified for client browser to request `MYSQL` to receive/send search in `utf8_general_ci` for accent/case insensitive searching (`values.php` line 24)
 
- Works under:
 - Appache 2.2.11 
 - MySQL version: 5.1.30 (K) and 5.0.32 (H) 
 - PHP version: 5.2.8 (K) And 5.2.6 (H) 
 - Wordpress Version: 2.7.1 
 - Language_Code Plugin version 0.1.2 Beta 
 - Database version: 1.0


0.1.1:

- General working plug-in but some language's ISO codes would not show up when typed in. e.g. typing in 'gel' did not bring up 'Kag-Fer-Jiir-Koor-Ror-Us-Zuksun' this was a big bug.

0.0.1: 

- Import ISO 639-3 to WP_ table Creation


== Upgrade Notice ==

= 0.1.3 =
This version corrects a folder namin issue enabling the plugin to correctly access the autocomplete.js file when the plugin is downloaded from WP Extend. 


== Known bugs and/or conflicts ==

- version 0.1.3 **None**

- version 0.1.2-beta  plugin folder needs to be renamed to langauge_code this is corrected in version 0.1.3


== Development Plan ==

0.1.4: IN PROGRESS

- It would be nice to add the functionality to the plugin to allow an author to replace or insert any text field with the one auto suggesting language codes, by calling a function. It should probably have syntax or form after the order of: place `<?php do_action('plugin_name_hook'); ?>` in the templates/widget/. The end result for the user would be that they could create a meta-data input from more than just the admin area (i.e. a from in another plugin, like a form creator, or the front end of WP.)

- Need to Validate input against table (instead of writing straight to the DB, write to cache, validate and then to DB) e.g. what if someone types in 'zzz' and 'zzz' is not a language code?
- Add multiple codes to a post dynamically e.g. (I have a data file with 2 languages connected to one post, but not every post.)

- Translation file (A `.po` file This is a two fold issue Language names are different in different languages i.e. Deutsch, German, Allemand. This might be a table being developed by another part of the ISO 639 standard. Possibly, 639-6 See this wikipedia article [http://en.wikipedia.org/wiki/ISO_639-6](http://en.wikipedia.org/wiki/ISO_639-6 "http://en.wikipedia.org/wiki/ISO_639-6"))

- Add hook for disply in theme per key

Because each of the ISO 639-3 codes are stored in a custom field, and each custom field has two parts, a key and a value, It is necessary to be able to set the key as well as the value (and the default key). The Plug-in in its current state has only focused on adding the value part of the key-value pair. It is important for developers to know that a single post should be able to have more than one key with language codes in them. For example, if I have a post which is a linguistics exercise in phonology, then I might want to put the language of the instructions of the exercise in one key and the language code of the exercise data in another key. 

An entirely different scenario is one where a post has two languages under one key. This is currently unaccounted for with the current state of the plug-in. E.g. If in the body of a post an author were to use two languages equally then they might want to use the same key to represent both languages. 

  - Promote at Weblog Tools Collection
  - Promote Using Social Networking
  - Promote On Your Own Blog
    * The download location.
    * A list of features.
    * Contact or support information (or comments enabled)

0.1.5: 

- Auto detect and import of SIL's tab file when SIL updates their tab file at: [http://www.sil.org/ISO639-3/iso-639-3_20090210.tab](http://www.sil.org/ISO639-3/iso-639-3_20090210.tab "http://www.sil.org/ISO639-3/iso-639-3_20090210.tab").
- Update notice to the user so that they know to update their plug-in every year when SIL updates their ISO changes. Or decide to follow a regular release cycle (at least annually) and maintenance with this plugin.

- pursue use of ISO 639-3 in conjunction with the doublin core metadata standard 

	* Doublin Core metadata plugin
	 - http://www.brainonfire.net/blog/add-dublin-core-metadata-to-wordpress/
	 - http://www.brainonfire.net/resources/files/dublin-core-for-wordpress/
	 - http://dublincore.org/documents/dcmi-terms/
	 - http://dublincore.org/documents/dcmi-terms/#ses-ISO639-3

2.0 :

- Consider development beyond ISO 639-3 to ISO 639.
