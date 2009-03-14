=== Plugin Name ===
Contributors: Kevin Cline, sil.linguist (Hugh Paterson III)
Donate link: http://thejourneyler.org/
Tags: metadata, custom field, language, linguistics, library, archive, ISO 639-3, Ethnologue, doublin core
Requires at least: 2.7
Tested up to: 2.7.1
Stable tag:

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


== Screenshots ==

1. This is the automatic 


2. This is the second screen shot


3. Shows results for **ench**. "French". 


== Version History ==

0.1.2: CURRENT VERSION

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


== Known bugs and/or conflicts ==

- None

== Development Plan ==

0.1.3: IN PROGRESS

- I want to add this functionality to any form... Not sure which function to call. It needs to have this syntax/form: place `<?php do_action('plugin_name_hook'); ?>` in your templates/widget/form instead of a regualr for the form filed for ISO 639-3 will show up.
- Need to Validate input against table (instead of writing straight to the DB, write to cache, validate and then to DB) e.g. what if someone types in 'zzz' and 'zzz' is not a language code?
- Add multiple codes to a post dynamically e.g. (I have a data file with 2 languages connected to one post, but not every post.)
- Repository at wordpress.org
- Translation file
- Add hook for disply in theme per key
- Register on wordpress.org and advertise
  - Promote at Weblog Tools Collection
  - Promote Using Social Networking
  - Promote On Your Own Blog
    * The download location.
    * A list of features.
    * Contact or support information (or comments enabled)

0.1.4: 

- Auto detect and import of SIL's tab file for updating from [http://www.sil.org/ISO639-3/iso-639-3_20090210.tab](http://www.sil.org/ISO639-3/iso-639-3_20090210.tab "http://www.sil.org/ISO639-3/iso-639-3_20090210.tab").
- Update notice (do we need to do anything here?)
- persue use of ISO 639-3 with doublin core metadata standard 

	* Doublin Core metadata plugin
	 - http://www.brainonfire.net/blog/add-dublin-core-metadata-to-wordpress/
	 - http://www.brainonfire.net/resources/files/dublin-core-for-wordpress/

2.0 :

- Consider development beyond ISO 639-3 to ISO 639.
    

	