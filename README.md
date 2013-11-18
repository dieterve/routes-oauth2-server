# OAuthServer + demo application

Having some fun implementing an OAuth2 server. This codebase also contains a
test application which uses the OAuth2 server.

## Dependencies

Uses the [oauth2-server-php](https://github.com/bshaffer/oauth2-server-php) package for implementing
the OAuth2 standard.

## Endpoints

* `/authentication`: handles all OAuth2 calls
* `/routes`: Routes resource endpoint
* `/users`: Users resource endpoint

## Install

* Import the assets/data.sql in a MySQL database
* Edit the config/paramters.yml to represent the database credentials
* Unless you are using `oauthserver.dev`, you need to alter the `redirect_uri in the `oauth_clients` table (or add a new client)
