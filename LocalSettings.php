<?php
# This file was automatically generated by the MediaWiki 1.24.1
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Verdigris Wiki";
$wgMetaNamespace = "Verdigris_Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";
$wgScriptExtension = ".php";
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wiki.verdigris.io";

## The relative URL path to the skins directory
$wgStylePath = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgScriptPath/resources/assets/logo.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "wiki@verdigris.io";
$wgPasswordSender = "wiki@verdigris.io";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBUrl = parse_url(getenv('DATABASE_URL'));
$wgDBtype = $wgDBUrl["scheme"];
$wgDBuser = $wgDBUrl["user"];
$wgDBpassword = $wgDBUrl["pass"];
$wgDBserver = $wgDBUrl["host"];
$wgDBport = $wgDBUrl["port"];
$wgDBname = substr($wgDBUrl["path"], 1);

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = true;

## Shared memory settings
$wgObjectCaches['redis'] = array(
	'class'								=> 'RedisBagOStuff',
	'servers'							=> array( getenv('REDIS_HOST') ),
	'connectTimeout'			=> 1,
	'persistent'					=> false,
	'password'						=> getenv('REDIS_SECRET')
	// 'automaticFailOver' => true,
);
$wgMainCacheType = 'redis';
$wgSessionCacheType = 'redis';
$wgMemCachedServers = array( 'pub-memcache-19516.us-east-1-2.4.ec2.garantiadata.com:19516' );

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "5a74cd28949e4b4cd6026ea2dba7510245a706bb7218ffd61424d232acf92f66";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "4cfd353736d780f1";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['read'] = false;
$wgGroupPermissions['*']['edit'] = false;

# Need to be logged in to view wiki.
$wgWhitelistRead = array( 'Special:GoogleLogin' );

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
require_once "$IP/skins/CologneBlue/CologneBlue.php";
require_once "$IP/skins/Modern/Modern.php";
require_once "$IP/skins/MonoBook/MonoBook.php";
require_once "$IP/skins/Vector/Vector.php";


# End of automatically generated settings.
# Add more configuration options below.

## Google Login Extension to allow OAuth login using Verdigris corporate
## credentials.
require_once "$IP/extensions/GoogleLogin/GoogleLogin.php";
$wgGLAppId = getenv('GOOGLE_OAUTH_CLIENT_ID');
$wgGLSecret = getenv('GOOGLE_OAUTH_CLIENT_SECRET');
$wgGLAllowedDomains = array('verdigris.co');
$wgGLAllowAccountCreation = true;
# $wgGLReplaceMWLogin = true;

$wgShowExceptionDetails = true;

## WikiEditor extension which is the same editor used in Wikipedia.
require_once "$IP/extensions/WikiEditor/WikiEditor.php";

# Use the advanced editor by default.
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;

# Displays the Preview and Changes tabs.
$wgDefaultUserOptions['wikieditor-preview'] = 1;

## File uploads are not stored on disk but to AWS S3 bucket due to limitation
## with Heroku.
$wgUploadDirectory = 'uploads';
$wgUploadS3Bucket = 'verdigris-wiki';
$wgUploadS3SSL = true;
$wgPublicS3 = false;
$wgS3BaseUrl = "http".($wgUploadS3SSL?"s":"")."://s3-us-west-1.amazonaws.com/$wgUploadS3Bucket";
$wgUploadBaseUrl = "$wgS3BaseUrl/$wgUploadDirectory";
$wgLocalFileRepo = array(
	'class' => 'LocalS3Repo',
	'name' => 's3',
	'directory' => $wgUploadDirectory,
	'url' => $wgUploadBaseUrl ? $wgUploadBaseUrl . $wgUploadPath : $wgUploadPath,
	'urlbase' => $wgS3BaseUrl ? $wgS3BaseUrl : "",
	'hashLevels' => $wgHashedUploadDirectory ? 2 : 0,
	'thumbScriptUrl' => $wgThumbnailScriptPath,
	'transformVia404' => !$wgGenerateThumbnailOnParse,
	'initialCapital' => $wgCapitalLinks,
	'deletedDir' => $wgUploadDirectory.'/deleted',
	'deletedHashLevels' => $wgFileStore['deleted']['hash'],
	'AWS_ACCESS_KEY' => getenv('AWS_IAM_ACCESS_KEY'),
	'AWS_SECRET_KEY' => getenv('AWS_IAM_SECRET_KEY'),
	'AWS_S3_BUCKET' => $wgUploadS3Bucket,
	'AWS_S3_PUBLIC' => $wgPublicS3,
	'AWS_S3_SSL' => $wgUploadS3SSL
);

require_once("$IP/extensions/LocalS3Repo/LocalS3Repo.php");

# Load Syntax Highlight plugin
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");
