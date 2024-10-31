=== Remove HTML From Content ===

Contributors: adam.ainsworth
Donate link: https://adamainsworth.co.uk/donate/
Tags: tags, html, strip, clean
Requires at least: 3.0.1
Tested up to: 5.8
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple plugin that strips all but the most common HTML tags from the content of WordPress pages and posts.

== Description ==

You may have some obscure reason for wanting the output that is sent by the_content() and get_the_content() to be simple HTML, free of the more exotic tags and objects. It may be for post aggregators or email notifications or some other edge case. This is for you!

== Installation ==

1. Upload the `remove-html-from-content` folder to the `/wp-content/plugins/` directory
2. Navigate to wp-admin/plugins.php on your site (your WP plugin page)
3. Alternatively, upload `remove-html-from-content.zip` via the upload plugin section at wp-admin/plugins.php
4. Activate this plugin. 

OR you can just install it with WordPress by going to Plugins >> Add New >> and typing Remove HTML From Content

== Frequently Asked Questions ==

= Will it do all content? =

Just that which runs through the_content() and get_the_content() but you can add your own filters with 

<pre>
add_action( 'FILTER_NAME', [__CLASS__, 'do_filter'], 0 );
</pre>

Or calling the conversion directly with

<pre>
$text = Remove_Html_From_Content::do_filter($html);
</pre>

== Changelog ==

= 1.0.1 =
* Minor updates after six years

= 1.0.0 =
* Initial release
