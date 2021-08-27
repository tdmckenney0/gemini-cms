# gemini-cms

This is an application skeleton built to serve as a barebones Gemini CMS. The goal is to have a starting point for capsule developers, as well as a great out-of-the-box CMS (somewhere between Wordpress + Laravel).

- Gemini Protocol
    + [gemini://gemini.circumlunar.space/](gemini://gemini.circumlunar.space/)
    + [https://gemini.circumlunar.space/](https://gemini.circumlunar.space/)
 - Titan-II PHP Library
    + [https://github.com/tdmckenney0/titan-II](https://github.com/tdmckenney0/titan-II)

## Setup

 1. Create the database: `cd db; sqlite3 gemini-cms.sqlite3 < schema.sql; cd ..;`
 2. Add you `cert.pem` and `key.rsa` files to `certs/`
 3. Run composer: `composer install`
 4. Run `php test/test_DefaultServer.php`
 5. Navigate to `gemini://127.0.0.1/`

## Directories

 - `certs`
    + Security Certificates.
 - `config`
    + Configuration Data.
 - `db`
    + Database-related files and instances. 
 - `files`
    + Files synced from external sources ("uploads") by users, e.g. IPFS, Torrent, GDrive, etc... for the backend to work with. 
 - `public`
    + Files served directly over gemini to the client.
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