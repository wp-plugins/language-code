=== Plugin Name ===
Contributors: Kevin Cline, Hugh Paterson III
Donate link: http://thejourneyler.org/
Tags: metadata, custom field, language, linguistics, library, archive, ISO 639-3, Ethnologue, doublin core
Requires at least: 2.7
Tested up to: 2.7.1
Stable tag: 0.1.2

This plugin adds the ability to add an ISO 639-3 language code to the custom field of a post.

== Description ==

This plugin is designed to allow a WordPress user to add a custom field to their post so that their posts can be organized by ISO 639-3 code. One advantage of this would be to list their wordpress install as a language resource with [OLAC](http://www.language-archives.org/ "OLAC: Open Language Archives Community").

*!*!* ACTION ITEM *!*!* 
Move to WP Plugin Repository

/* For backwards compatibility, if this section is missing, the full length of the short description will be used, and
Markdown parsed. */

A few notes about the sections above:

*   "Contributors" is a comma separated list of wp.org/wp-plugins.org usernames
*   Stable tag should indicate the Subversion "tag" of the latest stable version, or "trunk," if you use `/trunk/` for
stable.

    Note that the `readme.txt` of the stable tag is the one that is considered the defining one for the plugin, so
if the `/trunk/readme.txt` file says that the stable tag is `4.3`, then it is `/tags/4.3/readme.txt` that'll be used
for displaying information about the plugin.  In this situation, the only thing considered from the trunk `readme.txt`
is the stable tag pointer.  Thus, if you develop in trunk, you can update the trunk `readme.txt` to reflect changes in
your in-development version, without having that information incorrectly disclosed about the current stable version
that lacks those changes -- as long as the trunk's `readme.txt` points to the correct stable tag.

    If no stable tag is provided, it is assumed that trunk is stable, but you should specify "trunk" if that's where
you put the stable version, in order to eliminate any doubt.

== Installation ==


1. Upload the entire folder language_code to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


*!*!* ACTION ITEM *!*!* 

I want to add this to any form... Not sure which function to call.

1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= What is ISO 639-3? =

ISO 639-3 codes are codes for the representation of names of languages. ISO 639-3 attempts to provide as complete an enumeration of languages as possible, including living, extinct, ancient, and constructed languages, whether major or minor, written or unwritten. More infomration can be found at [http://www.sil.org/iso639-3/](http://www.sil.org/iso639-3/ "http://www.sil.org/iso639-3/").

= Who controls ISO 639-3? =

The ISO does but, you can contact the registrar, [SIL International](http://www.sil.org/iso639-3/default.asp#contact/ "SIL International").


== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Version History ==

2.0 :
- Consider development beyond ISO 639-3 to ISO 639.

0.1.4: 

- Auto detect and import of SIL's tab file for updating from [http://www.sil.org/ISO639-3/iso-639-3_20090210.tab](http://www.sil.org/ISO639-3/iso-639-3_20090210.tab "http://www.sil.org/ISO639-3/iso-639-3_20090210.tab").
- Update notice (do we need to do anything here?)
- persue use of ISO 639-3 with doublin core metadata standard 

	Doublin Core metadata plugin
	http://www.brainonfire.net/blog/add-dublin-core-metadata-to-wordpress/
	http://www.brainonfire.net/resources/files/dublin-core-for-wordpress/

    
0.1.3: IN PROGRESS

- Readme file.txt
- Need to Validate input against table (instead of writing straight to the DB, write to cashe, validate and then to DB) e.g. what if someone types in zzz and zzz is not a language code?
- Add multible codes to a post dynmaically e.g. (I have a data file with 2 languages connected to one post, but not every post.)
- Repository at wordpress.org
- Translation file
- Add hook for disply in theme per key
- Register on wordpress.org and advertise

Promote at Weblog Tools Collection
Promote at the WordPress Plugin Database
Promote at the Official WordPress Plugin Repository
Promote Using Social Networking
Promote On Your Own Blog
    * A brief description of your plugin.
    * The download location.
    * A list of features.
    * Install instructions.
    * Version history (Changelog).
    * Known bugs and/or conflicts.
    * Screenshots or a demo (or both).
    * Contact or support information (or comments enabled)
	

0.1.2: CURRENT VERSION


Works under:
Appache 2.2.11 
MySQL version: 5.1.30 (K) and 5.0.32 (H) 
PHP version: 5.2.8 (K) And 5.2.6 (H) 
Wordpress Version: 2.7.1 
Language_Code Plugin version 0.1.2 Beta 
Database version: 1.0

The autocomplete seems to work better now. Can do accent/case insensitve searchs.
- fixed bug for MYSQL SELECT query for searching (values.php line 23) 
- specified TABLE language_codeÊ to be utf8_general_ci to be accent/case insensitive for searching (language_code.php
line 27) 
- specified for client browser to request MYSQL to receive/send search in utf8_general_ci for accent/case insensitive searching (values.php line 24)


0.1.1:

- Gerneral working plug-in but some language's ISO codes would not show up when typed in. e.g. typing in 'gel' did not bring up 'Kag-Fer-Jiir-Koor-Ror-Us-Zuksun' this was a big bug.

0.0.1: 

- Import ISO 639-3 to WP_ table Creation

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`


   
   

   

