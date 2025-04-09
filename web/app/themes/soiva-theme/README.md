# Soiva WordPress theme

A starter theme to kick off your WordPress project. The theme is based on Roots' Sage 8 theme.

## Features

- [Sass](https://sass-lang.com/documentation/syntax)
- [Bootstrap 4 Grid](https://getbootstrap.com/docs/4.0/layout/grid/)
- [Babel](https://babeljs.io/)
- [Browser-sync](https://www.browsersync.io/)
- [Autoprefixer](https://github.com/postcss/autoprefixer)
- JS & CSS minifier
- PHP Code sniffer & ESLint
- [ESLint](https://eslint.org/)
- Cache busting

## Theme setup

Go to theme and install node_modules: `yarn`. If you don't have [Yarn](https://yarnpkg.com/en/docs/install#mac-stable), please install it.

Edit `lib/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, post formats and sidebars etc.

### Using BrowserSync

To use BrowserSync during `yarn watch` you need to update `devUrl` at the bottom of `assets/manifest.js` to reflect your local development hostname.

For example, if your local development URL is `https://wordpress.local` you would update the file to read:

```js
...
  devUrl: function() {
    return "https://wordpress.local";
  }
...
```

### Available build commands

NPM Scripts are defined in package.json for running Gulp:

- `yarn build` — Compile and optimize the files in your assets directory
- `yarn watch` — Compile assets when file changes are made
- `yarn prod` — Compile assets for production (phpcs & jscs, no source maps).

## Existing site

Here are some useful tricks if you have set up an existing site in your local environment.

### Content from production

If you have an existing site's credentials in `config.yml`, SSH to your local environment and run these to pull stuff from production:

```
wp-pull-production-plugins
wp-pull-production-db
```

### Media files

You do not need to download the entire uploads folder from production.

Set production domain in `nginx/uploads.conf` to load `wp-content/uploads` assets from production if local files are not found.

## CSS

CSS fundamentals and guides for your project. BEM preferred in naming and structure.

### Variables

Use describing variables: `color: $tomato;`

### Preferred values to use

#### Width and height

> rem > em > px

Note: it's almost never a good idea to use `height`, please use `min-height` in stead.

#### Null values

> 0 > 0em/0px

#### Numbers

> .3 > 0.3
> .1s > 0.1s > 100ms

#### Colors

> \$tomato > #hex > rgb(a) > tomato

Note: usage of [CSS variables](https://caniuse.com/#search=CSS%20Variables) could be considered depending on required browser support

#### CSS specificity

Ideally the CSS components should consist of only `010` and `020` specificity where the normalize already covers the `001` specificity. The `030` specificity should be reserved for **variant overrides**.

##### 001 specificity example

```scss
a {
  color: $blue;
}
```

##### 010 specificity example

```scss
.class {
  color: $blue;
}
```

##### 020 specificity example

```scss
.modifier .class {
  color: $red;
}
```

##### 030 specificity example

```scss
.modifier.is-active .class {
  color: $blue;
}
```

OR

```scss
.modifier .class.is-active {
  color: $blue;
}
```

### Grouping Properties

Structure your CSS code for readability and maintainability, this helps future development as well as debugging.

Ideally your CSS values are arranged as follows:

1. Box
2. Text
3. Border
4. Background
5. Other

**Example element:**

```scss
.component {
  position: fixed;
  top: 0;
  left: 0;
  display: block;
  width: 10rem;
  min-height: 10rem;
  margin: 1rem;
  padding: 1rem;
  font-family: Arial, serif;
  border: 0.25rem solid $black;
  border-radius: 1rem;
  background: $tomato;

  opacity: 1;
  transform: translate(0, 2rem);
  transition: transform 0.3s linear 0.1s;
  z-index: 1;
}
```

```scss
.component:after {
  content: " "; // Place this first NOTE: some browsers need an empty string eg. a space
  display: value;
  position: value;
}
```

### Please..

- don't over-specify: `li.list-item`
- use `id`s only for that'll be manipulated with JavaScript
- no inline styles, except for values from PHP/JS (background-images etc.)

## JavaScript

Try to follow [Airbnb JavaScript Style Guide](https://github.com/airbnb/javascript) as far as possible.

Starter has Babel so you can write modern JavaScript. Use vanilla JS if you don't need jQuery.

- camelCase naming for variables and functions
- encourage reusable functions
- `let` for changing variables
- `const` for constant variables
- Use `let` or `const` in stead of `var`
- Try to declare your variables in the start of the function/file
- functions should be able to take arguments
- `===` > `==`

### Please..

- no inline styles, use classes instead
- no fixed text

## PHP

- PHP files should always start with `<?php`
- Remove closing `?>` from the end of the file
- `echo` > `print`
- use `$variable_name` in PHP
- It's ok to use shorthand echo `<?=`

### Please..

- no inline styles, use classes instead
- no fixed text in templates unless translatable in the CMS
