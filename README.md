# gemini-cms

Small CMS for the Gemini Protocol. 

 - [gemini://gemini.circumlunar.space/](gemini://gemini.circumlunar.space/)
 - [https://gemini.circumlunar.space/](https://gemini.circumlunar.space/)

Uses Titan-II for the protocol layer. 

 - [https://github.com/tdmckenney0/titan-II](https://github.com/tdmckenney0/titan-II)

## Setup

 1. Create the database: `cd db; sqlite3 gemini-cms.sqlite3 < schema.sql; cd ..;`
 2. Add you `cert.pem` and `key.rsa` files to `certs/`
 3. Run composer: `composer install`
 4. Run `php test/test_DefaultServer.php`


## Directories

 - `certs`
    + Security Certificates.
 - `config`
    + Configuration Data.
 - `db`
    + Database-related files and instances. 
 - `files`
    + Files store on a CDN, Distributed Network, Network share, Torrent, etc. 
 - `public`
    + Files served directly over gemini.
 - `src`
    + Application source code.
 - `src/controllers`
    + Application Controllers
 - `src/models`
    + Eloquent Data Models for interacting with a data source.
 - `src/servers`
    + Microservers that can serve groups of controllers.
 - `views`
    + Templates for Gemini views.
 - `test`
    + Application tests
 - `tmp`
    + Temporary File storage
 - `vendor`
    + `composer`-installed libraries.