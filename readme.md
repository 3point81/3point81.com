![3point81](/assets/images/logo.png?raw=true)

# 3point81.com

## Documentation

- Kirby Cheat Sheet: https://getkirby.com/docs/cheatsheet
- Kirby ToolKit API:  https://getkirby.com/docs/toolkit/api

## Installation

```sh
brew install node           # Visit http://brew.sh/ if you need to install Homebrew
npm install -g gulp
npm install
```

## Development

```sh
gulp styles   # Compile SASS and run autoprefixer
gulp watch    # Start a local PHP server, with a BrowserSync proxy for livereload
gulp          # Run all of the above
```

## Syncing/deployments

```sh
# Deploy site to server
rsync --exclude-from .rsyncignore --delete --chown=user:group --chmod=775 -rltgDzv . user@server:/path/to/site

# Fetch content from server
rsync user@server:/path/to/site/content/ content/ -vzr --delete
```
