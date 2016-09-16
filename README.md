# TIC Wordpress Theme



### 1. While you're working on your project, run:

```bash
$ npm run watch
```

### 2. For building all the assets, run:

```bash
$ npm run build
```

### 3. Compress all files required for deployment:
It is not recommended that you deploy the entire theme folder to your webserver. There is no danger associated with doing this, but it is a waste of disk space and bandwidth. The node_modules and components for instance is only required during theme development.

By executing the command below, you will compress only the files that are required for deployment. The file will be available as a .zip inside the folder named '/package'.

```bash
$ npm run package
```


### How to structure your styles

  * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

  * `assets/scss/foundation.scss`: Imports for Foundation components and your custom styles.
  * `assets/scss/config/_settings.scss`: Original Foundation 5 base settings
  * `assets/scss/config/_custom-settings.scss`: Copy the settings you will modify to this file. Make it your own
  * `assets/scss/site/*.scss`: Unleash your creativity. Create the files you need (and remember to make import statements for all your files in assets/scss/foundation.scss)

Please note that you **must** run `$npm run build` in your terminal for the styles to be copied and concatinated. See [Gruntfile.js](https://github.com/olefredrik/FoundationPress/blob/master/Gruntfile.js) for details

### How to structure your scripts

* `assets/javascript/custom`: This is the folder where you put all your custom scripts. Every .js file you put in this directory will be minified and concatinated one single .js file. (This is good for site speed and performance)

Please note that you must run `npm run build` in your terminal for the scripts to be copied and concatinated. See [Gruntfile.js](https://github.com/olefredrik/FoundationPress/blob/master/Gruntfile.js) for details

### The styles and scripts generated by the build

Version control on these files are turned off because they are automatically generated as part of the build process.

* `assets/stylesheets/foundation.css`: All Sass files are minified and compiled to this file
* `assets/stylesheets/foundation.css.map`: CSS source maps

* `assets/javascript/vendor`: Vendor scripts are copied from `assets/javascript/components/` to this directory. We use this path for enqueing the vendor scripts in WordPress.

### Shortcodes

```
[mainblock class='addedclass' img='src' link='href']<p>content</p>[/mainblock]
//this needs to be placed inside ( div.row>div.column.small-12 ) at the minimum

[appblock class='addedclass' link='link' title='title']<p>short description</p>[/appblock]
//this needs to be placed inside of ( ul.small-block-grid-#.appnote-block) to work properly

[videosingle class='added class' title='title' video='file name of video']
//no prerequisites this shortcode creates all enclosing divs

[prefooterwrap class='added class']

[prefooter class='' link='link for prefooter']
content for prefooter
[/prefooterleft]

[prefooter class='' link='link for prefooter']
content for prefooter
[/prefooterleft]

[/prefooter]

//somewhat complicated but better to adjust it a year later here than on every page

[tech-vid-block product='' video='' date='']video title[/tech-vid-block]

//====================
//IMAGES IMAGES IMAGES
//====================

//ANGULAR IMAGES
[ng_product_image src='' width='' height='']

//JUST AN IMAGES TAG
[img class='myClass' src='folder/in/uploads/image.jpg' width='100' height='100' alt='alt-text']

//STYLE ATTRIBUTE FOR BACKGROUND IMAGE
[bgImage src="page/foobar.jpg"]

//display part numbers for a given series
[parts title='' series='' line='' filter='']



```
## Unit Testing With Travis-CI

FoundationPress is completely ready to be deployed to and tested by Travis-CI for WordPress Coding Standards and best practices. All you need to do to activate the test is sign up and follow the instructions to point Travis-CI towards your repo. Just don't forget to update the status badge to point to your repositories unit test.
[Travis-CI](https://travis-ci.org/)

## UI toolkits for rapid prototyping

* [Foundation UI Kit for Axure RP](https://gumroad.com/l/foundation-ui-kit-axure-rp)
* [FoundationPSD - Foundation UI Kit for Photoshop](http://foundationpress.olefredrik.com/downloads/foundation-psd-template/)

## Tutorials

* [FoundationPress for beginners](https://foundationpress.olefredrik.com/posts/tutorials/foundationpress-for-beginners/)
* [Responsive images in WordPress with Interchange](http://rachievee.com/responsive-images-in-wordpress/)
* [Build a Responsive WordPress theme](http://www.webdesignermag.co.uk/build-a-responsive-wordpress-theme/)
* [Learn to use the _settings file to change almost every aspect of a Foundation site](http://zurb.com/university/lessons/66)
* [Other lessons from Zurb University](http://zurb.com/university/past-lessons)
